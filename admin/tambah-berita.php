<?php
   session_start();

   if(!isset($_SESSION['username'])) {
      header('location: /fik-corner/admin/login');
   }
   
   $title = "Tambah Berita";
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/functions.php');
?>

<div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
   <div class="flex items-start">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/admin/shared/sidebar.php'); ?>

      <section class="main-content w-full px-8">
         <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/admin/shared/header_admin.php'); ?>

         <div class="bg-gray-100 pt-5 font-sans">
            <div class="max-w-full max-lg:max-w-3xl max-md:max-w-sm mx-auto">
               <h2 class="text-gray-800 text-2xl max-sm:text-2xl font-bold mt-5 mb-10 text-center">
                  Tambah Berita
               </h2>
               <div>
                  <form class="max-w-full max-md:mx-auto w-full px-24" action="process_tambah_berita.php" method="post"
                     enctype="multipart/form-data">
                     <div class="flex flex-row gap-4">
                        <div class="basis-3/5">
                           <label class="text-gray-800 text-[15px] mb-2 block">Judul Berita</label>
                           <input name="judul_berita" type="text" required
                              class="w-full text-sm text-gray-800 bg-white px-4 py-3.5 rounded-md outline-primary border border-gray-300"
                              placeholder="Masukkan judul berita" maxlength="100" />
                        </div>

                        <div class="basis-2/5">
                           <label class="text-gray-800 text-[15px] mb-2 block">Kategori Berita</label>
                           <select name="kategori"
                              class="w-full text-sm text-gray-800 bg-white px-4 py-3.5 rounded-md outline-primary border border-gray-300"
                              required>
                              <option value="" selected disabled>-- Pilih Kategori Berita --</option>
                              <option value="Kegiatan">Kegiatan</option>
                              <option value="Prestasi Mahasiswa">Prestasi Mahasiswa</option>
                              <option value="Berita Fakultas">Berita Fakultas</option>
                           </select>
                        </div>
                     </div>

                     <div class="flex flex-row gap-4">
                        <div class="basis-full mt-4">
                           <label class="text-gray-800 text-[15px] mb-2 block">Deskripsi</label>
                           <textarea name="deskripsi" rows="5"
                              class="w-full text-sm text-gray-800 bg-white px-4 py-3.5 rounded-md outline-primary border border-gray-300 resize-y"
                              placeholder="Masukkan deskripsi" required></textarea>
                        </div>
                     </div>

                     <div class="flex flex-row gap-4">
                        <div class="basis-4/12 mt-4">
                           <label class="text-gray-800 text-[15px] mb-2 block">Foto</label>
                           <input type="file" name="foto" id="foto" required
                              class="w-full text-gray-400 font-semibold text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-white file:hover:bg-gray-200 file:text-gray-500 rounded"
                              accept=".png, .jpg, .jpeg" />
                           <p class="text-xs text-gray-400 mt-2">Format PNG, JPG, atau JPEG (maks. 10MB).</p>
                        </div>
                     </div>

                     <div class="justify-end mt-8 flex w-full gap-x-5">
                        <button type="reset"
                           class="py-3 px-10 text-sm tracking-wide font-semibold rounded-md text-primary bg-[#f7f6f9] hover:bg-primaryHover hover:text-white focus:outline-none transition-all duration-300 border-2 border-primary">
                           Reset
                        </button>
                        <button type="submit"
                           class="shadow-md py-3 px-10 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none">
                           Publish Berita
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>
</body>
</html>