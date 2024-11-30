<?php
include('connection.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {
    // Cek apakah username ada di database
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika username ada, validasi password
        $data = $result->fetch_assoc();

        if ($data['password'] === $password) {
            // Jika username dan password benar
            $_SESSION['username'] = $data['username'];
            $_SESSION['nama'] = $data['nama'];
            setcookie('message', '', time() - 3600, "/");
            header('location: dashboard');
        } else {
            // Jika password salah
            setcookie("message", "Password yang Anda masukkan salah.", time() + 3600, "/");
            header('location: admin');
        }
    } else {
        // Jika username tidak ditemukan
        setcookie("message", "Username yang Anda masukkan salah.", time() + 3600, "/");
        header('location: admin');
    }
} else {
    // Jika username atau password kosong
    setcookie("message", "Harap isi username dan password.", time() + 3600, "/");
    header('location: admin');
}
?>