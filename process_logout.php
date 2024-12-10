<?php
   session_start();
   
   if (isset($_SESSION['nim'])) {
      session_destroy();
      header('location: index');
   } else if (isset($_SESSION['nama_penyelenggara'])) {
      session_destroy();
      header('location: login_penyelenggara');
   } else {
      session_destroy();
      header('location: admin');
   }
?>