<?php
   session_start();

   // if(!isset($_SESSION['nim'])) {
   //    header('location: login');
   // }
   
   $title = "Lomba";
   include("includes/header.php");
   include("includes/navigation_bar.php");
?>

<h1>
   Lomba
</h1>

<?php include("includes/footer.php") ?>