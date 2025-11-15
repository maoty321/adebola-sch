<!-- script -->
<script src="https://unpkg.com/scrollreveal"></script>
<script>
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
  delay: 450
});
sr.reveal('.about-text', {
  origin: 'bottom',
  delay: 550
});
sr.reveal('.about-us .btn', {
  origin: 'left',
  delay: 750
});
sr.reveal('.card', {
  origin: 'left',
  delay: 150
});
sr.reveal('.card-title', {
  origin: 'bottom',
  delay: 200
});
sr.reveal('.card-text', {
  origin: 'bottom',
  delay: 700
});
sr.reveal('.addmission-header', {
  origin: 'top',
  delay: 250
});
sr.reveal('.add-text', {
  origin: 'left',
  delay: 400
});
sr.reveal('.card .btn', {
  origin: 'bottom',
  delay: 900
});
sr.reveal('.card .card-footer small', {
  origin: 'right',
  delay: 1300
});
sr.reveal('.addmission-body', {
  origin: 'bottom',
  delay: 500
});


</script>
<script src="./main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" ></script>