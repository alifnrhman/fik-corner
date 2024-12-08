<?php
include('connection.php');
session_start();

$nomor_telepon = isset($_POST['nomor_telepon']) ? $_POST['nomor_telepon'] : null;
$password_lama = isset($_POST['password_lama']) ? $_POST['password_lama'] : null;
$password_baru = isset($_POST['password_baru']) ? $_POST['password_baru'] : null;
$ulangi_password_baru = isset($_POST['ulangi_password_baru']) ? $_POST['ulangi_password_baru'] : null;

$updates = [];
$params = [];
$types = '';

if ($nomor_telepon) {
    $updates[] = 'nomor_telepon = ?';
    $params[] = $nomor_telepon;
    $types .= 's';
}

if ($password_lama && $password_baru && $ulangi_password_baru) {
    if ($password_baru !== $ulangi_password_baru) {
        echo "<script>
            alert('Password tidak cocok!');
            window.location.href = 'profil';
        </script>";
        exit();
    }

    $sql = "SELECT password FROM users WHERE nim = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $_SESSION['nim']);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (!password_verify($password_lama, $hashed_password)) {
        echo "<script>
            alert('Password lama salah!');
            window.location.href = 'profil';
        </script>";
        exit();
    }

    $hashed_password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
    $updates[] = 'password = ?';
    $params[] = $hashed_password_baru;
    $types .= 's';
}

if (!empty($updates)) {
    $sql = "UPDATE users SET " . implode(', ', $updates) . " WHERE nim = ?";
    $params[] = $_SESSION['nim'];
    $types .= 's';

    $stmt = $connection->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header('location: profil');
    } else {
        echo "<script>
            alert('Gagal mengubah profil!');
            window.location.href = 'profil';
        </script>";
    }

    $stmt->close();
}

$connection->close();
?>