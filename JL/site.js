(function () {
  const themeButtons = document.querySelectorAll('.toggle-theme');
  const savedTheme = localStorage.getItem('jl-theme');

  if (savedTheme === 'dark') {
    document.body.classList.add('dark');
  }

  themeButtons.forEach((button) => {
    button.addEventListener('click', () => {
      document.body.classList.toggle('dark');
      localStorage.setItem('jl-theme', document.body.classList.contains('dark') ? 'dark' : 'light');
    });
  });

  document.querySelectorAll('[data-static-form]').forEach((form) => {
    form.addEventListener('submit', (event) => {
      event.preventDefault();
      const status = form.querySelector('.form-status');
      if (status) {
        status.textContent = 'Poptávka je připravená jako statický návrh. Pro ostré odesílání připojíme hostingový formulář nebo e-mailovou službu.';
      }
    });
  });

  document.querySelectorAll('[data-quote-form]').forEach((form) => {
    const summary = form.querySelector('[data-quote-summary]');
    const fields = ['type', 'location', 'date', 'scope'];

    function updateSummary() {
      if (!summary) return;
      const data = new FormData(form);
      const parts = fields
        .map((name) => String(data.get(name) || '').trim())
        .filter(Boolean);
      summary.textContent = parts.length
        ? `Souhrn: ${parts.join(' · ')}`
        : 'Vyberte typ zakázky a doplňte základní údaje.';
    }

    form.addEventListener('input', updateSummary);
    form.addEventListener('change', updateSummary);
    updateSummary();
  });

  const container = document.querySelector('.container');
  if (container && !document.querySelector('.footer')) {
    container.insertAdjacentHTML('beforeend', `
      <footer class="footer">
        <div class="footer-mask"></div>
        <div class="footer-card">
          <div class="footer-main">
            <div class="footer-brand">
              <img class="dki-logo" src="images/social_footer/footerikona.png" alt="JL Střechy">
              <div>
                <strong>JL STŘECHY</strong>
                <span>Tesařství, klempířství a střešní realizace.</span>
              </div>
            </div>
            <nav class="footer-nav" aria-label="Patička">
              <a href="o-nas.html">O nás</a>
              <a href="sluzby.html">Služby</a>
              <a href="pro-firmy.html">Pro firmy</a>
              <a href="galerie.html">Galerie</a>
            </nav>
            <div class="footer-contact">
              <a href="mailto:info@jlstrechy.cz">info@jlstrechy.cz</a>
              <a href="tel:+420775189574">+420 775 189 574</a>
              <span>Ústecký kraj a okolí</span>
            </div>
          </div>
          <div class="footer-bottom">
            <div class="social-icons">
              <a href="https://www.facebook.com/" aria-label="Facebook"><img src="images/social_footer/facebook-ikon.jpeg" alt=""></a>
              <a href="https://www.instagram.com/" aria-label="Instagram"><img src="images/social_footer/pintress-ikon.jpeg" alt=""></a>
              <a href="https://wa.me/420775189574" aria-label="WhatsApp"><img src="images/social_footer/whatsapp-ikon.jpeg" alt=""></a>
              <a href="tel:+420775189574" aria-label="Telefon"><img src="images/social_footer/call-ikon.jpeg" alt=""></a>
            </div>
            <p>© 2026 JL Střechy. Web design by David Kozák International s.r.o. + GPT.</p>
          </div>
        </div>
      </footer>
    `);
  }

  document.querySelectorAll('.footer').forEach((footer) => {
    const mask = footer.querySelector('.footer-mask');
    if (!mask) return;

    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let tx = footer.clientWidth / 2;
    let ty = footer.clientHeight;
    let cx = tx;
    let cy = ty;

    function setPosition(x, y) {
      mask.style.setProperty('--mx', `${x}px`);
      mask.style.setProperty('--my', `${y}px`);
      footer.style.setProperty('--mx', `${x}px`);
      footer.style.setProperty('--my', `${y}px`);
    }

    footer.addEventListener('mousemove', (event) => {
      const rect = footer.getBoundingClientRect();
      tx = event.clientX - rect.left;
      ty = event.clientY - rect.top;
      if (prefersReduced) setPosition(tx, ty);
    });

    footer.addEventListener('mouseleave', () => {
      tx = footer.clientWidth / 2;
      ty = footer.clientHeight;
    });

    function loop() {
      if (prefersReduced) return;
      cx += (tx - cx) * 0.12;
      cy += (ty - cy) * 0.12;
      setPosition(cx, cy);
      requestAnimationFrame(loop);
    }

    loop();
  });

  const projectGrid = document.querySelector('[data-project-grid]');
  if (projectGrid && window.JL_PROJECTS) {
    projectGrid.innerHTML = window.JL_PROJECTS.map((project, index) => `
      <a class="content-card project-card" href="projekt.html?projekt=${encodeURIComponent(project.slug)}" style="--delay:${Math.min(index, 8) * 55}ms">
        <img src="${project.cover}" alt="${project.title}">
        <span class="project-tag">${project.images.length} fotek</span>
        <strong>${project.title}</strong>
        <em>Detail realizace</em>
      </a>
    `).join('');
  }

  const galleryFilters = document.querySelector('[data-gallery-filters]');
  if (galleryFilters && projectGrid) {
    galleryFilters.addEventListener('click', (event) => {
      const button = event.target.closest('button[data-filter]');
      if (!button) return;
      const filter = button.dataset.filter;
      galleryFilters.querySelectorAll('button').forEach((item) => item.classList.toggle('is-active', item === button));
      projectGrid.querySelectorAll('.project-card').forEach((card) => {
        const title = card.textContent.toLowerCase();
        card.classList.toggle('is-hidden', filter !== 'all' && !title.includes(filter));
      });
    });
  }

  document.querySelectorAll('[data-gallery-view]').forEach((button) => {
    button.addEventListener('click', () => {
      const mode = button.dataset.galleryView;
      document.querySelectorAll('[data-gallery-view]').forEach((item) => item.classList.toggle('is-active', item === button));
      if (projectGrid) {
        projectGrid.classList.toggle('is-compact', mode === 'compact');
      }
    });
  });

  const projectDetail = document.querySelector('[data-project-detail]');
  if (projectDetail && window.JL_PROJECTS) {
    const params = new URLSearchParams(window.location.search);
    const slug = params.get('projekt') || window.JL_PROJECTS[0].slug;
    const project = window.JL_PROJECTS.find((item) => item.slug === slug) || window.JL_PROJECTS[0];
    document.title = `${project.title} - JL Střechy`;
    projectDetail.innerHTML = `
      <div class="page-hero">
        <div>
          <h1>${project.title}</h1>
          <p>Statická detailní stránka realizace. Fotky jsou načtené z původní galerie bez PHP.</p>
        </div>
        <div class="page-note">Počet fotografií: <strong>${project.images.length}</strong></div>
      </div>
      <div class="project-gallery">
        ${project.images.map((image) => `<img src="${image}" alt="${project.title}">`).join('')}
      </div>
      <div style="text-align:center; margin-top:2rem;">
        <a class="btn btn-glass" href="galerie.html">Zpět na galerii</a>
      </div>
    `;
  }
})();
