<?php
   session_start();

   if(!isset($_SESSION['username'])) {
      header('location: penyelenggara');
   }
   
   $title = "Dashboard Penyelenggara";
   include("includes/header.php");
?>

<div class="relative bg-[#f7f6f9] h-full min-h-screen font-[sans-serif]">
   <div class="flex items-start">
      <nav id="sidebar" class="lg:min-w-[250px] w-max max-lg:min-w-8">
         <div id="sidebar-collapse-menu"
            class=" bg-white shadow-lg h-screen fixed top-0 left-0 overflow-auto z-[99] lg:min-w-[250px] lg:w-max max-lg:w-0 max-lg:invisible transition-all duration-500">
            <div class="pt-8 pb-2 px-6 sticky top-0 bg-white min-h-[80px] z-[100]">
               <a href="javascript:void(0)" class="outline-none"><img src="assets\fik-corner-logo.png" alt="logo"
                     class='w-[170px]' />
               </a>
            </div>

            <div class="py-6 px-6">
               <ul class="space-y-2">
                  <li>
                     <a href="javascript:void(0)"
                        class="menu-item text-primary font-semibold text-sm flex items-center cursor-pointer bg-secondary hover:bg-secondary rounded-md px-3 py-3 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-4"
                           viewBox="0 0 24 24">
                           <path
                              d="M19.56 23.253H4.44a4.051 4.051 0 0 1-4.05-4.05v-9.115c0-1.317.648-2.56 1.728-3.315l7.56-5.292a4.062 4.062 0 0 1 4.644 0l7.56 5.292a4.056 4.056 0 0 1 1.728 3.315v9.115a4.051 4.051 0 0 1-4.05 4.05zM12 2.366a2.45 2.45 0 0 0-1.393.443l-7.56 5.292a2.433 2.433 0 0 0-1.037 1.987v9.115c0 1.34 1.09 2.43 2.43 2.43h15.12c1.34 0 2.43-1.09 2.43-2.43v-9.115c0-.788-.389-1.533-1.037-1.987l-7.56-5.292A2.438 2.438 0 0 0 12 2.377z"
                              data-original="#000000" />
                           <path
                              d="M16.32 23.253H7.68a.816.816 0 0 1-.81-.81v-5.4c0-2.83 2.3-5.13 5.13-5.13s5.13 2.3 5.13 5.13v5.4c0 .443-.367.81-.81.81zm-7.83-1.62h7.02v-4.59c0-1.933-1.577-3.51-3.51-3.51s-3.51 1.577-3.51 3.51z"
                              data-original="#000000" />
                        </svg>
                        <span>Dashboard</span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"
                        class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-secondary rounded-md px-3 py-3 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-4"
                           viewBox="0 0 60.123 60.123">
                           <path
                              d="M57.124 51.893H16.92a3 3 0 1 1 0-6h40.203a3 3 0 0 1 .001 6zm0-18.831H16.92a3 3 0 1 1 0-6h40.203a3 3 0 0 1 .001 6zm0-18.831H16.92a3 3 0 1 1 0-6h40.203a3 3 0 0 1 .001 6z"
                              data-original="#000000" />
                           <circle cx="4.029" cy="11.463" r="4.029" data-original="#000000" />
                           <circle cx="4.029" cy="30.062" r="4.029" data-original="#000000" />
                           <circle cx="4.029" cy="48.661" r="4.029" data-original="#000000" />
                        </svg>
                        <span>Order List</span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"
                        class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-secondary rounded-md px-3 py-3 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-4"
                           viewBox="0 0 64 64">
                           <path
                              d="M16.4 29.594a2.08 2.08 0 0 1 2.08-2.08h31.2a2.08 2.08 0 1 1 0 4.16h-31.2a2.08 2.08 0 0 1-2.08-2.08zm0 12.48a2.08 2.08 0 0 1 2.08-2.08h12.48a2.08 2.08 0 1 1 0 4.16H18.48a2.08 2.08 0 0 1-2.08-2.08z"
                              data-original="#000000" />
                           <path fill-rule="evenodd"
                              d="M.8 18.154c0-8.041 6.519-14.56 14.56-14.56v-1.04a2.08 2.08 0 1 1 4.16 0v1.04h10.4v-1.04a2.08 2.08 0 1 1 4.16 0v1.04h10.4v-1.04a2.08 2.08 0 1 1 4.16 0v1.04c8.041 0 14.56 6.519 14.56 14.56v30.16c0 8.041-6.519 14.56-14.56 14.56H15.36C7.319 62.874.8 56.355.8 48.314zm33.28-10.4h10.4v1.04a2.08 2.08 0 1 0 4.16 0v-1.04c5.744 0 10.4 4.656 10.4 10.4v30.16c0 5.744-4.656 10.4-10.4 10.4H15.36c-5.744 0-10.4-4.656-10.4-10.4v-30.16c0-5.744 4.656-10.4 10.4-10.4v1.04a2.08 2.08 0 1 0 4.16 0v-1.04h10.4v1.04a2.08 2.08 0 1 0 4.16 0z"
                              clip-rule="evenodd" data-original="#000000" />
                        </svg>
                        <span>Order Detail</span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"
                        class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-secondary rounded-md px-3 py-3 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-4"
                           viewBox="0 0 682.667 682.667">
                           <defs>
                              <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                 <path d="M0 512h512V0H0Z" data-original="#000000" />
                              </clipPath>
                           </defs>
                           <g fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                              stroke-miterlimit="10" stroke-width="30" clip-path="url(#a)"
                              transform="matrix(1.33333 0 0 -1.33333 0 682.667)">
                              <path
                                 d="M368 170.3V45c0-16.57-13.43-30-30-30H45c-16.57 0-30 13.43-30 30v422c0 16.571 13.43 30 30 30h293c16.57 0 30-13.429 30-30V261.26"
                                 data-original="#000000" />
                              <path
                                 d="m287.253 180.508 159.099 159.099c5.858 5.858 15.355 5.858 21.213 0l25.042-25.041c5.858-5.859 5.858-15.356 0-21.214L332.508 135.253l-84.853-39.599ZM411.703 304.958l45.255-45.255M80 400h224M80 320h176M80 240h128"
                                 data-original="#000000" />
                           </g>
                        </svg>
                        <span>Reviews</span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"
                        class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-secondary rounded-md px-3 py-3 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-4"
                           viewBox="0 0 24 24">
                           <path fill-rule="evenodd"
                              d="M17.933.899C16.973.82 15.78.82 14.258.82H9.742c-1.522 0-2.716 0-3.675.078-.977.08-1.784.245-2.514.618a6.382 6.382 0 0 0-2.79 2.79C.391 5.036.226 5.843.146 6.82c-.079.96-.079 2.154-.079 3.676v4.73a5.02 5.02 0 0 0 5.02 5.02h.667a.39.39 0 0 1 .363.535c-.763 1.905 1.432 3.627 3.101 2.435l2.899-2.07.055-.039a4.717 4.717 0 0 1 2.686-.861h.84c1.719 0 2.767 0 3.648-.258a6.382 6.382 0 0 0 4.329-4.329c.257-.881.257-1.929.257-3.648v-1.515c0-1.522 0-2.717-.077-3.676-.081-.976-.246-1.783-.618-2.514a6.382 6.382 0 0 0-2.79-2.79C19.717 1.145 18.91.98 17.933.9zM4.309 3c.456-.233 1.02-.37 1.893-.44.884-.073 2.01-.074 3.578-.074h4.44c1.568 0 2.694 0 3.578.073.873.071 1.437.209 1.894.44a4.717 4.717 0 0 1 2.062 2.063c.233.456.37 1.02.44 1.894.072.883.073 2.009.073 3.577v1.315c0 1.933-.008 2.721-.19 3.343a4.717 4.717 0 0 1-3.2 3.199c-.621.182-1.41.19-3.343.19h-.687a6.382 6.382 0 0 0-3.635 1.166l-2.96 2.115c-.318.226-.734-.1-.589-.462a2.055 2.055 0 0 0-1.909-2.818h-.667a3.354 3.354 0 0 1-3.355-3.354v-4.695c0-1.568 0-2.694.074-3.577.07-.874.208-1.438.44-1.894A4.717 4.717 0 0 1 4.31 3z"
                              clip-rule="evenodd" data-original="#000000" />
                           <path
                              d="M8.67 10.533a1.11 1.11 0 1 1-2.22 0 1.11 1.11 0 0 1 2.22 0zm4.44 0a1.11 1.11 0 1 1-2.22 0 1.11 1.11 0 0 1 2.22 0zm4.44 0a1.11 1.11 0 1 1-2.22 0 1.11 1.11 0 0 1 2.22 0z"
                              data-original="#000000" />
                        </svg>
                        <span>Chat</span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"
                        class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-secondary rounded-md px-3 py-3 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-4"
                           viewBox="0 0 507.246 507.246">
                           <path
                              d="M457.262 89.821c-2.734-35.285-32.298-63.165-68.271-63.165H68.5c-37.771 0-68.5 30.729-68.5 68.5V412.09c0 37.771 30.729 68.5 68.5 68.5h370.247c37.771 0 68.5-30.729 68.5-68.5V155.757c-.001-31.354-21.184-57.836-49.985-65.936zM68.5 58.656h320.492c17.414 0 32.008 12.261 35.629 28.602H68.5c-13.411 0-25.924 3.889-36.5 10.577v-2.679c0-20.126 16.374-36.5 36.5-36.5zM438.746 448.59H68.5c-20.126 0-36.5-16.374-36.5-36.5V155.757c0-20.126 16.374-36.5 36.5-36.5h370.247c20.126 0 36.5 16.374 36.5 36.5v55.838H373.221c-40.43 0-73.322 32.893-73.322 73.323s32.893 73.323 73.322 73.323h102.025v53.849c0 20.126-16.374 36.5-36.5 36.5zm36.5-122.349H373.221c-22.785 0-41.322-18.537-41.322-41.323s18.537-41.323 41.322-41.323h102.025z"
                              data-original="#000000" />
                           <circle cx="379.16" cy="286.132" r="16.658" data-original="#000000" />
                        </svg>
                        <span>Wallet</span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"
                        class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-secondary rounded-md px-3 py-3 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-4"
                           viewBox="0 0 214.27 214.27">
                           <path
                              d="M196.926 55.171c-.11-5.785-.215-11.25-.215-16.537a7.5 7.5 0 0 0-7.5-7.5c-32.075 0-56.496-9.218-76.852-29.01a7.498 7.498 0 0 0-10.457 0c-20.354 19.792-44.771 29.01-76.844 29.01a7.5 7.5 0 0 0-7.5 7.5c0 5.288-.104 10.755-.215 16.541-1.028 53.836-2.436 127.567 87.331 158.682a7.495 7.495 0 0 0 4.912 0c89.774-31.116 88.368-104.849 87.34-158.686zm-89.795 143.641c-76.987-27.967-75.823-89.232-74.79-143.351.062-3.248.122-6.396.164-9.482 30.04-1.268 54.062-10.371 74.626-28.285 20.566 17.914 44.592 27.018 74.634 28.285.042 3.085.102 6.231.164 9.477 1.032 54.121 2.195 115.388-74.798 143.356z"
                              data-original="#000000" />
                           <path
                              d="m132.958 81.082-36.199 36.197-15.447-15.447a7.501 7.501 0 0 0-10.606 10.607l20.75 20.75a7.477 7.477 0 0 0 5.303 2.196 7.477 7.477 0 0 0 5.303-2.196l41.501-41.5a7.498 7.498 0 0 0 .001-10.606 7.5 7.5 0 0 0-10.606-.001z"
                              data-original="#000000" />
                        </svg>
                        <span>Security</span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"
                        class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-secondary rounded-md px-3 py-3 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-4"
                           viewBox="0 0 64 64">
                           <path
                              d="M61.4 29.9h-6.542a9.377 9.377 0 0 0-18.28 0H2.6a2.1 2.1 0 0 0 0 4.2h33.978a9.377 9.377 0 0 0 18.28 0H61.4a2.1 2.1 0 0 0 0-4.2Zm-15.687 7.287A5.187 5.187 0 1 1 50.9 32a5.187 5.187 0 0 1-5.187 5.187ZM2.6 13.1h5.691a9.377 9.377 0 0 0 18.28 0H61.4a2.1 2.1 0 0 0 0-4.2H26.571a9.377 9.377 0 0 0-18.28 0H2.6a2.1 2.1 0 0 0 0 4.2Zm14.837-7.287A5.187 5.187 0 0 1 22.613 11a5.187 5.187 0 0 1-10.364 0 5.187 5.187 0 0 1 5.187-5.187ZM61.4 50.9H35.895a9.377 9.377 0 0 0-18.28 0H2.6a2.1 2.1 0 0 0 0 4.2h15.015a9.377 9.377 0 0 0 18.28 0H61.4a2.1 2.1 0 0 0 0-4.2Zm-34.65 7.287A5.187 5.187 0 1 1 31.937 53a5.187 5.187 0 0 1-5.187 5.187Z"
                              data-name="Layer 47" data-original="#000000" />
                        </svg>
                        <span>Preferences</span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"
                        class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-secondary rounded-md px-3 py-3 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-4"
                           viewBox="0 0 64 64">
                           <path
                              d="M32.667 5.11A25.116 25.116 0 0 0 32 5.045V2.88a2.08 2.08 0 1 0-4.16 0v2.165C15.027 6.102 4.96 16.837 4.96 29.92v18.5L3.47 52.8h-.59a2.08 2.08 0 1 0 0 4.16h54.08a2.08 2.08 0 1 0 0-4.16h-.59l-1.49-4.38v-9.568a18.585 18.585 0 0 1-4.16 1.209v8.703a2.08 2.08 0 0 0 .11.67l1.145 3.366H7.865l1.144-3.366a2.08 2.08 0 0 0 .111-.67V29.92c0-11.488 9.312-20.8 20.8-20.8.142 0 .285.001.426.004a18.7 18.7 0 0 1 2.32-4.014zM23.68 61.12a2.08 2.08 0 0 1 2.08-2.08h8.32a2.08 2.08 0 1 1 0 4.16h-8.32a2.08 2.08 0 0 1-2.08-2.08z"
                              data-original="#000000" />
                           <g fill-rule="evenodd" clip-rule="evenodd">
                              <path
                                 d="M46.56 12.909c-4.221 0-7.627 3.434-7.627 7.651s3.406 7.651 7.627 7.651c4.22 0 7.626-3.434 7.626-7.651s-3.406-7.651-7.626-7.651zm-3.467 7.651c0-1.936 1.56-3.491 3.467-3.491 1.906 0 3.466 1.555 3.466 3.491s-1.56 3.491-3.466 3.491c-1.906 0-3.467-1.555-3.467-3.491z"
                                 data-original="#000000" />
                              <path
                                 d="M44.342 2.88a2.08 2.08 0 0 0-2.005 1.526l-.75 2.711a14.256 14.256 0 0 0-4.138 2.402l-2.709-.703a2.08 2.08 0 0 0-2.325.978l-2.218 3.86a2.08 2.08 0 0 0 .316 2.49l1.964 2.01a14.478 14.478 0 0 0 0 4.813l-1.965 2.009a2.08 2.08 0 0 0-.315 2.49l2.218 3.86a2.08 2.08 0 0 0 2.325.978l2.709-.702a14.256 14.256 0 0 0 4.139 2.402l.749 2.71a2.08 2.08 0 0 0 2.005 1.526h4.436a2.08 2.08 0 0 0 2.005-1.526l.75-2.71a14.257 14.257 0 0 0 4.14-2.402l2.706.702a2.08 2.08 0 0 0 2.326-.978l2.218-3.86a2.08 2.08 0 0 0-.316-2.49l-1.964-2.01a14.477 14.477 0 0 0 0-4.813l1.965-2.009a2.08 2.08 0 0 0 .315-2.49l-2.219-3.86a2.08 2.08 0 0 0-2.324-.978l-2.709.702a14.256 14.256 0 0 0-4.138-2.402l-.749-2.71a2.08 2.08 0 0 0-2.007-1.526zm.956 6.421.626-2.261h1.271l.627 2.261a2.08 2.08 0 0 0 1.446 1.45 10.098 10.098 0 0 1 4.38 2.544 2.08 2.08 0 0 0 1.983.532l2.257-.585.644 1.12-1.64 1.678a2.08 2.08 0 0 0-.528 1.971c.208.812.32 1.666.32 2.549s-.112 1.737-.32 2.549a2.08 2.08 0 0 0 .527 1.97l1.641 1.68-.644 1.12-2.257-.586a2.08 2.08 0 0 0-1.982.532 10.096 10.096 0 0 1-4.38 2.544 2.08 2.08 0 0 0-1.447 1.45l-.628 2.261h-1.272l-.624-2.261a2.08 2.08 0 0 0-1.447-1.45 10.097 10.097 0 0 1-4.38-2.544 2.08 2.08 0 0 0-1.983-.532l-2.257.585-.645-1.12 1.642-1.678a2.08 2.08 0 0 0 .527-1.971c-.208-.812-.32-1.666-.32-2.549s.112-1.737.32-2.548a2.08 2.08 0 0 0-.527-1.972l-1.642-1.678.645-1.12 2.257.585a2.08 2.08 0 0 0 1.982-.532 10.097 10.097 0 0 1 4.38-2.544 2.08 2.08 0 0 0 1.447-1.45z"
                                 data-original="#000000" />
                           </g>
                        </svg>
                        <span>Notification Settings</span>
                     </a>
                  </li>
                  <li>
                     <a href="javascript:void(0)"
                        class="menu-item text-gray-800 text-sm flex items-center cursor-pointer hover:bg-secondary rounded-md px-3 py-3 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-4"
                           viewBox="0 0 32 32">
                           <path fill-rule="evenodd"
                              d="M20.063 7.94a3.96 3.96 0 0 1-5.342 3.713l2.362 2.815a6.601 6.601 0 1 0-7.24-8.627l2.364 2.818a3.96 3.96 0 1 1 7.856-.718zm-7.885 9.415L3.718 7.35A1.32 1.32 0 1 1 5.73 5.645l20.055 23.712a1.32 1.32 0 1 1-2.015 1.705l-2.03-2.401a8.886 8.886 0 0 1-2.645.4H13.11a8.886 8.886 0 0 1-8.886-8.886c0-.518.272-.993.747-1.198 1.095-.47 3.427-1.27 7.208-1.622zm7.634 9.025c-.235.026-.474.04-.716.04H13.11a6.248 6.248 0 0 1-6.184-5.362c1.35-.454 3.751-1.047 7.37-1.2zm-.347-9.072 2.476 2.95a21.397 21.397 0 0 1 3.34.8 6.204 6.204 0 0 1-.78 2.25l1.77 2.111a8.845 8.845 0 0 0 1.712-5.244c0-.518-.272-.993-.747-1.198-1.149-.493-3.657-1.349-7.771-1.67z"
                              clip-rule="evenodd" data-original="#000000" />
                        </svg>
                        <span>Account Deactivation</span>
                     </a>
                  </li>
               </ul>

            </div>
         </div>
      </nav>

      <button id="toggle-sidebar"
         class='lg:hidden w-8 h-8 z-[100] fixed top-[36px] left-[10px] cursor-pointer bg-[#007bff] flex items-center justify-center rounded-full outline-none transition-all duration-500'>
         <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" class="w-3 h-3" viewBox="0 0 55.752 55.752">
            <path
               d="M43.006 23.916a5.36 5.36 0 0 0-.912-.727L20.485 1.581a5.4 5.4 0 0 0-7.637 7.638l18.611 18.609-18.705 18.707a5.398 5.398 0 1 0 7.634 7.635l21.706-21.703a5.35 5.35 0 0 0 .912-.727 5.373 5.373 0 0 0 1.574-3.912 5.363 5.363 0 0 0-1.574-3.912z"
               data-original="#000000" />
         </svg>
      </button>

      <section class="main-content w-full px-8">
         <header class='z-50 bg-[#f7f6f9] sticky top-0 pt-8'>
            <div class='flex flex-wrap items-center w-full relative tracking-wide'>
               <div class='flex items-center gap-y-6 max-sm:flex-col z-50 w-full pb-2'>
                  <div
                     class='flex items-center gap-4 w-full px-6 bg-white shadow-sm min-h-[48px] sm:mr-20 rounded-md outline-none border-none'>
                     <input type='text' placeholder='Search something...'
                        class='w-full text-sm bg-transparent rounded outline-none' />
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904"
                        class="w-4 cursor-pointer fill-gray-400 ml-auto">
                        <path
                           d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
                        </path>
                     </svg>
                  </div>

                  <div class="flex items-center justify-end gap-6 ml-auto">
                     <div class='flex items-center space-x-6'>
                        <div
                           class="w-9 h-[38px] flex items-center justify-center rounded-xl relative bg-blue-200 cursor-pointer">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] fill-blue-600"
                              viewBox="0 0 371.263 371.263">
                              <path
                                 d="M305.402 234.794v-70.54c0-52.396-33.533-98.085-79.702-115.151.539-2.695.838-5.449.838-8.204C226.539 18.324 208.215 0 185.64 0s-40.899 18.324-40.899 40.899c0 2.695.299 5.389.778 7.964-15.868 5.629-30.539 14.551-43.054 26.647-23.593 22.755-36.587 53.354-36.587 86.169v73.115c0 2.575-2.096 4.731-4.731 4.731-22.096 0-40.959 16.647-42.995 37.845-1.138 11.797 2.755 23.533 10.719 32.276 7.904 8.683 19.222 13.713 31.018 13.713h72.217c2.994 26.887 25.869 47.905 53.534 47.905s50.54-21.018 53.534-47.905h72.217c11.797 0 23.114-5.03 31.018-13.713 7.904-8.743 11.797-20.479 10.719-32.276-2.036-21.198-20.958-37.845-42.995-37.845a4.704 4.704 0 0 1-4.731-4.731zM185.64 23.952c9.341 0 16.946 7.605 16.946 16.946 0 .778-.12 1.497-.24 2.275-4.072-.599-8.204-1.018-12.336-1.138-7.126-.24-14.132.24-21.078 1.198-.12-.778-.24-1.497-.24-2.275.002-9.401 7.607-17.006 16.948-17.006zm0 323.358c-14.431 0-26.527-10.3-29.342-23.952h58.683c-2.813 13.653-14.909 23.952-29.341 23.952zm143.655-67.665c.479 5.15-1.138 10.12-4.551 13.892-3.533 3.773-8.204 5.868-13.353 5.868H59.89c-5.15 0-9.82-2.096-13.294-5.868-3.473-3.772-5.09-8.743-4.611-13.892.838-9.042 9.282-16.168 19.162-16.168 15.809 0 28.683-12.874 28.683-28.683v-73.115c0-26.228 10.419-50.719 29.282-68.923 18.024-17.425 41.498-26.887 66.528-26.887 1.198 0 2.335 0 3.533.06 50.839 1.796 92.277 45.929 92.277 98.325v70.54c0 15.809 12.874 28.683 28.683 28.683 9.88 0 18.264 7.126 19.162 16.168z"
                                 data-original="#000000" />
                           </svg>
                           <span
                              class="absolute w-5 h-5 flex items-center justify-center -right-2.5 -top-2.5 text-[10px] rounded-full bg-blue-600 text-white">21</span>
                        </div>
                     </div>

                     <div class="w-1 h-10 border-l border-gray-400">
                     </div>
                     <div class="dropdown-menu relative flex shrink-0 group">
                        <div class="flex items-center gap-4">
                           <p class="text-gray-500 text-sm"><?= $_SESSION['nama_penyelenggara']; ?></p>
                           <img src="https://readymadeui.com/team-1.webp" alt="profile-pic"
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

                              <a href="javascript:void(0)"
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
                              <a href="javascript:void(0)"
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
                              <a href="javascript:void(0)"
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
               <div
                  class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] p-6 w-full max-w-sm rounded-lg overflow-hidden">
                  <div class="inline-block bg-[#edf2f7] rounded-lg py-2 px-3">
                     <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 511.999 511.999">
                        <path fill="#06d"
                           d="m38.563 418.862 22.51 39.042c4.677 8.219 11.41 14.682 19.319 19.388l80.744-57.248.147-82.19-80.577-36.303L0 337.565c-.016 9.09 2.313 18.185 6.991 26.404z"
                           data-original="#0066dd" />
                        <path fill="#00ad3c"
                           d="m256.293 173.808 4.212-107.064-84.604-32.663c-7.926 4.678-14.682 11.117-19.389 19.319L7.085 311.186C2.379 319.389.016 328.475 0 337.565l161.283.288z"
                           data-original="#00ad3c" />
                        <path fill="#00831e"
                           d="m256.293 173.808 77.503-41.694 3.387-97.745c-7.909-4.706-16.996-7.068-26.379-7.085l-108.499-.194c-9.384-.017-18.479 2.606-26.405 6.991z"
                           data-original="#00831e" />
                        <path fill="#0084ff"
                           d="m350.716 338.192-189.434-.338-80.89 139.438c7.909 4.706 16.996 7.068 26.379 7.085l297.933.532c9.384.017 18.479-2.606 26.405-6.991l.314-93.66z"
                           data-original="#0084ff" />
                        <path fill="#ff4131"
                           d="M431.109 477.919c7.926-4.678 14.682-11.117 19.388-19.319l9.413-16.111 45.005-77.629c4.706-8.202 7.069-17.288 7.085-26.379l-93.221-49.051-67.768 48.764z"
                           data-original="#ff4131" />
                        <path fill="#ffba00"
                           d="m430.756 182.917-74.253-129.16c-4.677-8.22-11.41-14.683-19.32-19.389l-80.891 139.439 94.423 164.385 160.99.288c.016-9.09-2.314-18.185-6.991-26.405z"
                           data-original="#ffba00" />
                     </svg>
                  </div>

                  <div class="mt-4">
                     <h3 class="text-xl font-bold text-gray-800">Heading</h3>
                     <p class="mt-2 text-sm text-gray-800">Lorem ipsum dolor sit amet, consectetur.</p>
                  </div>

                  <div class="mt-6">
                     <div class="flex mb-2">
                        <p class="text-sm text-gray-800 flex-1">25 GB</p>
                        <p class="text-sm text-gray-800">50 GB</p>
                     </div>
                     <div class="bg-gray-300 rounded-full w-full h-2.5">
                        <div class="w-1/2 h-full rounded-full bg-blue-600 flex items-center">
                        </div>
                     </div>
                  </div>
               </div>
               <div
                  class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] p-6 w-full max-w-sm rounded-lg overflow-hidden">
                  <div class="inline-block bg-[#edf2f7] rounded-lg py-2 px-3">
                     <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 511.999 511.999">
                        <path fill="#06d"
                           d="m38.563 418.862 22.51 39.042c4.677 8.219 11.41 14.682 19.319 19.388l80.744-57.248.147-82.19-80.577-36.303L0 337.565c-.016 9.09 2.313 18.185 6.991 26.404z"
                           data-original="#0066dd" />
                        <path fill="#00ad3c"
                           d="m256.293 173.808 4.212-107.064-84.604-32.663c-7.926 4.678-14.682 11.117-19.389 19.319L7.085 311.186C2.379 319.389.016 328.475 0 337.565l161.283.288z"
                           data-original="#00ad3c" />
                        <path fill="#00831e"
                           d="m256.293 173.808 77.503-41.694 3.387-97.745c-7.909-4.706-16.996-7.068-26.379-7.085l-108.499-.194c-9.384-.017-18.479 2.606-26.405 6.991z"
                           data-original="#00831e" />
                        <path fill="#0084ff"
                           d="m350.716 338.192-189.434-.338-80.89 139.438c7.909 4.706 16.996 7.068 26.379 7.085l297.933.532c9.384.017 18.479-2.606 26.405-6.991l.314-93.66z"
                           data-original="#0084ff" />
                        <path fill="#ff4131"
                           d="M431.109 477.919c7.926-4.678 14.682-11.117 19.388-19.319l9.413-16.111 45.005-77.629c4.706-8.202 7.069-17.288 7.085-26.379l-93.221-49.051-67.768 48.764z"
                           data-original="#ff4131" />
                        <path fill="#ffba00"
                           d="m430.756 182.917-74.253-129.16c-4.677-8.22-11.41-14.683-19.32-19.389l-80.891 139.439 94.423 164.385 160.99.288c.016-9.09-2.314-18.185-6.991-26.405z"
                           data-original="#ffba00" />
                     </svg>
                  </div>

                  <div class="mt-4">
                     <h3 class="text-xl font-bold text-gray-800">Heading</h3>
                     <p class="mt-2 text-sm text-gray-800">Lorem ipsum dolor sit amet, consectetur.</p>
                  </div>

                  <div class="mt-6">
                     <div class="flex mb-2">
                        <p class="text-sm text-gray-800 flex-1">25 GB</p>
                        <p class="text-sm text-gray-800">50 GB</p>
                     </div>
                     <div class="bg-gray-300 rounded-full w-full h-2.5">
                        <div class="w-1/2 h-full rounded-full bg-blue-600 flex items-center">
                        </div>
                     </div>
                  </div>
               </div>
               <div
                  class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] p-6 w-full max-w-sm rounded-lg overflow-hidden">
                  <div class="inline-block bg-[#edf2f7] rounded-lg py-2 px-3">
                     <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 511.999 511.999">
                        <path fill="#06d"
                           d="m38.563 418.862 22.51 39.042c4.677 8.219 11.41 14.682 19.319 19.388l80.744-57.248.147-82.19-80.577-36.303L0 337.565c-.016 9.09 2.313 18.185 6.991 26.404z"
                           data-original="#0066dd" />
                        <path fill="#00ad3c"
                           d="m256.293 173.808 4.212-107.064-84.604-32.663c-7.926 4.678-14.682 11.117-19.389 19.319L7.085 311.186C2.379 319.389.016 328.475 0 337.565l161.283.288z"
                           data-original="#00ad3c" />
                        <path fill="#00831e"
                           d="m256.293 173.808 77.503-41.694 3.387-97.745c-7.909-4.706-16.996-7.068-26.379-7.085l-108.499-.194c-9.384-.017-18.479 2.606-26.405 6.991z"
                           data-original="#00831e" />
                        <path fill="#0084ff"
                           d="m350.716 338.192-189.434-.338-80.89 139.438c7.909 4.706 16.996 7.068 26.379 7.085l297.933.532c9.384.017 18.479-2.606 26.405-6.991l.314-93.66z"
                           data-original="#0084ff" />
                        <path fill="#ff4131"
                           d="M431.109 477.919c7.926-4.678 14.682-11.117 19.388-19.319l9.413-16.111 45.005-77.629c4.706-8.202 7.069-17.288 7.085-26.379l-93.221-49.051-67.768 48.764z"
                           data-original="#ff4131" />
                        <path fill="#ffba00"
                           d="m430.756 182.917-74.253-129.16c-4.677-8.22-11.41-14.683-19.32-19.389l-80.891 139.439 94.423 164.385 160.99.288c.016-9.09-2.314-18.185-6.991-26.405z"
                           data-original="#ffba00" />
                     </svg>
                  </div>

                  <div class="mt-4">
                     <h3 class="text-xl font-bold text-gray-800">Heading</h3>
                     <p class="mt-2 text-sm text-gray-800">Lorem ipsum dolor sit amet, consectetur.</p>
                  </div>

                  <div class="mt-6">
                     <div class="flex mb-2">
                        <p class="text-sm text-gray-800 flex-1">25 GB</p>
                        <p class="text-sm text-gray-800">50 GB</p>
                     </div>
                     <div class="bg-gray-300 rounded-full w-full h-2.5">
                        <div class="w-1/2 h-full rounded-full bg-blue-600 flex items-center">
                        </div>
                     </div>
                  </div>
               </div>
               <div
                  class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] p-6 w-full max-w-sm rounded-lg overflow-hidden">
                  <div class="inline-block bg-[#edf2f7] rounded-lg py-2 px-3">
                     <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 511.999 511.999">
                        <path fill="#06d"
                           d="m38.563 418.862 22.51 39.042c4.677 8.219 11.41 14.682 19.319 19.388l80.744-57.248.147-82.19-80.577-36.303L0 337.565c-.016 9.09 2.313 18.185 6.991 26.404z"
                           data-original="#0066dd" />
                        <path fill="#00ad3c"
                           d="m256.293 173.808 4.212-107.064-84.604-32.663c-7.926 4.678-14.682 11.117-19.389 19.319L7.085 311.186C2.379 319.389.016 328.475 0 337.565l161.283.288z"
                           data-original="#00ad3c" />
                        <path fill="#00831e"
                           d="m256.293 173.808 77.503-41.694 3.387-97.745c-7.909-4.706-16.996-7.068-26.379-7.085l-108.499-.194c-9.384-.017-18.479 2.606-26.405 6.991z"
                           data-original="#00831e" />
                        <path fill="#0084ff"
                           d="m350.716 338.192-189.434-.338-80.89 139.438c7.909 4.706 16.996 7.068 26.379 7.085l297.933.532c9.384.017 18.479-2.606 26.405-6.991l.314-93.66z"
                           data-original="#0084ff" />
                        <path fill="#ff4131"
                           d="M431.109 477.919c7.926-4.678 14.682-11.117 19.388-19.319l9.413-16.111 45.005-77.629c4.706-8.202 7.069-17.288 7.085-26.379l-93.221-49.051-67.768 48.764z"
                           data-original="#ff4131" />
                        <path fill="#ffba00"
                           d="m430.756 182.917-74.253-129.16c-4.677-8.22-11.41-14.683-19.32-19.389l-80.891 139.439 94.423 164.385 160.99.288c.016-9.09-2.314-18.185-6.991-26.405z"
                           data-original="#ffba00" />
                     </svg>
                  </div>

                  <div class="mt-4">
                     <h3 class="text-xl font-bold text-gray-800">Heading</h3>
                     <p class="mt-2 text-sm text-gray-800">Lorem ipsum dolor sit amet, consectetur.</p>
                  </div>

                  <div class="mt-6">
                     <div class="flex mb-2">
                        <p class="text-sm text-gray-800 flex-1">25 GB</p>
                        <p class="text-sm text-gray-800">50 GB</p>
                     </div>
                     <div class="bg-gray-300 rounded-full w-full h-2.5">
                        <div class="w-1/2 h-full rounded-full bg-blue-600 flex items-center">
                        </div>
                     </div>
                  </div>
               </div>
               <div>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>

<?php include("includes/footer.php") ?>