<?php
	session_start();
   setcookie("message", "");

	if (isset($_SESSION['nim'])) {
		header("location: home.php");
	}

   require_once BASE_PATH . '/database.php';


?>

<div class="bg-gray-50 font-[sans-serif]">
   <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
      <div class="max-w-md w-full">
         <a href="javascript:void(0)"><img src="https://readymadeui.com/readymadeui.svg" alt="logo"
               class='w-40 mb-8 mx-auto block' />
         </a>

         <div class="p-8 rounded-2xl bg-white shadow">
            <h2 class="text-gray-800 text-center text-2xl font-bold">Sign in</h2>
            <form class="mt-8 space-y-4" action="scripts\login_process.php" method="post">
               <div>
                  <label class="text-gray-800 text-sm mb-2 block">User name</label>
                  <div class="relative flex items-center">
                     <input name="nim" type="text" required
                        class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                        placeholder="Enter user name" />
                  </div>
               </div>

               <div>
                  <label class="text-gray-800 text-sm mb-2 block">Password</label>
                  <div class="relative flex items-center">
                     <input name="password" type="password" required
                        class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-blue-600"
                        placeholder="Enter password" />
                  </div>
               </div>

               <div class="flex flex-wrap items-center justify-between gap-4">
                  <div class="flex items-center">
                     <?php
                        if (isset($_COOKIE['message'])) {
                           echo $_COOKIE['message'];
                        }
						   ?>
                  </div>
               </div>

               <div class="!mt-8">
                  <button type="submit"
                     class="w-full py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                     Sign in
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>