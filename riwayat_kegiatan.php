<?php
   session_start();

   if(!isset($_SESSION['nim'])) {
      header('location: login');
   }
   
   $title = "Riwayat Kegiatan";
   include("includes/header.php");
   include("includes/navigation_bar.php");
?>

<main class="w-full h-full pt-20 lg:px-28 md:px-14 sm:px-6 flex-grow">
   <div class="mt-8 mb-5 flex items-center">
      <p class="font-bold text-2xl">Riwayat Kegiatan</p>
   </div>
   <div class='max-w-auto'>
      <div
         class="mt-8 rounded font-sans grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 max-lg:max-w-3xl max-md:max-w-md mx-auto">
         <div>
            <?php
               $columns = "*";
               $table = "berita";
               $join = "";
               $where = "";
               $orderBy = "";
               $limit = "";
                        

               // Mengambil data
               // $news = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
                 
            ?>
         </div>
      </div>
   </div>
</main>

<?php include("includes/footer.php") ?>