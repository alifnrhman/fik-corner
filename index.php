<?php
   session_start();

   // if(!isset($_SESSION['nim'])) {
   //    header('location: login');
   // }
   $title = "Beranda";
   include("includes/header.php");
   include("includes/navigation_bar.php");
   include("includes/functions.php");
?>

<div class="w-full h-full lg:px-28 md:px-14 sm:px-6">
   <!-- Kegiatan Terbaru -->
   <div class='my-10'>
      <p class="font-semibold text-xl">Kegiatan Terbaru</p>
      <div class='max-w-7xl'>
         <div
            class='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
            <?php 
               $events = get_data($connection, '*', 'kegiatan', '', 'tanggal DESC', '4');
               
               foreach($events as $data) {
                  echo
                     "<div class='bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(0,0,0,0.3)] relative top-0 hover:-top-2 transition-all duration-300'>" .
                        "<img src='" . $data['foto'] . "' alt='" . $data['nama_kegiatan'] . "' class='w-full h-60 object-cover' />" .
                        "<div class='p-6'>" .
                           "<span class='text-sm block text-gray-400 mb-2'>" . $data['tanggal'] . "</span>" .
                           "<h3 class='text-xl font-bold text-gray-800'>" . $data['nama_kegiatan'] . "</h3>" .
                           "<hr class='my-4' />" .
                           "<p class='text-gray-400 text-sm line-clamp-4'>" . $data['deskripsi_singkat'] . "</p>" .
                        "</div>" .
                     "</div>";
               }
            ?>
         </div>
      </div>
   </div>
   <!-- End of Kegiatan Terbaru -->

   <!-- Webinar yang Sedang Aktif -->
   <div class="my-10">
      <p class="font-semibold text-xl">Webinar yang Sedang Aktif</p>
      <div class='max-w-7xl'>
         <div
            class='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
            <?php 
               $seminars = get_data($connection, '*', 'kegiatan', 'kategori = "Webinar"', 'tanggal DESC', '4');
               
               foreach($seminars as $data) {
                  echo
                     "<div class='bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(0,0,0,0.3)] relative top-0 hover:-top-2 transition-all duration-300'>" .
                        "<img src='" . $data['foto'] . "' alt='" . $data['nama_kegiatan'] . "' class='w-full h-60 object-cover' />" .
                        "<div class='p-6'>" .
                           "<span class='text-sm block text-gray-400 mb-2'>" . $data['tanggal'] . "</span>" .
                           "<h3 class='text-xl font-bold text-gray-800'>" . $data['nama_kegiatan'] . "</h3>" .
                           "<hr class='my-4' />" .
                           "<p class='text-gray-400 text-sm line-clamp-4'>" . $data['deskripsi_singkat'] . "</p>" .
                        "</div>" .
                     "</div>";
               }
            ?>
         </div>
      </div>
      <!-- End of Kegiatan yang Sedang Aktif -->

      <!-- Kegiatan Terpopuler -->
      <div
         class="bg-white shadow-[0_2px_10px_-3px_rgba(0,0,0,0.3)] px-6 py-8 w-full max-w-sm rounded-lg font-[sans-serif] overflow-hidden mt-4 absolute top-28 end-28">
         <div class="flex flex-wrap items-center gap-4">
            <h3 class="text-xl font-bold flex-1 text-gray-800">Terpopuler 🔥</h3>
            <p class="text-sm text-blue-500 font-semibold cursor-pointer">See all</p>
         </div>

         <div class="mt-8 space-y-4">

         </div>
      </div>
      <!-- End of Kegiatan Terpopuler -->
   </div>

   <?php include("includes/footer.php") ?>