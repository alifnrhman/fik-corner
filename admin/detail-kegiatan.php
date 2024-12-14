<?php
   session_start();

   if(!isset($_SESSION['username'])) {
      header('location: /fik-corner/admin/login');
   }

   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/functions.php');

   $columns = "kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
   $table = "kegiatan";
   $join = "
      LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
      LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
   ";
   $where = "id_kegiatan = " . $_GET['id'];
   $orderBy = "";
   $limit = "";

   // Mengambil data
   $data = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);

   if (count($data) == 0) {
      header("Location: /fik-corner/404");
   }

   $title = $data[0]['nama_kegiatan'];

   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
?>

<div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
   <div class="flex items-start">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/admin/shared/sidebar.php'); ?>

      <section class="main-content w-full px-8">
         <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/admin/shared/header_admin.php'); ?>

         <div class="bg-gray-100 pt-5 font-sans">
            <div class="max-w-full max-lg:max-w-3xl max-md:max-w-sm mx-auto">
               <div class="mt-8 mb-5 flex items-center gap-x-3">
                  <a href='<?php echo $_SERVER['HTTP_REFERER'] ?>'>
                     <i class='fa-solid fa-arrow-left-long fa-lg cursor-pointer'></i>
                  </a>
                  <h1 class="font-bold text-xl">Kembali</h1>
               </div>
               <div class="container block lg:flex">
                  <div class="mr-10 basis-2/6">
                     <img src="<?= $data[0]['foto'] ?>" alt="<?= $data[0]['nama_kegiatan'] ?>" class="w-full">
                  </div>
                  <div class="basis-4/6">
                     <?php
                     echo "<div class='mb-4'>";
                           if ($data[0]['status'] == "Pending") {
                              echo "<span class='text-md font-bold text-white px-4 py-2 bg-primary rounded-lg'>Menunggu Verifikasi</span>";
                           } else if ($data[0]['status'] == "Aktif") {
                              echo "<span class='text-md font-bold text-white px-4 py-2 bg-green-500 rounded-lg'>Aktif</span>";
                           } else if ($data[0]['status'] == "Ditolak") {
                              echo "<span class='text-md font-bold text-white px-4 py-2 bg-red-500 rounded-lg'>Ditolak</span>";
                           } else if ($data[0]['status'] == "Selesai") {
                              echo "<span class='text-md font-bold text-white px-4 py-2 bg-gray-500 rounded-lg'>Selesai</span>";
                           }
                        
                     echo "</div>";
                        ?>
                     <div class="">
                        <p class="text-lg font-bold text-primary"><?= $data[0]['kategori'] ?></p>
                        <h2 class="text-3xl font-bold"><?= $data[0]['nama_kegiatan'] ?></h2>
                     </div>
                     <div class="mt-4 flex items-center">
                        <i class="fa-solid fa-calendar-days absolute"></i>
                        <p class="font-semibold ms-6"><?= $data[0]['tanggal'] ?></p>
                     </div>
                     <div class="flex items-center">
                        <i class="fa-solid fa-clock absolute"></i>
                        <p class="font-semibold ms-6"><?= $data[0]['waktu'] ?></p>
                     </div>
                     <div class="flex items-center">
                        <i class="fa-solid fa-location-dot absolute"></i>
                        <p class="font-semibold ms-6"><?= $data[0]['lokasi'] ?></p>
                     </div>
                     <div class="flex items-center">
                        <i class="fa-solid fa-sack-dollar absolute"></i>
                        <p class="font-semibold ms-6"><?= $data[0]['biaya'] ?></p>
                     </div>
                     <div class="mt-6 items-center">
                        <p class="font-bold">Deskripsi Singkat</p>
                        <p class="text-justify"><?= $data[0]['deskripsi_singkat'] ?></p>
                     </div>
                     <div class="mt-6 items-center">
                        <p class="font-bold">Deskripsi Lengkap</p>
                        <p class="text-justify"><?= $data[0]['deskripsi_lengkap'] ?></p>
                     </div>
                     <div class="mt-6 items-center">
                        <p class="font-bold">Diajukan Pada</p>
                        <p class="text-justify"><?= $data[0]['posted_at'] ?></p>
                     </div>
                     <div class="mt-12 items-center">
                        <p class="font-bold">Penyelenggara</p>
                        <?= 
                           "<div class='flex gap-x-3 items-center mt-2'>" .
                              "<img src='" . $data[0]['logo'] . "' alt='" . $data[0]['nama_penyelenggara'] . "' class='w-6 h-6 rounded-full border border-gray-400 cursor-pointer' />" .
                              "<p class='text-gray-800 line-clamp-4 font-semibold'>" . $data[0]['nama_penyelenggara'] . "</p>" .
                           "</div>";
                        ?>
                     </div>
                     <div class="mt-8 space-x-5">
                        <?php 
                              $data = get_data(
                                 $connection,
                                 "*",
                                 "kegiatan",
                                 "",
                                 "id_kegiatan = " . $_GET['id'],
                                 "kegiatan.posted_at ASC"
                              );
                              
                              if ($data[0]['status'] == "Pending") {
                              echo
                                    "<a href='process_verifikasi_kegiatan.php?id=" . $_GET['id'] . "&action=verifikasi'
                                       class='w-40 shadow-md py-3 px-10 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none' value='verifikasi'>
                                       <i class='fa-solid fa-check mr-1'></i>
                                       Verifikasi
                                    </a>" .

                                    "<a href='process_verifikasi_kegiatan.php?id=" . $_GET['id'] . "&action=tolak'
                                       class='w-40 shadow-sm py-3 px-10 text-sm tracking-wide font-semibold rounded-md text-primary bg-white hover:bg-primaryHover hover:text-white focus:outline-none transition-all duration-300 border border-gray-300'
                                       value='tolak'>
                                       <i class='fa-solid fa-xmark mr-1'></i>
                                       Tolak
                                    </a>";
                              }
                           ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>
</body>
</html>