<!--Untuk menampilkan header pada halaman admin-->
<header class='z-50 bg-[#f7f6f9] top-0 pt-8'>
   <div class='flex flex-wrap items-center w-full relative tracking-wide'>
      <div class='flex items-center gap-y-6 max-sm:flex-col z-50 w-full pb-2'>
         <div class='flex items-center w-full px-4 bg-white shadow-sm min-h-[48px] sm:mr-20 rounded-md'>
            <h1 class="text-gray-600 text-md lg:text-lg font-semibold font-sans">Dashboard Admin
            </h1>
         </div>

         <div class="flex items-center justify-end gap-6 ml-auto">
            <div class="w-1 h-10 border-l border-gray-400">
            </div>
            <div class="dropdown-menu relative flex shrink-0 group">
               <div class="flex items-center gap-4">
                  <p class="text-gray-500 text-sm"><?= $_SESSION['nama_admin']; ?></p> <!--Menampilkan session dengan nama admin-->
                  <img src="/fik-corner/assets/default_pfp.svg"
                     class="w-9 h-9 rounded-full object-cover mx-auto border border-gray-500 cursor-pointer" />
               </div>

               <div
                  class="dropdown-content hidden group-hover:block shadow-md p-2 bg-white rounded-md absolute top-[38px] right-0 w-56">
                  <div class="w-full space-y-2">
                     <a href="/fik-corner/auth/admin/logout.php"
                        class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-secondary dropdown-item transition duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-4 fill-current"
                           viewBox="0 0 6 6">
                           <path
                              d="M3.172.53a.265.266 0 0 0-.262.268v2.127a.265.266 0 0 0 .53 0V.798A.265.266 0 0 0 3.172.53zm1.544.532a.265.266 0 0 0-.026 0 .265.266 0 0 0-.147.47c.459.391.749.973.749 1.626 0 1.18-.944 2.131-2.116 2.131A2.12 2.12 0 0 1 1.06 3.16c0-.65.286-1.228.74-1.62a.265.266 0 1 0-.344-.404A2.667 2.667 0 0 0 .53 3.158a2.66 2.66 0 0 0 2.647 2.663 2.657 2.657 0 0 0 2.645-2.663c0-.812-.363-1.542-.936-2.03a.265.266 0 0 0-.17-.066z"
                              data-original="#000000" />
                        </svg>
                        Keluar</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>