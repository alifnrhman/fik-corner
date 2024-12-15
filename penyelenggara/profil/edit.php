<?php
include($_SERVER["DOCUMENT_ROOT"] . '/fik-corner/includes/connection.php');
session_start();

// Ambil data dari form
$nama_penyelenggara = isset($_POST['nama_penyelenggara']) ? $_POST['nama_penyelenggara'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$nomor_telepon = isset($_POST['nomor_telepon']) ? $_POST['nomor_telepon'] : null;
$password_lama = isset($_POST['password_lama']) ? $_POST['password_lama'] : null;
$password_baru = isset($_POST['password_baru']) ? $_POST['password_baru'] : null;
$ulangi_password_baru = isset($_POST['ulangi_password_baru']) ? $_POST['ulangi_password_baru'] : null;

// Ambil data logo dan ukuran logo
$logo = isset($_FILES['logo']) ? $_FILES['logo']['tmp_name'] : null;
$size = $_FILES['logo']['size'];

// Maks ukuran logo 10 MB
$max_size = 10_000_000;

// Validasi logo
if (isset($logo) && $size > $max_size) {
    setCookie('error_profil', 'Ukuran file terlalu besar! (maks. 10MB)', time() + 60, '/');
    header('location: /fik-corner/penyelenggara/profil');
}

// Inisialiasi variabel kosong untuk dipakai di query
$updates = [];
$params = [];
$types = '';

// Validasi jika logo tidak kosong
if ($logo) {
    $logo = file_get_contents($logo);
    $updates[] = 'logo = ?';
    $params[] = $logo;
    $types .= 's';
}

// Validasi jika nama penyelenggara tidak kosong
if ($nama_penyelenggara) {
    $updates[] = 'nama_penyelenggara = ?';
    $params[] = $nama_penyelenggara;
    $types .= 's';
}

// Validasi jika email tidak kosong
if ($email) {
    $updates[] = 'email = ?';
    $params[] = $email;
    $types .= 's';
}

// Validasi jika nomor telepon tidak kosong
if ($nomor_telepon) {
    $updates[] = 'nomor_telepon = ?';
    $params[] = $nomor_telepon;
    $types .= 's';
}

// Validasi jika password lama, password baru, dan ulangi password baru tidak kosong
if ($password_lama && $password_baru && $ulangi_password_baru) {
    // Jika password baru dan ulangi password baru tidak cocok
    if ($password_baru !== $ulangi_password_baru) {
        echo "<script>
            alert('Password tidak cocok!');
            window.location.href = '/fik-corner/penyelenggara/profil/';
        </script>";
        exit();
    }

    // Query untuk mengambil password dari penyelenggara
    $sql = "SELECT password FROM penyelenggara WHERE id_penyelenggara = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $_SESSION['id_penyelenggara']);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    // Cek kesamaan password baru dengan password lama dari database
    if (!password_verify($password_lama, $hashed_password)) {
        echo "<script>
            alert('Password lama salah!');
            window.location.href = '/fik-corner/penyelenggara/profil/';
        </script>";
        exit();
    }

    // Hash password baru
    $hashed_password_baru = password_hash($password_baru, PASSWORD_DEFAULT);

    // Tambah parameter ke query
    $updates[] = 'password = ?';
    $params[] = $hashed_password_baru;
    $types .= 's';
}

// Jika array updates tidak kosong (ada perubahan data)
if (!empty($updates)) {
    // Query untuk update data penyelenggara
    $sql = "UPDATE penyelenggara SET " . implode(', ', $updates) . " WHERE id_penyelenggara = ?";
    $params[] = $_SESSION['id_penyelenggara'];
    $types .= 's';

    $stmt = $connection->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();

    // Jika query berhasil
    if ($stmt->affected_rows > 0) {
        if ($logo) {
            $_SESSION['logo_penyelenggara'] = $logo = 'data:image/jpeg;base64,' . base64_encode($logo);
        }
        setcookie('error_profil', '', time() - 3600, '/');
        echo "<script>
                alert('Berhasil mengubah profil!');
                window.location.href = '/fik-corner/penyelenggara/profil/';
            </script>";
            
    // Jika query gagal
    } else {
        echo "<script>
                alert('Gagal mengubah profil!');
                window.location.href = '/fik-corner/penyelenggara/profil/';
            </script>";
    }

    $stmt->close();
}

$connection->close();
?>