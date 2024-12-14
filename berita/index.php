<?php
   session_start();

   $title = "Berita";
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/navigation_bar.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/functions.php');
?>

<main
   class="w-full h-full pt-40 sm:pt-38 md:pt-40 lg:pt-40 xl:pt-36 2xl:pt-24 px-14 sm:px-14 md:px-14 lg:px-28 flex-grow">
   <div>
      <p class="font-bold text-2xl">Berita</p>
   </div>
   <div class='max-w-auto'>
      <div
         class="mt-8 rounded font-sans grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5 gap-4 max-lg:max-w-3xl max-md:max-w-md mx-auto">
         <div>
            <?php
               // Mengambil data
               $berita = get_data($connection, '*', 'berita');
                 
               foreach ($berita as $data) {

               $url_berita = "detail-berita.php?id=" . $data['id_berita'];

               echo
                  "<div class='flex items-start gap-4 border rounded-lg p-4 mb-6 shadow-sm space-y-6 w-full'>" .
                     "<div class=''>" .
                           "<img src='" . $data['foto'] . "' alt='" . $data['judul_berita'] . "' class='w-60 h-60 object-cover rounded-md' />" . 
                     "</div>" .
                     "<div class='flex-1'>" . 
                        "<div class='flex mb-1 justify-between'>" . 
                           "<span class='text-primary text-sm font-semibold'>" . $data['kategori'] . "</span> " .
                           "<span class='text-gray-400 text-xs font-semibold'>" . $data['tanggal'] . "</span>" .
                        "</div>" . 
                           "<h2 class='text-gray-800 text-xl font-bold mb-4'>" . $data['judul_berita'] . "</h2>" . 
                           "<p class='text-gray-400 text-sm line-clamp-4 text-justify'>" . $data['deskripsi'] . "</p>" . 
                        "<div class='mt-2'>" . 
                           "<a href='$url_berita' class='text-primary text-sm font-medium hover:underline'>Read more...</a>" . 
                        "</div>" . 
                     "</div>" . 
                  "</div>";
            }
            ?>
         </div>
      </div>
   </div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/footer.php') ?>