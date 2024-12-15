<!--Proses verifikasi kegiatan-->
<?php 
include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/connection.php');

$id_kegiatan = $_GET['id'];
$action = $_GET['action'];

// Query untuk update kegiatan menjadi aktif dengan parameter id
if ($action == 'verifikasi') {
   $query = "UPDATE kegiatan SET status = 'Aktif' WHERE id_kegiatan = '$id_kegiatan'";
   $result = mysqli_query($connection, $query);

   if ($result) {
      header('Location: /fik-corner/admin/menunggu-verifikasi');
   } else {
      echo "<script>alert('Gagal memverifikasi kegiatan.');</script>";
   }

// Query untuk update kegiatan ditolak dengan parameter id
} else if ($action == 'tolak') {
   $query = "UPDATE kegiatan SET status = 'Ditolak' WHERE id_kegiatan = '$id_kegiatan'";
   $result = mysqli_query($connection, $query);

   if ($result) {
      header('Location: /fik-corner/admin/menunggu-verifikasi');
   } else {
      echo "<script>alert('Gagal menolak kegiatan.');</script>";
   }
   
}