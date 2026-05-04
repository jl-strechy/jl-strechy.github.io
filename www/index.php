<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JL Střechy – Tesařství a klempířství</title>
  <meta name="description" content="JL střechy – Premium řemeslo bez železného přikrášlování. Střechy, tesařství, klempířství.">
  <meta name="keywords" content="střechy, tesařství, klempířství, dřevo, řemeslo">
  <meta name="robots" content="index, follow">
  
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="style/design.css">
</head>
<body>
  <!-- Cursor elements pro custom cursor animaci -->
  <div class="cursor-dot"></div>
  <div class="cursor-ring"></div>

  <!-- Login Bar - PRIORITA 3 -->
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
    <!-- Sticky Menu - PRIORITA 1 & 2 -->
    <nav class="main-nav">
      <div class="menu-logo">
        <a href="index.php" style="text-decoration: none;">
          <img src="images/logo/logo.png" alt="JL Střechy logo" style="width: 35px; height: 35px;">
        </a>
      </div>

      <!-- Menu Items s Submenu -->
      <div class="menu-group">
        <a href="index.php">Úvod</a>
      </div>

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

      <div class="menu-group">
        <a href="galerie.php">Galerie</a>
      </div>

      <div class="menu-group">
        <a href="#kontakt">Kontakt</a>
      </div>

      <button id="toggle-darkmode" title="Tmavý režim">🌙</button>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero" data-aos="fade-up">
      <div class="intro-text">
        <div class="eyebrow">✨ Premium kvalita</div>
        <h1>Postavme<br>to správně!</h1>
        <p>Střechy stavíme s citem a dřevem. Bez zbytečného желeza. Řemeslo bez kompromisů – to je naše filosofie.</p>
        
        <div class="hero-actions">
          <a href="sluzby.php" class="btn btn-primary">Naše služby</a>
          <a href="#kontakt" class="btn btn-glass">Kontakt</a>
        </div>

        <div class="badge-row">
          <a href="o-nas.php" class="badge">📋 O nás</a>
          <a href="galerie.php" class="badge">📸 Galerie</a>
          <a href="pro-firmy.php" class="badge">💼 Pro firmy</a>
        </div>
      </div>

      <div class="intro-img" style="background-image: url('images/hero/worker.jpg');" data-aos="fade-left"></div>
    </section>

    <!-- SLUŽBY SECTION -->
    <section class="services" data-aos="fade-up">
      <h2 class="section-title">Naše služby</h2>
      
      <div class="service-grid">
        <div class="service-item" data-aos="zoom-in">
          <div class="service-icon">🏗️</div>
          <strong>Střechy</strong>
          <p>Kompletní střešní práce s maximální precizností a péčí o detaily.</p>
        </div>
        
        <div class="service-item" data-aos="zoom-in">
          <div class="service-icon">🪵</div>
          <strong>Tesařství</strong>
          <p>Kvalitné tesařské práce – od krovů po stylové dekorativní prvky.</p>
        </div>
        
        <div class="service-item" data-aos="zoom-in">
          <div class="service-icon">🔧</div>
          <strong>Klempířství</strong>
          <p>Profesionální klempířské služby – vodní systémy, instalace, údržba.</p>
        </div>
        
        <div class="service-item" data-aos="zoom-in">
          <div class="service-icon">📦</div>
          <strong>Prodej výrobků</strong>
          <p>Speciální dřevěné výrobky a řemeslné prvky – e-shop k dispozici.</p>
        </div>
      </div>

      <div style="text-align: center; margin-top: 2rem;">
        <a href="sluzby.php" class="btn btn-primary">Všechny služby</a>
      </div>
    </section>

    <!-- GALERIE SECTION -->
    <section class="gallery" data-aos="fade-up">
      <h2 class="section-title">Naše realizace</h2>
      
      <div class="gallery-grid" id="gallery-preview">
        <!-- Obsah bude naplněn z galerie -->
        <img src="images/gallery/img-1.jpg" alt="Realizace 1" data-aos="zoom-in" loading="lazy">
        <img src="images/gallery/img-2.jpg" alt="Realizace 2" data-aos="zoom-in" loading="lazy">
        <img src="images/gallery/img-3.jpg" alt="Realizace 3" data-aos="zoom-in" loading="lazy">
        <img src="images/gallery/img-4.jpg" alt="Realizace 4" data-aos="zoom-in" loading="lazy">
        <img src="images/gallery/img-5.jpg" alt="Realizace 5" data-aos="zoom-in" loading="lazy">
        <img src="images/gallery/img-6.jpg" alt="Realizace 6" data-aos="zoom-in" loading="lazy">
      </div>

      <div style="text-align: center; margin-top: 2rem;">
        <a href="galerie.php" class="btn btn-primary">Celá galerie</a>
      </div>
    </section>

    <!-- KONTAKT SECTION -->
    <section class="contact" id="kontakt" data-aos="fade-up">
      <h2 class="section-title">Kontaktujte nás</h2>
      
      <div class="contact-card">
        <form action="form-handler.php" method="POST">
          <input type="hidden" name="csrf_token" value="<?php echo bin2hex(random_bytes(32)); ?>">
          
          <div>
            <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Jméno a příjmení:</label>
            <input type="text" id="name" name="name" required placeholder="Vaše jméno">
          </div>

          <div>
            <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">E-mail:</label>
            <input type="email" id="email" name="email" required placeholder="váš@email.cz">
          </div>

          <div>
            <label for="phone" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Telefon:</label>
            <input type="tel" id="phone" name="phone" placeholder="+420 123 456 789">
          </div>

          <div>
            <label for="message" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Zpráva:</label>
            <textarea id="message" name="message" rows="5" required placeholder="Vaše zpráva..." style="resize: vertical;"></textarea>
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Odeslat zprávu</button>
        </form>
      </div>

      <div style="text-align: center; margin-top: 2rem; color: var(--muted);">
        <p>📞 +420 775 189 574 | 📧 info@jlstrechy.cz</p>
      </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
      <div class="footer-content">
        <div class="footer-icons">
          <a href="https://www.facebook.com/" target="_blank" rel="noopener" title="Facebook">
            <img src="images/social_footer/facebook-ikon.jpeg" alt="Facebook">
          </a>
          <a href="https://www.instagram.com/" target="_blank" rel="noopener" title="Instagram">
            <img src="images/social_footer/pintress-ikon.jpeg" alt="Instagram">
          </a>
          <a href="https://wa.me/420775189574" target="_blank" rel="noopener" title="WhatsApp">
            <img src="images/social_footer/whatsapp-ikon.jpeg" alt="WhatsApp">
          </a>
          <a href="tel:+420775189574" title="Zavolat">
            <img src="images/social_footer/call-ikon.jpeg" alt="Telefon">
          </a>
        </div>

        <p style="margin: 1rem 0; font-size: 0.9rem;">
          <strong>JL STŘECHY S.R.O.</strong><br>
          IČ: 12345678 | DIČ: CZ12345678<br>
          📧 info@jlstrechy.cz | 📞 +420 775 189 574<br>
          © 2025 JL Střechy. Všechna práva vyhrazena.
        </p>
      </div>
    </footer>
  </div>

  <!-- Scripts -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script src="js/main-design.js"></script>

  <script>
    // Inicializace AOS animací
    AOS.init({
      duration: 800,
      once: true,
      easing: 'ease-in-out',
      offset: 100
    });
  </script>
