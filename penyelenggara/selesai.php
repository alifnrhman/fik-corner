<?php
   session_start();

   if(!isset($_SESSION['nama_penyelenggara'])) {
      header('location: login_penyelenggara');
   }
   
   $title = "Kegiatan Terverifikasi";
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/functions.php');

   // Mengambil data kegiatan terverifikasi
   $kegiatan_selesai = get_data(
      $connection,
      "kegiatan.*, kategori_kegiatan.kategori",
      "kegiatan",
      "LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori ",
      "id_penyelenggara = '" . $_SESSION['id_penyelenggara'] . "' AND status = 'Selesai'",
      "kegiatan.posted_at ASC"
   );

?>

<div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
   <div class="flex items-start">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/penyelenggara/shared/sidebar.php') ?>

      <section class="main-content w-full px-8">
         <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/penyelenggara/shared/header_penyelenggara.php') ?>

         <div class="bg-gray-100 pt-5 font-sans">
            <div class="max-w-full max-lg:max-w-3xl max-md:max-w-sm mx-auto">
               <h2 class="text-gray-800 text-2xl max-sm:text-2xl font-bold mb-4">
                  Kegiatan Selesai (<?= count($kegiatan_selesai); ?>)
               </h2>
               <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                  <?php 
                     foreach ($kegiatan_selesai as $data) {
                        include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/penyelenggara/shared/event_card.php');
                     }
                  ?>

               </div>
            </div>
         </div>
      </section>
   </div>
</div>
</body>
</html>