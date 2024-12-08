<?php
session_start();
include('connection.php');
include("includes/functions.php");

if (!isset($_SESSION['nim'])) {
    header('Location: login');
    exit();
}

// Ambil data sesi
$nim = $_SESSION['nim'];

// Proses Ubah Nomor Telepon
if (isset($_POST['nomor_telepon'])) {
    $nomor_telepon = $_POST['nomor_telepon'];

    // Cek nomor telepon saat ini di database
    $check_query = "SELECT nomor_telepon FROM users WHERE nim = ?";
    $check_stmt = $connection->prepare($check_query);
    $check_stmt->bind_param("s", $nim);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    
    if ($result->num_rows > 0) {
        $current_data = $result->fetch_assoc();
        
        // Cek apakah nomor telepon baru berbeda dengan nomor telepon saat ini
        if ($current_data['nomor_telepon'] == $nomor_telepon) {
            // Nomor telepon sama, tidak perlu update
            $_SESSION['message'] = "";
        } else {
            // Nomor telepon berbeda, lakukan update
            $update_query = "UPDATE users SET nomor_telepon = ? WHERE nim = ?";
            $stmt = $connection->prepare($update_query);
            $stmt->bind_param("ss", $nomor_telepon, $nim);
            
            if ($stmt->execute()) {
                $_SESSION['message'] = "Nomor telepon berhasil diubah!";
            } else {
                $_SESSION['message'] = "Error: Tidak dapat mengubah nomor telepon.";
            }
        }
    } else {
        $_SESSION['message'] = "Data pengguna tidak ditemukan.";
    }
}

// Proses Ubah Foto Profil
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $foto = file_get_contents($_FILES['foto']['tmp_name']);
    
    $sql = "UPDATE users SET foto = ? WHERE nim = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $foto, $nim);
    
    if ($stmt->execute()) {
        // Simpan foto ke session sebagai base64
        $_SESSION['foto'] = 'data:image/jpeg;base64,' . base64_encode($foto);
        $_SESSION['message'] = "Foto profil berhasil diubah!";
    } else {
        $_SESSION['message'] = "Gagal mengubah foto profil!";
    }
}

// Proses perubahan password
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $old_password = $_POST['old_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Cek apakah user mencoba mengubah password
    $changing_password = !empty($old_password) || !empty($new_password) || !empty($confirm_password);

    if ($changing_password) {
        // Jika user memilih mengubah password, maka semua kolom harus diisi
        if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
            $_SESSION['message'] = "Harap isi semua kolom password jika ingin mengubah password.";
            header('Location: profil.php');
            exit();
        }

        // Validasi konfirmasi password
        if ($new_password !== $confirm_password) {
            $_SESSION['message'] = "Password baru dan konfirmasi password tidak cocok.";
            header('Location: profil.php');
            exit();
        }

        // Cek password lama
        $sql = "SELECT password FROM users WHERE nim = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_assoc();

            if (password_verify($old_password, $data['password'])) {
                // Password lama benar, lakukan update
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_sql = "UPDATE users SET password = ? WHERE nim = ?";
                $update_stmt = $connection->prepare($update_sql);
                $update_stmt->bind_param("ss", $hashed_password, $nim);

                if ($update_stmt->execute()) {
                    $_SESSION['message'] = "Password berhasil diubah.";
                    $_SESSION['success'] = true;
                } else {
                    $_SESSION['message'] = "Terjadi kesalahan saat mengubah password.";
                }
            } else {
                $_SESSION['message'] = "Password lama salah.";
            }
        } else {
            $_SESSION['message'] = "Data pengguna tidak ditemukan.";
        }
    }
}

// Redirect kembali ke profil
header('Location: profil.php');
exit();
?>