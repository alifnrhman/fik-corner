<?php
include('connection.php');
session_start();

$foto = $_POST['foto'];
$foto = file_get_contents($_FILES['foto']['tmp_name']);

$sql = "UPDATE users SET foto = ? WHERE nim = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $foto, $_SESSION['nim']);
$stmt->execute();

if ($stmt->affected_rows > 0) {

   $_SESSION['foto'] = $foto = 'data:image/jpeg;base64,' . base64_encode($foto);;
   header('location: profil');
} else {
   echo "<script>
      alert('Gagal mengubah profil!');
      window.location.href = 'profil';
   </script>";
}