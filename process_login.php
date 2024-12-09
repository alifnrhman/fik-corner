<?php
include('connection.php');
session_start();

$nim = $_POST['nim'] ?? '';
$password = $_POST['password'] ?? '';

if (!empty($nim) && !empty($password)) {
    // Ambil data user berdasarkan NIM
    $sql = "SELECT nim, password, nama_lengkap, foto FROM users WHERE nim = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $nim);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $data['password'])) {
            // Login berhasil
            $_SESSION['nim'] = $data['nim'];
            $_SESSION['nama'] = $data['nama_lengkap'];
            $_SESSION['foto'] = $data['foto'] ? 'data:image/jpeg;base64,' . base64_encode($data['foto']) : null;

            header('Location: index.php');
            exit();
        } else {
            // Password salah
            setcookie("message", "Password yang Anda masukkan salah.", time() + 3600, "/");
            header('Location: login.php');
            exit();
        }
    } else {
        // NIM tidak ditemukan
        setcookie("message", "NIM yang Anda masukkan tidak ditemukan.", time() + 3600, "/");
        header('Location: login.php');
        exit();
    }
} else {
    // Input kosong
    setcookie("message", "Harap isi NIM dan password.", time() + 3600, "/");
    header('Location: login.php');
    exit();
}
?>