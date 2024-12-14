<?php
   session_start();

   if(!isset($_SESSION['nama_penyelenggara'])) {
      header('location: /fik-corner/penyelenggara/login');
   }
   
   $title = "Dashboard Penyelenggara";
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/functions.php');
?>

<div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
   <div class="flex items-start">
      <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/penyelenggara/shared/sidebar.php') ?>

      <section class="main-content w-full px-8">
         <?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/penyelenggara/shared/header_penyelenggara.php') ?>

         <div class="bg-gray-100 pt-5 font-sans">
            <div class="max-w-full max-lg:max-w-3xl max-md:max-w-sm mx-auto">
               <h2 class="text-gray-800 text-2xl max-sm:text-2xl font-bold mt-5 mb-10 text-center">
                  Form Pengajuan Kegiatan
               </h2>
               <div>
                  <form class="max-w-full max-md:mx-auto w-full px-24"
                     action="/fik-corner/penyelenggara/ajukan-kegiatan/process_pengajuan_kegiatan.php" method="post"
                     enctype="multipart/form-data">
                     <div class="flex flex-row gap-4">
                        <div class="basis-3/5">
                           <label class="text-gray-800 text-[15px] mb-2 block">Nama Kegiatan</label>
                           <input name="nama_kegiatan" type="text" required
                              class="w-full text-sm text-gray-800 bg-white px-4 py-3.5 rounded-md outline-primary border border-gray-300"
                              placeholder="Masukkan nama kegiatan" maxlength="100" />
                        </div>

                        <div class="basis-2/5">
                           <label class="text-gray-800 text-[15px] mb-2 block">Kategori Kegiatan</label>
                           <select name="kategori"
                              class="w-full text-sm text-gray-800 bg-white px-4 py-3.5 rounded-md outline-primary border border-gray-300"
                              required>
                              <option value="" selected disabled>-- Pilih Kategori Kegiatan --</option>
                              <option value="1">Seminar</option>
                              <option value="2">Webinar</option>
                              <option value="3">Lomba</option>
                           </select>
                        </div>
                     </div>

                     <div class="flex flex-row gap-4">

                        <div class="basis-4/12 mt-4">
                           <label class="text-gray-800 text-[15px] mb-2 block">Deskripsi Singkat</label>
                           <textarea name="deskripsi_singkat" rows="3"
                              class="w-full text-sm text-gray-800 bg-white px-4 py-3.5 rounded-md outline-primary border border-gray-300 resize-none"
                              placeholder="Masukkan deskripsi singkat" required></textarea>
                        </div>

                        <div class="basis-8/12 mt-4">
                           <label class="text-gray-800 text-[15px] mb-2 block">Deskripsi Lengkap</label>
                           <textarea name="deskripsi_lengkap" rows="3"
                              class="w-full text-sm text-gray-800 bg-white px-4 py-3.5 rounded-md outline-primary border border-gray-300 resize-y"
                              placeholder="Masukkan deskripsi lengkap" required></textarea>
                        </div>
                     </div>

                     <div class="flex flex-row gap-4">
                        <div class="basis-2/12 mt-4">
                           <label class="text-gray-800 text-[15px] mb-2 block">Tanggal</label>
                           <input name="tanggal" id="tanggal" type="date" required
                              class="w-full text-sm text-gray-800 bg-white px-4 py-3.5 rounded-md outline-primary border border-gray-300"
                              placeholder="Masukkan nama penanggung jawab" />
                        </div>

                        <div class="basis-1/12 mt-4">
                           <label class="text-gray-800 text-[15px] mb-2 block">Waktu</label>
                           <input name="waktu" id="waktu" type="time" required
                              class="w-full text-sm text-gray-800 bg-white px-4 py-3.5 rounded-md outline-primary border border-gray-300"
                              placeholder="Contoh: 081234567890" />
                        </div>

                        <div class="basis-3/12 mt-4">
                           <label class="text-gray-800 text-[15px] mb-2 block">Lokasi</label>
                           <input name="lokasi" id="text" type="text" required
                              class="w-full text-sm text-gray-800 bg-white px-4 py-3.5 rounded-md outline-primary border border-gray-300"
                              placeholder="Masukkan lokasi" />
                        </div>

                        <div class="basis-2/12 mt-4">
                           <label class="text-gray-800 text-[15px] mb-2 block">Biaya</label>
                           <input name="biaya" id="biaya" type="number"
                              class="w-full text-sm text-gray-800 bg-white px-4 py-3.5 rounded-md outline-primary border border-gray-300"
                              placeholder="Contoh: 25000" />
                           <p class="text-xs text-gray-400 mt-2">Kosongkan biaya jika gratis.</p>
                        </div>

                        <div class="basis-4/12 mt-4">
                           <label class="text-gray-800 text-[15px] mb-2 block">Foto</label>
                           <input type="file" name="foto" id="foto" required
                              class="w-full text-gray-400 font-semibold text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-white file:hover:bg-gray-200 file:text-gray-500 rounded"
                              accept=".png, .jpg, .jpeg" />
                           <p class="text-xs text-gray-400 mt-2">Format PNG, JPG, atau JPEG (maks. 10MB).</p>
                           <?php 
                           if (isset($_COOKIE['error'])) {
                              echo "<p class='text-primary font-semibold text-sm'>" . $_COOKIE['error'] . "</p>";
                           }
                           ?>
                        </div>
                     </div>

                     <div class="justify-end mt-8 flex w-full gap-x-5">
                        <button type="reset"
                           class="py-3 px-10 text-sm tracking-wide font-semibold rounded-md text-primary bg-[#f7f6f9] hover:bg-primaryHover hover:text-white focus:outline-none transition-all duration-300 border-2 border-primary">
                           Reset
                        </button>
                        <button type="submit"
                           class="shadow-md py-3 px-10 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none">
                           Kirim Pengajuan
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