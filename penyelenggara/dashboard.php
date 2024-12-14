<?php
   session_start();

   if(!isset($_SESSION['nama_penyelenggara'])) {
      header('location: /fik-corner/penyelenggara/login');
   }
   
   $title = "Dashboard Penyelenggara";
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/functions.php');

   // Mengambil data kegiatan menunggu verifikasi
   $kegiatan_pending = get_data(
      $connection,
      "id_kegiatan",
      "kegiatan",
      "",
      "id_penyelenggara = '" . $_SESSION['id_penyelenggara'] . "' AND status = 'Pending'"
   );

   // Mengambil data kegiatan aktif
   $kegiatan_aktif = get_data(
      $connection,
      "id_kegiatan",
      "kegiatan",
      "",
      "id_penyelenggara = '" . $_SESSION['id_penyelenggara'] . "' AND status = 'Aktif'"
   );

   // Mengambil data kegiatan selesai
   $kegiatan_selesai = get_data(
      $connection,
      "id_kegiatan",
      "kegiatan",
      "",
      "id_penyelenggara = '" . $_SESSION['id_penyelenggara'] . "' AND status = 'Selesai'"
   );

   // Mengambil data kegiatan ditolak
   $kegiatan_ditolak = get_data(
      $connection,
      "id_kegiatan",
      "kegiatan",
      "",
      "id_penyelenggara = '" . $_SESSION['id_penyelenggara'] . "' AND status = 'Ditolak'"
   );

   // Mengambil data peserta aktif
   $peserta_aktif = get_data(
      $connection,
      "mhs_kegiatan.id_kegiatan",
      "mhs_kegiatan",
      "LEFT JOIN kegiatan ON mhs_kegiatan.id_kegiatan = kegiatan.id_kegiatan",
      "kegiatan.id_penyelenggara = '" . $_SESSION['id_penyelenggara'] . "'"
   );

?>

<div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
   <div class="flex items-start">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/penyelenggara/shared/sidebar.php') ?>

      <section class="main-content w-full px-8">
         <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/penyelenggara/shared/header_penyelenggara.php') ?>

         <div class="bg-gray-100 pt-5 font-sans">
            <div class="max-w-full max-sm:max-w-sm">
               <h2 class="text-gray-800 text-2xl max-sm:text-2xl font-bold mb-4">Statistik</h2>
               <div class="grid md:grid-cols-5 sm:grid-cols-2 gap-10">
                  <div class="bg-white rounded-md border px-7 py-8">
                     <p class="text-gray-400 text-base font-semibold mb-1">Kegiatan Menunggu Verifikasi</p>
                     <h3 class="text-primary text-3xl font-extrabold">
                        <?= count($kegiatan_pending); ?>
                     </h3>
                  </div>
                  <div class="bg-white rounded-md border px-7 py-8">
                     <p class="text-gray-400 text-base font-semibold mb-1">Kegiatan Aktif</p>
                     <h3 class="text-primary text-3xl font-extrabold">
                        <?= count($kegiatan_aktif); ?>
                     </h3>
                  </div>
                  <div class="bg-white rounded-md border px-7 py-8">
                     <p class="text-gray-400 text-base font-semibold mb-1">Kegiatan Selesai</p>
                     <h3 class="text-primary text-3xl font-extrabold">
                        <?= count($kegiatan_selesai); ?>
                     </h3>
                  </div>
                  <div class="bg-white rounded-md border px-7 py-8">
                     <p class="text-gray-400 text-base font-semibold mb-1">Kegiatan Ditolak</p>
                     <h3 class="text-primary text-3xl font-extrabold">
                        <?= count($kegiatan_ditolak); ?>
                     </h3>
                  </div>
                  <div class="bg-white rounded-md border px-7 py-8">
                     <p class="text-gray-400 text-base font-semibold mb-1">Peserta Aktif</p>
                     <h3 class="text-primary text-3xl font-extrabold">
                        <?= count($peserta_aktif); ?>
                     </h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>
</body>
</html>