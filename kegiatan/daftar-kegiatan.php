<?php
   session_start();
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/functions.php');
   
   // Validasi
   if (!isset($_SESSION['nim'])) {
      echo "<script>alert('Anda harus login terlebih dahulu!');
            window.location.href='/fik-corner/login';
            </script>";
   }

   // Query data event
   $columns = "kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
   $table = "kegiatan";
   $join = "
      LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
      LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
   ";
   $where = "status = 'Aktif' AND id_kegiatan = " . $_GET['id']; // Memfilter event yang statusnya 'Aktif' dan berdasarkan ID yang diberikan
   $orderBy = "";
   $limit = "";

   // Mengambil data event
   $dataEvent = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);

   if (count($dataEvent) == 0) { //Mengecek apakah data event ditemukan atau tidak 
      header("Location: /fik-corner/404"); //Jika tidak ada maka akan diarahkan ke halaman 404
   }

   // Query data mahasiswa
   $columns = "users.*, mahasiswa.email, mahasiswa.prodi";
   $table = "users";
   $join = "
      LEFT JOIN mahasiswa ON users.nim = mahasiswa.nim 
   ";
   $where = "users.nim = " . $_SESSION['nim']; //Memfilter data berdasarkan NIM yang ada di session
   $orderBy = "";
   $orderBy = "";
   $limit = "";

   // Mengambil data mahasiswa
   $dataMahasiswa = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);

   $title = "Daftar " . $dataEvent[0]['nama_kegiatan'];
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/navigation_bar.php');
?>

