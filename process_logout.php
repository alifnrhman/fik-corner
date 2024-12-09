<?php
   session_start();
   session_destroy();

   if (isset($_SESSION['nim'])) {
      unset($_SESSION['nim']);
      header('location: index');
   } else if (isset($_SESSION['nama_penyelenggara'])) {
      unset($_SESSION['nama_penyelenggara']);
      header('location: login_penyelenggara');
   } else {
      unset($_SESSION['username']);
      header('location: admin');
   }
?>