const sidebar = document.querySelector(".sidebar");
// Get the window width
const mediaQuery = window.matchMedia("(max-width: 1200px)");

function openSidebar() {
  if (mediaQuery.matches) {
    return;
  }
  sidebar.style.width = null;
  sidebar.classList.add("open");
}
function closeSidebar() {
  if (mediaQuery.matches) {
    return;
  }
  sidebar.classList.remove("open");
}

active();
function active() {
  let navItems = document.querySelectorAll(".nav-item");
  navItems.forEach((navItem) => {
    navItem.addEventListener("click", () => {
      navItems.forEach((navItem) => {
        navItem.classList.remove("active");
      });
      navItem.classList.add("active");
    });
  });
}

document.querySelector("#bar-menu").addEventListener("click", () => {
  sidebar.style.width = "100%";
  sidebar.style.left = "0";
  sidebar.style.display = "block"
  sidebar.style.opacity = "1"
  sidebar.classList.add("open");
});

document.querySelector("#close-menu").addEventListener("click", () => {
  sidebar.style.width = "0%";
  sidebar.style.left = "-100px";
  
});

function handleMediaChange(event) {
  if (event.matches) {
    sidebar.style.opacity = "0";
    sidebar.style.width = "0%";
    sidebar.style.left = "-100p";
    sidebar.classList.add("open");

  } else {
    console.log("width > 1200px");
    sidebar.style.width = "120px";
    sidebar.style.left = "0";
    sidebar.style.opacity = "1";
  }
}

mediaQuery.addEventListener('change', handleMediaChange);
