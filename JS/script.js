// ! ========================== ALL THE SCRIPT FOR BACKEND AND FRONTEND =======================
const navItems = document.querySelector(".nav_items");
const openNavBtn = document.querySelector("#open_nav-btn");
const closeNavBtn = document.querySelector("#close_nav-btn");

const openNav = () => {
  navItems.style.display = "flex";
  openNavBtn.style.display = "none";
  closeNavBtn.style.display = "inline-block";
};
openNavBtn.addEventListener("click", openNav);

const closeNav = () => {
  navItems.style.display = "none";
  openNavBtn.style.display = "inline-block";
  closeNavBtn.style.display = "none";
};
closeNavBtn.addEventListener("click", closeNav);

// ! WORD COUNT FOR MESSAGE TEXTAREA
document.addEventListener("DOMContentLoaded", function () {
  const textarea = document.getElementById("message");
  const wordCount = document.getElementById("wordCount");

  if (textarea && wordCount) {
    textarea.addEventListener("input", function () {
      const currentLength = textarea.value.length;
      wordCount.textContent = `${currentLength}/100`;

      if (currentLength === 0) {
        wordCount.style.color = "#ccc"; // * Default color
      } else if (currentLength < 100) {
        wordCount.style.color = "red"; // ! Red color when typing
      } else {
        wordCount.style.color = "green"; // * Green color when limit is reached
      }
    });
  }
});

// ? SIDEBAR HIDE SHOW

const sidebar = document.querySelector("aside");
const showSidebarBtn = document.querySelector("#show_sidebar-btn");
const hideSidebarBtn = document.querySelector("#hide_sidebar-btn");

const showSidebar = () => {
  sidebar.style.left = 0;
  showSidebarBtn.style.display = "none";
  hideSidebarBtn.style.display = "inline-block";
};
showSidebarBtn.addEventListener("click", showSidebar);

const hideSidebar = () => {
  sidebar.style.left = "-100%";
  showSidebarBtn.style.display = "inline-block";
  hideSidebarBtn.style.display = "none";
};
hideSidebarBtn.addEventListener("click", hideSidebar);
