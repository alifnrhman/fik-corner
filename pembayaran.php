<?php
   session_start();

   include("includes/functions.php");

   $columns = "kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
   $table = "kegiatan";
   $join = "
      LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
      LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
   ";
   $where = "status = 'Aktif' AND id_kegiatan = " . $_GET['id'];
   $orderBy = "";
   $limit = "";

   // Mengambil data event
   $dataEvent = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
   
   if($dataEvent[0]['biaya'] === null) {
      $dataEvent[0]['biaya'] = "Gratis";
   } else {
      $dataEvent[0]['biaya'] = "Rp" . number_format($dataEvent[0]['biaya'], 2, ',', '.');
   }

   $jam = strtotime($dataEvent[0]['waktu']);

   $columns = "users.*, mahasiswa.email, mahasiswa.prodi";
   $table = "users";
   $join = "
      LEFT JOIN mahasiswa ON users.nim = mahasiswa.nim 
   ";
   $where = "users.nim = " . $_SESSION['nim'];
   $orderBy = "";
   $limit = "";

   // Mengambil data mahasiswa
   $dataMahasiswa = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);

   $title = "Daftar " . $dataEvent[0]['nama_kegiatan'];
   include("includes/header.php");
   include("includes/navigation_bar.php");
?>

<main class="w-full h-full pt-20 lg:px-28 md:px-14 sm:px-6 flex-grow">
   <div class="mt-8">
      <p class="font-bold text-2xl text-center">Pembayaran</p>
   </div>

   <div class="mt-5">
      <img src="assets\qr_code.svg" alt="QRIS" class="w-64 mx-auto border border-spacing-4 border-gray-300 rounded-xl">
   </div>

   <div class="mt-5 p-5 w-5/12 mx-auto border border-spacing-4 border-gray-300 rounded-xl space-y-3">
      <table>
         <tr>
            <td class="font-semibold w-60">Total Bayar</td>
            <td class="font-semibold w-60">Metode Pembayaran</td>
            <td class="font-semibold">Nomor Pembayaran</td>
         </tr>
         <tr>
            <td class=""><?= $dataEvent[0]['biaya']; ?></td>
            <td class="">QRIS</td>
            <td class="">Q214-343-3</td>
         </tr>

         <tr>
            <td class="font-semibold pt-5 w-auto">Nama</td>
            <td class="font-semibold pt-5">NIM</td>
         </tr>
         <tr>
            <td class="pr-2"><?= $dataMahasiswa[0]['nama_lengkap']; ?></td>
            <td class=""><?= $dataMahasiswa[0]['nim']; ?></td>
         </tr>

         <tr>
            <td class="font-semibold pt-5">Kegiatan</td>
         </tr>
         <tr>
            <td class=""><?= $dataEvent[0]['nama_kegiatan']; ?></td>
         </tr>
      </table>
   </div>
   <div class="text-center">
      <div>
         <a href='process_daftar_kegiatan.php?id=<?= $_GET['id'] ?>'>
            <button type='submit'
               class='w-4/12 mt-5 shadow-md py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none'>
               Selesai Bayar
            </button>
         </a>
      </div>
      <div>
         <a href='daftar_kegiatan.php?id=<?= $_GET['id'] ?>'>
            <button type='submit'
               class='w-4/12 mt-5 shadow-md py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-primary bg-white hover:bg-primaryHover hover:text-white border border-primary focus:outline-none transition-all duration-300'>
               Batalkan Pembayaran
            </button>
         </a>
      </div>
   </div>
</main>
<?php include("includes/footer.php") ?>