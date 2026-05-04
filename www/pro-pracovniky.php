<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pro pracovníky – JL Střechy</title>
  <meta name="description" content="Přidejte se k našemu týmu. Hledáme zkušené tesaře a klempíře. Flexibilní práce, férový plat.">
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
        Pro pracovníky
      </h1>

      <?php
        $section = $_GET['section'] ?? 'default';
      ?>

      <?php if($section === 'default' || empty($section)): ?>
      <div class="content-card" data-aos="zoom-in">
        <h2>Přidejte se k našemu týmu</h2>
        <p>Hledáme zkušené a angažované pracovníky v oboru tesařství a klempířství.</p>
        <p>Nabízíme flexibilní práci, férový plat a příležitost pracovat na zajímavých projektech.</p>
      </div>
      <?php endif; ?>

      <?php if($section === 'pridat'): ?>
      <div class="content-card">
        <h2>Jak se přidat do týmu</h2>
        <div style="margin-top: 1.5rem;">
          <p><strong>Krok 1: Podejte přihlášku</strong></p>
          <p>Vyplňte formulář s vašimi základními údaji a kvalifikací. Pošlete nám CV a fotografii.</p>
          
          <p style="margin-top: 1.5rem;"><strong>Krok 2: Pohovor</strong></p>
          <p>Dozvíte se více o vašich zkušenostech, vašich očekáváních a jak bychom mohli spolupracovat.</p>
          
          <p style="margin-top: 1.5rem;"><strong>Krok 3: Zkušební období</strong></p>
          <p>Pokud se vše shodne, začnete s nami na zkušební dobu. Poznáme vás a vy nás.</p>
          
          <p style="margin-top: 1.5rem;"><strong>Krok 4: Trvalá spolupráce</strong></p>
          <p>Jakmile se vše osvědčí, můžete si s námi vyjednat dlouhodobou spolupráci.</p>
        </div>

        <div style="text-align: center; margin-top: 2rem;">
          <a href="pro-pracovniky.php?section=formular" class="btn btn-primary">Poslat přihlášku</a>
        </div>
      </div>
      <?php endif; ?>

      <?php if($section === 'vyhody'): ?>
      <div class="content-card">
        <h2>Výhody práce s námi</h2>
        <div style="display: grid; gap: 1rem; margin-top: 1.5rem;">
          <div style="padding: 1rem; border-left: 4px solid var(--gold); background: var(--glass); border-radius: var(--radius-m);">
            <strong>💰 Féreý plat</strong> – Placení dle kvalifikace a zkušeností
          </div>
          <div style="padding: 1rem; border-left: 4px solid var(--gold); background: var(--glass); border-radius: var(--radius-m);">
            <strong>📅 Flexibilní rozvrh</strong> – Dohoda na bázi projektu nebo dlouhodobá
          </div>
          <div style="padding: 1rem; border-left: 4px solid var(--gold); background: var(--glass); border-radius: var(--radius-m);">
            <strong>🎓 Zlepšování dovedností</strong> – Možnost učit se nové techniky
          </div>
          <div style="padding: 1rem; border-left: 4px solid var(--gold); background: var(--glass); border-radius: var(--radius-m);">
            <strong>🛡️ Bezpečnost</strong> – Veškeré pomůcky a pojištění zajišťujeme
          </div>
          <div style="padding: 1rem; border-left: 4px solid var(--gold); background: var(--glass); border-radius: var(--radius-m);">
            <strong>🤝 Tým</strong> – Přátelský a profesionální tým
          </div>
          <div style="padding: 1rem; border-left: 4px solid var(--gold); background: var(--glass); border-radius: var(--radius-m);">
            <strong>📈 Růst</strong> – Příležitost postupu a rozvinování kariéry
          </div>
        </div>
      </div>
      <?php endif; ?>

      <?php if($section === 'formular'): ?>
      <div class="content-card">
        <h2>Formulář: Chci pracovat</h2>
        <form action="form-handler.php" method="POST" style="margin-top: 1.5rem;">
          <input type="hidden" name="csrf_token" value="<?php echo bin2hex(random_bytes(32)); ?>">
          <input type="hidden" name="type" value="prihlaska_pracovnik">
          
          <div style="margin-bottom: 1rem;">
            <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Jméno a příjmení:</label>
            <input type="text" id="name" name="name" required placeholder="Vaše jméno">
          </div>

          <div style="margin-bottom: 1rem;">
            <label for="age" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Věk:</label>
            <input type="number" id="age" name="age" required placeholder="Přibližný věk">
          </div>

          <div style="margin-bottom: 1rem;">
            <label for="phone" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Telefon:</label>
            <input type="tel" id="phone" name="phone" required placeholder="+420 123 456 789">
          </div>

          <div style="margin-bottom: 1rem;">
            <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">E-mail:</label>
            <input type="email" id="email" name="email" required placeholder="váš@email.cz">
          </div>

          <div style="margin-bottom: 1rem;">
            <label for="specializations" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Vaše kvalifikace (vyberte více):</label>
            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
              <label style="display: flex; align-items: center;"><input type="checkbox" name="specializations[]" value="tesarstvo"> Tesařství</label>
              <label style="display: flex; align-items: center;"><input type="checkbox" name="specializations[]" value="klempirstvi"> Klempířství</label>
              <label style="display: flex; align-items: center;"><input type="checkbox" name="specializations[]" value="stresy"> Střechy</label>
              <label style="display: flex; align-items: center;"><input type="checkbox" name="specializations[]" value="vyroba"> Výroba</label>
            </div>
          </div>

          <div style="margin-bottom: 1rem;">
            <label for="experience" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Vaše zkušenosti:</label>
            <textarea id="experience" name="experience" rows="4" required placeholder="Popište vaše zkušenosti a dovednosti..." style="resize: vertical;"></textarea>
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%;">Poslat přihlášku</button>
        </form>
      </div>
      <?php endif; ?>

      <?php if($section === 'kontakt'): ?>
      <div class="content-card">
        <h2>Kontakt</h2>
        <p>Máte otázky? Neváhejte nás kontaktovat.</p>
        
        <div style="margin-top: 2rem; padding: 1.5rem; background: rgba(240, 176, 0, 0.1); border: 1px solid var(--gold); border-radius: var(--radius-l);">
          <p style="margin: 0; margin-bottom: 0.5rem;">📧 <strong>Email:</strong> <a href="mailto:info@jlstrechy.cz">info@jlstrechy.cz</a></p>
          <p style="margin: 0; margin-bottom: 0.5rem;">📞 <strong>Telefon:</strong> <a href="tel:+420775189574">+420 775 189 574</a></p>
          <p style="margin: 0;">💬 Nebo nám napište přes kontaktní formulář na domovské stránce.</p>
        </div>

        <div style="text-align: center; margin-top: 2rem;">
          <a href="index.php#kontakt" class="btn btn-primary">Kontaktovat</a>
        </div>
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
