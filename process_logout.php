<?php
   session_start();
   session_destroy();

   if (isset($_SESSION['nim'])) {
      header('location: index');
   } else if (isset($_SESSION['nama_penyelenggara'])) {
      header('location: login_penyelenggara');
   } else {
      header('location: admin');
   }
?>