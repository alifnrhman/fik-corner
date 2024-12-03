<?php
   session_start();

   // if(!isset($_SESSION['nim'])) {
   //    header('location: login');
   // }
   $title = "Beranda";
   include("includes/header.php");
   include("includes/navigation_bar.php");
   include("includes/functions.php");
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
         <form class="max-w-full max-md:mx-auto w-full pl-6" action="process_login.php" method="post">
            <div class="flex flex-row gap-4">
               <div class="basis-3/5">
                  <label class="text-gray-800 text-[15px] mb-2 block">Nama Penyelenggara</label>
                  <div class="relative flex items-center">
                     <input name="nama_penyelenggara" type="text" required
                        class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
                        placeholder="Masukkan nama penyelenggara" />
                  </div>
               </div>

               <div class="">
                  <label class="text-gray-800 text-[15px] mb-2 block">Jenis Penyelenggara</label>
                  <div class="relative flex items-center">
                     <select name="jenis_penyelenggara"
                        class="w-full text-sm text-gray-800 bg-gray-100 px-4 py-3.5 rounded-md outline-blue-600"
                        required>
                        <option value="" selected disabled>-- Pilih Jenis Penyelenggara --</option>
                        <option value="Organisasi Kemahasiswaan">Organisasi Kemahasiswaan</option>
                        <option value="Himpunan Mahasiswa">Himpunan Mahasiswa</option>
                        <option value="Unit Kegiatan Mahasiswa (UKM)">Unit Kegiatan Mahasiswa (UKM)</option>
                        <option value="Perusahaan atau Organisasi Non-Kemahasiswaan">Perusahaan atau Organisasi
                           Non-Kemahasiswaan</option>
                     </select>
                  </div>
               </div>
            </div>

            <div class="mt-4">
               <label class="text-gray-800 text-[15px] mb-2 block">Deskripsi</label>
               <div class="relative flex items-center">
                  <textarea name="deskripsi" rows="3"
                     class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600 resize-none"
                     placeholder="Masukkan nama penyelenggara" required></textarea>
               </div>
            </div>

            <div class="flex flex-row gap-4">
               <div class="mt-4 basis-7/12">
                  <label class="text-gray-800 text-[15px] mb-2 block">Nama Penanggung Jawab</label>
                  <div class="relative flex items-center">
                     <input name="nama_penanggung_jawab" id="nama_penanggung_jawab" type="text" required
                        class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
                        placeholder="Masukkan nama penanggung jawab" />
                  </div>
               </div>

               <div class="mt-4 basis-5/12">
                  <label class="text-gray-800 text-[15px] mb-2 block">Nomor Telepon</label>
                  <div class="relative flex items-center">
                     <input name="nomor_telepon" id="nomor_telepon" type="text" required
                        class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
                        placeholder="Contoh: 081234567890" />
                  </div>
               </div>
            </div>

            <div class="flex flex-row gap-4">
               <div class="basis-6/12 mt-4">
                  <label class="text-gray-800 text-[15px] mb-2 block">Email</label>
                  <div class="relative flex items-center">
                     <input name="email" id="email" type="email" required
                        class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
                        placeholder="Masukkan email" />
                  </div>
               </div>

               <div class="mt-4 basis-6/12">
                  <label class="text-gray-800 text-[15px] mb-2 block">Password</label>
                  <div class="relative flex items-center">
                     <input name="password" id="password" type="password" required
                        class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
                        placeholder="Masukkan password" />
                  </div>
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

<?php include("includes/footer.php") ?>