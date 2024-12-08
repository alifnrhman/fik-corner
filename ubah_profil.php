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

// Ambil data nomor hp
$nomor_telepon = $_POST['nomor_telepon'] ?? null;

// Proses Ubah Nomor Telepon
if ($nomor_telepon) {
    $update_query = "UPDATE users SET nomor_telepon = ? WHERE nim = ?";
    $stmt = $connection->prepare($update_query);
    $stmt->bind_param("ss", $nomor_telepon, $nim);
    if ($stmt->execute()) {
        $_SESSION['message'] = "Nomor telepon berhasil diubah!";
    } else {
        $_SESSION['message'] = "Error: Tidak dapat mengubah nomor telepon.";
    }
}

// Proses perubahan password
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_SESSION['nim'];
    $old_password = $_POST['old_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (!empty($old_password) && !empty($new_password) && !empty($confirm_password)) {
        if ($new_password !== $confirm_password) {
            $_SESSION['message'] = "Password baru dan konfirmasi password tidak cocok.";
            header('Location: profil.php');
            exit();
        }

        $sql = "SELECT password FROM users WHERE nim = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $data = $result->fetch_assoc();

            if (password_verify($old_password, $data['password'])) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_sql = "UPDATE users SET password = ? WHERE nim = ?";
                $update_stmt = $connection->prepare($update_sql);
                $update_stmt->bind_param("ss", $hashed_password, $nim);

                if ($update_stmt->execute()) {
                    $_SESSION['message'] = "Password berhasil diubah.";
                    $_SESSION['success'] = true;
                    header('Location: profil.php');
                    exit();
                } else {
                    $_SESSION['message'] = "Terjadi kesalahan saat mengubah password.";
                    header('Location: profil.php');
                    exit();
                }
            } else {
                $_SESSION['message'] = "Password lama salah.";
                header('Location: profil.php');
                exit();
            }
        } else {
            $_SESSION['message'] = "Data pengguna tidak ditemukan.";
            header('Location: profil.php');
            exit();
        }
    } else {
        $_SESSION['message'] = "Harap isi semua kolom.";
        header('Location: profil.php');
        exit();
    }
}

// Redirect kembali ke profil jika tidak ada permintaan POST untuk perubahan password
header('Location: profil.php');
exit();
?>
