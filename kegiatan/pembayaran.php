<?php
   session_start();

   //Menyertakan file fungsi 
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/functions.php');

   //Menentukan kolom yang akan diambil dari tabel kegiatan dan tabel terkait (kategori_kegiatan, penyelenggara)
   $columns = "kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
   $table = "kegiatan";
   $join = "
      LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
      LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
   ";
   $where = "status = 'Aktif' AND id_kegiatan = " . $_GET['id']; //Kondisi untuk mengambil data kegiatan dengan status aktif dan ID sesuai parameter URL
   $orderBy = ""; 
   $limit = "";

   // Mengambil data event
   $dataEvent = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);

   //Menentukan kolom-kolom yang akan diambil dari tabel 'users' dan 'mahasiswa'
   $columns = "users.*, mahasiswa.email, mahasiswa.prodi";
   $table = "users";
   $join = "
      LEFT JOIN mahasiswa ON users.nim = mahasiswa.nim 
   ";
   $where = "users.nim = " . $_SESSION['nim']; //Kondisi untuk mengambil data pengguna berdasarkan nim 
   $orderBy = "";
   $limit = "";

   // Mengambil data mahasiswa
   $dataMahasiswa = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
   
   //Menentukan judul halaman dan mengambil beberapa data dari beberapa file 
   $title = "Daftar " . $dataEvent[0]['nama_kegiatan'];
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/navigation_bar.php');
?>

<main class="w-full h-full pt-20 lg:px-28 md:px-14 sm:px-6 flex-grow">
   <div class="mt-8">
      <p class="font-bold text-2xl text-center">Pembayaran</p>
   </div>

   <!-- Tampilkan QR Code untuk pembayaran menggunakan QRIS -->
   <div class="mt-5">
      <img src="/fik-corner/assets/qr_code.svg" alt="QRIS"
         class="w-64 mx-auto border border-spacing-4 border-gray-300 rounded-xl">
   </div>

   <!-- Informasi terkait pembayaran yang harus dilakukan oleh mahasiswa -->
   <div class="mt-5 p-5 w-5/12 mx-auto border border-spacing-4 border-gray-300 rounded-xl space-y-3">
      <table>
         <tr>
            <td class="font-semibold w-60">Total Bayar</td>
            <td class="font-semibold w-60">Metode Pembayaran</td>
            <td class="font-semibold">Nomor Pembayaran</td>
         </tr>
         <tr>
            <!-- Menampilkan total biaya kegiatan yang terdaftar -->
            <td class=""><?= $dataEvent[0]['biaya']; ?></td>
            <td class="">QRIS</td>
            <td class="">Q214-343-3</td>
         </tr>

         <tr>
            <td class="font-semibold pt-5 w-auto">Nama</td>
            <td class="font-semibold pt-5">NIM</td>
         </tr>
         <tr>
            <!-- Menampilkan nama lengkap mahasiswa dan NIM -->
            <td class="pr-2"><?= $dataMahasiswa[0]['nama_lengkap']; ?></td>
            <td class=""><?= $dataMahasiswa[0]['nim']; ?></td>
         </tr>

         <tr>
            <td class="font-semibold pt-5">Kegiatan</td>
         </tr>
         <tr>
            <!-- Menampilkan nama kegiatan yang terdaftar -->
            <td class=""><?= $dataEvent[0]['nama_kegiatan']; ?></td>
         </tr>
      </table>
   </div>

   <!-- Tombol untuk memverifikasi pembayaran atau pembayaran  -->
   <div class="text-center">
      <div>
         <!-- Link untuk mengarahkan ke halaman verifikasi pembayaran -->
         <a href='/fik-corner/kegiatan/process_daftar_kegiatan.php?id=<?= $_GET['id'] ?>'>
            <button type='submit'
               class='w-4/12 mt-5 shadow-md py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none'>
               Verifikasi Pembayaran
            </button>
         </a>
      </div>
      <div>
         <!-- Link untuk mengarahkan kembali ke halaman kegiatan untuk membatalkan pembayaran -->
         <a href='/fik-corner/kegiatan/daftar_kegiatan.php?id=<?= $_GET['id'] ?>'>
            <button type='submit'
               class='w-4/12 mt-5 shadow-md py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-primary bg-white hover:bg-primaryHover hover:text-white border border-primary focus:outline-none transition-all duration-300'>
               Batalkan Pembayaran
            </button>
         </a>
      </div>
   </div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/footer.php') ?>