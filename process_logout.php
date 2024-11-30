<?php
   session_start();
   session_destroy();

   if (isset($_SESSION['nim'])) {
      header('location: index');
   } else {
      header('location: admin');
   }
?>