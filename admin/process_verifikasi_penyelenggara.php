<!--Proses verifikasi Penyelenggara-->
<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/connection.php');

// Ambil id dan action dari parameter
$id_penyelenggara = $_GET['id'];
$action = $_GET['action'];

// Query untuk update penyelenggara menjadi aktif dengan parameter id
if ($action == 'verifikasi') {
   $query = "UPDATE penyelenggara SET status_verifikasi = 'Terverifikasi' WHERE id_penyelenggara = '$id_penyelenggara'";
   $result = mysqli_query($connection, $query);

   if ($result) {
      header('Location: /fik-corner/admin/menunggu-verifikasi');
   } else {
      echo "<script>alert('Gagal memverifikasi penyelenggara.');</script>";
   }
// Query untuk update menolak penyelenggara dengan parameter id
} else if ($action == 'tolak') {
   $query = "UPDATE penyelenggara SET status_verifikasi = 'Ditolak' WHERE id_penyelenggara = '$id_penyelenggara'";
   $result = mysqli_query($connection, $query);

   if ($result) {
      header('Location: /fik-corner/admin/menunggu-verifikasi');
   } else {
      echo "<script>alert('Gagal menolak penyelenggara.');</script>";
   }
   
}