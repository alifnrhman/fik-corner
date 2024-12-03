<?php
include('connection.php');
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($email) && !empty($password)) {
    // Cek apakah email ada di database
    $sql = "SELECT * FROM penyelenggara WHERE email = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika email ada, validasi password
        $data = $result->fetch_assoc();

        if ($data['password'] === $password) {
            // Jika email dan password benar
            $_SESSION['email'] = $data['email'];
            $_SESSION['nama_penyelenggara'] = $data['nama_penyelenggara'];
            setcookie('message', '', time() - 3600, "/");
            header('location: dashboard_penyelenggara');
        } else {
            // Jika password salah
            setcookie("message", "Password yang Anda masukkan salah.", time() + 3600, "/");
            header('location: penyelenggara');
        }
    } else {
        // Jika email tidak ditemukan
        setcookie("message", "Email yang Anda masukkan salah.", time() + 3600, "/");
        header('location: penyelenggara');
    }
} else {
    // Jika email atau password kosong
    setcookie("message", "Harap isi email dan password.", time() + 3600, "/");
    header('location: penyelenggara');
}
?>