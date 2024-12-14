<?php
	session_start();
   setcookie("message", "");

	if (isset($_SESSION['nama_penyelenggara'])) {
		header("location: /fik-corner/penyelenggara/dashboard");
	}

   $title = "Login Penyelenggara";
   include($_SERVER['DOCUMENT_ROOT'] . '/fik-corner/includes/header.php');
?>

<main>
   <div class="font-[sans-serif] max-w-7xl mx-auto h-screen">
      <div class="grid md:grid-cols-2 items-center gap-8 h-full">
         <form class="max-w-lg max-md:mx-auto w-full p-6" action="/fik-corner/auth/penyelenggara/login.php"
            method="post">
            <div class="mb-8">
               <h3 class="text-gray-800 text-4xl font-extrabold">Login Penyelenggara</h3>
               <p class="text-gray-800 text-sm mt-6">Masuk ke dashboard penyelenggara FIK Corner menggunakan email dan
                  password anda.
               </p>
            </div>

            <div>
               <label class="text-gray-800 text-[15px] mb-2 block">Email</label>
               <div class="relative flex items-center">
                  <input name="email" type="email" required
                     class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
                     placeholder="Masukkan email" />
               </div>
            </div>

            <div class="mt-4">
               <label class="text-gray-800 text-[15px] mb-2 block">Password</label>
               <div class="relative flex items-center">
                  <input name="password" id="password" type="password" required
                     class="w-full text-sm text-gray-800 bg-gray-100 focus:bg-transparent px-4 py-3.5 rounded-md outline-blue-600"
                     placeholder="Masukkan password" />
                  <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                     class="w-[18px] h-[18px] absolute right-4 cursor-pointer" viewBox="0 0 128 128" id="togglePassword"
                     onclick="togglePassword()">
                     <path
                        d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"
                        data-original="#000000"></path>
                  </svg>
               </div>
               <?php
							if (isset($_COOKIE['message'])) {
								echo "<p class='mt-4 font-semibold text-primary'>" . $_COOKIE['message'] . "</p>";
							}
						?>
            </div>

            <div class="flex flex-wrap items-center gap-4 justify-between mt-4">
               <div class="flex items-center">
                  <input id="remember-me" name="remember-me" type="checkbox"
                     class="shrink-0 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded-md" />
                  <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                     Ingat saya
                  </label>
               </div>
            </div>

            <div class="mt-8">
               <button type="submit"
                  class="w-full shadow-xl py-3 px-6 text-sm tracking-wide font-semibold rounded-md text-white bg-primary hover:bg-primaryHover focus:outline-none">
                  Log In
               </button>
            </div>
         </form>

         <div
            class="h-full md:py-6 flex items-center relative max-md:before:hidden before:absolute before:bg-gradient-to-r before:from-gray-50 before:via-[#ff880041] before:to-[#ff6500] before:h-full before:w-full before:right-0 before:z-0">
            <img src="/fik-corner/assets/fik-corner-md.png" class="rounded-md lg:w-4/5 md:w-11/12 z-50 relative"
               alt="FIK Corner" />
         </div>
      </div>
   </div>
</main>
</body>
</html>