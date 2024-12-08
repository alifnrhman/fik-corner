<?php
   session_start();

   if(!isset($_SESSION['username'])) {
      header('location: admin');
   }
   
   $title = "List Kegiatan";
   include("includes/header.php");
?>

<div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
   <div class="flex items-start">
      <?php include("includes/sidebar_admin.php"); ?>

      <section class="main-content w-full px-8">
         <header class='z-50 bg-[#f7f6f9] sticky top-0 pt-8'>
            <div class='flex flex-wrap items-center w-full relative tracking-wide'>
               <div class='flex items-center gap-y-6 max-sm:flex-col z-50 w-full pb-2'>
                  <div class="flex items-center justify-end gap-6 ml-auto">
                     <div class="dropdown-menu relative flex shrink-0 group">
                        <div class="flex items-center gap-4">
                           <p class="text-gray-500 text-sm"><?= $_SESSION['nama']; ?></p>
                           <img src="assets\default_pfp.svg" alt="profile-pic"
                              class="w-[38px] h-[38px] rounded-full border-2 border-gray-300 cursor-pointer" />
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
                                 Account</a>
                              <hr class="my-2 -mx-2" />

                              <a href="dashboard_admin"
                                 class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-secondary dropdown-item transition duration-300 ease-in-out">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="w-[18px] h-[18px] mr-4 fill-current" viewBox="0 0 24 24">
                                    <path
                                       d="M19.56 23.253H4.44a4.051 4.051 0 0 1-4.05-4.05v-9.115c0-1.317.648-2.56 1.728-3.315l7.56-5.292a4.062 4.062 0 0 1 4.644 0l7.56 5.292a4.056 4.056 0 0 1 1.728 3.315v9.115a4.051 4.051 0 0 1-4.05 4.05zM12 2.366a2.45 2.45 0 0 0-1.393.443l-7.56 5.292a2.433 2.433 0 0 0-1.037 1.987v9.115c0 1.34 1.09 2.43 2.43 2.43h15.12c1.34 0 2.43-1.09 2.43-2.43v-9.115c0-.788-.389-1.533-1.037-1.987l-7.56-5.292A2.438 2.438 0 0 0 12 2.377z"
                                       data-original="#000000"></path>
                                    <path
                                       d="M16.32 23.253H7.68a.816.816 0 0 1-.81-.81v-5.4c0-2.83 2.3-5.13 5.13-5.13s5.13 2.3 5.13 5.13v5.4c0 .443-.367.81-.81.81zm-7.83-1.62h7.02v-4.59c0-1.933-1.577-3.51-3.51-3.51s-3.51 1.577-3.51 3.51z"
                                       data-original="#000000"></path>
                                 </svg>
                                 Dashboard</a>
                              <a href="post_admin"
                                 class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-secondary dropdown-item transition duration-300 ease-in-out">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-4 fill-current"
                                    viewBox="0 0 24 24">
                                    <path
                                       d="M18 2c2.206 0 4 1.794 4 4v12c0 2.206-1.794 4-4 4H6c-2.206 0-4-1.794-4-4V6c0-2.206 1.794-4 4-4zm0-2H6a6 6 0 0 0-6 6v12a6 6 0 0 0 6 6h12a6 6 0 0 0 6-6V6a6 6 0 0 0-6-6z"
                                       data-original="#000000" />
                                    <path d="M12 18a1 1 0 0 1-1-1V7a1 1 0 0 1 2 0v10a1 1 0 0 1-1 1z"
                                       data-original="#000000" />
                                    <path d="M6 12a1 1 0 0 1 1-1h10a1 1 0 0 1 0 2H7a1 1 0 0 1-1-1z"
                                       data-original="#000000" />
                                 </svg>
                                 Posts</a>
                              <a href="post_admin"
                                 class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-secondary dropdown-item transition duration-300 ease-in-out">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-4 fill-current"
                                    viewBox="0 0 510 510">
                                    <g fill-opacity=".9">
                                       <path
                                          d="M255 0C114.75 0 0 114.75 0 255s114.75 255 255 255 255-114.75 255-255S395.25 0 255 0zm0 459c-112.2 0-204-91.8-204-204S142.8 51 255 51s204 91.8 204 204-91.8 204-204 204z"
                                          data-original="#000000" />
                                       <path d="M267.75 127.5H229.5v153l132.6 81.6 20.4-33.15-114.75-68.85z"
                                          data-original="#000000" />
                                    </g>
                                 </svg>
                                 Schedules</a>
                              <a href="process_logout.php"
                                 class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-secondary dropdown-item transition duration-300 ease-in-out">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] mr-4 fill-current"
                                    viewBox="0 0 6 6">
                                    <path
                                       d="M3.172.53a.265.266 0 0 0-.262.268v2.127a.265.266 0 0 0 .53 0V.798A.265.266 0 0 0 3.172.53zm1.544.532a.265.266 0 0 0-.026 0 .265.266 0 0 0-.147.47c.459.391.749.973.749 1.626 0 1.18-.944 2.131-2.116 2.131A2.12 2.12 0 0 1 1.06 3.16c0-.65.286-1.228.74-1.62a.265.266 0 1 0-.344-.404A2.667 2.667 0 0 0 .53 3.158a2.66 2.66 0 0 0 2.647 2.663 2.657 2.657 0 0 0 2.645-2.663c0-.812-.363-1.542-.936-2.03a.265.266 0 0 0-.17-.066z"
                                       data-original="#000000" />
                                 </svg>
                                 Logout</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </header>

         <div class="my-10 px-2">
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
                     WHERE k.status = 'Aktif'
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
                                 <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Lihat Detail</button>
                           </div>
                        </div>
                  <?php
                        }
                  } else {
                        echo '<p class="text-gray-500 col-span-full text-center">Tidak ada data penyelenggara terverifikasi.</p>';
                  }
                  ?>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>

<?php include("includes/admin_footer.php") ?>