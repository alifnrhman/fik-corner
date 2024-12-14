<?php
include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/connection.php');
session_start();

$nim = $_POST['nim'];
$password = $_POST['password'];

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
            $_SESSION['nama_mahasiswa'] = $data['nama_lengkap'];
            $_SESSION['foto_mahasiswa'] = $data['foto'] ? 'data:image/jpeg;base64,' . base64_encode($data['foto']) : null;
            
            if (isset($_COOKIE['message'])) {
                setcookie("message", time() - 180, "/");
            }
            header('Location: /fik-corner/');
            exit();
        } else {
            // Password salah
            setcookie("message", "Password yang Anda masukkan salah.", time() + 180, "/");
            header('Location: /fik-corner/login');
            exit();
        }
    } else {
        // NIM tidak ditemukan
        setcookie("message", "NIM yang Anda masukkan tidak ditemukan.", time() + 180, "/");
        header('Location: /fik-corner/login');
        exit();
    }
} else {
    // Input kosong
    setcookie("message", "Harap isi NIM dan password.", time() + 180, "/");
    header('Location: /fik-corner/login');
    exit();
}
?>