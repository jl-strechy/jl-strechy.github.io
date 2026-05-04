/* =========================================================
   JL STŘECHY – main.js
   Cesta: JL/js/main.js
   Funkce: dark/light, custom cursor, jemný parallax
   ========================================================= */

(function () {
  const body = document.body;

  /* ------------------------------
     DARK / LIGHT MODE
  ------------------------------ */
  const themeButton = document.querySelector('.toggle-theme');

  const savedTheme = localStorage.getItem('jl-theme');
  if (savedTheme === 'dark') {
    body.classList.add('dark');
  }

  if (themeButton) {
    themeButton.addEventListener('click', () => {
      body.classList.toggle('dark');
      localStorage.setItem('jl-theme', body.classList.contains('dark') ? 'dark' : 'light');
    });
  }

  /* ------------------------------
     CUSTOM CURSOR
  ------------------------------ */
  const dot = document.querySelector('.cursor-dot');
  const ring = document.querySelector('.cursor-ring');
  const supportsFinePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

  if (dot && ring && supportsFinePointer) {
    let mouseX = 0;
    let mouseY = 0;
    let ringX = 0;
    let ringY = 0;

    window.addEventListener('mousemove', (event) => {
      mouseX = event.clientX;
      mouseY = event.clientY;

      dot.style.left = `${mouseX}px`;
      dot.style.top = `${mouseY}px`;
    });

    function cursorLoop() {
      ringX += (mouseX - ringX) * 0.16;
      ringY += (mouseY - ringY) * 0.16;

      ring.style.left = `${ringX}px`;
      ring.style.top = `${ringY}px`;

      requestAnimationFrame(cursorLoop);
    }

    cursorLoop();

    const interactiveElements = document.querySelectorAll('a, button, .btn, .badge, .fx-panel, .service-item, input, textarea');

    interactiveElements.forEach((element) => {
      element.addEventListener('mouseenter', () => body.classList.add('cursor-active'));
      element.addEventListener('mouseleave', () => body.classList.remove('cursor-active'));
    });
  }

  /* ------------------------------
     PARALLAX HERO IMAGE
  ------------------------------ */
  const heroImage = document.querySelector('.intro-img');

  if (heroImage && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    window.addEventListener(
      'scroll',
      () => {
        const scrollY = window.scrollY;
        heroImage.style.transform = `translateY(${scrollY * 0.035}px)`;
      },
      { passive: true }
    );
  }
})();
