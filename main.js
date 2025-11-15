const menuBar = document.getElementById('menu-btn')
const navLinks = document.getElementById('nav-links')
const menuBarIcon = menuBar.querySelector('i')

menuBar.addEventListener('click', function(e) {
    navLinks.classList.toggle('open')
    console.log('hello')
    const isOpen = navLinks.classList.contains('open')

    menuBarIcon.setAttribute("class", isOpen ? 'ri-close-line' : 'ri-menu-line')
})

navLinks.addEventListener('click', (e)=> {
    navLinks.classList.remove('open')
    menuBarIcon.setAttribute('class', 'ri-menu-line');
})






// about-scroll.js

// Initialize ScrollReveal
const sr = ScrollReveal({
  distance: '50px',
  duration: 1000,
  delay: 200,
  reset: true // Set to false if you don’t want animations to repeat
});

// Reveal About Us Section Elements
sr.reveal('.about-content', {
  origin: 'left'
});

sr.reveal('.about-image', {
  origin: 'right',
  delay: 300
});

sr.reveal('.header-title', {
  origin: 'top',
  delay: 150
});


