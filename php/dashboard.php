<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: login.html');
    exit;
}
$name = htmlspecialchars($_SESSION['user_name']);
$role = $_SESSION['user_role'] ?? 'user';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Dashboard - Asadi Tech Solutions</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header class="site-header">
    <div class="container nav">
      <h1 class="brand">Asadi Tech <span>Dashboard</span></h1>
      <nav>
        <a href="index.html">Home</a>
        <a href="logout.php" class="btn small">Logout</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <section class="dashboard">
      <h2>Welcome, <?= $name ?></h2>
      <p>Role: <strong><?= htmlspecialchars($role) ?></strong></p>

      <div class="card-grid">
        <div class="card">
          <h3>Manage Services</h3>
          <p>(Coming soon) — You will be able to add or edit services here.</p>
        </div>
        <div class="card">
          <h3>Messages</h3>
          <p>Check the messages.txt file or the contact messages logged in the database.</p>
        </div>
        <div class="card">
          <h3>Portfolio</h3>
          <p>Upload screenshots and descriptions of your projects from here later.</p>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="container">© <?= date('Y') ?> Asadi Tech Solutions — Butaleja</div>
  </footer>
</body>
</html>
