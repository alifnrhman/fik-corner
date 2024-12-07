<?php
include('connection.php');
session_start();

// Belum bener
$nomor_telepon = $_POST['nomor_telepon'];
$password = $_POST['password'];
$foto = $_POST['foto'];
$foto = file_get_contents($_FILES['foto']['tmp_name']);

$sql = "UPDATE users SET nomor_telepon = ?, password = ?, foto = ? WHERE nim = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ssss", $nomor_telepon, $password, $foto, $_SESSION['nim']);
$stmt->execute();

if ($stmt->affected_rows > 0) {
   header('location: profil');
   $stmt->close();
} else {
   echo "<script>
      alert('Gagal mengubah profil!');
      window.location.href = 'profil';
   </script>";
}

$stmt->close();
$connection->close();