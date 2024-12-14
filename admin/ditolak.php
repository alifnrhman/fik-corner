<?php
   session_start();

   if(!isset($_SESSION['username'])) {
      header('location: /fik-corner/admin/login');
   }
   
   $title = "Kegiatan Ditolak";
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/functions.php');

   // Mengambil data kegiatan yang ditolak
   $kegiatan_ditolak = get_data(
      $connection,
      "kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo",
      "kegiatan",
      "LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori
      LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara",
      "status = 'Ditolak'",
      "kegiatan.posted_at ASC"
   );

   // Mengambil data penyelenggara yang ditolak
   $penyelenggara_ditolak = get_data(
      $connection,
      "*",
      "penyelenggara",
      "",
      "status_verifikasi = 'Ditolak'",
      "tanggal_daftar ASC"
   );

?>

<div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
   <div class="flex items-start">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/admin/shared/sidebar.php'); ?>

      <section class="main-content w-full px-8">
         <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/admin/shared/header_admin.php'); ?>

         <div class="bg-gray-100 pt-5 font-sans">
            <div class="max-w-full max-lg:max-w-3xl max-md:max-w-sm mx-auto">
               <h2 class="text-gray-800 text-2xl max-sm:text-2xl font-bold mb-4">
                  Kegiatan Ditolak (<?= count($kegiatan_ditolak); ?>)
               </h2>
               <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                  <?php 
                     foreach ($kegiatan_ditolak as $data) {
                        $url = "detail_kegiatan_admin.php?id=" . $data['id_kegiatan'];

                        include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/admin/shared/event_card.php');
                     }
                  ?>
               </div>
            </div>
            <div class="max-w-full max-lg:max-w-4xl max-md:max-w-sm mx-auto my-10">
               <h2 class="text-gray-800 text-2xl max-sm:text-2xl font-bold mb-4">
                  Penyelenggara Ditolak (<?= count($penyelenggara_ditolak); ?>)
               </h2>
               <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
                  <?php 
                     foreach ($penyelenggara_ditolak as $data) {
                        include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/admin/shared/penyelenggara_card.php');
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