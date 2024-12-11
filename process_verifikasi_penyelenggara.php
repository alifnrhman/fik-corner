<?php 
include('connection.php');

$id_penyelenggara = $_GET['id'];
$status = $_GET['status'];

if ($status == 'verifikasi') {
   $query = "UPDATE penyelenggara SET status_verifikasi = 'Terverifikasi' WHERE id_penyelenggara = '$id_penyelenggara'";
   $result = mysqli_query($connection, $query);

   if ($result) {
      header('Location: menunggu_verifikasi_admin.php');
   } else {
      echo "<script>alert('Gagal memverifikasi penyelenggara.');</script>";
   }

} else if ($status == 'tolak') {
   $query = "UPDATE penyelenggara SET status_verifikasi = 'Ditolak' WHERE id_penyelenggara = '$id_penyelenggara'";
   $result = mysqli_query($connection, $query);

   if ($result) {
      header('Location: menunggu_verifikasi_admin.php');
   } else {
      echo "<script>alert('Gagal menolak penyelenggara.');</script>";
   }
   
}