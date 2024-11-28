function togglePassword() {
   var x = document.getElementById("password");
   if (x.type === "password") {
      x.type = "text";
   } else {
      x.type = "password";
   }
}

// Navbar Responsive Button
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
