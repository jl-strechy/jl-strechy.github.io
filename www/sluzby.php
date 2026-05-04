<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Naše služby – JL Střechy</title>
  <meta name="description" content="Komplexní tesařské a klempířské služby. Střechy, tesařství, klempířství, prodej výrobků.">
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
        Naše služby
      </h1>

      <?php
        $type = $_GET['type'] ?? 'default';
      ?>

      <?php if($type === 'default' || empty($type)): ?>
      <div class="content-card" data-aos="zoom-in">
        <h2>Kompletní služby v tesařství a klempířství</h2>
        <p>Jsme certifikovaní odborníci s bohatou praxí. Naše služby zahrnují komplexní řešení v oblasti:</p>
        <ul style="list-style: none; padding: 0; margin-top: 1rem;">
          <li style="padding: 0.5rem 0;">🏗️ <strong>Střešní práce</strong> – stavba, údržba, rekonstrukce</li>
          <li style="padding: 0.5rem 0;">🪵 <strong>Tesařství</strong> – krovy, konstrukce, instalace</li>
          <li style="padding: 0.5rem 0;">🔧 <strong>Klempířství</strong> – vodní systémy, svody, opravy</li>
          <li style="padding: 0.5rem 0;">📦 <strong>Výroba</strong> – speciální dřevěné výrobky na míru</li>
        </ul>
      </div>
      <?php endif; ?>

      <?php if($type === 'remeslo'): ?>
      <div class="content-card">
        <h2>Řemeslné zakázky</h2>
        <p>Specialisté v tradičním řemesle. Každý projekt je originální a přizpůsobený specifikům stavby.</p>
        
        <div style="margin-top: 1.5rem; padding: 1.5rem; background: var(--glass); border-radius: var(--radius-l);;">
          <h3>Co nabízíme:</h3>
          <ul style="list-style: none; padding: 0;">
            <li>✓ Stavba nových střech s kvalitními materiály</li>
            <li>✓ Opravy a údržba existujících střech</li>
            <li>✓ Pergoly, přístřešky, verandy</li>
            <li>✓ Dřevěné konstrukce a prvky</li>
            <li>✓ Komplexní klempířické řešení</li>
          </ul>
        </div>

        <div style="margin-top: 1.5rem; padding: 1.5rem; background: rgba(240, 176, 0, 0.1); border: 1px solid var(--gold); border-radius: var(--radius-l);">
          <strong>Postup:</strong> Konzultace → Návrh → Kalkulace → Realizace → Fyzicky závěr
        </div>
      </div>
      <?php endif; ?>

      <?php if($type === 'docasne'): ?>
      <div class="content-card">
        <h2>Dočasné zaměstnávání</h2>
        <p>Pokud potřebujete adekvátní tým na dočasný projekt, jsme tu pro vás.</p>
        
        <div style="margin-top: 1.5rem;">
          <h3>Flexibilní řešení:</h3>
          <ul style="list-style: none; padding: 0;">
            <li>• Pronájem pracovníků s konkrétní kvalifikací</li>
            <li>• Podpora projektů s omezeným časem</li>
            <li>• Zaškolení a bezpečnost garantováno</li>
            <li>• Transparentní kalkulace</li>
          </ul>
        </div>
      </div>
      <?php endif; ?>

      <?php if($type === 'vyroba'): ?>
      <div class="content-card">
        <h2>Výroba a e-shop</h2>
        <p>Vlastní výroba speciálních dřevěných prvků. Jsme schopni vyrobit na míru podle vašich požadavků.</p>
        
        <div style="margin-top: 1.5rem; padding: 1.5rem; background: var(--glass); border-radius: var(--radius-l);">
          <h3>Disponujeme:</h3>
          <ul>
            <li>Dřevěné obklady a dekorativní prvky</li>
            <li>Pergoly a zahradní konstrukce</li>
            <li>Speciální řemeslné výrobky</li>
            <li>Restaurace a obnova starých prvků</li>
          </ul>
        </div>

        <div style="text-align: center; margin-top: 2rem;">
          <a href="#" class="btn btn-primary">Navštívit e-shop</a>
        </div>
      </div>
      <?php endif; ?>

      <?php if($type === 'vypadek'): ?>
      <div class="content-card">
        <h2>Náhradní řešení při výpadku pracovníků</h2>
        <p>Nečekané situace se dějí. Když vám vypadnou pracovníci, jsme schopni poskytnout náhradní řešení.</p>
        
        <div style="margin-top: 1.5rem; padding: 1.5rem; background: rgba(240, 176, 0, 0.1); border: 1px solid var(--gold); border-radius: var(--radius-l);">
          <h3>Jsme tu pro vás 24/7</h3>
          <p>Rychlá mobilizace, profesionální přístup, žádné kompromisy na kvalitě.</p>
          <p><strong>Zavolejte:</strong> <a href="tel:+420775189574" style="color: var(--gold);">+420 775 189 574</a></p>
        </div>
      </div>
      <?php endif; ?>

      <div style="text-align: center; margin-top: 2rem;">
        <a href="index.php" class="btn btn-glass" style="margin-right: 1rem;">← Zpět na úvod</a>
        <a href="index.php#kontakt" class="btn btn-primary">Zadat poptávku</a>
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
