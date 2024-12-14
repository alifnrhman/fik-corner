<?php 
   session_start();

   if (isset($_SESSION['username'])) {
      header("location: /fik-corner/admin/dashboard");
   } else {
      header("location: /fik-corner/admin/login");
   }
?>