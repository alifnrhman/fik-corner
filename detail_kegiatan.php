<?php
   session_start();

   include("includes/functions.php");

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
   
   if($data[0]['biaya'] === null) {
      $data[0]['biaya'] = "Gratis";
   } else {
      $data[0]['biaya'] = "Rp" . number_format($data[0]['biaya'], 2, ',', '.');
   }

   $jam = strtotime($data[0]['waktu']);
   $title = $data[0]['nama_kegiatan'];

   include("includes/header.php");
   include("includes/navigation_bar.php");
?>

<main class="w-full h-full pt-20 lg:px-28 md:px-14 sm:px-6 flex-grow">
   <div class="mt-8 mb-5 flex items-center gap-x-3">
      <?php
         $url_kegiatan = $data[0]['kategori'];
         
         echo "<a href='" . $url_kegiatan . "'>" . 
            "<i class='fa-solid fa-arrow-left-long fa-lg cursor-pointer'></i>" .
         "</a>";
      ?>
      <h1 class="font-bold text-xl">Kembali</h1>
   </div>
   <div class="container block lg:flex">
      <div class="mr-10">
         <img src="<?= $data[0]['foto'] ?>" alt="<?= $data[0]['nama_kegiatan'] ?>" class="h-30">
      </div>
      <div>
         <div class="">
            <p class="text-lg font-bold text-primary"><?= $data[0]['kategori'] ?></p>
            <h2 class="text-3xl font-bold"><?= $data[0]['nama_kegiatan'] ?></h2>
         </div>
         <div class="mt-4 flex items-center">
            <i class="fa-solid fa-calendar-days absolute"></i>
            <p class="font-semibold ms-6"><?= format_tanggal($data[0]['tanggal']) ?></p>
         </div>
         <div class="flex items-center">
            <i class="fa-solid fa-clock absolute"></i>
            <p class="font-semibold ms-6"><?= date("H:i", $jam) ?></p>
         </div>
         <div class="flex items-center">
            <i class="fa-solid fa-location-dot absolute"></i>
            <p class="font-semibold ms-6"><?= $data[0]['lokasi'] ?></p>
         </div>
         <div class="flex items-center">
            <i class="fa-solid fa-sack-dollar absolute"></i>
            <p class="font-semibold ms-6"><?= $data[0]['biaya'] ?></p>
         </div>
         <div class="flex items-center">
            <i class='fa-solid fa-user-group fa-sm absolute'></i>
            <span class="font-semibold ms-6">
               <?= $data[0]['jumlah_peserta'] ?> peserta</span>
         </div>
         <div class="mt-6 items-center">
            <p class="font-bold">Deskripsi</p>
            <p class="text-justify"><?= $data[0]['deskripsi_lengkap'] ?></p>
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
         <div class="mt-8">
            <?php 
            $sql = "SELECT * FROM mhs_kegiatan WHERE nim = ? AND id_kegiatan = ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ss", $_SESSION['nim'], $data[0]['id_kegiatan']);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 0) {
               echo "<a href='daftar_kegiatan.php?id=" . $_GET['id'] . "'>" .
                        "<button type='submit'
                           class='w-40 shadow-md py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none'>
                           Daftar
                        </button>" .
                     "</a>";
            } else if ($data[0]['status'] == "Selesai") {
               echo "<a href='download_sertifikat.php' class='w-48 shadow-md py-3 px-4 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none'>
                        <i class='fa-solid fa-download text-white mr-1'></i>
                        Download Sertifikat
                     </a>";
            } else {
               echo "<button type='submit' disabled
                           class='w-48 shadow-md py-3 px-4 text-sm tracking-wide font-semibold rounded-md text-white bg-primary opacity-50 focus:outline-none'>
                           Anda Sudah Terdaftar
                     </button>";
            }
            ?>
         </div>
      </div>
   </div>
</main>
<?php include("includes/footer.php") ?>