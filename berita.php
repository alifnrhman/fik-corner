<?php
   session_start();

   $title = "Berita";
   include("includes/header.php");
   include("includes/navigation_bar.php");
   include("includes/functions.php");
?>

<main class="w-full h-full pt-20 lg:px-28 md:px-14 sm:px-6 flex-grow">
   <div class='mt-8'>
      <div class="mb-5">
         <p class="font-bold text-2xl">Berita</p>
      </div>
   </div>
</main>
<?php include("includes/footer.php") ?>