/* =========================================================
   JL STŘECHY – leaves.js
   Cesta: JL/js/leaves.js
   Funkce: Once UI inspired Leaves / WeatherFx
   ========================================================= */

(function () {
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  const canvas = document.createElement('canvas');
  canvas.id = 'weatherFx';
  document.body.appendChild(canvas);

  const ctx = canvas.getContext('2d');
  if (!ctx) return;

  const mouse = {
    x: -9999,
    y: -9999,
    active: false,
  };

  function resize() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  }

  resize();
  window.addEventListener('resize', resize);

  window.addEventListener('mousemove', (event) => {
    mouse.x = event.clientX;
    mouse.y = event.clientY;
    mouse.active = true;
  });

  window.addEventListener('mouseleave', () => {
    mouse.active = false;
    mouse.x = -9999;
    mouse.y = -9999;
  });

  function isDarkMode() {
    return document.body.classList.contains('dark');
  }

  function getLeafPalette() {
    return isDarkMode()
      ? ['#ffcc00', '#ff8800', '#ffaa33', '#ff6600', '#ffee88']
      : ['#c88a16', '#d6a52f', '#a96b18', '#e0b84a', '#8f5513'];
  }

  const layers = [
    { count: 20, depth: 0.45, blur: 6, alpha: 0.32, sizeMin: 5, sizeMax: 9 },
    { count: 26, depth: 0.8, blur: 14, alpha: 0.58, sizeMin: 7, sizeMax: 13 },
    { count: 18, depth: 1.25, blur: 24, alpha: 0.86, sizeMin: 10, sizeMax: 18 },
  ];

  function createLeaf(layer) {
    const palette = getLeafPalette();

    return {
      x: Math.random() * canvas.width,
      y: Math.random() * canvas.height,
      size: Math.random() * (layer.sizeMax - layer.sizeMin) + layer.sizeMin,
      speedY: (Math.random() * 0.28 + 0.11) * layer.depth,
      speedX: (Math.random() * 0.34 - 0.17) * layer.depth,
      rotation: Math.random() * Math.PI * 2,
      rotationSpeed: (Math.random() - 0.5) * 0.025 * layer.depth,
      swing: Math.random() * Math.PI * 2,
      color: palette[Math.floor(Math.random() * palette.length)],
      layer,
    };
  }

  const leaves = layers.flatMap((layer) =>
    Array.from({ length: layer.count }, () => createLeaf(layer))
  );

  function drawLeaf(leaf) {
    const palette = getLeafPalette();

    if (!palette.includes(leaf.color)) {
      leaf.color = palette[Math.floor(Math.random() * palette.length)];
    }

    ctx.save();
    ctx.translate(leaf.x, leaf.y);
    ctx.rotate(leaf.rotation);

    ctx.globalAlpha = leaf.layer.alpha;
    ctx.shadowColor = leaf.color;
    ctx.shadowBlur = leaf.layer.blur;
    ctx.fillStyle = leaf.color;

    ctx.beginPath();
    ctx.ellipse(0, 0, leaf.size * 0.42, leaf.size, Math.PI / 4, 0, Math.PI * 2);
    ctx.fill();

    ctx.shadowBlur = 0;
    ctx.globalAlpha = leaf.layer.alpha * 0.9;
    ctx.strokeStyle = isDarkMode() ? 'rgba(255,255,255,.28)' : 'rgba(50,25,8,.35)';
    ctx.lineWidth = Math.max(0.8, leaf.size / 13);
    ctx.beginPath();
    ctx.moveTo(0, -leaf.size * 0.72);
    ctx.lineTo(0, leaf.size * 0.72);
    ctx.stroke();

    ctx.restore();
  }

  function repelFromMouse(leaf) {
    if (!mouse.active) return;

    const dx = leaf.x - mouse.x;
    const dy = leaf.y - mouse.y;
    const distance = Math.sqrt(dx * dx + dy * dy);
    const radius = 130 * leaf.layer.depth;

    if (distance < radius && distance > 0.01) {
      const force = (1 - distance / radius) * 2.2;
      leaf.x += (dx / distance) * force * leaf.layer.depth;
      leaf.y += (dy / distance) * force * leaf.layer.depth;
      leaf.rotation += force * 0.025;
    }
  }

  function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    const scrollFactor = window.scrollY * 0.0008;

    leaves.forEach((leaf) => {
      drawLeaf(leaf);
      repelFromMouse(leaf);

      leaf.swing += 0.008 * leaf.layer.depth;
      leaf.x += leaf.speedX + Math.sin(leaf.swing + scrollFactor) * 0.28 * leaf.layer.depth;
      leaf.y += leaf.speedY + Math.cos(scrollFactor + leaf.swing) * 0.025;
      leaf.rotation += leaf.rotationSpeed;

      if (leaf.y > canvas.height + 40) {
        leaf.y = -40;
        leaf.x = Math.random() * canvas.width;
      }

      if (leaf.x < -60) leaf.x = canvas.width + 60;
      if (leaf.x > canvas.width + 60) leaf.x = -60;
    });

    requestAnimationFrame(draw);
  }

  draw();
})();
