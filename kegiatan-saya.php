<?php
   session_start();

//Mengecek apakah 'nim' ada dalam sesi, jika tidak maka pengguna akan diarahkan ke halaman login
   if(!isset($_SESSION['nim'])) {
      header('location: login');
   }
   
   $title = "Kegiatan Saya";
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/functions.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/navigation_bar.php');
?>

<main class="w-full h-full pt-20 lg:px-28 md:px-14 sm:px-6 flex-grow">
   <div class="mt-8 mb-5 flex items-center">
      <p class="font-bold text-2xl">Kegiatan Saya</p>
   </div>

   <div class='max-w-auto'>
      <div class="font-sans">
         <!-- Tab untuk memilih kategori kegiatan: Semua, Belum Selesai, Sudah Selesai -->
         <ul class="flex w-max border divide-x rounded overflow-hidden">
            <li id="semuaTab"
               class="tab text-white font-bold text-center bg-primary text-[15px] py-2 px-8 cursor-pointer transition-all">
               Semua</li>
            <li id="belumSelesaiTab"
               class="tab text-gray-600 font-semibold text-center bg-white text-[15px] py-2 px-8 cursor-pointer hover:bg-gray-50 transition-all">
               Belum Selesai</li>
            <li id="sudahSelesaiTab"
               class="tab text-gray-600 font-semibold text-center bg-white text-[15px] py-2 px-8 cursor-pointer hover:bg-gray-50 transition-all">
               Sudah Selesai</li>
         </ul>

         <!-- Tab Semua: Menampilkan semua kegiatan yang diikuti oleh mahasiswa -->
         <div id="semuaContent" class="tab-content block mt-8">
            <div
               class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-3 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
               <?php 
               //Query untuk mengambil data kegiatan dari tabel yang terkait dengan mahasiswa
               $columns = "mhs_kegiatan.*, mhs_riwayat_kegiatan.*, kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
               $table = "kegiatan";
               $join = "
                  LEFT JOIN mhs_riwayat_kegiatan ON kegiatan.id_kegiatan = mhs_riwayat_kegiatan.id_kegiatan 
                  LEFT JOIN mhs_kegiatan ON kegiatan.id_kegiatan = mhs_kegiatan.id_kegiatan 
                  LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
                  LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
               ";
               //Kondisi untuk mengambil data berdasarkan nim mahasiswa yang sedang login
               $where = "mhs_kegiatan.nim = '" . $_SESSION['nim'] . "'" . "OR mhs_riwayat_kegiatan.nim = '" . $_SESSION['nim'] . "'";
               $orderBy = "mhs_kegiatan.id DESC, mhs_riwayat_kegiatan.id_riwayat DESC";
               $limit = "";

               // Mengambil data
               $kegiatan = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
               //Menampilkan data kegiatan menggunakan file event_card.php untuk setiap kegiatan
               foreach($kegiatan as $data) {
                  include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/event_card.php');  
               }
            ?>
            </div>
         </div>

         <!-- Belum Selesai: Menampilkan kegiatan yang belum selesai -->
         <div id="belumSelesaiContent" class="tab-content hidden mt-8">
            <div
               class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-3 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
               <?php 
               //Query untuk mengambil kegiatan yang belum selesai
               $columns = "mhs_kegiatan.*, kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
               $table = "kegiatan";
               $join = "
                  LEFT JOIN mhs_kegiatan ON kegiatan.id_kegiatan = mhs_kegiatan.id_kegiatan 
                  LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
                  LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
               ";
               $where = "mhs_kegiatan.nim = '" . $_SESSION['nim'] . "'";
               $orderBy = "mhs_kegiatan.id DESC";
               $limit = "";

               // Mengambil data
               $kegiatan = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);

               //Menampilkan kegiatan yang belum selesai 
               foreach($kegiatan as $data) {
                  include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/event_card.php');  
               }
            ?>
            </div>
         </div>

         <!-- Tab Sudah Selesai: Menampilkan kegiatan yang sudah selesai -->
         <div id="sudahSelesaiContent" class="tab-content hidden mt-8">
            <div
               class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-3 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
               <?php 

               // Query untuk ambil data kegiatan yang sudah selesai
               $columns = "mhs_riwayat_kegiatan.*, kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
               $table = "kegiatan";
               $join = "
                  LEFT JOIN mhs_riwayat_kegiatan ON kegiatan.id_kegiatan = mhs_riwayat_kegiatan.id_kegiatan 
                  LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
                  LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
               ";
               $where = "mhs_riwayat_kegiatan.nim = '" . $_SESSION['nim'] . "'";
               $orderBy = "mhs_riwayat_kegiatan.id_riwayat DESC";
               $limit = "";

               // Mengambil data
               $kegiatan = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);

               foreach($kegiatan as $data) {
                  include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/event_card.php');  
               }
            ?>
            </div>
         </div>
      </div>
   </div>


</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/footer.php') ?>