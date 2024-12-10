<?php
   session_start();

   if(!isset($_SESSION['username'])) {
      header('location: admin');
   }
   
   $title = "Review";
   include("includes/header.php");
?>

<div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
   <div class="flex items-start">
      <?php include("includes/sidebar_admin.php"); ?>

      <section class="main-content w-full px-8">
         <header class='z-50 bg-[#f7f6f9] sticky top-0 pt-8'>
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
                           <p class="text-gray-500 text-sm"><?= $_SESSION['nama']; ?></p>
                           <?php
                              if (isset($_SESSION['logo']) && !empty($_SESSION['logo'])) {
                                 echo "<img src='" . $_SESSION['logo'] . "' class='w-9 h-9 rounded-full object-cover mx-auto border border-gray-500 cursor-pointer' />";
                              } else {
                                 echo "<img src='assets\default_pfp.svg' class='w-9 h-9 rounded-full object-cover mx-auto border border-gray-500 cursor-pointer' />";
                              }
                           ?>
                        </div>

                        <div
                           class="dropdown-content hidden group-hover:block shadow-md p-2 bg-white rounded-md absolute top-[38px] right-0 w-56">
                           <div class="w-full space-y-2">
                              <a href="javascript:void(0)"
                                 class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-secondary dropdown-item transition duration-300 ease-in-out">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-4 fill-current"
                                    viewBox="0 0 512 512">
                                    <path
                                       d="M437.02 74.98C388.668 26.63 324.379 0 256 0S123.332 26.629 74.98 74.98C26.63 123.332 0 187.621 0 256s26.629 132.668 74.98 181.02C123.332 485.37 187.621 512 256 512s132.668-26.629 181.02-74.98C485.37 388.668 512 324.379 512 256s-26.629-132.668-74.98-181.02zM111.105 429.297c8.454-72.735 70.989-128.89 144.895-128.89 38.96 0 75.598 15.179 103.156 42.734 23.281 23.285 37.965 53.687 41.742 86.152C361.641 462.172 311.094 482 256 482s-105.637-19.824-144.895-52.703zM256 269.507c-42.871 0-77.754-34.882-77.754-77.753C178.246 148.879 213.13 114 256 114s77.754 34.879 77.754 77.754c0 42.871-34.883 77.754-77.754 77.754zm170.719 134.427a175.9 175.9 0 0 0-46.352-82.004c-18.437-18.438-40.25-32.27-64.039-40.938 28.598-19.394 47.426-52.16 47.426-89.238C363.754 132.34 315.414 84 256 84s-107.754 48.34-107.754 107.754c0 37.098 18.844 69.875 47.465 89.266-21.887 7.976-42.14 20.308-59.566 36.542-25.235 23.5-42.758 53.465-50.883 86.348C50.852 364.242 30 312.512 30 256 30 131.383 131.383 30 256 30s226 101.383 226 226c0 56.523-20.86 108.266-55.281 147.934zm0 0"
                                       data-original="#000000"></path>
                                 </svg>
                                 Akun Saya</a>
                              <hr class="my-2 -mx-2" />
                              <a href="process_logout.php"
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
         
         <div class="my-2 px-2">
            <div class="bg-gray-100 pt-5 font-sans">
               <?php 
               include "connection.php";

               $result = $connection->query("SELECT COUNT(*) AS total FROM kegiatan WHERE status= 'Ditolak'");

               if ($result) {
                  $row = $result->fetch_assoc();
                  $total_id_kegiatan = $row['total'];
                  } else {
                     $total_id_kegiatan = 0; 
                  }
                  echo "
                  <div>
                     <h2 class='text-gray-800 text-2xl max-sm:text-2xl font-bold mb-4'>
                        Kegiatan Ditolak ($total_id_kegiatan)
                     </h2>
                  </div>";
               ?>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6">
            <?php
               include("connection.php");
               $query = "
                     SELECT 
                        k.nama_kegiatan, 
                        k.deskripsi_singkat, 
                        k.tanggal, 
                        k.posted_at, 
                        p.nama_penyelenggara
                     FROM kegiatan k
                     JOIN penyelenggara p ON k.id_penyelenggara = p.id_penyelenggara
                     WHERE k.status = 'Ditolak'
               ";
               $result = $connection->query($query);

               if ($result->num_rows > 0) {
                     while ($row = $result->fetch_assoc()) {
               ?>
                        <div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] p-6 rounded-lg overflow-hidden">
                           <div class="bg-[#edf2f7] rounded-lg py-10 px-6">
                                 <h3 class="text-xl font-bold text-gray-800"><?= htmlspecialchars($row['nama_kegiatan']) ?></h3>
                                 <h2 class="py-3 text-md font-semibold text-gray-800"><?= htmlspecialchars($row['nama_penyelenggara']) ?></h2>
                                 <p class="py-1 text-sm text-gray-600"><?= htmlspecialchars($row['deskripsi_singkat']) ?></p>
                                 <p class="text-sm text-gray-800"><?= htmlspecialchars($row['tanggal']) ?></p>
                                 <p class="text-sm text-gray-500 mt-2">Tanggal Daftar: <?= htmlspecialchars($row['posted_at']) ?></p>
                                 <p class="test-md text-white bg-red-500"<?= $row['status']?>>Kegiatan Ditolak</p>
                                 <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Lihat Detail</button>
                           </div>
                        </div>
                  <?php
                        }
                  } else {
                        echo '<h3 class="text-gray-500 text-lg max-sm:text-lg mb-4">Belum ada kegiatan yang ditolak.</h3>';
                  }
                  ?>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>

<?php include("includes/admin_footer.php") ?>