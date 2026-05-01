<?php
require 'db.php';
$success = '';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';
    
    if ($password !== $password_confirm) {
        $error = "Hesla se neshodují.";
    } elseif (strlen($password) < 6) {
        $error = "Heslo musí mít alespoň 6 znaků.";
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $password_hash]);
            $success = "Registrace úspěšná. <a href='login.php' style='color: #f0b000;'>Přihlásit se zde</a>";
        } catch (Exception $e) {
            $error = "Uživatelské jméno nebo e-mail již existuje.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrace - JL střechy</title>
  <link rel="stylesheet" href="style/css.css">
  <style>
    body {
      background: linear-gradient(135deg, #1a0f0c 0%, #2d1810 50%, #1a0f0c 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }
    
    .register-container {
      background: rgba(60, 30, 10, 0.5);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(240, 176, 0, 0.2);
      border-radius: 20px;
      padding: 3rem;
      max-width: 450px;
      width: 100%;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3), inset 0 1px 1px rgba(255, 255, 255, 0.1);
    }
    
    .register-container h2 {
      color: #f0b000;
      text-align: center;
      margin-bottom: 2rem;
      font-size: 2rem;
    }
    
    .form-group {
      margin-bottom: 1.5rem;
    }
    
    .form-group label {
      display: block;
      color: #fff;
      margin-bottom: 0.5rem;
      font-weight: 500;
    }
    
    .form-group input {
      width: 100%;
      padding: 0.75rem 1rem;
      background: rgba(240, 176, 0, 0.08);
      border: 1px solid rgba(240, 176, 0, 0.3);
      border-radius: 10px;
      color: #fff;
      font-size: 1rem;
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
      box-sizing: border-box;
    }
    
    .form-group input:focus {
      outline: none;
      background: rgba(240, 176, 0, 0.15);
      border-color: rgba(240, 176, 0, 0.8);
      box-shadow: 0 0 12px rgba(240, 176, 0, 0.2);
    }
    
    .register-container button {
      width: 100%;
      padding: 0.75rem 1.5rem;
      background: linear-gradient(135deg, #f0b000, #ffea00);
      color: #000;
      border: none;
      border-radius: 10px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      font-size: 1rem;
    }
    
    .register-container button:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(240, 176, 0, 0.3);
    }
    
    .error {
      color: #ff6b6b;
      text-align: center;
      margin-bottom: 1rem;
      padding: 0.75rem;
      background: rgba(255, 107, 107, 0.1);
      border-radius: 8px;
      border-left: 3px solid #ff6b6b;
    }
    
    .success {
      color: #51cf66;
      text-align: center;
      margin-bottom: 1rem;
      padding: 0.75rem;
      background: rgba(81, 207, 102, 0.1);
      border-radius: 8px;
      border-left: 3px solid #51cf66;
    }
    
    .link-section {
      text-align: center;
      margin-top: 1.5rem;
      color: #fff;
    }
    
    .link-section a {
      color: #f0b000;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    
    .link-section a:hover {
      color: #ffea00;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Registrace</h2>
    <?php if ($success): ?>
      <div class="success"><?php echo $success; ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
      <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="form-group">
        <label for="username">Uživatelské jméno</label>
        <input type="text" name="username" id="username" placeholder="Vaše jméno" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Váš e-mail" required>
      </div>
      <div class="form-group">
        <label for="password">Heslo</label>
        <input type="password" name="password" id="password" placeholder="Vaše heslo" required>
      </div>
      <div class="form-group">
        <label for="password_confirm">Potvrzení hesla</label>
        <input type="password" name="password_confirm" id="password_confirm" placeholder="Potvrďte heslo" required>
      </div>
      <button type="submit">Zaregistrovat</button>
    </form>
    <div class="link-section">
      <p>Již máte účet? <a href="login.php">Přihlásit se zde</a></p>
    </div>
  </div>
</body>
</html>