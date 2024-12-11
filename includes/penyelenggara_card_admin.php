<div
   class="bg-white grid sm:grid-cols-1 shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] w-full max-w-full max-sm:max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto">
   <div class="p-6 flex flex-col min-h-[450px]">
      <div class='flex items-center gap-x-4'>
         <img src='<?= $data['logo']; ?>' class="w-12 h-12 rounded-full" />
         <div class='flex flex-col'>
            <h3 class="text-xl font-semibold"><?= $data['nama_penyelenggara']; ?></h3>
            <p class="text-sm text-gray-600 leading-relaxed"><?= $data['jenis_penyelenggara']; ?></p>
         </div>
      </div>

      <div class='mt-3'>
         <p class="text-sm text-gray-600 leading-relaxed text-justify font-bold">Deskripsi</p>
         <p class="text-sm text-gray-600 leading-relaxed text-justify"><?= $data['deskripsi']; ?></p>
      </div>

      <div class='mt-3'>
         <p class="text-sm text-gray-600 leading-relaxed text-justify font-bold">Penanggung Jawab</p>
         <p class="text-sm text-gray-600 leading-relaxed text-justify">
            <?= $data['nama_penanggung_jawab'] . " - " . $data['nomor_telepon'];?></p>
      </div>

      <div class='mt-3'>
         <p class="text-sm text-gray-600 leading-relaxed text-justify font-bold">Tanggal Daftar</p>
         <p class="text-sm text-gray-600 leading-relaxed text-justify"><?=$data['tanggal_daftar'];?></p>
      </div>

      <div class='mt-5'>
         <a href="lihat_dokumen_pendukung.php?id=<?= $data['id_penyelenggara']; ?>" target="_blank"
            class="text-sm text-primary leading-relaxed text-justify font-semibold underline">Lihat Dokumen
            Pendukung</a>
      </div>

      <div class='mt-auto space-x-5'>
         <?=
            "<a class='w-40 shadow-md py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none cursor-pointer'>
                  <i class='fa-solid fa-check mr-1'></i>
                  Verifikasi
            </a>" .
            "<a 
               class='w-40 shadow-sm py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-primary bg-white hover:bg-primaryHover hover:text-white focus:outline-none transition-all duration-300 border border-gray-200 cursor-pointer'>
               <i class='fa-solid fa-xmark mr-1'></i>
               Tolak
            </a>";
         ?>
      </div>
   </div>
</div>