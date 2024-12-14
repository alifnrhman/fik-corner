<?php
   session_start();

   if(!isset($_SESSION['username'])) {
      header('location: /fik-corner/admin/login');
   }
   
   $title = "Admin Dashboard";
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/functions.php');

   // Mengambil data penyelenggara menunggu verifikasi
   $penyelenggara_pending = get_data(
      $connection,
      "id_penyelenggara",
      "penyelenggara",
      "",
      "status_verifikasi = 'Belum Diverifikasi'"
   );

   // Mengambil data kegiatan menunggu verifikasi
   $kegiatan_pending = get_data(
      $connection,
      "id_kegiatan",
      "kegiatan",
      "",
      "status = 'Pending'"
   );

   // Mengambil data kegiatan aktif
   $kegiatan_aktif = get_data(
      $connection,
      "id_kegiatan",
      "kegiatan",
      "",
      "status = 'Aktif'"
   );
   
   // Mengambil data kegiatan selesai
   $kegiatan_selesai = get_data(
      $connection,
      "status",
      "kegiatan",
      "",
      "status = 'Selesai'"
   );

   // Mengambil data kegiatan ditolak
   $kegiatan_ditolak = get_data(
      $connection,
      "status",
      "kegiatan",
      "",
      "status = 'Ditolak'"
   );
?>

<div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
   <div class="flex items-start">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/admin/shared/sidebar.php'); ?>

      <section class="main-content w-full px-8">
         <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/admin/shared/header_admin.php'); ?>

         <div class="bg-gray-100 pt-5 font-sans">
            <div class="max-w-full max-sm:max-w-sm">
               <h2 class="text-gray-800 text-2xl max-sm:text-2xl font-bold mb-4">Statistik</h2>
               <div class="grid md:grid-cols-5 sm:grid-cols-2 gap-10">
                  <div class="bg-white rounded-md border px-7 py-8 flex flex-col">
                     <p class="text-gray-400 text-base font-semibold mb-1">Penyelenggara Menunggu Verifikasi</p>
                     <h3 class="text-primary text-3xl font-extrabold mt-auto">
                        <?= count($penyelenggara_pending); ?>
                     </h3>
                  </div>
                  <div class="bg-white rounded-md border px-7 py-8 flex flex-col">
                     <p class="text-gray-400 text-base font-semibold mb-1">Kegiatan Menunggu Verifikasi</p>
                     <h3 class="text-primary text-3xl font-extrabold mt-auto">
                        <?= count($kegiatan_pending); ?>
                     </h3>
                  </div>
                  <div class="bg-white rounded-md border px-7 py-8 flex flex-col">
                     <p class="text-gray-400 text-base font-semibold mb-1">Kegiatan Aktif</p>
                     <h3 class="text-primary text-3xl font-extrabold mt-auto">
                        <?= count($kegiatan_aktif); ?>
                     </h3>
                  </div>
                  <div class="bg-white rounded-md border px-7 py-8 flex flex-col">
                     <p class="text-gray-400 text-base font-semibold mb-1">Kegiatan Selesai</p>
                     <h3 class="text-primary text-3xl font-extrabold mt-auto">
                        <?= count($kegiatan_selesai); ?>
                     </h3>
                  </div>
                  <div class="bg-white rounded-md border px-7 py-8 flex flex-col">
                     <p class="text-gray-400 text-base font-semibold mb-1">Kegiatan Ditolak</p>
                     <h3 class="text-primary text-3xl font-extrabold mt-auto">
                        <?= count($kegiatan_ditolak); ?>
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