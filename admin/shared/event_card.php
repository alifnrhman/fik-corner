<?php 
   $url = "/fik-corner/admin/detail-kegiatan.php?id=" . $data['id_kegiatan'];

   echo "<a href='" . $url . "'>" . 
      "<div class='bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(0,0,0,0.3)] relative top-0 hover:-top-2 transition-all duration-300'>" .
         "<div class='w-full h-60 object-cover bg-gradient-to-b from-gray-800 via-transparent to-transparent absolute' /></div>" .
         "<div class='ms-6 mt-5 absolute'>" .
            "<p class='text-sm text-white font-semibold'>". $data['biaya'] ."</p>" .
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
                  "<div class='w-3/6'>" .
                     "<i class='fa-solid fa-location-dot fa-sm'></i>" .
                     "<p class='ps-2 text-gray-700 text-sm font-medium inline-block truncate align-text-bottom w-full'>" . $data['lokasi'] . "</p>" .
                  "</div>";
         if ($data['jumlah_peserta'] > 0) {
            echo  "<div>" .
                     "<i class='fa-solid fa-user-group fa-sm'></i>" .
                     "<span class='ps-2 text-gray-700 text-sm font-medium cursor-pointer inline-block'>" . $data['jumlah_peserta'] . " peserta" . "</span>" .
                  "</div>";
         }
      echo  "</div>" .
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
      "</div>" .
   "</a>";
?>