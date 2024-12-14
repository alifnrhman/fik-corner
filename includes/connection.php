<?php
   $db_host = "localhost";
   $db_user = "root";
   $db_password = "";
   $db_name = "fik_corner";

   $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

   if (!$connection) {
      echo "Gagal koneksi database";
   }
?>