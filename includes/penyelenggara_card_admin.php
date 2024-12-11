<div
   class="bg-white grid sm:grid-cols-1 shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] w-full max-w-full max-sm:max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto">
   <div class="p-6 flex flex-col min-h-[420px]">
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

      <div class='mt-auto space-x-5'>
         <?=
            "<a class='w-40 shadow-md py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none cursor-pointer'>
                  <i class='fa-solid fa-file-lines mr-1'></i>
                  Lihat Dokumen Pendukung
               </a>" .
            "<a class='w-40 shadow-md py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none cursor-pointer'>
                  <i class='fa-solid fa-check mr-1'></i>
                  Verifikasi
            </a>";
         ?>
      </div>
   </div>
</div>