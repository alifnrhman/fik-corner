<?php
   session_start();

   // if(!isset($_SESSION['nim'])) {
   //    header('location: login');
   // }

   $title = "Seminar";
   include("includes/header.php");
   include("includes/navigation_bar.php");
?>

<h1>
   Seminar
</h1>

<?php include("includes/footer.php") ?>