<?php
   session_start();

   if(!isset($_SESSION['nim'])) {
      header('location: login');
   }
   
   $title = "Riwayat Kegiatan";
   include("includes/header.php");
   include("includes/navigation_bar.php");
?>

<h1>
   Riwayat Kegiatan
</h1>

<?php include("includes/footer.php") ?>