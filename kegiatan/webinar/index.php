<?php
   session_start();

   $title = "Webinar";
   include($_SERVER["DOCUMENT_ROOT"] . "/fik-corner/includes/header.php");
   include($_SERVER["DOCUMENT_ROOT"] . "/fik-corner/includes/navigation_bar.php");
   include($_SERVER["DOCUMENT_ROOT"] . "/fik-corner/includes/functions.php");
?>

<main class="w-full h-full pt-20 lg:px-28 md:px-14 sm:px-6 flex-grow">
   <div class='mt-8'>
      <div class="mb-5">
         <p class="font-bold text-2xl">Webinar</p>
      </div>
      <form action="" method="get">
         <div class="flex gap-x-4">
            <div class="relative flex items-center">
               <select name="urutkan"
                  class="w-full text-sm text-gray-800 bg-gray-100 px-4 py-3 rounded-md outline-blue-600" required
                  onchange="this.form.submit()">
                  <option value="terbaru"
                     <?= isset($_GET['urutkan']) && $_GET['urutkan'] === 'terbaru' ? 'selected' : '' ?>>
                     Terbaru</option>
                  <option value="terlama"
                     <?= isset($_GET['urutkan']) && $_GET['urutkan'] === 'terlama' ? 'selected' : '' ?>>
                     Terlama</option>
                  <option value="terpopuler"
                     <?= isset($_GET['urutkan']) && $_GET['urutkan'] === 'terpopuler' ? 'selected' : '' ?>>
                     Terpopuler</option>
               </select>
            </div>
            <div class="relative flex items-center">
               <select name="biaya"
                  class="w-full text-sm text-gray-800 bg-gray-100 px-4 py-3 rounded-md outline-blue-600" required
                  onchange="this.form.submit()">
                  <option value="semua" <?= isset($_GET['biaya']) && $_GET['biaya'] === 'semua' ? 'selected' : '' ?>>
                     Semua Tipe Webinar</option>
                  <option value="gratis" <?= isset($_GET['biaya']) && $_GET['biaya'] === 'gratis' ? 'selected' : '' ?>>
                     Gratis</option>
                  <option value="berbayar"
                     <?= isset($_GET['biaya']) && $_GET['biaya'] === 'berbayar' ? 'selected' : '' ?>>Berbayar</option>
               </select>
            </div>
            <div class="relative flex items-center">
               <select name="waktu"
                  class="w-full text-sm text-gray-800 bg-gray-100 px-4 py-3 rounded-md outline-blue-600" required
                  onchange="this.form.submit()">
                  <option value="semua" <?= isset($_GET['waktu']) && $_GET['waktu'] === 'semua' ? 'selected' : '' ?>>
                     Semua Status Webinar
                  </option>
                  <option value="belum dimulai"
                     <?= isset($_GET['waktu']) && $_GET['waktu'] === 'belum dimulai' ? 'selected' : '' ?>>Belum dimulai
                  </option>
                  <option value="sudah selesai"
                     <?= isset($_GET['waktu']) && $_GET['waktu'] === 'sudah selesai' ? 'selected' : '' ?>>Sudah selesai
                  </option>
               </select>
            </div>
            <div class="relative flex items-center">
               <button type="reset"
                  class="w-full shadow-md py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none"
                  onclick="window.location.href='/fik-corner/kegiatan/webinar'">
                  <i class="fa-solid fa-rotate-left fa-sm" style="color: #ffffff;"></i>
                  Reset Filter
               </button>
            </div>
         </div>
      </form>

      <div class='max-w-auto'>
         <div
            class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-6 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
            <?php 
               $columns = "kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
               $table = "kegiatan";
               $join = "
                  LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
                  LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
               ";
               $where = "status = 'Aktif' AND kategori_kegiatan.kategori = 'Webinar'";

               if (isset($_GET['biaya'])) {
                  if ($_GET['biaya'] === 'gratis') {
                     $where .= " AND kegiatan.biaya IS NULL";
                  } else if ($_GET['biaya'] === 'berbayar') {
                     $where .= " AND kegiatan.biaya IS NOT NULL";
                  } else {
                     $where .= "";
                  }
               }

               $date = date('Y-m-d');
               
               if (isset($_GET['waktu'])) {
                  if ($_GET['waktu'] === 'belum dimulai') {
                     $where .= " AND kegiatan.tanggal >= '$date'";
                  } else if ($_GET['waktu'] === 'sudah selesai') {
                     $where .= " AND kegiatan.tanggal < '$date'";
                  } else {
                     $where .= "";
                  }
               }

               $orderBy = "kegiatan.posted_at DESC";

               if (isset($_GET['urutkan'])) {
                  if ($_GET['urutkan'] === 'terbaru') {
                     $orderBy = "kegiatan.posted_at DESC";
                  } else if ($_GET['urutkan'] === 'terlama') {
                     $orderBy = "kegiatan.posted_at ASC";
                  } else if ($_GET['urutkan'] === 'terpopuler') {
                     $orderBy = "kegiatan.jumlah_peserta DESC";
                  }
               }

               $limit = "";
               
               // Mengambil data
               $events = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
               
               foreach($events as $data) {
                  include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/event_card.php');
               }
            ?>
         </div>
      </div>
   </div>
</main>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/fik-corner/includes/footer.php") ?>