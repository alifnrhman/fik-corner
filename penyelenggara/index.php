<?php
   session_start();

   $title = "Pendaftaran Penyelenggara Kegiatan";
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/navigation_bar.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/functions.php');
?>

<div class="w-full h-full py-20 pb-0 lg:px-28 md:px-14 sm:px-6 flex-grow">
   <div class="my-10 mb-0 flex">
      <div class="container">
         <h1 class="text-xl font-bold">Pendaftaran Penyelenggara Kegiatan di Fakultas Ilmu Komputer UPNVJ</h1>

         <div class="">
            <p>Fakultas Ilmu Komputer UPNVJ membuka kesempatan bagi organisasi atau kelompok untuk menjadi penyelenggara
               kegiatan. Kegiatan yang dapat diajukan meliputi:</p>
            <ul class="list-disc list-inside">
               <li>Seminar</li>
               <li>Webinar</li>
               <li>Lomba</li>
            </ul>
         </div>
         <br>
         <h2 class="font-bold">Syarat Penyelenggara</h2>
         <p>Penyelenggara kegiatan harus berasal dari:</p>
         <ul class="list-disc list-inside">
            <li>Organisasi Kemahasiswaan</li>
            <li>Himpunan Mahasiswa</li>
            <li>Unit Kegiatan Mahasiswa (UKM)</li>
            <li>Perusahaan atau Organisasi Non-Kemahasiswaan</li>
         </ul>
         <br>
         <div class="">
            <p>Jika organisasi atau kelompok Anda memiliki ide kegiatan yang dapat memberikan manfaat untuk civitas
               akademika, Anda dapat mendaftar sebagai penyelenggara dengan mengisi form berikut:</p>
         </div>
      </div>

      <div class="container">
         <form class="max-w-full max-md:mx-auto w-full pl-6" action="process_daftar_penyelenggara.php" method="post"
            enctype="multipart/form-data">
            <div class="flex flex-row gap-4">
               <div class="basis-3/5">
                  <label class="text-gray-800 text-[15px] mb-2 block">Nama Penyelenggara</label>
                  <input name="nama_penyelenggara" type="text" required
                     class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-primary"
                     placeholder="Masukkan nama penyelenggara" />
               </div>

               <div class="">
                  <label class="text-gray-800 text-[15px] mb-2 block">Jenis Penyelenggara</label>
                  <select name="jenis_penyelenggara"
                     class="w-full text-sm text-gray-800 bg-gray-100 px-4 py-3.5 rounded-md outline-primary" required>
                     <option value="" selected disabled>-- Pilih Jenis Penyelenggara --</option>
                     <option value="Organisasi Kemahasiswaan">Organisasi Kemahasiswaan</option>
                     <option value="Himpunan Mahasiswa">Himpunan Mahasiswa</option>
                     <option value="Unit Kegiatan Mahasiswa (UKM)">Unit Kegiatan Mahasiswa (UKM)</option>
                     <option value="Perusahaan atau Organisasi Non-Kemahasiswaan">Perusahaan atau Organisasi
                        Non-Kemahasiswaan</option>
                  </select>
               </div>
            </div>

            <div class="mt-4">
               <label class="text-gray-800 text-[15px] mb-2 block">Deskripsi</label>
               <textarea name="deskripsi" rows="3"
                  class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-primary resize-none"
                  placeholder="Masukkan deskripsi" required></textarea>
            </div>

            <div class="flex flex-row gap-4">
               <div class="mt-4 basis-7/12">
                  <label class="text-gray-800 text-[15px] mb-2 block">Nama Penanggung Jawab</label>
                  <input name="nama_penanggung_jawab" id="nama_penanggung_jawab" type="text" required
                     class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-primary"
                     placeholder="Masukkan nama penanggung jawab" />
               </div>

               <div class="mt-4 basis-5/12">
                  <label class="text-gray-800 text-[15px] mb-2 block">Nomor Telepon</label>
                  <input name="nomor_telepon" id="nomor_telepon" type="tel" required
                     class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-primary"
                     placeholder="Contoh: 081234567890" />
               </div>
            </div>

            <div class="flex flex-row gap-4">
               <div class="basis-6/12 mt-4">
                  <label class="text-gray-800 text-[15px] mb-2 block">Email</label>
                  <input name="email" id="email" type="email" required
                     class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-primary"
                     placeholder="Masukkan email" />
               </div>

               <div class="mt-4 basis-6/12">
                  <label class="text-gray-800 text-[15px] mb-2 block">Password</label>
                  <input name="password" id="password" type="password" required
                     class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-primary"
                     placeholder="Masukkan password" />
               </div>
            </div>

            <div class="flex flex-row gap-4">
               <div class="basis-6/12 mt-4">
                  <label class="text-gray-800 text-[15px] mb-2 block">Logo</label>
                  <input type="file" name="logo" id="logo" required
                     class="w-full text-gray-400 font-semibold text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-500 rounded"
                     accept=".png, .jpg, .jpeg" />
                  <p class="text-xs text-gray-400 mt-2">Format PNG, JPG, atau JPEG (maks. 10MB).</p>
               </div>

               <div class="mt-4 basis-6/12">
                  <label class="text-gray-800 text-[15px] mb-2 block">Dokumen Pendukung</label>
                  <input type="file" name="dokumen_pendukung" id="dokumen_pendukung" required
                     class="w-full text-gray-400 font-semibold text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-500 rounded"
                     accept=".pdf" />
                  <p class="text-xs text-gray-400 mt-2">Format PDF (maks. 10MB).</p>
               </div>
            </div>
            <?php 
               // Jika terdapat error saat mengunggah logo, maka tampilkan pesan error
               if (isset($_COOKIE['error_daftar_penyelenggara'])) {
                  echo "<p class='text-red-500 font-semibold text-sm'>" . $_COOKIE['error_daftar_penyelenggara'] . "</p>";
               }
            ?>
            <div class="mt-8">
               <button type="submit"
                  class="w-full shadow-lg py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none">
                  Kirim
               </button>
            </div>
         </form>
      </div>
   </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/footer.php') ?>