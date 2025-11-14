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










const hamburger = document.getElementById('hamburger');
// const navLinkss = document.getElementById('navLinks');

hamburger.addEventListener('click', () => {
  navLinks.classList.toggle('open');
});
