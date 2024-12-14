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

toggleOpen?.addEventListener("click", handleClick);
toggleClose?.addEventListener("click", handleClick);

// Preview foto saat diedit
function preview(event) {
   fotoMahasiswa.src = URL.createObjectURL(event.target.files[0]);
}

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
