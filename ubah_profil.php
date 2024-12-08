<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($nim) && !empty($password)) {
        // Ambil data user dari database berdasarkan NIM
        $query = "SELECT password FROM users WHERE nim = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                $_SESSION['nim'] = $nim;
                $_SESSION['message'] = "Login berhasil!";
                header('Location: dashboard.php');
                exit();
            } else {
                $_SESSION['message'] = "Password salah.";
            }
        } else {
            $_SESSION['message'] = "Akun tidak ditemukan.";
        }
    } else {
        $_SESSION['message'] = "Harap isi semua kolom.";
    }

    header('Location: login.php');
    exit();
}
?>