<main class="w-full h-full pt-20 lg:px-28 md:px-14 sm:px-6 flex-grow">
   <div class="mt-8 mb-5 flex items-center gap-x-3">
      <a href='<?php if (strpos($_SERVER['HTTP_REFERER'], 'detail-kegiatan')) {
         echo $_SERVER['HTTP_REFERER'];
      } else if (strpos($_SERVER['HTTP_REFERER'], 'kegiatan-saya')) {
         echo '/fik-corner/kegiatan-saya';
      } else if (strpos($_SERVER['HTTP_REFERER'], 'pembayaran')) {
         echo '/fik-corner/kegiatan/' . strtolower($dataEvent[0]['kategori']) . '/detail-kegiatan.php?id=' . $_GET['id'];
      } ?>'>
         <i class='fa-solid fa-arrow-left-long fa-lg cursor-pointer'></i>
      </a>
      <h1 class="font-bold text-xl">Kembali</h1>
   </div>
   <!-- Menampilkan kategori event dan form untuk daftar -->
   <p class="font-bold text-2xl">Daftar <?= $dataEvent[0]['kategori']; ?></p>
   <?php 
            //Menampilkan form pendaftaran mahasiswa untuk event yang dipilih
            echo
               "<div class='flex lg:flex'>" .
                     "<div class='mr-10 w-7/12'>" .
                        "<div class='mt-4 flex flex-row gap-4'>" .
                           "<div class='basis-6/12'>" .
                              "<label class='text-gray-800 text-[15px] mb-2 block'>Nama Lengkap</label>" .
                              "<input name='nama_lengkap' id='nama_lengkap' type='text' disabled class='w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600' value='" . $dataMahasiswa[0]['nama_lengkap'] . "'/>" .
                           "</div>" .
                           "<div class='basis-3/12'>" .
                              "<label class='text-gray-800 text-[15px] mb-2 block'>NIM</label>" .
                              "<input name='nim' id='nim' type='text' disabled class='w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600' value='" . $dataMahasiswa[0]['nim'] . "'/>" .
                           "</div>" .
                           "<div class='basis-3/12'>" .
                              "<label class='text-gray-800 text-[15px] mb-2 block'>Program Studi</label>" .
                              "<input name='prodi' id='prodi' type='text' disabled class='w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600' value='" . $dataMahasiswa[0]['prodi'] . "'/>" .
                           "</div>" .
                        "</div>" .
                        
                        "<div class='flex flex-row gap-4'>" .
                           "<div class='basis-6/12 mt-4'>" .
                              "<label class='text-gray-800 text-[15px] mb-2 block'>Email</label>" .
                              "<input name='email' id='email' type='email' disabled class='w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600' value='" . $dataMahasiswa[0]['email'] . "'/>" .
                           "</div>" .
                           "<div class='basis-6/12 mt-4'>" .
                              "<label class='text-gray-800 text-[15px] mb-2 block'>Nomor Telepon</label>" .
                              "<input name='nomor_telepon' id='nomor_telepon' type='text' disabled class='w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600' value='" . $dataMahasiswa[0]['nomor_telepon'] . "'/>" .
                           "</div>" .
                        "</div>";
         //Jika event gratis, tampilkan tombol untuk mendaftar
         if ($dataEvent[0]['biaya'] == "Gratis") {
                  echo  "<a href='/fik-corner/kegiatan/process_daftar_kegiatan.php?id=" . $_GET['id'] . "'>" .
                           "<button type='submit'
                           class='w-40 shadow-md mt-8 py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none'>
                           Daftar Sekarang
                           </button>" .
                        "</a>";
         } else {
         //Jika event berbayar, tampilkan total bayar dan tombol untuk melakukan pembayaran
                  echo  
                        "<div class='flex flex-col mt-8 gap-y-4'>" .
                           "<div class=''>" .
                              "<p class='text-lg font-bold'>Total Bayar</p>" .
                              "<p class='font-semibold'>" . $dataEvent[0]['biaya'] . "</p>" .
                           "</div>" .
                           "<div class=''>" .
                              "<p class='text-lg font-bold'>Metode Pembayaran</p>" .
                              "<p class='font-semibold'>QRIS</p>" .
                           "</div>" .
                        "</div>" .
            
                        "<a href='/fik-corner/kegiatan/pembayaran.php?id=" . $_GET['id'] . "'>" .
                           "<button type='submit' class='w-36 shadow-md mt-8 py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none'>
                              Bayar
                           </button>" .
                        "</a>";
         }
               echo  "</div>" .
                     "<div class='mr-10 w-3/12'>" .
                        "<div class=''>" .
                           "<p class='text-lg font-bold text-primary'>" . $dataEvent[0]['kategori'] . "</p>" .
                           "<h2 class='text-3xl font-bold'>" . $dataEvent[0]['nama_kegiatan'] . "</h2>" .
                        "</div>" .
                        "<div class='mt-4 flex items-center'>" .
                           "<i class='fa-solid fa-calendar-days absolute'></i>" .
                           "<p class='font-semibold ms-6'>" . $dataEvent[0]['tanggal'] . "</p>" .
                        "</div>" .
                        "<div class='flex items-center'>" .
                           "<i class='fa-solid fa-clock absolute'></i>" .
                           "<p class='font-semibold ms-6'>" . $dataEvent[0]['waktu'] . "</p>" .
                        "</div>" .
                        "<div class='flex items-center'>" .
                           "<i class='fa-solid fa-location-dot absolute'></i>" .
                           "<p class='font-semibold ms-6'>" . $dataEvent[0]['lokasi'] . "</p>" .
                        "</div>" .
                        "<div class='flex items-center'>" .
                           "<i class='fa-solid fa-sack-dollar absolute'></i>" .
                           "<p class='font-semibold ms-6'>" . $dataEvent[0]['biaya'] . "</p>" .
                        "</div>" .
                        "<div class='flex items-center'>" .
                           "<i class='fa-solid fa-user-group fa-sm absolute'></i>" .
                           "<span class='font-semibold ms-6'>" .
                              $dataEvent[0]['jumlah_peserta'] . " peserta</span>" .
                        "</div>" .
                        "<div class='mt-6 items-center'>
                           <p class='font-bold'>Deskripsi</p>
                           <p class='text-justify'>" . $dataEvent[0]['deskripsi_lengkap'] . "</p>" .
                        "</div>" .
                        "<div class='mt-12 items-center'>" .
                           "<p class='font-bold'>Penyelenggara</p>" .
                           "<div class='flex gap-x-3 items-center mt-2'>" .
                              "<img src='" . $dataEvent[0]['logo'] . "' alt='" . $dataEvent[0]['nama_penyelenggara'] . "'
                                 class='w-6 h-6 rounded-full border border-gray-400 cursor-pointer' />" .
                              "<p class='text-gray-800 line-clamp-4 font-semibold'>" . $dataEvent[0]['nama_penyelenggara'] . "</p>" .
                              "</div>" .
                        "</div>" .
                     "</div>" .
                     
                     "<div class='w-2/12'>" .
                        "<img src='" . $dataEvent[0]['foto'] . "' alt='" . $dataEvent[0]['nama_kegiatan'] . "' class='w-full'>" .
                     "</div>" .
               "</div>";
      ?>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/footer.php') ?>