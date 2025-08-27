<?php require_once __DIR__ . '/auth.php'; ensureSessionStarted(); $activePath = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); $userEmail = getCurrentUserEmail(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="Fuel V - Scan & Go: Fast fueling, zero wait. Power your drive with instant QR authorization and transparent pricing.">
  <meta name="keywords" content="fuel, gas station, QR code, mobile payment, fuel app">
  <meta name="author" content="Fuel V">
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  
  <title>Fuel V - Scan & Go</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script defer src="assets/js/script.js"></script>
</head>
<body>
<header>
  <nav class="navbar">
    <div class="nav-left">
      <div class="logo">
        <a href="index.php">Fuel V</a>
      </div>
      <button class="burger" onclick="toggleMenu()" aria-label="Toggle Menu">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3 12h18M3 6h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </button>
      <ul class="nav-links" id="navLinks">
        <li><a href="index.php" class="<?php echo $activePath==='index.php' ? 'active' : ''; ?>">Home</a></li>
        <li><a href="about.php" class="<?php echo $activePath==='about.php' ? 'active' : ''; ?>">About</a></li>
        <li><a href="services.php" class="<?php echo $activePath==='services.php' ? 'active' : ''; ?>">Services</a></li>
        <li><a href="qrcode.php" class="<?php echo $activePath==='qrcode.php' ? 'active' : ''; ?>">QR</a></li>
        <li><a href="contact.php" class="<?php echo $activePath==='contact.php' ? 'active' : ''; ?>">Contact</a></li>
      </ul>
    </div>
    <div class="nav-actions">
      <button class="icon-btn" id="themeToggle" title="Toggle theme" aria-label="Toggle theme" aria-pressed="false">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </button>
      <?php if($userEmail){ ?>
        <a class="icon-btn" href="account.php" title="Account" aria-label="Account">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M12 12c2.761 0 5-2.239 5-5S14.761 2 12 2 7 4.239 7 7s2.239 5 5 5Zm0 2c-4.418 0-8 2.239-8 5v1h16v-1c0-2.761-3.582-5-8-5Z" fill="currentColor"/>
          </svg>
        </a>
        <a class="signin-link" href="logout.php">Logout</a>
      <?php } else { ?>
        <a class="signin-link" href="signin.php">Sign In</a>
      <?php } ?>
    </div>
  </nav>
</header>
<div class="page-wrapper">
  <div class="content-wrap">