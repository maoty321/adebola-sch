const menuBar = document.getElementById("menu-bar");
const sidebar = document.getElementById("side-bar");


menuBar.addEventListener("click", (event) => {
  event.stopPropagation();
  console.log('hell')
  sidebar.classList.toggle("show");
});

// hide sidebar when clicking body
document.body.addEventListener("click", () => {
  sidebar.classList.remove("show");
});

// prevent sidebar clicks from closing it
sidebar.addEventListener("click", (event) => {
  event.stopPropagation();
});


const btnclciks = document.getElementById('btnclcik')
const humb = document.getElementById('humb')

btnclciks.addEventListener('click', () => {
    if (humb.style.display === 'block') {
        humb.style.display = 'none';
    } else {
        humb.style.display = 'block';
    }
});
