<?php
include('connection.php');
session_start();

$foto = file_get_contents($_FILES['foto']['tmp_name']);
$ukuran_file = $_FILES['foto']['size'];
$size = 10_000_000; // Max 10MB

if ($ukuran_file > $size) {
   setCookie('error', 'Ukuran file terlalu besar! (maks. 10MB)', time() + 5, '/');
   header('location: profil');
   
} else {
   setcookie('error', '', time() - 3600, '/');


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
}