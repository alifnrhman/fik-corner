<?php
   session_start();

   $title = "Berita";
   include("includes/header.php");
   // include("includes/navigation_bar.php");
   include("includes/functions.php");

?>

<div class='my-14'>
   <div>
      <p class="font-bold text-2xl">Berita Terbaru</p>
   </div>
   <div class='max-w-auto'>
   <div class="max-w-5xl p-10 rounded font-sansgrid grid-cols-1 
   sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-6 max-lg:max-w-3xl max-md:max-w-md mx-auto">
      <div>
      <?php
      $columns = "berita.*";
      $table = "berita";
      $join = "";
      $where = "";
      $orderBy = "";
      $limit = "5";
               
      // Mengambil data
      $news = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
                 
         foreach ($news as $data) {
         $data['tanggal'] = format_tanggal($data['tanggal']);
         echo
            "<div class='flex items-start gap-4 border rounded-lg p-4 mb-6 shadow-sm space-y-6'>" . // Warna abu-abu pada container utama
               "<div class='width: 12px; height: 8px; overflow: hidden;'>" . // Bungkus gambar untuk memastikan ukurannya tetap
                     "<img src='" . $data['foto'] . "' alt='" . $data['judul_berita'] . "' class='w-full h-full object-cover rounded-md' />" . 
                  "</div>" .
                  "<div class='flex-1 '>" . 
                     "<div class='mb-2 '>" . 
                        "<span class='text-blue-600 text-sm font-semibold'>" . $data['kategori'] . "</span> " .
                        "<span class='text-gray-500 text-xs'>" . $data['tanggal'] . "</span>" .
                     "</div>" . 
                     "<h2 class='text-gray-800 text-xl font-bold mb-4'>" . $data['judul_berita'] . "</h2>" . 
                     "<p class='text-gray-400 text-sm line-clamp-4 text-justify'>" . $data['deskripsi'] . "</p>" . 
                     "<div class='mt-2'>" . 
                        "<a href='#' class='text-blue-500 text-sm font-medium hover:underline'>Read more...</a>" . 
                     "</div>" . 
                  "</div>" . 
            "</div>";
      }
      ?>
      </div> 
   </div>        
</div>

<?php include("includes/footer.php") ?>