/* =========================================================
   JL STŘECHY – matrix.js
   Cesta: JL/js/matrix.js
   Funkce: Once UI inspired MatrixFx v hero panelu
   ========================================================= */

(function () {
  const canvas = document.getElementById('matrixFxCanvas');
  const panel = document.getElementById('matrixPanel');

  if (!canvas || !panel) return;

  const ctx = canvas.getContext('2d');
  if (!ctx) return;

  const config = {
    spacing: 3.5,
    size: 2.15,
    duration: 3600,
    intensity: 15,
  };

  let dots = [];
  let frame = null;
  let startTime = 0;
  let time = 0;

  function isDarkMode() {
    return document.body.classList.contains('dark');
  }

  function matrixColor(alpha) {
    return isDarkMode()
      ? `rgba(255, 190, 0, ${alpha})`
      : `rgba(255, 142, 0, ${alpha})`;
  }

  function resizeMatrix() {
    const rect = panel.getBoundingClientRect();
    canvas.width = rect.width;
    canvas.height = rect.height;
    initDots();
    renderStatic();
  }

  function initDots() {
    dots = [];

    if (!canvas.width || !canvas.height) return;

    for (let x = 0; x < canvas.width; x += config.spacing) {
      for (let y = 0; y < canvas.height; y += config.spacing) {
        dots.push({
          x,
          y,
          opacity: Math.random(),
          phase: Math.random() * Math.PI * 2,
          delay: Math.random() * 0.18,
        });
      }
    }
  }

  function renderStatic() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    dots.forEach((dot) => {
      ctx.shadowColor = 'rgba(255, 180, 0, 0.9)';
      ctx.shadowBlur = 8;
      ctx.fillStyle = matrixColor(0.10 + dot.opacity * 0.22);
      ctx.fillRect(dot.x, dot.y, config.size, config.size);
    });
  }

  function draw(now = performance.now()) {
    const elapsed = now - startTime;
    const progress = Math.min(elapsed / config.duration, 1);
    const ease = 1 - Math.pow(1 - progress, 3);

    ctx.clearRect(0, 0, canvas.width, canvas.height);
    time += 0.022;

    const centerX = canvas.width / 2;
    const centerY = canvas.height / 2;
    const maxRadius = Math.sqrt(centerX * centerX + centerY * centerY);
    const waveRadius = ease * maxRadius * 1.42;

    dots.forEach((dot) => {
      const dx = dot.x - centerX;
      const dy = dot.y - centerY;
      const distance = Math.sqrt(dx * dx + dy * dy);
      const distanceToWave = Math.abs(distance - waveRadius);
      const waveWidth = maxRadius * 0.19;
      const wave = Math.exp(-Math.pow(distanceToWave / waveWidth, 2) * 4.6);
      const localProgress = Math.max(0, Math.min(1, (progress - dot.delay) / (1 - dot.delay)));

      const offsetX = (dx / (distance || 1)) * wave * config.intensity * (1 - progress * 0.2);
      const offsetY = (dy / (distance || 1)) * wave * config.intensity * (1 - progress * 0.2);
      const flicker = (Math.sin(time * 2.4 + dot.phase) + 1) / 2;

      const alpha = progress < 1
        ? 0.08 + localProgress * 0.18 + wave * 0.78 + flicker * 0.16
        : 0.14 + dot.opacity * 0.24;

      ctx.shadowColor = 'rgba(255, 185, 0, 1)';
      ctx.shadowBlur = progress < 1 ? 18 + wave * 28 : 10;
      ctx.fillStyle = matrixColor(Math.min(alpha, 0.95));

      const dotSize = config.size + wave * 2.5;
      ctx.fillRect(dot.x + offsetX, dot.y + offsetY, dotSize, dotSize);
    });

    if (progress < 1) {
      frame = requestAnimationFrame(draw);
    } else {
      frame = null;
      renderStatic();
    }
  }

  function startMatrix() {
    if (frame) cancelAnimationFrame(frame);
    startTime = performance.now();
    frame = requestAnimationFrame(draw);
  }

  resizeMatrix();
  window.addEventListener('resize', resizeMatrix);
  panel.addEventListener('mouseenter', startMatrix);
  panel.addEventListener('click', startMatrix);
})();
