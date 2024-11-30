<?php
   session_start();

   // if(!isset($_SESSION['nim'])) {
   //    header('location: login');
   // }

   $title = "Webinar";
   include("layouts/header.php");
   include("layouts/navigation_bar.php");
?>

<h1>
   Webinar
</h1>

<?php include("layouts/footer.php") ?>