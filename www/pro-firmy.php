<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pro firmy – JL Střechy</title>
  <meta name="description" content="B2B řešení pro stavební firmy. Pronájem pracovníků, subdodávky, dlouhodobá spolupráce.">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="style/design.css">
</head>
<body>
  <div class="cursor-dot"></div>
  <div class="cursor-ring"></div>

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
    <nav class="main-nav">
      <div class="menu-logo"><a href="index.php" style="text-decoration: none;"><img src="images/logo/logo.png" alt="JL Střechy logo" style="width: 35px; height: 35px;"></a></div>
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

    <section style="padding: 3rem 2rem;" data-aos="fade-up">
      <h1 style="font-size: clamp(2rem, 5vw, 3rem); text-transform: uppercase; letter-spacing: 0.1rem; margin-bottom: 1rem;">
        Pro firmy
      </h1>

      <?php
        $section = $_GET['section'] ?? 'default';
      ?>

      <?php if($section === 'default' || empty($section)): ?>
      <div class="content-card" data-aos="zoom-in">
        <h2>B2B Spolupráce</h2>
        <p>Jsme partnery stavebních firem, která hledají kvalitní subdodávky a flexibilní řešení.</p>
        <p>Dlouhé roky praxe nám umožňují pracovat efektivně a profesionálně splnit i ty nejnáročnější požadavky.</p>
      </div>
      <?php endif; ?>

      <?php if($section === 'spoluprace'): ?>
      <div class="content-card">
        <h2>Jak probíhá spolupráce</h2>
        <div style="margin-top: 2rem; display: grid; gap: 1.5rem;">
          <div style="padding: 1.5rem; background: var(--glass); border-radius: var(--radius-m);">
            <h3 style="margin-top: 0; color: var(--gold);">1. Konzultace</h3>
            <p>Nejdřív si promluvíme. Pochopíme váš projekt, časový plán, rozpočet.</p>
          </div>
          <div style="padding: 1.5rem; background: var(--glass); border-radius: var(--radius-m);">
            <h3 style="margin-top: 0; color: var(--gold);">2. Nabídka</h3>
            <p>Poskytneme detailní nabídku s jasným rozpočtem a harmonogramem.</p>
          </div>
          <div style="padding: 1.5rem; background: var(--glass); border-radius: var(--radius-m);">
            <h3 style="margin-top: 0; color: var(--gold);">3. Realizace</h3>
            <p>Profesionální tým, dodržování termínů, kvalita bez kompromisů.</p>
          </div>
          <div style="padding: 1.5rem; background: var(--glass); border-radius: var(--radius-m);">
            <h3 style="margin-top: 0; color: var(--gold);">4. Finalizace</h3>
            <p>Kontrola, zúčtování, dlouhodobá podpora a údržba.</p>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <?php if($section === 'vyhody'): ?>
      <div class="content-card">
        <h2>Přehled výhod</h2>
        <div style="display: grid; gap: 1rem; margin-top: 1.5rem;">
          <div style="padding: 1rem; border-left: 3px solid var(--gold);">
            <strong>✓ Kvalita</strong> – Garantujeme nejvyšší kvalitu práce
          </div>
          <div style="padding: 1rem; border-left: 3px solid var(--gold);">
            <strong>✓ Flexibilita</strong> – Přizpůsobíme se vašim potřebám
          </div>
          <div style="padding: 1rem; border-left: 3px solid var(--gold);">
            <strong>✓ Termíny</strong> – Dodržujeme slíbené termíny
          </div>
          <div style="padding: 1rem; border-left: 3px solid var(--gold);">
            <strong>✓ Transparentnost</strong> – Jasné kommunici a kalkulace
          </div>
          <div style="padding: 1rem; border-left: 3px solid var(--gold);">
            <strong>✓ Dostupnost</strong> – Jsme dostupní 24/7 v případě urgence
          </div>
          <div style="padding: 1rem; border-left: 3px solid var(--gold);">
            <strong>✓ Dlouhodobá spolupráce</strong> – Stavíme na dlouhodobých vztazích
          </div>
        </div>
      </div>
      <?php endif; ?>

      <?php if($section === 'reference'): ?>
      <div class="content-card">
        <h2>Reference a zakázky</h2>
        <p>Máme dlouhou historii úspěšných projektů. Zde si můžete prohlédnout naši galerii realizací.</p>
        <div style="text-align: center; margin-top: 2rem;">
          <a href="galerie.php" class="btn btn-primary">Prohlédnout galerii</a>
        </div>
        <p style="margin-top: 2rem; text-align: center; color: var(--muted);">
          Další reference a doporučení si můžete vyžádat osobně.
        </p>
      </div>
      <?php endif; ?>

      <?php if($section === 'poptavka'): ?>
      <div class="content-card">
        <h2>Zadat poptávku</h2>
        <form action="form-handler.php" method="POST" style="margin-top: 1.5rem;">
          <input type="hidden" name="csrf_token" value="<?php echo bin2hex(random_bytes(32)); ?>">
          <input type="hidden" name="type" value="poptavka_firmy">
          
          <div style="margin-bottom: 1rem;">
            <label for="company" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Název firmy:</label>
            <input type="text" id="company" name="company" required placeholder="Vaše firma">
          </div>

          <div style="margin-bottom: 1rem;">
            <label for="contact" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Kontaktní osoba:</label>
            <input type="text" id="contact" name="contact" required placeholder="Jméno">
          </div>

          <div style="margin-bottom: 1rem;">
            <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">E-mail:</label>
            <input type="email" id="email" name="email" required placeholder="email@firma.cz">
          </div>

          <div style="margin-bottom: 1rem;">
            <label for="project" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Popis projektu:</label>
            <textarea id="project" name="project" rows="5" required placeholder="Co potřebujete realizovat?" style="resize: vertical;"></textarea>
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%;">Odeslat poptávku</button>
        </form>
      </div>
      <?php endif; ?>

      <div style="text-align: center; margin-top: 2rem;">
        <a href="index.php" class="btn btn-glass" style="margin-right: 1rem;">← Zpět na úvod</a>
      </div>
    </section>

    <footer class="footer">
      <div class="footer-content">
        <p style="margin: 0; font-size: 0.9rem; text-align: center;">
          <strong>JL STŘECHY S.R.O.</strong><br>
          📧 info@jlstrechy.cz | 📞 +420 775 189 574<br>
          © 2025 JL Střechy.
        </p>
      </div>
    </footer>
  </div>

  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script src="js/main-design.js"></script>
  <script>
    AOS.init({ duration: 800, once: true, easing: 'ease-in-out', offset: 100 });
  </script>
</body>
</html>
