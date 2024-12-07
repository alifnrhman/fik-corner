<?php
include('connection.php');
session_start();

$nama_penyelenggara = $_POST['nama_penyelenggara'];
$jenis_penyelenggara = $_POST['jenis_penyelenggara'];
$deskripsi = $_POST['deskripsi'];
$nama_penanggung_jawab = $_POST['nama_penanggung_jawab'];
$nomor_telepon = $_POST['nomor_telepon'];
$email = $_POST['email'];
$password = $_POST['password'];
$logo = $_POST['logo'];
$dokumen_pendukung = $_POST['dokumen_pendukung'];

// Cek apakah sudah terdaftar
$sql = "SELECT * FROM penyelenggara WHERE email = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $sql1 = "INSERT INTO penyelenggara (nama_penyelenggara, jenis_penyelenggara, deskripsi, nama_penanggung_jawab,nomor_telepon, email, password, logo, dokumen_pendukung, tanggal_daftar, status_verifikasi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), 'Belum Terverifikasi')";
    $stmt1 = $connection->prepare($sql1);
    $stmt1->bind_param("sssssssss", $nama_penyelenggara, $jenis_penyelenggara, $deskripsi, $nama_penanggung_jawab, $nomor_telepon, $email, $password, $logo, $dokumen_pendukung);
    $stmt1->execute();

    if ($stmt1->affected_rows > 0) {
      echo "<script>
            alert('Terima kasih telah mendaftar! silakan cek email Anda dalam 1x24 jam untuk verifikasi akun.');
            window.location.href = 'penyelenggara';
         </script>";
         
        $stmt2->close();

    } else {
        echo "<script>
            alert('Gagal mendaftar sebagai penyelenggara!');
            window.location.href = 'penyelenggara';
        </script>";
    }
    $stmt1->close();
} else {
    echo "<script>
            alert('Email penyelenggara sudah terdaftar!');
            window.location.href = 'penyelenggara';
        </script>";
}
$stmt->close();
$connection->close();