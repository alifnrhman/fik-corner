<header
   class='flex border-b py-4 px-6 sm:px-28 bg-white font-[sans-serif] min-h-[70px] tracking-wide z-50 fixed top-0 w-full'>
   <div class='flex flex-wrap items-center gap-5 w-full'>
      <a href="/fik-corner/"><img src="/fik-corner/assets/fik-corner-logo.png" alt="FIK Corner" class='h-7' />
      </a>

      <div id="collapseMenu"
         class='max-lg:hidden lg:!block max-lg:w-full max-lg:fixed max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50 max-lg:before:inset-0 max-lg:before:z-50'>
         <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white p-3'>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-black" viewBox="0 0 320.591 320.591">
               <path
                  d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                  data-original="#000000"></path>
               <path
                  d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                  data-original="#000000"></path>
            </svg>
         </button>

         <ul
            class='lg:!flex lg:gap-x-10 lg:ml-24 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-2/3 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:px-10 max-lg:py-4 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
            <li class='max-lg:border-b max-lg:py-2'><a href='/fik-corner/'
                  class='hover:text-primary text-gray-500 text-[15px] font-semibold block'>Beranda</a></li>
            <li class='group max-lg:border-b max-lg:py-2'>
               <a href='/fik-corner/kegiatan/'
                  class='hover:text-primary hover:fill-primary text-gray-500 text-[15px] font-semibold block'>Kegiatan<svg
                     xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" class="ml-1 inline-block"
                     viewBox="0 0 24 24">
                     <path
                        d="M12 16a1 1 0 0 1-.71-.29l-6-6a1 1 0 0 1 1.42-1.42l5.29 5.3 5.29-5.29a1 1 0 0 1 1.41 1.41l-6 6a1 1 0 0 1-.7.29z"
                        data-name="16" data-original="#000000" />
                  </svg>
               </a>
               <div
                  class='absolute hidden group-hover:block shadow-lg bg-white lg:gap-16 gap-8 px-6 pb-4 py-4 lg:top-12 top-28 left-50 w-80 z-50'>
                  <ul class='space-y-3'>
                     <li class='hover:bg-gray-100'>
                        <a href='/fik-corner/kegiatan/seminar'
                           class='px-2 py-2 hover:text-primary hover:fill-primary text-gray-500 text-[15px] font-semibold block'>
                           Seminar
                        </a>
                     </li>
                     <li class='hover:bg-gray-100'>
                        <a href='/fik-corner/kegiatan/webinar'
                           class='px-2 py-2 hover:text-primary hover:fill-primary text-gray-500 text-[15px] font-semibold block'>
                           Webinar
                        </a>
                     </li>
                     <li class='hover:bg-gray-100'>
                        <a href='/fik-corner/kegiatan/lomba'
                           class='px-2 py-2 hover:text-primary hover:fill-primary text-gray-500 text-[15px] font-semibold block'>
                           Lomba
                        </a>
                     </li>
                  </ul>
               </div>
            </li>
            <li class='max-lg:border-b max-lg:py-2'><a href='/fik-corner/berita'
                  class='hover:text-primary text-gray-500 text-[15px] font-semibold block'>Berita</a></li>
            <li class='max-lg:border-b max-lg:py-2'><a href='/fik-corner/penyelenggara'
                  class='hover:text-primary text-gray-500 text-[15px] font-semibold block'>Penyelenggara</a></li>

         </ul>
      </div>

      <button id="toggleOpen" class='lg:hidden ml-auto'>
         <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
               d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
               clip-rule="evenodd"></path>
         </svg>
      </button>

      <div class='flex ml-auto max-lg:w-full'>
         <form action='/fik-corner/search.php' method='post'
            class='flex w-[500px] lg:w-[400px] bg-gray-100 px-6 py-3 rounded outline outline-transparent focus-within:outline-primary focus-within:bg-transparent'>
            <input type='text' name="search" placeholder='Cari seminar, webinar, lomba, atau penyelenggara...' value=""
               class='w-full text-sm bg-transparent rounded outline-none pr-2' />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px" class=" fill-gray-400">
               <path
                  d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
               </path>
            </svg>
         </form>

         <?php 
         if (isset($_SESSION['nim']) ) {
            echo
            "<div class='flex flex-row items-center max-sm:ml-auto space-x-5 divide-x divide-solid'>" .
               "<div>" .
                  "<ul>" .
                     "<li class='group relative px-1 ms-10'>" .
                        "<div class='flex flex-row items-center justify-center gap-4 cursor-pointer'>" ;
                           if (isset($_SESSION['foto_mahasiswa']) && !empty($_SESSION['foto_mahasiswa'])) {
                              echo "<img src='" . $_SESSION['foto_mahasiswa'] . "' class='w-8 h-8 rounded-full object-cover' />";
                           } else {
                              echo "<img src='/fik-corner/assets/default_pfp.svg' class='w-8 h-8 rounded-full object-cover' />";
                           }
                        echo
                           "<div>" .
                              "<p class='text-sm text-gray-800 font-bold'>" . $_SESSION['nama_mahasiswa'] . "</p>" .
                              "<p class='text-xs text-gray-500'>" . $_SESSION['nim'] . "</p>" .
                           "</div>" .
                           "</div>" .
                              "<div class='bg-white z-20 shadow-md py-6 px-6 sm:min-w-[220px] max-sm:min-w-[220px] right-0 top-9 absolute hidden group-hover:block'>" .
                                 "<ul class='space-y-1.5'>" .
                                    "<li><a href='/fik-corner/profil/' class='text-sm text-gray-500 hover:text-primary'>Profil Saya</a></li>" .
                                    "<li><a href='/fik-corner/kegiatan-saya' class='text-sm text-gray-500 hover:text-primary'>Kegiatan Saya</a></li>" .
                                 "</ul>" .
                                 "<hr class='border-b-0 my-4' />" .
                                 "<ul class='space-y-1.5'>" .
                                    "<li><a href='/fik-corner/auth/user/logout.php' class='text-sm text-gray-500 hover:text-primary'>
                                    <i class='fa-solid fa-arrow-right-from-bracket'></i>
                                    Keluar</a>
                                    </li>" .
                                 "</ul>" .
                              "</div>" .
                           "</div>" .
                        "</div>" .
                     "</li>" .
                  "</ul>" .
               "</div>" .
            "</div>" ;

         } else {
            echo "<div class='flex items-center ml-4'>"
            . "<button
               class='px-4 py-2 text-[15px] rounded font-semibold text-primary border-2 border-primary hover:bg-primary transition-all ease-in-out duration-300 bg-transparent hover:text-white'>
               <a href='/fik-corner/login'>Masuk</a>
               </button>"
            . "</div>";
         }
      ?>
      </div>
   </div>

</header>