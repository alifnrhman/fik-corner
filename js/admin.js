// Admin Sidebar
document.addEventListener("DOMContentLoaded", () => {
   // Sidebar
   const currentPath = window.location.pathname;
   const menuItems = document.querySelectorAll(".menu-item");

   menuItems.forEach((item) => {
      const href = item.getAttribute("href");

      if (href && (currentPath === `/${href}` || currentPath.includes(href))) {
         item.classList.remove("text-gray-800");
         item.classList.add("text-primary", "font-semibold", "bg-secondary");
      } else {
         item.classList.add("text-gray-800");
         item.classList.remove("text-primary", "font-semibold", "bg-secondary");
      }
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
