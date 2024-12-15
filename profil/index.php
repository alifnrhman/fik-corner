<?php
   session_start(); //Memulai sesi sesuai dengan user yang sedang login (Aktif)

   //Jika user yang memulai sesi belum login, maka akan diredirect ke halaman login
   if(!isset($_SESSION['nim'])) {
      header('location: login');
   }

   //Menentukan judul halaman dan menyertakan beberapa file lainnya 
   $title = "Profil Saya";
   include($_SERVER["DOCUMENT_ROOT"] . "/fik-corner/includes/header.php");
   include($_SERVER["DOCUMENT_ROOT"] . "/fik-corner/includes/navigation_bar.php");
   include($_SERVER["DOCUMENT_ROOT"] . "/fik-corner/includes/functions.php");

   //Menentukan kolom data yang diambil, tabel, join, kondisi, dan batasan yang akan diambil dari database
   $columns = "users.*, mahasiswa.prodi, mahasiswa.email";
   $table = "users";
   $join = "LEFT JOIN mahasiswa ON users.nim = mahasiswa.nim";
   $where ="users.nim = '" . $_SESSION['nim'] . "'"; //Kondisi untuk mengambil data user yang login 
   $orderBy ="";
   $limit = "";
               
   // Mengambil data sesuai dengan peraturan di atas
   $data = get_data($connection, $columns, $table, $join, $where, $orderBy, $limit);
?>

<!-- Bagian konten utama halaman -->
<main class="w-full flex-grow pt-48 lg:pt-20 px-4 sm:px-6 md:px-10 lg:px-16 xl:px-28">
   <!-- Bagian judul halaman -->
   <div class="max-w-lg max-md:mx-auto w-full my-5">
      <span class='font-semibold text-xl'>Profil Saya</span>
   </div>
   <!-- Form untuk mengedit data user -->
   <form action="/fik-corner/profil/edit.php" method="post" enctype="multipart/form-data"
      class="max-w-full max-md:mx-auto w-screen lg:flex">
      <!-- Bagian foto user -->
      <div class="container">
         <div class="items-center flex flex-col gap-y-5">
            <div class="w-full rounded-full mb-5">
               <?php
               //Menampilkan foto profil jika ada, atau menggunakan gambar default jika tidak ada foto profil 
                     if (isset($data[0]['foto']) && !empty($data[0]['foto'])) {
                        echo "<img id='fotoMahasiswa' src='" . $data[0]['foto'] . "' class='w-60 h-60 rounded-full object-cover mx-auto' />";
                     } else {
                        echo "<img id='fotoMahasiswa' src='assets\default_pfp.svg' class='w-60 h-60 rounded-full object-cover mx-auto' />";
                     }
                  ?>
            </div>
            <!-- Menampilkan pesan error jika ada cookie 'error_profil' -->
            <?php 
                  if (isset($_COOKIE['error_profil'])) {
                     echo "<p class='text-red-500 font-semibold text-sm'>" . $_COOKIE['error_profil'] . "</p>";
                  }
               ?>
            
            <!-- Input untuk mengunggah foto baru -->
            <div class="basis-6/12 mt-2">
               <input type="file" name="foto" id="foto"
                  class="w-full text-gray-400 font-semibold text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-500 rounded"
                  accept=".png, .jpg, .jpeg" onchange="preview(event)" />
               <p class="text-xs text-gray-400 mt-2">Format PNG, JPG, atau JPEG (maks. 10MB).</p>
            </div>
         </div>
      </div>
      
      <!-- Bagian untuk data pribadi -->
      <div class="container w-full mt-12 lg:mt-0">
         <div class="flex gap-4 mb-4">
            <div class="basis-full">
               <label class="text-gray-800 text-[15px] mb-2 block font-semibold">Nama Lengkap</label>
               <input name="nama_lengkap" id="nama_lengkap" type="text" value="<?= $data[0]['nama_lengkap'] ?>" disabled
                  class="w-full text-sm text-gray-500 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-primary" />
            </div>

         </div>

         <div class="flex gap-4 mb-4">
            <div class="basis-6/12">
               <label class="text-gray-800 text-[15px] mb-2 block font-semibold">NIM</label>
               <input name="nim" id="nim" type="text" value="<?= $data[0]['nim'] ?>" disabled
                  class="w-full text-sm text-gray-500 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-primary" />
            </div>

            <div class="basis-6/12">
               <label class="text-gray-800 text-[15px] mb-2 block font-semibold">Program Studi</label>
               <input name="prodi" id="prodi" type="text" value="<?= $data[0]['prodi'] ?>" disabled
                  class="w-full text-sm text-gray-500 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-primary" />
            </div>
         </div>

         <div class="flex gap-4 mb-4">
            <div class="basis-6/12">
               <label class="text-gray-800 text-[15px] mb-2 block font-semibold">Email</label>
               <input name="email" id="email" type="email" value="<?= $data[0]['email'] ?>" disabled
                  class="w-full text-sm text-gray-500 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-primary" />
            </div>

            <div class="basis-6/12">
               <label class="text-gray-800 text-[15px] mb-2 block font-semibold">Nomor Telepon</label>
               <div class="relative flex items-center">
                  <input name="nomor_telepon" id="nomor_telepon" type="text" value="<?= $data[0]['nomor_telepon'] ?>"
                     disabled
                     class="w-full text-sm text-gray-500 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-primary pr-10" />
                  <i id="edit" class="fa-solid fa-pen-to-square text-gray-600 absolute right-5 cursor-pointer"
                     onclick="edit()"></i>
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
            <div class="relative flex w-6/12 flex-col rounded-lg bg-white border border-slate-200 shadow-sm mt-2">
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
</main>

<!-- Script untuk collapse button -->
<script src="/fik-corner/node_modules/@material-tailwind/html/scripts/collapse.js"></script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/fik-corner/includes/footer.php"); ?>