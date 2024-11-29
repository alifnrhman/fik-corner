<?php
   include ('connection.php');
   session_start();

   $nim = $_POST['nim'];
   $password = $_POST['password'];

   if ($nim != '' && $password != '') {
      $sql = "SELECT * FROM users WHERE nim = '$nim'";

      $query = mysqli_query($connection, $sql);
      $data = mysqli_fetch_assoc($query);

      if (mysqli_num_rows($query) < 1) {
         setcookie("message", "NIM yang anda masukkan salah.");
         header('location: login');
      } else {
         $sql = "SELECT * FROM users WHERE password = '$password'";

         $query = mysqli_query($connection, $sql);
         $data = mysqli_fetch_assoc($query);

         if (mysqli_num_rows($query) < 1) {
            setcookie("message", "Password yang anda masukkan salah.");
            header('location: login');
         } else {
            echo $data['nim'] . $data['password'];

            $_SESSION['nim'] = $data['nim'];
            $_SESSION['nama'] = $data['nama'];

            setcookie('message', '', time() - 60);
            header('location: index');
         }
      }
   }

?>