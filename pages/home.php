<?php
   session_start();

   if(!isset($_SESSION['nim'])) {
      header('location: login.php');
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>
   <link rel="stylesheet" href="css\style.css">
   <script src="https://kit.fontawesome.com/6188934eaf.js" crossorigin="anonymous"></script>
</head>
<body>
   <?php
      include('sidebar.php');
   ?>
   <main id="dashboard-main">
      <?php
            if (isset($_GET["message"])) {
               echo "<div>" . $_GET["message"] . "</div>";
            }
      ?>
      <header class="daftar-page">
         <h2>Daftar Buku</h2>
         <a href="tambahbuku.php">
            <button type="button">
               <i class="fa-solid fa-plus"></i>
               &nbsp; Tambah Buku
            </button>
         </a>
      </header>
      <div>
         <table class="table-data">
            <thead>
               <tr>
                  <th style="width: 10px;">#</th>
                  <th>Judul Buku</th>
                  <th>ISBN</th>
                  <th>Tahun Terbit</th>
                  <th>Harga</th>
                  <th>Stok Buku</th>
                  <th>Publisher</th>
                  <th>Author</th>
                  <th style="width: 220px;">Action</th>
               </tr>
            </thead>
         </table>
      </div>
   </main>
</body>
</html>