<?php
   session_start();

   if(!isset($_SESSION['nama_penyelenggara'])) {
      header('location: /fik-corner/penyelenggara/login');
   }

   $title = "Profil Saya";
   include($_SERVER["DOCUMENT_ROOT"] . "/fik-corner/includes/header.php");
   include($_SERVER["DOCUMENT_ROOT"] . "/fik-corner/includes/functions.php");

   // Query untuk ambil data penyelenggara
   $columns = "*";
   $table = "penyelenggara";
   $join = "";
   $where ="id_penyelenggara = '" . $_SESSION['id_penyelenggara'] . "'";
   $orderBy ="";
   $limit = "";
               
   // Mengambil data
   $data = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
?>

<div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
   <div class="flex items-start">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/penyelenggara/shared/sidebar.php') ?>

      <section class="main-content w-full px-8">
         <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/penyelenggara/shared/header_penyelenggara.php') ?>

         <div class="pt-5 font-sans">
            <div class="max-w-full max-sm:max-w-sm">
               <div class="mb-20 flex items-center gap-x-3">
                  <a href='<?php echo $_SERVER['HTTP_REFERER'] ?>'>
                     <i class='fa-solid fa-arrow-left-long fa-lg cursor-pointer'></i>
                  </a>
                  <h1 class="font-bold text-xl">Kembali</h1>
               </div>
               <form action="/fik-corner/penyelenggara/profil/edit.php" method="post" enctype="multipart/form-data"
                  class="lg:flex">
                  <div class="container">
                     <div class="items-center flex flex-col gap-y-5">
                        <div class="w-full rounded-full mb-5">
                           <?php
                           // Jika penyelenggara memiliki logo, maka tampilkan logo
                              if (isset($_SESSION['logo_penyelenggara']) && !empty($_SESSION['logo_penyelenggara'])) {
                                 echo "<img id='logoPenyelenggara' src='" . $_SESSION['logo_penyelenggara'] . "' class='w-60 h-60 rounded-full object-cover mx-auto' />";
                              // Jika tidak ada, tampilkan logo default
                              } else {
                                 echo "<img id='logoPenyelenggara' src='assets\default_pfp.svg' class='w-60 h-60 rounded-full object-cover mx-auto' />";
                              }
                           ?>
                        </div>
                        <?php 
                           // Jika ada error saat upload logo, tampilkan pesan error
                           if (isset($_COOKIE['error_profil'])) {
                              echo "<p class='text-red-500 font-semibold text-sm'>" . $_COOKIE['error_profil'] . "</p>";
                           }
                        ?>
                        <div class="basis-6/12 mt-2">
                           <input type="file" name="logo" id="logo"
                              class="w-full text-gray-400 font-semibold text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-500 rounded"
                              accept=".png, .jpg, .jpeg" onchange="preview(event)" />
                           <p class="text-xs text-gray-400 mt-2">Format PNG, JPG, atau JPEG (maks. 10MB).</p>
                        </div>
                     </div>
                  </div>

                  <div class="container w-full mt-12 lg:mt-0">
                     <div class="flex gap-4 mb-4">
                        <div class="basis-full">
                           <label class="text-gray-800 text-[15px] mb-2 block font-semibold">Nama</label>
                           <input name="nama_penyelenggara" id="nama_penyelenggara" type="text"
                              value="<?= $data[0]['nama_penyelenggara'] ?>" required
                              class="w-full text-sm text-gray-700 bg-white border border-gray-200 px-4 py-3.5 rounded-md outline-primary" />
                        </div>
                     </div>
                     <div class="flex gap-4 mb-4">
                        <div class="basis-6/12">
                           <label class="text-gray-800 text-[15px] mb-2 block font-semibold">Email</label>
                           <input name="email" id="email" type="email" value="<?= $data[0]['email'] ?>" required
                              class="w-full text-sm text-gray-700 bg-white border border-gray-200 px-4 py-3.5 rounded-md outline-primary" />
                        </div>

                        <div class="basis-6/12">
                           <label class="text-gray-800 text-[15px] mb-2 block font-semibold">Nomor Telepon</label>
                           <div class="relative flex items-center">
                              <input name="nomor_telepon" id="nomor_telepon" type="text"
                                 value="<?= $data[0]['nomor_telepon'] ?>" required
                                 class="w-full text-sm text-gray-700 bg-white border border-gray-200 px-4 py-3.5 rounded-md outline-primary pr-10" />
                           </div>
                        </div>
                     </div>

                     <div class="mt-6 space-x-4">
                        <button data-collapse-target="collapse"
                           class="rounded-md bg-slate-800 py-2 px-4 border border-transparent text-center text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                           style="black;" type="button">
                           <i class='fa-solid fa-key' style='color: white;'></i>
                           <span class='font-semibold text-sm'>Ubah Password</span>
                        </button>
                        <button type="submit"
                           class="shadow-md py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none">
                           Simpan
                        </button>
                     </div>

                     <div data-collapse="collapse"
                        class="absolute h-0 w-2/6 basis-full overflow-hidden transition-all duration-300 ease-in-out">
                        <div
                           class="relative flex w-6/12 flex-col rounded-lg bg-white border border-slate-200 shadow-sm mt-2">
                           <div class="p-4">
                              <div>
                                 <label class="text-gray-800 text-[15px] mb-2 block ">Password lama</label>
                                 <div class="relative flex items-center">
                                    <input name="password_lama" id="password_lama" type="password"
                                       class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-primary"
                                       placeholder="Password lama" onchange="" />
                                 </div>

                                 <label class="text-gray-800 text-[15px] mb-2 block mt-4">Password baru</label>
                                 <div class="relative flex items-center">
                                    <input name="password_baru" id="password_baru" type="password"
                                       class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-primary"
                                       placeholder="Password baru" />
                                 </div>

                                 <label class="text-gray-800 text-[15px] mb-2 block mt-4">Ulangi password baru</label>
                                 <div class="relative flex items-center">
                                    <input name="ulangi_password_baru" id="ulangi_password_baru" type="password"
                                       class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-primary"
                                       placeholder="Ulangi password baru" />
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </section>
   </div>
</div>

<script src="/fik-corner/node_modules/@material-tailwind/html/scripts/collapse.js"></script>
</body>
</html>