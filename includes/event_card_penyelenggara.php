<?php 
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
                     "<p class='ps-2 text-gray-700 text-sm font-medium inline-block truncate align-text-bottom max-w-full'>" . $data['lokasi'] . "</p>" .
                  "</div>" .
               "</div>" .
               "<hr class='my-3' />" .
               "<div class=''>" .
                  "<p class='text-gray-400 text-sm line-clamp-4 text-justify'>" . $data['deskripsi_singkat'] . "</p>" .
               " </div>" .
            "</div>" .
         "</div>" .
      "</div>" ;
?>