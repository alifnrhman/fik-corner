// Toggle password visibility
function togglePassword() {
   var x = document.getElementById("password");
   if (x.type === "password") {
      x.type = "text";
   } else {
      x.type = "password";
   }
}

// Navbar responsive button
var toggleOpen = document.getElementById("toggleOpen");
var toggleClose = document.getElementById("toggleClose");
var collapseMenu = document.getElementById("collapseMenu");

function handleClick() {
   if (collapseMenu.style.display === "block") {
      collapseMenu.style.display = "none";
   } else {
      collapseMenu.style.display = "block";
   }
}
toggleOpen.addEventListener("click", handleClick);
toggleClose.addEventListener("click", handleClick);

// Admin dashboard
document.addEventListener("DOMContentLoaded", () => {
   // Sidebar
   document.querySelectorAll("#sidebar ul > li > .menu-item").forEach((item) => {
      item.addEventListener("click", () => {
         // Remove classes from all menu items
         document.querySelectorAll("#sidebar ul > li > .menu-item").forEach((otherItem) => {
            otherItem.classList.remove("bg-[#d9f3ea]", "text-green-700");
            otherItem.classList.add("text-gray-800");
         });

         // Add classes to the clicked item
         item.classList.add("bg-[#d9f3ea]", "text-green-700");
         item.classList.remove("text-gray-800");
      });
   });

   let sidebarToggleBtn = document.getElementById("toggle-sidebar");
   let sidebarCollapseMenu = document.getElementById("sidebar-collapse-menu");

   sidebarToggleBtn.addEventListener("click", () => {
      if (!sidebarCollapseMenu.classList.contains("open")) {
         sidebarCollapseMenu.classList.add("open");
         sidebarCollapseMenu.style.cssText = "width: 250px; visibility: visible; opacity: 1;";
         sidebarToggleBtn.style.cssText = "left: 236px;";
      } else {
         sidebarCollapseMenu.classList.remove("open");
         sidebarCollapseMenu.style.cssText = "width: 32px; visibility: hidden; opacity: 0;";
         sidebarToggleBtn.style.cssText = "left: 10px;";
      }
   });
});

// Enable edit di form
function edit() {
   var input = document.getElementById("nomor_telepon");

   if (input.disabled == true) {
      input.disabled = false;
      input.focus();
      input.classList.remove("bg-gray-100");
      input.classList.remove("text-gray-500");
      input.classList.add("bg-transparent");
      input.classList.add("border");
      input.classList.add("border-gray-100");
      input.classList.add("text-gray-800");
   }
}

// Filter kegiatan saya
document.addEventListener("DOMContentLoaded", function () {
   let tabs = document.querySelectorAll(".tab");
   let contents = document.querySelectorAll(".tab-content");

   tabs.forEach(function (tab) {
      tab.addEventListener("click", function (e) {
         let targetId = tab.id.replace("Tab", "Content");

         // Hide all content divs
         contents.forEach(function (content) {
            content.classList.add("hidden");
         });

         // Remove active class from all tabs
         tabs.forEach(function (tab) {
            tab.classList.remove("text-white", "font-bold", "bg-purple-600", "hover:bg-gray-50");
            tab.classList.add("text-gray-600", "font-semibold", "bg-white", "hover:bg-gray-50");
         });

         // Show the target content
         document.getElementById(targetId).classList.remove("hidden");

         // Add active class to the clicked tab
         tab.classList.add("text-white", "font-bold", "bg-primary", "hover:bg-gray-50");
         tab.classList.remove("text-gray-600", "font-semibold", "bg-white", "hover:bg-gray-50");
      });
   });
});

// Admin Sidebar
document.addEventListener("DOMContentLoaded", () => {
   const currentPath = window.location.pathname;
   const menuItems = document.querySelectorAll(".menu-item");

   menuItems.forEach((item) => {
      const href = item.getAttribute("href");
      if (currentPath.includes(href)) {
         item.classList.remove("text-gray-800");
         item.classList.add("text-primary");
         item.classList.add("font-semibold");
         item.classList.add("bg-secondary");
      } else {
         item.classList.add("text-gray-800");
         item.classList.remove("text-primary");
         item.classList.remove("font-semibold");
         item.classList.remove("bg-secondary");
      }
   });
});
