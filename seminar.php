<?php
   session_start();

   // if(!isset($_SESSION['nim'])) {
   //    header('location: login');
   // }

   $title = "Seminar";
   include("layouts/header.php");
   include("layouts/navigation_bar.php");
?>

<h1>
   Seminar
</h1>

<?php include("layouts/footer.php") ?>