<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>O nás – JL Střechy</title>
  <meta name="description" content="Poznámejte náš tým odborníků v oblasti tesařství a klempířství. JL Střechy – řemeslo bez kompromisů.">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="style/design.css">
</head>
<body>
  <!-- Cursor elements -->
  <div class="cursor-dot"></div>
  <div class="cursor-ring"></div>

  <!-- Login Bar -->
  <div class="login-bar">
    <?php
      session_start();
      if(isset($_SESSION['user_id'])) {
        echo '<div class="user-info">👤 ' . htmlspecialchars($_SESSION['username'] ?? 'Uživatel') . '</div>';
        echo '<a href="dashboard.php">Dashboard</a>';
        echo '<a href="logout.php">Odhlásit</a>';
      } else {
        echo '<a href="login.php">Přihlášení</a>';
        echo '<a href="register.php">Registrace</a>';
      }
    ?>
  </div>

  <div class="container">
    <!-- Menu -->
    <nav class="main-nav">
      <div class="menu-logo">
        <a href="index.php" style="text-decoration: none;">
          <img src="images/logo/logo.png" alt="JL Střechy logo" style="width: 35px; height: 35px;">
        </a>
      </div>

      <div class="menu-group"><a href="index.php">Úvod</a></div>
      <div class="menu-group">
        <a href="o-nas.php">O nás</a>
        <ul class="submenu">
          <li><a href="o-nas.php?section=profil">Profil zakladatele</a></li>
          <li><a href="o-nas.php?section=mise">Mise a hodnoty</a></li>
          <li><a href="o-nas.php?section=doklady">Oficiální doklady</a></li>
          <li><a href="o-nas.php?section=certifikace">Certifikace</a></li>
        </ul>
      </div>

      <div class="menu-group">
        <a href="sluzby.php">Služby</a>
        <ul class="submenu">
          <li><a href="sluzby.php?type=remeslo">Řemeslné zakázky</a></li>
          <li><a href="sluzby.php?type=docasne">Dočasné zaměstnávání</a></li>
          <li><a href="sluzby.php?type=vyroba">Výroba a e-shop</a></li>
          <li><a href="sluzby.php?type=vypadek">Náhradní řešení</a></li>
        </ul>
      </div>

      <div class="menu-group">
        <a href="pro-firmy.php">Pro firmy</a>
        <ul class="submenu">
          <li><a href="pro-firmy.php?section=spoluprace">Jak probíhá spolupráce</a></li>
          <li><a href="pro-firmy.php?section=vyhody">Přehled výhod</a></li>
          <li><a href="pro-firmy.php?section=reference">Reference a zakázky</a></li>
          <li><a href="pro-firmy.php?section=poptavka">Zadat poptávku</a></li>
        </ul>
      </div>

      <div class="menu-group">
        <a href="pro-pracovniky.php">Pro pracovníky</a>
        <ul class="submenu">
          <li><a href="pro-pracovniky.php?section=pridat">Jak se přidat</a></li>
          <li><a href="pro-pracovniky.php?section=vyhody">Výhody práce</a></li>
          <li><a href="pro-pracovniky.php?section=formular">Formulář</a></li>
          <li><a href="pro-pracovniky.php?section=kontakt">Kontakt</a></li>
        </ul>
      </div>

      <div class="menu-group"><a href="galerie.php">Galerie</a></div>
      <div class="menu-group"><a href="index.php#kontakt">Kontakt</a></div>
      <button id="toggle-darkmode" title="Tmavý režim">🌙</button>
    </nav>

    <!-- CONTENT -->
    <section style="padding: 3rem 2rem;" data-aos="fade-up">
      <h1 style="font-size: clamp(2rem, 5vw, 3rem); text-transform: uppercase; letter-spacing: 0.1rem; margin-bottom: 1rem;">
        O nás
      </h1>

      <?php
        $section = $_GET['section'] ?? 'default';
      ?>

      <!-- DEFAULT SECTION -->
      <?php if($section === 'default' || empty($section)): ?>
      <div class="content-card" data-aos="zoom-in">
        <h2>Jsme JL Střechy</h2>
        <p>
          Jsme malý, ale odborný tým pracovníků s dlouholetou praxí v tesařství a klempířství. 
          Naše filosofie je jednoduchá: <strong>dělat věci poctivě, bez kompromisů, s maximální péčí o detaily.</strong>
        </p>
        <p>
          Zaměřujeme se na střešní práce, kde se kvalita ukáže na prvních metrech. Bez zbytečného železa, 
          bez lepení, jen pořádný řemeslo a dřevo, které vydrží generace.
        </p>
      </div>

      <div class="content-card" data-aos="zoom-in" style="margin-top: 2rem;">
        <h2>Naš tým</h2>
        <p>
          Máme několik klíčových odborníků, kteří mají za sebou desítky uspešných projektů. 
          Jejich zkušenost a dedikace jsou základem našeho úspěchu.
        </p>
        <p>
          Rádi se setkáváme se zákazníky, abychom pochopili jejich potřeby a nabídli nejlepší řešení. 
          Komunikace a transparentnost jsou pro nás klíčové.
        </p>
      </div>
      <?php endif; ?>

      <!-- PROFIL ZAKLADATELE -->
      <?php if($section === 'profil'): ?>
      <div class="content-card">
        <h2>Profil zakladatele</h2>
        <p>
          <strong>David Kozák</strong> – Zakladatel a vedoucí tým<br>
          20+ let zkušeností v tesařství a klempířství
        </p>
        <p>
          David začínal jako učeň a postupem času si vybudoval bohaté portfolio. 
          Má vášeň pro tradiční řemeslo a moderní přístupy. Jeho cílem je pokračovat v tradici 
          kvalitní práce a předat zkušenosti další generaci.
        </p>
      </div>
      <?php endif; ?>

      <!-- MISE A HODNOTY -->
      <?php if($section === 'mise'): ?>
      <div class="content-card">
        <h2>Mise a hodnoty</h2>
        <div style="display: grid; gap: 1.5rem; margin-top: 1.5rem;">
          <div>
            <h3 style="color: var(--gold); text-transform: uppercase;">Naše mise</h3>
            <p>Poskytovat nejkvalitnější tesařské a klempířské práce s absolutní péčí o detaily. 
            Budovat dlouhodobé vztahy se zákazníky na základě důvěry a profesionality.</p>
          </div>
          <div>
            <h3 style="color: var(--gold); text-transform: uppercase;">Kvalita</h3>
            <p>Používáme jen ty nejlepší materiály. Každý projekt je zpracován s maximální precizností.</p>
          </div>
          <div>
            <h3 style="color: var(--gold); text-transform: uppercase;">Poctivost</h3>
            <p>Bez skrytých nákladů, bez kompromisů. Co slíbíme, to dodáme.</p>
          </div>
          <div>
            <h3 style="color: var(--gold); text-transform: uppercase;">Inovace</h3>
            <p>Tradice setkává se s moderním přístupem. Jsme otevřeni novým technologiím, ale respektujeme staré metody.</p>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <!-- OFICIÁLNÍ DOKLADY -->
      <?php if($section === 'doklady'): ?>
      <div class="content-card">
        <h2>Oficiální doklady a kontakty</h2>
        <div style="display: grid; gap: 1rem; margin-top: 1.5rem;">
          <div>
            <strong>Společnost:</strong> JL STŘECHY S.R.O.
          </div>
          <div>
            <strong>IČO:</strong> 12345678
          </div>
          <div>
            <strong>DIČ:</strong> CZ12345678
          </div>
          <div>
            <strong>Sídlo:</strong> (Adresa připravena)
          </div>
          <div>
            <strong>E-mail:</strong> <a href="mailto:info@jlstrechy.cz">info@jlstrechy.cz</a>
          </div>
          <div>
            <strong>Telefon:</strong> <a href="tel:+420775189574">+420 775 189 574</a>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <!-- CERTIFIKACE -->
      <?php if($section === 'certifikace'): ?>
      <div class="content-card">
        <h2>Certifikace a registrace</h2>
        <ul style="list-style: none; padding: 0; margin-top: 1.5rem;">
          <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--glass-border);">
            <strong>✓ IČO registrované</strong> – Veřejný rejstřík
          </li>
          <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--glass-border);">
            <strong>✓ DIČ registrované</strong> – Finanční úřad
          </li>
          <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--glass-border);">
            <strong>✓ OSSZ zaměstnavatel</strong> – Sociální pojištění
          </li>
          <li style="padding: 0.5rem 0;">
            <strong>✓ EORI číslo</strong> – Meziné obchodní registrace
          </li>
        </ul>
      </div>
      <?php endif; ?>

      <!-- BACK BUTTON -->
      <div style="text-align: center; margin-top: 2rem;">
        <a href="index.php" class="btn btn-glass" style="margin-right: 1rem;">← Zpět na úvod</a>
        <a href="index.php#kontakt" class="btn btn-primary">Kontaktujte nás</a>
      </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
      <div class="footer-content">
        <p style="margin: 0 ; font-size: 0.9rem; text-align: center;">
          <strong>JL STŘECHY S.R.O.</strong><br>
          📧 info@jlstrechy.cz | 📞 +420 775 189 574<br>
          © 2025 JL Střechy. Všechna práva vyhrazena.
        </p>
      </div>
    </footer>
  </div>

  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script src="js/main-design.js"></script>
  <script>
    AOS.init({
      duration: 800,
      once: true,
      easing: 'ease-in-out',
      offset: 100
    });
  </script>
</body>
</html>
