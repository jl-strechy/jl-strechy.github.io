<?php
require 'db.php';
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Neplatné přihlašovací údaje.";
    }
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Přihlášení - JL střechy</title>
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
    
    .login-container {
      background: rgba(60, 30, 10, 0.5);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(240, 176, 0, 0.2);
      border-radius: 20px;
      padding: 3rem;
      max-width: 400px;
      width: 100%;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3), inset 0 1px 1px rgba(255, 255, 255, 0.1);
    }
    
    .login-container h2 {
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
    
    .login-container button {
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
    
    .login-container button:hover {
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
  <div class="login-container">
    <h2>Přihlášení</h2>
    <?php if ($error): ?>
      <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="form-group">
        <label for="username">Uživatelské jméno</label>
        <input type="text" name="username" id="username" placeholder="Vaše jméno" required>
      </div>
      <div class="form-group">
        <label for="password">Heslo</label>
        <input type="password" name="password" id="password" placeholder="Vaše heslo" required>
      </div>
      <button type="submit">Přihlásit se</button>
    </form>
    <div class="link-section">
      <p>Nemáte účet? <a href="register.php">Zaregistrujte se zde</a></p>
    </div>
  </div>
</body>
</html>