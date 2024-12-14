<?php
   session_start();

   $title = 'Hasil pencarian untuk "' . $_POST['search'] . '"';
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/navigation_bar.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/functions.php');

   // Ambil search query dari form
   $search_query = $_POST['search'] ?? '';
   $where = "(status = 'Aktif' OR status = 'Selesai')";

   // Tambahkan kondisi pencarian
   if (!empty($search_query)) {
      $where .= " AND (kegiatan.nama_kegiatan LIKE '%$search_query%' 
                  OR kategori_kegiatan.kategori LIKE '%$search_query%' 
                  OR penyelenggara.nama_penyelenggara LIKE '%$search_query%')";
   }
   $columns = "kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
   $table = "kegiatan";
   $join = "
      LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
      LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
   ";
   $orderBy = "kegiatan.posted_at DESC";
   $limit = "";

   // Ambil data
   $results = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
?>

<main class="w-full h-full pt-20 lg:px-28 md:px-14 sm:px-6 flex-grow">
   <div class='mt-8'>
      <div class="mb-5">
         <p class="font-bold text-2xl">Hasil pencarian untuk "<?= $search_query ?>"</p>
      </div>
      <div class='max-w-auto'>
         <div
            class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-6 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
            <?php 
               foreach($results as $data) {
                  include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/event_card.php');
               }
      
            ?>
         </div>
      </div>
   </div>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/footer.php') ?>