<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/connection.php');

// Ambil data dari form
$nama_penyelenggara = $_POST['nama_penyelenggara'];
$jenis_penyelenggara = $_POST['jenis_penyelenggara'];
$deskripsi = $_POST['deskripsi'];
$nama_penanggung_jawab = $_POST['nama_penanggung_jawab'];
$nomor_telepon = $_POST['nomor_telepon'];
$email = $_POST['email'];

// Hash password
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Ambil file logo dan dokumen pendukung
$logo = file_get_contents($_FILES['logo']['tmp_name']);
$dokumen_pendukung = file_get_contents($_FILES['dokumen_pendukung']['tmp_name']);

// Ambil ukuran logo dan file
$size_logo = $_FILES['logo']['size'];
$size_dokumen = $_FILES['dokumen_pendukung']['size'];

// Set ukuran maks ke 10 MB
$max_size = 10_000_000;

// Cek apakah pengguna sudah terdaftar
$sql = "SELECT * FROM penyelenggara WHERE email = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Validasi ukuran logo
if ($size_logo > $max_size) {
    setCookie('error_daftar_penyelenggara', 'Ukuran logo terlalu besar! (maks. 10MB)', time() + 60, '/');
    header('location: /fik-corner/penyelenggara');
    
// Validasi ukuran dokumen
} else if ($size_dokumen > $max_size) {
    setCookie('error_daftar_penyelenggara', 'Ukuran dokumen terlalu besar! (maks. 10MB)', time() + 60, '/');
    header('location: /fik-corner/penyelenggara');

} else {
    // Hapus cookie error
    setcookie('error_daftar_penyelenggara', '', time() - 3600, '/');

    // Jika belum terdaftar, maka daftarkan penyelenggara
    if ($result->num_rows == 0) {
        $sql1 = "INSERT INTO penyelenggara (nama_penyelenggara, jenis_penyelenggara, deskripsi, nama_penanggung_jawab,nomor_telepon, email, password, logo, dokumen_pendukung, tanggal_daftar, status_verifikasi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), 'Belum Terverifikasi')";
        $stmt1 = $connection->prepare($sql1);
        $stmt1->bind_param("sssssssss", $nama_penyelenggara, $jenis_penyelenggara, $deskripsi, $nama_penanggung_jawab, $nomor_telepon, $email, $password, $logo, $dokumen_pendukung);
        $stmt1->execute();

        // Jika berhasil mendaftar
        if ($stmt1->affected_rows > 0) {
        echo "<script>
                alert('Terima kasih telah mendaftar! silakan cek email Anda dalam 1x24 jam untuk verifikasi akun.');
                window.location.href = '/fik-corner/penyelenggara';
            </script>";
            
        // Jika gagal mendaftar
        } else {
            echo "<script>
                alert('Gagal mendaftar sebagai penyelenggara!');
                window.location.href = '/fik-corner/penyelenggara';
            </script>";
        }
        
        $stmt1->close();
    } else {
        echo "<script>
                alert('Email penyelenggara sudah terdaftar!');
                window.location.href = '/fik-corner/penyelenggara';
            </script>";
    }
    $stmt->close();
    $connection->close();

}