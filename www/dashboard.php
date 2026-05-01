<?php
require 'auth.php';
?>
<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrace - JL střechy</title>
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
    }
    
    .navbar {
      background: rgba(60, 30, 10, 0.7);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid rgba(240, 176, 0, 0.3);
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }
    
    .navbar h1 {
      color: #f0b000;
      font-size: 1.5rem;
    }
    
    .navbar a {
      color: #fff;
      text-decoration: none;
      background: linear-gradient(135deg, #f0b000, #ffea00);
      color: #000;
      padding: 0.6rem 1.2rem;
      border-radius: 8px;
      font-weight: 600;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
    }
    
    .navbar a:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(240, 176, 0, 0.3);
    }
    
    .container {
      max-width: 1200px;
      margin: 3rem auto;
      padding: 0 2rem;
    }
    
    .dashboard-header {
      background: rgba(60, 30, 10, 0.5);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(240, 176, 0, 0.2);
      border-radius: 16px;
      padding: 2rem;
      margin-bottom: 2rem;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2), inset 0 1px 1px rgba(255, 255, 255, 0.1);
    }
    
    .dashboard-header h2 {
      color: #f0b000;
      margin-bottom: 0.5rem;
      font-size: 2rem;
    }
    
    .dashboard-header p {
      color: rgba(255, 255, 255, 0.8);
      font-size: 1.1rem;
    }
    
    .dashboard-content {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem;
    }
    
    .card {
      background: rgba(60, 30, 10, 0.5);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(240, 176, 0, 0.2);
      border-radius: 16px;
      padding: 2rem;
      transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2), inset 0 1px 1px rgba(255, 255, 255, 0.1);
    }
    
    .card:hover {
      background: rgba(60, 30, 10, 0.7);
      border-color: rgba(240, 176, 0, 0.6);
      transform: translateY(-8px);
      box-shadow: 0 12px 40px rgba(240, 176, 0, 0.15);
    }
    
    .card h3 {
      color: #f0b000;
      margin-bottom: 1rem;
      font-size: 1.3rem;
    }
    
    .card p {
      color: rgba(255, 255, 255, 0.8);
      line-height: 1.6;
      margin-bottom: 1rem;
    }
    
    .card a {
      display: inline-block;
      background: linear-gradient(135deg, #f0b000, #ffea00);
      color: #000;
      padding: 0.6rem 1.2rem;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .card a:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(240, 176, 0, 0.3);
    }
    
    .messages-section {
      margin-top: 3rem;
      background: rgba(60, 30, 10, 0.5);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(240, 176, 0, 0.2);
      border-radius: 16px;
      padding: 2rem;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2), inset 0 1px 1px rgba(255, 255, 255, 0.1);
    }
    
    .messages-section h2 {
      color: #f0b000;
      margin-bottom: 1.5rem;
      font-size: 1.8rem;
    }
    
    .messages-table {
      width: 100%;
      border-collapse: collapse;
      color: #fff;
    }
    
    .messages-table th, .messages-table td {
      padding: 0.75rem;
      text-align: left;
      border-bottom: 1px solid rgba(240, 176, 0, 0.2);
    }
    
    .messages-table th {
      background: rgba(240, 176, 0, 0.1);
      color: #f0b000;
      font-weight: 600;
    }
    
    .messages-table tr:hover {
      background: rgba(240, 176, 0, 0.05);
    }
    
    .users-section {
      margin-top: 3rem;
      background: rgba(60, 30, 10, 0.5);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(240, 176, 0, 0.2);
      border-radius: 16px;
      padding: 2rem;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2), inset 0 1px 1px rgba(255, 255, 255, 0.1);
    }
    
    .users-section h2 {
      color: #f0b000;
      margin-bottom: 1.5rem;
      font-size: 1.8rem;
    }
    
    .users-table {
      width: 100%;
      border-collapse: collapse;
      color: #fff;
    }
    
    .users-table th, .users-table td {
      padding: 0.75rem;
      text-align: left;
      border-bottom: 1px solid rgba(240, 176, 0, 0.2);
    }
    
    .users-table th {
      background: rgba(240, 176, 0, 0.1);
      color: #f0b000;
      font-weight: 600;
    }
    
    .users-table tr:hover {
      background: rgba(240, 176, 0, 0.05);
    }
    
    .delete-user {
      color: #ff6b6b;
      text-decoration: none;
    }
    
    .delete-user:hover {
      text-decoration: underline;
    }
    
    .upload-section {
      margin-top: 3rem;
      background: rgba(60, 30, 10, 0.5);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(240, 176, 0, 0.2);
      border-radius: 16px;
      padding: 2rem;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2), inset 0 1px 1px rgba(255, 255, 255, 0.1);
    }
    
    .upload-section h2 {
      color: #f0b000;
      margin-bottom: 1.5rem;
      font-size: 1.8rem;
    }
    
    .upload-section form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }
    
    .upload-section label {
      color: #fff;
      font-weight: 500;
    }
    
    .upload-section input, .upload-section select {
      padding: 0.75rem;
      background: rgba(240, 176, 0, 0.08);
      border: 1px solid rgba(240, 176, 0, 0.3);
      border-radius: 8px;
      color: #fff;
    }
    
    .upload-section button {
      background: linear-gradient(135deg, #f0b000, #ffea00);
      color: #000;
      border: none;
      padding: 0.75rem;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <h1>JL Střechy - Administrace</h1>
    <a href="logout.php">Odhlásit se</a>
  </div>
  
  <div class="container">
    <div class="dashboard-header">
      <h2>Vítejte v administraci!</h2>
      <p>Jste přihlášeni jako: <strong><?php echo $_SESSION['role']; ?></strong></p>
    </div>
    
    <div class="dashboard-content">
      <div class="card">
        <h3>📁 Projekty</h3>
        <p>Spravujte vaše projekty a realizace.</p>
        <a href="projekt.php">Zobrazit projekty</a>
      </div>
      
      <div class="card">
        <h3>🎨 Galerie</h3>
        <p>Přidávejte a upravujte fotografie.</p>
        <a href="galerie.php">Spravovat galerii</a>
      </div>
      
      <div class="card">
        <h3>👥 Uživatelé</h3>
        <p>Správa uživatelských účtů.</p>
        <a href="#users">Uživatelé</a>
      </div>
      
      <div class="card">
        <h3>📧 Kontakty</h3>
        <p>Přijaté zprávy od návštěvníků.</p>
        <a href="#messages">Zprávy</a>
      </div>
    </div>
    
    <!-- Sekce pro zprávy -->
    <div id="messages" class="messages-section">
      <h2>Kontaktní zprávy</h2>
      <?php
      $stmt = $pdo->query("SELECT * FROM formular ORDER BY created_at DESC");
      $messages = $stmt->fetchAll();
      if ($messages):
      ?>
      <table class="messages-table">
        <thead>
          <tr>
            <th>Jméno</th>
            <th>E-mail</th>
            <th>Zpráva</th>
            <th>Datum</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($messages as $msg): ?>
          <tr>
            <td><?php echo htmlspecialchars($msg['jmeno']); ?></td>
            <td><?php echo htmlspecialchars($msg['email']); ?></td>
            <td><?php echo htmlspecialchars($msg['zprava']); ?></td>
            <td><?php echo $msg['created_at']; ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <!-- Sekce pro uživatele -->
    <div id="users" class="users-section">
      <h2>Správa uživatelů</h2>
      <?php
      $stmt = $pdo->query("SELECT id, username, email, role FROM users ORDER BY id");
      $users = $stmt->fetchAll();
      if ($users):
      ?>
      <table class="users-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Uživatelské jméno</th>
            <th>E-mail</th>
            <th>Role</th>
            <th>Akce</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user): ?>
          <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo htmlspecialchars($user['username']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['role']); ?></td>
            <td><a href="#" class="delete-user" data-id="<?php echo $user['id']; ?>">Smazat</a></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php else: ?>
      <p>Žádní uživatelé.</p>
      <?php endif; ?>
    </div>
    
    <!-- Sekce pro upload obrázků -->
    <div class="upload-section">
      <h2>Nahrát obrázek do galerie</h2>
      <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?php echo bin2hex(random_bytes(32)); ?>">
        <label for="image">Vyberte obrázek:</label>
        <input type="file" name="image" id="image" accept="image/*" required>
        <label for="project">Projekt:</label>
        <select name="project" id="project">
          <option value="00-Vrata do garáže">00-Vrata do garáže</option>
          <!-- Add other projects -->
        </select>
        <button type="submit">Nahrát</button>
      </form>
    </div>
  </div>
</body>
</html>