</body>
</html>
<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JL Střechy – Tesařství a klempířství</title>
  <meta name="description" content="JL střechy – Premium řemeslo bez železného přikrášlování. Střechy, tesařství, klempířství.">
  <meta name="keywords" content="střechy, tesařství, klempířství, dřevo, řemeslo">
  <meta name="robots" content="index, follow">
  
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="style/design.css">
</head>
<body>
  <div class="container">
    <!-- Úvodní kotva -->
    <div id="Úvod"></div>

<nav class="main-nav">
<div class="menu-logo"><img src="images/logo.png" alt="JL Střechy logo"></div>

  <div class="menu-group"><a href="#uvod">Úvod</a></div>

  <div class="menu-group">
    <a href="#o-nas">O nás</a>
    <ul class="submenu">
      <li><a href="#profil">Profil zakladatele</a></li>
      <li><a href="#mise">Mise a hodnoty</a></li>
      <li><a href="#doklady">Oficiální doklady & kontakty</a></li>
      <li><a href="#certifikace">Certifikace: IČ, DIČ, OSSZ, EORI</a></li>
    </ul>
  </div>

  <div class="menu-group">
    <a href="#sluzby">Služby</a>
    <ul class="submenu">
      <li><a href="#remeslo">Řemeslné zakázky</a></li>
      <li><a href="#docasne">Dočasné zaměstnávání</a></li>
      <li><a href="#vyroba">Výroba a e-shop</a></li>
      <li><a href="#vypadek">Náhradní řešení při výpadku pracovníků</a></li>
    </ul>
  </div>

  <div class="menu-group">
    <a href="#pro-firmy">Pro firmy</a>
    <ul class="submenu">
      <li><a href="#spoluprace">Jak probíhá spolupráce</a></li>
      <li><a href="#vyhody-firem">Přehled výhod</a></li>
      <li><a href="#reference">Reference a zakázky</a></li>
      <li><a href="#poptavka">Rychlý formulář: Zadat poptávku</a></li>
    </ul>
  </div>

  <div class="menu-group">
    <a href="#pro-pracovniky">Pro pracovníky</a>
    <ul class="submenu">
      <li><a href="#jak-se-pridat">Jak se přidat do týmu</a></li>
      <li><a href="#vyhody-prace">Výhody práce</a></li>
      <li><a href="#formular-pracovnik">Formulář: Chci pracovat</a></li>
      <li><a href="#social-media">Sociální sítě</a></li>
    </ul>
  </div>

  <div class="menu-group"><a href="#galerie">Galerie</a></div>
  <div class="menu-group"><a href="#kontakt">Kontakt</a></div>

  <button id="toggle-darkmode">🌙</button>
