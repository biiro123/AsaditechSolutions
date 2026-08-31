// assets/scripts.js
document.addEventListener('DOMContentLoaded', () => {
  // simple smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      e.preventDefault();
      const id = a.getAttribute('href');
      if (id.length > 1) {
        document.querySelector(id).scrollIntoView({behavior:'smooth'});
      }
    });
  });
});
