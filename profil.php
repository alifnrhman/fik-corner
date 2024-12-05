<?php
   session_start();

   if(!isset($_SESSION['nim'])) {
      header('location: login');
   }

   $title = "Profil Saya";
   include("includes/header.php");
   include("includes/navigation_bar.php");
   include("includes/functions.php");

   $columns = "*";
   $table = "users";
   $join = "";
   $where ="";
   $orderBy ="";
   $limit = "";
               
   // Mengambil data
   $data = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
?>


<main class="w-full flex-grow pt-20 px-4 sm:px-6 md:px-10 lg:px-16 xl:px-28">
   <div class="max-w-lg max-md:mx-auto w-full my-5">
      <span class='font-semibold text-xl'>Profil Saya</span>
   </div>

   <form>
      <div class="max-w-full max-md:mx-auto w-screen flex">
         <div class="mb-3 container">
            <div class="h-full items-center flex flex-col gap-y-5">
               <div class="w-full rounded-full">
                  <?php
                  echo "<img src='" . $data[0]['foto'] . "' class='w-60 h-60 rounded-full object-cover mx-auto' />";
                  ?>
               </div>
               <input class="form-control" type="file" name="foto" id="foto">
            </div>
         </div>

         <div class="container">
            <div class="mb-4">
               <label class="text-gray-800 text-[15px] mb-1 block font-semibold">Nama Lengkap</label>
               <div class="relative flex items-center">
                  <input name="nama" type="text" value="<?= $_SESSION['nama'] ?>" disabled
                     class="w-1/2 text-sm text-gray-600 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
                     placeholder="Nomor Handphone" />
               </div>
            </div>

            <div class="mb-4">
               <label class="text-gray-800 text-[15px] mb-1 block font-semibold">NIM</label>
               <div class="relative flex items-center">
                  <input name="nim" type="text" value="<?= $data[0]['nim']; ?>" disabled
                     class="w-1/2 text-sm text-gray-600 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
                     placeholder="Nomor Handphone" />
               </div>
            </div>

            <div class="mb-4">
               <label class="text-gray-800 text-[15px] mb-1 block font-semibold">Nomor Handphone</label>
               <div class="relative flex items-center">
                  <input name="nomor_telepon" type="text" value="<?= $data[0]['nomor_telepon']; ?>" disabled
                     class="w-1/2 text-sm text-gray-600 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
                     placeholder="Nomor Handphone" />
               </div>
            </div>

            <button data-collapse-target="collapse"
               class="rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
               style="black;" type="button">
               <i class='fa-solid fa-key' style='color: white;'></i>
               <span class='font-semibold text-sm'>Ubah Password</span>
            </button>

            <div data-collapse="collapse"
               class="block h-0 w-full basis-full overflow-hidden transition-all duration-300 ease-in-out">
               <div
                  class="relative mx-auto flex w-8/12 flex-col rounded-lg bg-white border border-slate-200 shadow-sm mt-4">
                  <div class="p-4">
                     <div>
                        <p class="font-semibold text-m" style="color:red;">Tidak perlu diisi jika anda tidak ingin
                           mengganti password</p>
                        <label class="text-gray-800 text-[15px] mb-2 block mt-4">Password lama</label>
                        <div class="relative flex items-center">
                           <input name="password" id="password" type="password" required
                              class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
                              placeholder="Password lama" />
                        </div>

                        <label class="text-gray-800 text-[15px] mb-2 block mt-4">Password baru</label>
                        <div class="relative flex items-center">
                           <input name="password" id="password" type="password" required
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

            <div class="mt-8">
               <button type="submit"
                  class="w-2/3 shadow-md py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none">
                  Ubah Data Profil
               </button>
            </div>
         </div>
      </div>
   </form>
</main>


<script src="node_modules/@material-tailwind/html/scripts/collapse.js"></script>
<?php include("includes/footer.php"); ?>