</nav>


    <header data-aos="fade-up">
      <img src="images/logo.png" alt="JL Střechy logo" class="logo-fixed">

      

      <div class="intro-text">
        <h1>POSTAVME TO!</h1>
        <p>Střechy stavíme s citem a dřevem.<br>Bez zbytečného železa.</p>
        <button onclick="location.href='#services'">Naše služby</button>
      </div>
      <div class="intro-img">
        <img src="images/worker.jpg" alt="Pracovník">
      </div>
    </header>

    <!-- O nás sekce -->
    <section id="O-nás" data-aos="fade-up" class="contact-wrapper">
      <h2>O nás</h2>
      <p>Jsme tým řemeslníků s vášní pro dřevo a krásné střechy. Děláme věci poctivě – bez kompromisů.</p>
    </section>

    <section class="services" id="services" data-aos="fade-up">
      <h2>Co děláme</h2>
      <div class="service-grid">
        <div class="service-item" data-aos="zoom-in"><i>🏠</i><strong>Střechy</strong></div>
        <div class="service-item" data-aos="zoom-in"><i>🪚</i><strong>Tesařství</strong></div>
        <div class="service-item" data-aos="zoom-in"><i>🔧</i><strong>Klempířství</strong></div>
        <div class="service-item" data-aos="zoom-in"><i>🏘️</i><strong>Prodej výrobků</strong></div>
      </div>
    </section>

    <section class="gallery" id="gallery" data-aos="fade-up">
      <h2>Realizace</h2>
      <div class="gallery-grid">
        <div class="gallery-item" data-aos="zoom-in">
          <img src="images/05_Garáž dřevostavba/Obrázek WhatsApp.jpg" alt="Krov" loading="lazy">
        </div>
        <div class="gallery-item" data-aos="zoom-in">
          <img src="images/02-BALKON/IMG-20250720-WA0022.jpg" alt="Bungalov" loading="lazy">
        </div>
        <div class="gallery-item" data-aos="zoom-in">
          <img src="images/01.jpg" alt="Dům" loading="lazy">
        </div>
      </div>
      <br />
      <button class="btn-yellow">Celá galerie</button>
    </section>

    <section class="contact-form" id="contact" data-aos="fade-up" class="contact-wrapper">
      <div style="background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px); border-radius: 12px; padding: 2rem; max-width: 600px; margin: 2rem auto; color: #fff;">
        <h2>Kontaktujte nás</h2>
        <form action="form-handler.php" method="POST">
          <input type="hidden" name="csrf_token" value="<?php echo bin2hex(random_bytes(32)); ?>">
          <label for="name">Jméno a příjmení</label><br>
          <input type="text" id="name" name="name" required style="width: 100%; padding: 0.5rem; margin-bottom: 1rem;"><br>
          <label for="email">E-mail</label><br>
          <input type="email" id="email" name="email" required style="width: 100%; padding: 0.5rem; margin-bottom: 1rem;"><br>
          <label for="message">Zpráva</label><br>
          <textarea id="message" name="message" rows="5" required style="width: 100%; padding: 0.5rem;"></textarea><br><br>
          <button type="submit" class="btn-yellow">Odeslat</button>
        </form>
      </div>
    </section>

    


<footer class="footer glass-footer">
  <div class="footer-left-icons">
    <div class="footer-icons">
      <a href="https://www.facebook.com/" target="_blank"><img src="images/social_footer/facebook-ikon.jpeg" alt="Facebook"></a>
      <a href="https://www.instagram.com/" target="_blank"><img src="images/social_footer/pintress-ikon.jpeg" alt="Instagram"></a>
      <a href="https://wa.me/420775189574" target="_blank"><img src="images/social_footer/whatsapp-ikon.jpeg" alt="WhatsApp"></a>
      <a href="tel:+420775189574"><img src="images/social_footer/call-ikon.jpeg" alt="Telefon"></a>
    </div>
  </div>
  <div class="footer-center-text">
    <img src="images/social_footer/footerikona.png" alt="DKI logo" class="footer-logo"><br>
    <p><strong>DAVID KOZÁK INTERNATIONAL S.R.O.</strong><br>
    📧 info@david-kozak.com | 🌐 www.david-kozak.com | 📞 +420 775 189 574</p>
  </div>
</footer>



  </div>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const toggle = document.getElementById("toggle-darkmode");
  toggle.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
  });
});
</script>
  <script>
    AOS.init({
      duration: 1000,
      once: true,
      easing: 'ease-in-out'
    });
  </script>
  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'GA_MEASUREMENT_ID');
  </script>
</body>
</html>

