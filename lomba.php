<?php
   session_start();

   // if(!isset($_SESSION['nim'])) {
   //    header('location: login');
   // }
   
   $title = "Lomba";
   include("layouts/header.php");
   include("layouts/navigation_bar.php");
?>

<h1>
   Lomba
</h1>

<?php include("layouts/footer.php") ?>