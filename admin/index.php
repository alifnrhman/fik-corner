<!--Index untuk halaman admin, jika sudah login akan masuk ke dashboard dan apabila belum login maka akan dilempar ke halaman login-->
<?php 
   session_start();

   if (isset($_SESSION['username'])) {
      header("location: /fik-corner/admin/dashboard");
   } else {
      header("location: /fik-corner/admin/login");
   }
?>