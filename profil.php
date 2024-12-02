<?php
   session_start();

   if(!isset($_SESSION['nim'])) {
      header('location: login');
   }

   $title = "Profil Saya";
   include("includes/header.php");
   //include("includes/navigation_bar.php");
   include("includes/functions.php");
?>


<main>

   <div class="max-w-lg max-md:mx-auto w-full p-6"> 
      <i class='fa-regular fa-user fa-lg cursor-pointer' style='color: #6b7280;'></i>
      <span class='font-semibold text-xl'>Profil Saya</span>
   </div>
  
   <form class="max-w-lg max-md:mx-auto w-full p-6"> <!-- Menambahkan class untuk menyamakan posisi -->
       <button 
      data-collapse-target="collapse"
      class="rounded-md bg-slate-800 py-2 px-4 border border-transparent 
      text-center text-black transition-all shadow-md hover:shadow-lg 
      focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 
      active:shadow-none disabled:pointer-events-none disabled:opacity-50 
      disabled:shadow-none" style="black;" type="button">
         <i class='fa-solid fa-key' style='color: #6b7280;'></i>
         <span class='font-semibold text-sm'>Ubah Password</span>
      </button>
      <div data-collapse="collapse"
         class="block h-0 w-full basis-full overflow-hidden transition-all duration-300 ease-in-out">
         <div class="relative mx-auto flex w-8/12 flex-col rounded-lg bg-white border border-slate-200 shadow-sm mt-4">
            <div class="p-4">
                  <div>
                     <p class="font-semibold text-m" style="color:red;">Tidak perlu diisi jika anda tidak ingin mengganti password</p>
                     <label class="text-gray-800 text-[15px] mb-2 block mt-4">Password lama</label>
                     <div class="relative flex items-center">
                        <input name="password" id="password" type="password" required
                           class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
                           placeholder="Password lama" />
                     </div>

                     <label class="text-gray-800 text-[15px] mb-2 block mt-4">Password baru</label>
                     <div class="relative flex items-center">
                        <input name="password" id="password" type="password"required
                           class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
                           placeholder="Password baru" />
                     </div>

                     <label class="text-gray-800 text-[15px] mb-2 block mt-4">Ulangi password baru</label>
                     <div class="relative flex items-center">
                        <input name="password" id="password" type="password" required
                           class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
                           placeholder="Ulangi password baru" />
                     </div>
                  </div>
            
            </div>
         </div>
      </div>

      <div class="mt-4">
         <label class="text-gray-800 text-[15px] mb-2 block">Nama Penyelenggara</label>
         <div class="relative flex items-center">
            <input name="nama_penyelenggara" type="text" required
               class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
               placeholder="Masukkan nama penyelenggara" />
         </div>
      </div>

      <div class="mt-4">
         <label class="text-gray-800 text-[15px] mb-2 block">Password</label>
         <div class="relative flex items-center">
            <input name="password" id="password" type="password" required
               class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
               placeholder="Enter password" />
         </div>
      </div>
      <div class="mt-8">
         <button type="submit"
            class="w-full shadow-xl py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none">
            Kirim
         </button>
      </div>
   </form>
</main>


<script src="node_modules/@material-tailwind/html/scripts/collapse.js"></script>
<?php include("includes/footer.php"); ?>
