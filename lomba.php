<?php
   session_start();

   $title = "Lomba";
   include("includes/header.php");
   include("includes/navigation_bar.php");
   include("includes/functions.php");
?>

<main class="w-full h-full pt-20 lg:px-28 md:px-14 sm:px-6 flex-grow">
   <div class='mt-8'>
      <div class="mb-5">
         <p class="font-bold text-2xl">Lomba</p>
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
                     Semua Tipe Lomba</option>
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
                     Semua Status Lomba
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
                  onclick="window.location.href='lomba'">
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
               $where = "status = 'Aktif' AND kategori_kegiatan.kategori = 'Lomba'";

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
                  $data['tanggal'] = format_tanggal($data['tanggal']);
                  $biaya = is_null($data['biaya']) ? "Gratis" : "Berbayar";
                  echo
                     "<div class='bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(0,0,0,0.3)] relative top-0 hover:-top-2 transition-all duration-300'>" .
                        "<div class='w-full h-60 object-cover bg-gradient-to-b from-gray-800 via-transparent to-transparent absolute' /></div>" .
                        "<div class='ms-6 mt-5 absolute'>" .
                           "<p class='text-sm text-white font-semibold'>". $biaya ."</p>" .
                        "</div>" .
                        "<img src='" . $data['foto'] . "' alt='" . $data['nama_kegiatan'] . "' class='w-full h-60 object-cover' />" .
                        "<div class='p-6'>" .
                           "<div class='flex justify-between items-center mb-1'>" .
                              "<div class=''>" .
                                 "<span class='font-medium text-sm text-primary'>" . $data['kategori'] . "</span>" .
                              "</div>" .
                              "<div class=''>" .
                                 "<span class='font-medium text-sm text-gray-600'>" . $data['tanggal'] . "</span>" .
                              "</div>" .
                           "</div>" .
                           "<div class='h-48'>" .
                              "<div class='h-14'>" .
                                 "<h3 class='text-xl font-bold text-gray-800 line-clamp-2'>" . $data['nama_kegiatan'] . "</h3>" .
                              "</div>" .
                              "<div class='flex justify-between mt-3 max-h-5 line-clamp-1 truncate'>" .
                                 "<div class=''>" .
                                    "<i class='fa-solid fa-location-dot fa-sm'></i>" .
                                    "<p class='ps-2 text-gray-700 text-sm font-medium inline-block truncate align-text-bottom max-w-[150px]'>" . $data['lokasi'] . "</p>" .
                                 "</div>" .
                                 "<div>" .
                                    "<i class='fa-solid fa-user-group fa-sm'></i>" .
                                    "<span class='ps-2 text-gray-700 text-sm font-medium cursor-pointer inline-block'>" . $data['jumlah_peserta'] . " peserta" . "</span>" .
                                 "</div>" .
                              "</div>" .
                              "<hr class='my-3' />" .
                              "<div class=''>" .
                                 "<p class='text-gray-400 text-sm line-clamp-4 text-justify'>" . $data['deskripsi_singkat'] . "</p>" .
                              " </div>" .
                           "</div>" .

                           "<hr class='my-4' />" .
                           "<div class='flex gap-x-3 items-center'>" .
                              "<img src='" . $data['logo'] . "' alt='" . $data['nama_penyelenggara'] . "' class='w-6 h-6 rounded-full border border-gray-400 cursor-pointer' />" .
                              "<p class='text-gray-400 text-sm line-clamp-4'>" . $data['nama_penyelenggara'] . "</p>" .
                           "</div>" .
                        "</div>" .
                     "</div>";
               }
            ?>
         </div>
      </div>
   </div>
</main>
<?php include("includes/footer.php") ?>