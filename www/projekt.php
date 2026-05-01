
<?php
$projekt = $_GET['projekt'];
$folder = "projekty/" . $projekt;
$obrazky = array_diff(scandir($folder), array('..', '.'));
$obrazky = array_values($obrazky);
?>
<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $projekt; ?> - JL střechy</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #1a0f0c 0%, #2d1810 50%, #1a0f0c 100%);
      min-height: 100vh;
      color: #fff;
      padding: 2rem;
    }
    
    .project-slideshow {
      max-width: 800px;
      margin: 0 auto;
      background: rgba(60, 30, 10, 0.5);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(240, 176, 0, 0.2);
      border-radius: 20px;
      padding: 2rem;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3), inset 0 1px 1px rgba(255, 255, 255, 0.1);
    }
    
    .project-slideshow h2 {
      color: #f0b000;
      text-align: center;
      margin-bottom: 2rem;
      font-size: 2rem;
    }
    
    .slideshow-container {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 2rem;
      gap: 1rem;
    }
    
    .arrow {
      cursor: pointer;
      font-size: 2rem;
      color: #f0b000;
      padding: 1rem;
      border-radius: 10px;
      background: rgba(240, 176, 0, 0.1);
      border: 1px solid rgba(240, 176, 0, 0.3);
      user-select: none;
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
    }
    
    .arrow:hover {
      background: rgba(240, 176, 0, 0.2);
      border-color: rgba(240, 176, 0, 0.8);
      transform: scale(1.1);
    }
    
    .slides-wrapper {
      flex-grow: 1;
      border-radius: 15px;
      overflow: hidden;
      border: 1px solid rgba(240, 176, 0, 0.2);
    }
    
    .slide {
      display: none;
      animation: fadeIn 0.5s ease;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    
    .slide img {
      width: 100%;
      height: auto;
      display: block;
      border-radius: 15px;
    }
    
    .dots {
      display: flex;
      justify-content: center;
      gap: 0.5rem;
      margin-bottom: 2rem;
      flex-wrap: wrap;
    }
    
    .dot {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background: rgba(240, 176, 0, 0.3);
      border: 1px solid rgba(240, 176, 0, 0.5);
      cursor: pointer;
      transition: all 0.3s ease;
    }
    
    .dot.active {
      background: #f0b000;
      border-color: #ffea00;
      box-shadow: 0 0 8px rgba(240, 176, 0, 0.5);
    }
    
    .dot:hover {
      background: rgba(240, 176, 0, 0.6);
    }
    
    .nav-link {
      text-align: center;
      margin-top: 2rem;
    }
    
    .nav-link a {
      color: #f0b000;
      text-decoration: none;
      transition: color 0.3s ease;
      font-size: 1.1rem;
      border-bottom: 2px solid transparent;
      padding-bottom: 0.5rem;
    }
    
    .nav-link a:hover {
      color: #ffea00;
      border-bottom-color: #f0b000;
    }
  </style>
  <script>
    let current = 0;
    function showSlide(index) {
      const slides = document.querySelectorAll('.slide');
      const dots = document.querySelectorAll('.dot');
      slides.forEach((s, i) => {
        s.style.display = i === index ? 'block' : 'none';
        dots[i].classList.toggle('active', i === index);
      });
      current = index;
    }
    function nextSlide() {
      const slides = document.querySelectorAll('.slide');
      showSlide((current + 1) % slides.length);
    }
    function prevSlide() {
      const slides = document.querySelectorAll('.slide');
      showSlide((current - 1 + slides.length) % slides.length);
    }
    window.onload = () => showSlide(0);
  </script>
</head>
<body>
  <div class="project-slideshow">
    <h2><?php echo $projekt; ?></h2>

    <div class="slideshow-container">
      <span class="arrow" onclick="prevSlide()">❮</span>
      <div class="slides-wrapper">
        <?php foreach ($obrazky as $index => $img): ?>
          <div class="slide">
            <img src="<?php echo $folder . '/' . $img; ?>" alt="<?php echo $projekt; ?> - obrázek <?php echo $index + 1; ?>">
          </div>
        <?php endforeach; ?>
      </div>
      <span class="arrow" onclick="nextSlide()">❯</span>
    </div>

    <div class="dots">
      <?php foreach ($obrazky as $index => $img): ?>
        <span class="dot" onclick="showSlide(<?php echo $index; ?>)"></span>
      <?php endforeach; ?>
    </div>

    <div class="nav-link">
      <a href="galerie.php">← Zpět na galerii</a>
    </div>
  </div>
</body>
</html>
