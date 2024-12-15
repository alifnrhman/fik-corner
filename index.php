<?php
   session_start();

   $title = "Beranda";
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/navigation_bar.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/functions.php');
?>

<main
   class="w-full h-full pt-40 sm:pt-38 md:pt-40 lg:pt-40 xl:pt-36 2xl:pt-24 px-14 sm:px-14 md:px-14 lg:px-28 flex-grow">
   <!-- Kegiatan Terpopuler -->
   <div>
      <p class="font-bold text-2xl">Kegiatan Terpopuler</p>
   </div>
   <div class='max-w-auto'>
      <div
         class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-6 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
         <?php 
            // Query untuk mengambil data kegiatan terpopuler
            $columns = "kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
            $table = "kegiatan";
            $join = "
               LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
               LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
            ";
            $where = "status = 'Aktif'";
            $orderBy = "kegiatan.jumlah_peserta DESC";
            $limit = "5";
            
            // Mengambil data
            $events = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
            
            foreach($events as $data) {
               
               include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/event_card.php');
            }
         ?>
      </div>
   </div>
   </div>
   <!-- End of Kegiatan Terpopuler -->

   <!-- Seminar Terbaru -->
   <div class='my-14'>
      <div class="flex justify-between items-end">
         <p class="font-bold text-2xl">Seminar Terbaru</p>
         <a class="font-semibold text-lg underline" href="/fik-corner/kegiatan/seminar">Lihat Semua</a>
      </div>

      <div class='max-w-auto'>
         <div
            class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-6 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
            <?php 
               // Query untuk mengambil data seminar terbaru
               $columns = "kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
               $table = "kegiatan";
               $join = "
                  LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
                  LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
               ";
               $where = "status = 'Aktif' && kategori_kegiatan.id_kategori = 1";
               $orderBy = "kegiatan.posted_at DESC";
               $limit = "5";
               
               // Mengambil data
               $events = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
               
               foreach($events as $data) {
                  include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/event_card.php');
               }
            ?>
         </div>
      </div>
   </div>
   <!-- End of Seminar Terbaru -->

   <!-- Webinar Terbaru -->
   <div class='my-14'>
      <div class="flex justify-between items-end">
         <p class="font-bold text-2xl">Webinar Terbaru</p>
         <a class="font-semibold text-lg underline" href="/fik-corner/kegiatan/webinar">Lihat Semua</a>
      </div>

      <div class='max-w-auto'>
         <div
            class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-6 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
            <?php 
               // Query untuk mengambil data webinar terbaru
               $columns = "kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
               $table = "kegiatan";
               $join = "
                  LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
                  LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
               ";
               $where = "status = 'Aktif' && kategori_kegiatan.id_kategori = 2";
               $orderBy = "kegiatan.posted_at DESC";
               $limit = "5";
               
               // Mengambil data
               $events = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
               
               foreach($events as $data) {
                  include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/event_card.php');
               }
            ?>
         </div>
      </div>
   </div>
   <!-- End of Webinar Terbaru -->

   <!-- Lomba Terbaru -->
   <div class='my-14'>
      <div class="flex justify-between items-end">
         <p class="font-bold text-2xl">Lomba Terbaru</p>
         <a class="font-semibold text-lg underline" href="/fik-corner/kegiatan/lomba">Lihat Semua</a>
      </div>

      <div class='max-w-auto'>
         <div
            class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-6 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
            <?php 
               // Query untuk mengambil data lomba terbaru
               $columns = "kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
               $table = "kegiatan";
               $join = "
                  LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
                  LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
               ";
               $where = "status = 'Aktif' && kategori_kegiatan.id_kategori = 3";
               $orderBy = "kegiatan.posted_at DESC";
               $limit = "5";
               $biaya = $data['biaya'] ? "Berbayar" : "Gratis";
               
               // Mengambil data
               $events = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
               
               foreach($events as $data) {
                  include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/event_card.php');
               }
            ?>
         </div>
      </div>
      <!-- End of Lomba Terbaru -->
   </div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/footer.php') ?>