<?php
   session_start();
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/navigation_bar.php');
?>

<div class="flex flex-grow">
   <div
      class="w-full h-full pt-40 sm:pt-38 md:pt-40 lg:pt-40 xl:pt-36 2xl:pt-40 px-14 sm:px-14 md:px-14 lg:px-28 flex-grow">
      <div>
         <p class="mt-5 font-bold text-4xl text-center">Halaman yang anda cari tidak ditemukan!</p>
      </div>
   </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/footer.php') ;?>