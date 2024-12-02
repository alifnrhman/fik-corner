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

<div class="w-full h-full py-20 lg:px-28 md:px-14 sm:px-6">
   <div class="my-10 flex">
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
         <form class="max-w-lg max-md:mx-auto w-full p-6" action="process_login.php" method="post">
            <div>
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
      </div>
   </div>

   <?php include("includes/footer.php") ?>