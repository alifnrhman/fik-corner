<?php
   session_start();

   // if(!isset($_SESSION['nim'])) {
   //    header('location: login');
   // }
?>


<?php 
   include("layouts/header.php");
   include("layouts/navigation_bar.php");
?>

<div class="w-full h-full lg:px-28 md:px-14 sm:px-6">
   <div class="mt-8">
      <p class="font-semibold text-2xl">Event Terbaruu</p>
   </div>
   <div class='font-[sans-serif]'>
      <div class='max-w-7xl'>
         <div
            class='grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6 max-lg:max-w-3xl max-md:max-w-md mx-auto '>
            <?php include("layouts/events_card.php") ?>
         </div>
      </div>
   </div>
</div>

<?php include("layouts/footer.php") ?>