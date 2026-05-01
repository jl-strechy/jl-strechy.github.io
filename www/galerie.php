
<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galerie - JL střechy</title>
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
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
    }
    
    .container h1 {
      color: #f0b000;
      text-align: center;
      margin-bottom: 3rem;
      font-size: 2.5rem;
    }
    
    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 2rem;
      margin-bottom: 2rem;
    }
    
    .gallery-item {
      background: rgba(60, 30, 10, 0.5);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(240, 176, 0, 0.2);
      border-radius: 16px;
      overflow: hidden;
      transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      cursor: pointer;
      text-decoration: none;
      display: flex;
      flex-direction: column;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3), inset 0 1px 1px rgba(255, 255, 255, 0.1);
    }
    
    .gallery-item:hover {
      background: rgba(60, 30, 10, 0.8);
      border-color: rgba(240, 176, 0, 0.6);
      transform: translateY(-8px);
      box-shadow: 0 12px 40px rgba(240, 176, 0, 0.2);
    }
    
    .gallery-item img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      display: block;
      transition: transform 0.3s ease;
    }
    
    .gallery-item:hover img {
      transform: scale(1.1);
    }
    
    .gallery-item h3 {
      padding: 1.5rem 1rem;
      color: #f0b000;
      font-size: 1.1rem;
      flex-grow: 1;
      display: flex;
      align-items: center;
    }
    
    .back-link {
      text-align: center;
      margin-top: 3rem;
    }
    
    .back-link a {
      color: #f0b000;
      text-decoration: none;
      padding: 0.75rem 1.5rem;
      background: rgba(240, 176, 0, 0.1);
      border: 1px solid rgba(240, 176, 0, 0.3);
      border-radius: 10px;
      transition: all 0.3s ease;
      display: inline-block;
      backdrop-filter: blur(10px);
    }
    
    .back-link a:hover {
      background: rgba(240, 176, 0, 0.2);
      border-color: rgba(240, 176, 0, 0.8);
      transform: translateY(-2px);
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Galerie realizovaných projektů</h1>
    <div class="gallery-grid">
      
      <a href="projekt.php?projekt=00-Vrata%20do%20gar%C3%A1%C5%BEe" class="gallery-item">
        <img src="projekty/00-Vrata do garáže/IMG-20250720-WA0010.jpg" alt="00-Vrata do garáže">
        <h3>00-Vrata do garáže</h3>
      </a>
      
      <a href="projekt.php?projekt=01-Vchodov%C3%A9%20dve%C5%99e" class="gallery-item">
        <img src="projekty/01-Vchodové dveře/IMG-20250720-WA0001.jpg" alt="01-Vchodové dveře">
        <h3>01-Vchodové dveře</h3>
      </a>
      
      <a href="projekt.php?projekt=02-BALKON" class="gallery-item">
        <img src="projekty/02-BALKON/IMG-20250720-WA0014.jpg" alt="02-BALKON">
        <h3>02-BALKON</h3>
      </a>
      
      <a href="projekt.php?projekt=03-Pergola%20110%20metr%C5%AF%20%C4%8Dtvere%C4%8Dn%C3%ADch" class="gallery-item">
        <img src="projekty/03-Pergola 110 metrů čtverečních/IMG-20250720-WA0024.jpg" alt="03-Pergola 110 metrů čtverečních">
        <h3>03-Pergola 110 metrů čtverečních</h3>
      </a>
      
      <a href="projekt.php?projekt=04-pristresek" class="gallery-item">
        <img src="projekty/04-pristresek/IMG-20250720-WA0036.jpg" alt="04-pristresek">
        <h3>04-pristresek</h3>
      </a>
      
      <a href="projekt.php?projekt=05_Gar%C3%A1%C5%BE%20d%C5%99evostavba" class="gallery-item">
        <img src="projekty/05_Garáž dřevostavba/IMG-20250720-WA0045.jpg" alt="05_Garáž dřevostavba">
        <h3>05_Garáž dřevostavba</h3>
      </a>
      
      <a href="projekt.php?projekt=06-Pergola%20hospoda%20Z%C3%A1ti%C5%A1%C3%AD%20v%20Chaba%C5%99ovice" class="gallery-item">
        <img src="projekty/06-Pergola hospoda Zátiší v Chabařovice/IMG-20250720-WA0054.jpg" alt="06-Pergola hospoda Zátiší v Chabařovice">
        <h3>06-Pergola hospoda Zátiší v Chabařovice</h3>
      </a>
      
      <a href="projekt.php?projekt=07-Rekonstrukce%20d%C5%99evn%C3%ADku%20a%20vrat%C2%A0%C3%9A%C5%A1t%C4%9Bk" class="gallery-item">
        <img src="projekty/07-Rekonstrukce dřevníku a vrat Úštěk/IMG-20250720-WA0064.jpg" alt="07-Rekonstrukce dřevníku a vrat Úštěk">
        <h3>07-Rekonstrukce dřevníku a vrat Úštěk</h3>
      </a>
      
      <a href="projekt.php?projekt=08-Rekonstrukce%20k%C5%AFlny%20%C3%9A%C5%A1t%C4%9Bk" class="gallery-item">
        <img src="projekty/08-Rekonstrukce kůlny Úštěk/IMG-20250720-WA0084.jpg" alt="08-Rekonstrukce kůlny Úštěk">
        <h3>08-Rekonstrukce kůlny Úštěk</h3>
      </a>
      
      <a href="projekt.php?projekt=09-Kompletn%C3%AD%20rekonstrukce%20st%C5%99echy%20v%C4%8Detn%C4%9B%20krov%C5%AF%C2%A0a%C2%A0kom%C3%ADn%C5%AF" class="gallery-item">
        <img src="projekty/09-Kompletní rekonstrukce střechy včetně krovů a komínů/IMG-20250720-WA0097.jpg" alt="09-Kompletní rekonstrukce střechy včetně krovů a komínů">
        <h3>09-Kompletní rekonstrukce střechy včetně krovů a komínů</h3>
      </a>
      
      <a href="projekt.php?projekt=10-D%C5%99evostavba%20chata%20k%20celoro%C4%8Dn%C3%ADmu%20bydlen%C3%AD" class="gallery-item">
        <img src="projekty/10-Dřevostavba chata k celoročnímu bydlení/IMG-20250720-WA0111.jpg" alt="10-Dřevostavba chata k celoročnímu bydlení">
        <h3>10-Dřevostavba chata k celoročnímu bydlení</h3>
      </a>
      
    </div>
    <div class="back-link">
      <a href="../index.html">← Zpět na domovskou stránku</a>
    </div>
  </div>
</body>
</html>