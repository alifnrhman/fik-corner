<?php
   session_start();

   if(!isset($_SESSION['nama_penyelenggara'])) {
      header('location: /fik-corner/penyelenggara/login');
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
      echo "<script>
         alert('Data tidak ditemukan');
         window.location.href = '/fik-corner/penyelenggara/dashboard'; </script>";
   }
   
   $title = $data[0]['nama_kegiatan'];

   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
?>

<div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
   <div class="flex items-start">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/penyelenggara/shared/sidebar.php') ?>

      <section class="main-content w-full px-8">
         <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/penyelenggara/shared/header_penyelenggara.php') ?>

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
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>
</body>
</html>