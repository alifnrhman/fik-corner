<?php
   session_start();

   // if(!isset($_SESSION['nim'])) {
   //    header('location: login');
   // }
   $title = "Beranda";
   include("includes/header.php");
   include("includes/navigation_bar.php");
   include("includes/functions.php");
?>

<main class="w-full h-full pt-20 lg:px-28 md:px-14 sm:px-6 flex-grow">
   <!-- Kegiatan Terpopuler -->
   <div class='my-14'>
      <div>
         <p class="font-bold text-2xl">Kegiatan Terpopuler</p>
      </div>
      <div class='max-w-auto'>
         <div
            class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-6 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
            <?php 
               $columns = "kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
               $table = "kegiatan";
               $join = "
                  LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
                  LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
               ";
               $where = "status = 'Aktif'";
               $orderBy = "kegiatan.jumlah_peserta DESC";
               $limit = "5";
               
               // Mengambil data
               $events = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
               
               foreach($events as $data) {
                  $data['tanggal'] = format_tanggal($data['tanggal']);
                  $biaya = $data['biaya'] ? "Berbayar" : "Gratis";
                  echo
                     "<div class='bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(0,0,0,0.3)] relative top-0 hover:-top-2 transition-all duration-300'>" .
                        "<div class='w-full h-60 object-cover bg-gradient-to-b from-gray-800 via-transparent to-transparent absolute' /></div>" .
                        "<div class='ms-6 mt-5 absolute'>" .
                           "<p class='text-sm text-white font-semibold'>". $biaya ."</p>" .
                        "</div>" .
                        "<img src='" . $data['foto'] . "' alt='" . $data['nama_kegiatan'] . "' class='w-full h-60 object-cover' />" .
                        "<div class='p-6'>" .
                           "<div class='flex justify-between items-center mb-1'>" .
                              "<div class=''>" .
                                 "<span class='font-medium text-sm text-primary'>" . $data['kategori'] . "</span>" .
                              "</div>" .
                              "<div class=''>" .
                                 "<span class='font-medium text-sm text-gray-600'>" . $data['tanggal'] . "</span>" .
                              "</div>" .
                           "</div>" .
                           "<div class='h-48'>" .
                              "<div class='h-14'>" .
                                 "<h3 class='text-xl font-bold text-gray-800 line-clamp-2'>" . $data['nama_kegiatan'] . "</h3>" .
                              "</div>" .
                              "<div class='flex justify-between mt-3 max-h-5 line-clamp-1 truncate'>" .
                                 "<div class=''>" .
                                    "<i class='fa-solid fa-location-dot fa-sm'></i>" .
                                    "<p class='ps-2 text-gray-700 text-sm font-medium inline-block truncate align-text-bottom max-w-[150px]'>" . $data['lokasi'] . "</p>" .
                                 "</div>" .
                                 "<div>" .
                                    "<i class='fa-solid fa-user-group fa-sm'></i>" .
                                    "<span class='ps-2 text-gray-700 text-sm font-medium cursor-pointer inline-block'>" . $data['jumlah_peserta'] . " peserta" . "</span>" .
                                 "</div>" .
                              "</div>" .
                              "<hr class='my-3' />" .
                              "<div class=''>" .
                                 "<p class='text-gray-400 text-sm line-clamp-4 text-justify'>" . $data['deskripsi_singkat'] . "</p>" .
                              " </div>" .
                           "</div>" .

                           "<hr class='my-4' />" .
                           "<div class='flex gap-x-3 items-center'>" .
                              "<img src='" . $data['logo'] . "' alt='" . $data['nama_penyelenggara'] . "' class='w-6 h-6 rounded-full border border-gray-400 cursor-pointer' />" .
                              "<p class='text-gray-400 text-sm line-clamp-4'>" . $data['nama_penyelenggara'] . "</p>" .
                           "</div>" .
                        "</div>" .
                     "</div>";
               }
            ?>
         </div>
      </div>
   </div>
   <!-- End of Kegiatan Terpopuler -->

   <!-- Seminar Terbaru -->
   <div class='my-14'>
      <div class="flex justify-between items-end">
         <p class="font-bold text-2xl">Seminar Terbaru</p>
         <a class="font-semibold text-lg underline" href="seminar">Lihat Semua</a>
      </div>

      <div class='max-w-auto'>
         <div
            class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-6 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
            <?php 
               $columns = "kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
               $table = "kegiatan";
               $join = "
                  LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
                  LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
               ";
               $where = "status = 'Aktif' && kategori_kegiatan.id_kategori = 1";
               $orderBy = "kegiatan.posted_at DESC";
               $limit = "5";
               
               // Mengambil data
               $events = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
               
               foreach($events as $data) {
                  $data['tanggal'] = format_tanggal($data['tanggal']);
                  $biaya = $data['biaya'] ? "Berbayar" : "Gratis";
                  echo
                     "<div class='bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(0,0,0,0.3)] relative top-0 hover:-top-2 transition-all duration-300'>" .
                        "<div class='w-full h-60 object-cover bg-gradient-to-b from-gray-800 via-transparent to-transparent absolute' /></div>" .
                        "<div class='ms-6 mt-5 absolute'>" .
                           "<p class='text-sm text-white font-semibold'>" . $biaya . "</p>" .
                        "</div>" .
                        "<img src='" . $data['foto'] . "' alt='" . $data['nama_kegiatan'] . "' class='w-full h-60 object-cover' />" .
                        "<div class='p-6'>" .
                           "<div class='flex justify-between items-center mb-1'>" .
                              "<div class=''>" .
                                 "<span class='font-medium text-sm text-primary'>" . $data['kategori'] . "</span>" .
                              "</div>" .
                              "<div class=''>" .
                                 "<span class='font-medium text-sm text-gray-600'>" . $data['tanggal'] . "</span>" .
                              "</div>" .
                           "</div>" .
                           "<div class='h-48'>" .
                              "<div class='h-14'>" .
                                 "<h3 class='text-xl font-bold text-gray-800 line-clamp-2'>" . $data['nama_kegiatan'] . "</h3>" .
                              "</div>" .
                              "<div class='flex justify-between mt-3 max-h-5 line-clamp-1 truncate'>" .
                                 "<div class=''>" .
                                    "<i class='fa-solid fa-location-dot fa-sm'></i>" .
                                    "<p class='ps-2 text-gray-700 text-sm font-medium inline-block truncate align-text-bottom max-w-[150px]'>" . $data['lokasi'] . "</p>" .
                                 "</div>" .
                                 "<div>" .
                                    "<i class='fa-solid fa-user-group fa-sm'></i>" .
                                    "<span class='ps-2 text-gray-700 text-sm font-medium cursor-pointer inline-block'>" . $data['jumlah_peserta'] . " peserta" . "</span>" .
                                 "</div>" .
                              "</div>" .
                              "<hr class='my-3' />" .
                              "<div class=''>" .
                                 "<p class='text-gray-400 text-sm line-clamp-4 text-justify'>" . $data['deskripsi_singkat'] . "</p>" .
                              " </div>" .
                           "</div>" .

                           "<hr class='my-4' />" .
                           "<div class='flex gap-x-3 items-center'>" .
                              "<img src='" . $data['logo'] . "' alt='" . $data['nama_penyelenggara'] . "' class='w-6 h-6 rounded-full border border-gray-400 cursor-pointer' />" .
                              "<p class='text-gray-400 text-sm line-clamp-4'>" . $data['nama_penyelenggara'] . "</p>" .
                           "</div>" .
                        "</div>" .
                     "</div>";
               }
            ?>
         </div>
      </div>
   </div>
   <!-- End of Seminar Terbaru -->

   <!-- Webinar Terbaru -->
   <div class='my-14'>
      <div class="flex justify-between items-end">
         <p class="font-bold text-2xl">Webinar Terbaru</p>
         <a class="font-semibold text-lg underline" href="webinar">Lihat Semua</a>
      </div>

      <div class='max-w-auto'>
         <div
            class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-6 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
            <?php 
               $columns = "kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
               $table = "kegiatan";
               $join = "
                  LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
                  LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
               ";
               $where = "status = 'Aktif' && kategori_kegiatan.id_kategori = 2";
               $orderBy = "kegiatan.posted_at DESC";
               $limit = "5";
               
               // Mengambil data
               $events = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
               
               foreach($events as $data) {
                  $data['tanggal'] = format_tanggal($data['tanggal']);
                  $biaya = $data['biaya'] ? "Berbayar" : "Gratis";

                  echo
                     "<div class='bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(0,0,0,0.3)] relative top-0 hover:-top-2 transition-all duration-300'>" .
                        "<div class='w-full h-60 object-cover bg-gradient-to-b from-gray-800 via-transparent to-transparent absolute' /></div>" .
                        "<div class='ms-6 mt-5 absolute'>" .
                           "<p class='text-sm text-white font-semibold'>" . $biaya . "</p>" .
                        "</div>" .
                        "<img src='" . $data['foto'] . "' alt='" . $data['nama_kegiatan'] . "' class='w-full h-60 object-cover' />" .
                        "<div class='p-6'>" .
                           "<div class='flex justify-between items-center mb-1'>" .
                              "<div class=''>" .
                                 "<span class='font-medium text-sm text-primary'>" . $data['kategori'] . "</span>" .
                              "</div>" .
                              "<div class=''>" .
                                 "<span class='font-medium text-sm text-gray-600'>" . $data['tanggal'] . "</span>" .
                              "</div>" .
                           "</div>" .
                           "<div class='h-48'>" .
                              "<div class='h-14'>" .
                                 "<h3 class='text-xl font-bold text-gray-800 line-clamp-2'>" . $data['nama_kegiatan'] . "</h3>" .
                              "</div>" .
                              "<div class='flex justify-between mt-3 max-h-5 line-clamp-1 truncate'>" .
                                 "<div class=''>" .
                                    "<i class='fa-solid fa-location-dot fa-sm'></i>" .
                                    "<p class='ps-2 text-gray-700 text-sm font-medium inline-block truncate align-text-bottom max-w-[150px]'>" . $data['lokasi'] . "</p>" .
                                 "</div>" .
                                 "<div>" .
                                    "<i class='fa-solid fa-user-group fa-sm'></i>" .
                                    "<span class='ps-2 text-gray-700 text-sm font-medium cursor-pointer inline-block'>" . $data['jumlah_peserta'] . " peserta" . "</span>" .
                                 "</div>" .
                              "</div>" .
                              "<hr class='my-3' />" .
                              "<div class=''>" .
                                 "<p class='text-gray-400 text-sm line-clamp-4 text-justify'>" . $data['deskripsi_singkat'] . "</p>" .
                              " </div>" .
                           "</div>" .

                           "<hr class='my-4' />" .
                           "<div class='flex gap-x-3 items-center'>" .
                              "<img src='" . $data['logo'] . "' alt='" . $data['nama_penyelenggara'] . "' class='w-6 h-6 rounded-full border border-gray-400 cursor-pointer' />" .
                              "<p class='text-gray-400 text-sm line-clamp-4'>" . $data['nama_penyelenggara'] . "</p>" .
                           "</div>" .
                        "</div>" .
                     "</div>";
               }
            ?>
         </div>
      </div>
   </div>
   <!-- End of Webinar Terbaru -->

   <!-- Lomba Terbaru -->
   <div class='my-14'>
      <div class="flex justify-between items-end">
         <p class="font-bold text-2xl">Lomba Terbaru</p>
         <a class="font-semibold text-lg underline" href="lomba">Lihat Semua</a>
      </div>

      <div class='max-w-auto'>
         <div
            class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-6 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
            <?php 
               $columns = "kegiatan.*, kategori_kegiatan.kategori, penyelenggara.nama_penyelenggara, penyelenggara.logo";
               $table = "kegiatan";
               $join = "
                  LEFT JOIN kategori_kegiatan ON kegiatan.id_kategori = kategori_kegiatan.id_kategori 
                  LEFT JOIN penyelenggara ON kegiatan.id_penyelenggara = penyelenggara.id_penyelenggara
               ";
               $where = "status = 'Aktif' && kategori_kegiatan.id_kategori = 3";
               $orderBy = "kegiatan.posted_at DESC";
               $limit = "5";
               $biaya = $data['biaya'] ? "Berbayar" : "Gratis";
               
               // Mengambil data
               $events = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
               
               foreach($events as $data) {
                  $data['tanggal'] = format_tanggal($data['tanggal']);
                  echo
                     "<div class='bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(0,0,0,0.3)] relative top-0 hover:-top-2 transition-all duration-300'>" .
                        "<div class='w-full h-60 object-cover bg-gradient-to-b from-gray-800 via-transparent to-transparent absolute' /></div>" .
                        "<div class='ms-6 mt-5 absolute'>" .
                           "<p class='text-sm text-white font-semibold'>" . $biaya . "</p>" .
                        "</div>" .
                        "<img src='" . $data['foto'] . "' alt='" . $data['nama_kegiatan'] . "' class='w-full h-60 object-cover' />" .
                        "<div class='p-6'>" .
                           "<div class='flex justify-between items-center mb-1'>" .
                              "<div class=''>" .
                                 "<span class='font-medium text-sm text-primary'>" . $data['kategori'] . "</span>" .
                              "</div>" .
                              "<div class=''>" .
                                 "<span class='font-medium text-sm text-gray-600'>" . $data['tanggal'] . "</span>" .
                              "</div>" .
                           "</div>" .
                           "<div class='h-48'>" .
                              "<div class='h-14'>" .
                                 "<h3 class='text-xl font-bold text-gray-800 line-clamp-2'>" . $data['nama_kegiatan'] . "</h3>" .
                              "</div>" .
                              "<div class='flex justify-between mt-3 max-h-5 line-clamp-1 truncate'>" .
                                 "<div class=''>" .
                                    "<i class='fa-solid fa-location-dot fa-sm'></i>" .
                                    "<p class='ps-2 text-gray-700 text-sm font-medium inline-block truncate align-text-bottom max-w-[150px]'>" . $data['lokasi'] . "</p>" .
                                 "</div>" .
                                 "<div>" .
                                    "<i class='fa-solid fa-user-group fa-sm'></i>" .
                                    "<span class='ps-2 text-gray-700 text-sm font-medium cursor-pointer inline-block'>" . $data['jumlah_peserta'] . " peserta" . "</span>" .
                                 "</div>" .
                              "</div>" .
                              "<hr class='my-3' />" .
                              "<div class=''>" .
                                 "<p class='text-gray-400 text-sm line-clamp-4 text-justify'>" . $data['deskripsi_singkat'] . "</p>" .
                              " </div>" .
                           "</div>" .

                           "<hr class='my-4' />" .
                           "<div class='flex gap-x-3 items-center'>" .
                              "<img src='" . $data['logo'] . "' alt='" . $data['nama_penyelenggara'] . "' class='w-6 h-6 rounded-full border border-gray-400 cursor-pointer' />" .
                              "<p class='text-gray-400 text-sm line-clamp-4'>" . $data['nama_penyelenggara'] . "</p>" .
                           "</div>" .
                        "</div>" .
                     "</div>";
               }
            ?>
         </div>
      </div>
   </div>
   <!-- End of Lomba Terbaru -->



</main>
<?php include("includes/footer.php") ?>