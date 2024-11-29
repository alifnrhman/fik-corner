<?php
include('connection.php');
session_start();

$nim = $_POST['nim'];
$password = $_POST['password'];

if (!empty($nim) && !empty($password)) {
    // Cek apakah NIM ada di database
    $sql = "SELECT * FROM users WHERE nim = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $nim);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika NIM ada, validasi password
        $data = $result->fetch_assoc();

        if ($data['password'] === $password) {
            // Jika NIM dan password benar
            $_SESSION['nim'] = $data['nim'];
            $_SESSION['nama'] = $data['nama_lengkap'];
            setcookie('message', '', time() - 3600, "/");
            header('location: index');
        } else {
            // Jika password salah
            setcookie("message", "Password yang Anda masukkan salah.", time() + 3600, "/");
            header('location: login');
        }
    } else {
        // Jika NIM tidak ditemukan
        setcookie("message", "NIM yang Anda masukkan salah.", time() + 3600, "/");
        header('location: login');
    }
} else {
    // Jika NIM atau password kosong
    setcookie("message", "Harap isi NIM dan password.", time() + 3600, "/");
    header('location: login');
}
?>