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
<div class="bg-white font-[sans-serif] my-4">
   <div class="max-w-6xl mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-16 max-lg:max-w-3xl max-md:max-w-md mx-auto">
         <div
            class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative top-0 hover:-top-2 transition-all duration-300">
            <img src="https://readymadeui.com/Imagination.webp" alt="Blog Post 1" class="w-full h-60 object-cover" />
            <div class="p-6">
               <span class="text-sm block text-gray-400 mb-2">10 FEB 2023 | BY JOHN DOE</span>
               <h3 class="text-xl font-bold text-gray-800">A Guide to Igniting Your Imagination</h3>
               <hr class="my-4" />
               <p class="text-gray-400 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis
                  accumsan, nunc et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include("layouts/footer.php") ?>