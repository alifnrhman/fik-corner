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

   // Mengambil data
   $data = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
   
   if($data[0]['biaya'] === null) {
      $data[0]['biaya'] = "Gratis";
   } else {
      $data[0]['biaya'] = "Rp" . number_format($data[0]['biaya'], 2, ',', '.');
   }

   $title = $data[0]['nama_kegiatan'];
   include("includes/header.php");
   include("includes/navigation_bar.php");
?>

<main class="w-full h-full pt-20 lg:px-28 md:px-14 sm:px-6 flex-grow">
   <div class="mt-8 mb-5 flex items-center gap-x-3">
      <i class="fa-solid fa-arrow-left-long fa-lg cursor-pointer" onclick="history.back()"></i>
      <h1 class="font-bold text-xl">Kembali</h1>
   </div>
   <div class="container flex">

   </div>
</main>
<?php include("includes/footer.php") ?>