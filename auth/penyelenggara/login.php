<?php
include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/connection.php');
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($email) && !empty($password)) {
    // Cek apakah email ada di database
    $sql = "SELECT * FROM penyelenggara WHERE email = ? AND status_verifikasi = 'Terverifikasi'";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika email ada, validasi password
        $data = $result->fetch_assoc();

        if (password_verify($password, $data['password'])) {
            // Jika email dan password benar
            $_SESSION['id_penyelenggara'] = $data['id_penyelenggara'];
            $_SESSION['email_penyelenggara'] = $data['email'];
            $_SESSION['nama_penyelenggara'] = $data['nama_penyelenggara'];
            $_SESSION['logo_penyelenggara'] = $data['logo'] ? 'data:image/jpeg;base64,' . base64_encode($data['logo']) : null;
            setcookie('message', '', time() - 3600, "/");
            header('location: /fik-corner/penyelenggara/dashboard');
        } else {
            // Jika password salah
            setcookie("message", "Password yang Anda masukkan salah.", time() + 3600, "/");
            header('location: /fik-corner/penyelenggara/login');
        }
    } else {
        // Jika email tidak ditemukan
        setcookie("message", "Email yang Anda masukkan salah.", time() + 3600, "/");
        header('location: /fik-corner/penyelenggara/login');
    }
} else {
    // Jika email atau password kosong
    setcookie("message", "Harap isi email dan password.", time() + 3600, "/");
    header('location: /fik-corner/penyelenggara/login');
}
?>