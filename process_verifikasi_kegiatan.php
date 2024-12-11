<?php 
include('connection.php');

$id_kegiatan = $_GET['id'];
$status = $_GET['status'];

if ($status == 'verifikasi') {
   $query = "UPDATE kegiatan SET status = 'Aktif' WHERE id_kegiatan = '$id_kegiatan'";
   $result = mysqli_query($connection, $query);

   if ($result) {
      header('Location: menunggu_verifikasi_admin.php');
   } else {
      echo "<script>alert('Gagal memverifikasi kegiatan.');</script>";
   }

} else if ($status == 'tolak') {
   $query = "UPDATE kegiatan SET status = 'Ditolak' WHERE id_kegiatan = '$id_kegiatan'";
   $result = mysqli_query($connection, $query);

   if ($result) {
      header('Location: menunggu_verifikasi_admin.php');
   } else {
      echo "<script>alert('Gagal menolak kegiatan.');</script>";
   }
   
}