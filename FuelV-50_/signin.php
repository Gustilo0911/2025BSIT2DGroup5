<?php require_once __DIR__ . '/includes/auth.php'; ensureSessionStarted(); $redirect = $_GET['redirect'] ?? 'account.php'; if($_SERVER['REQUEST_METHOD']==='POST'){ $email = sanitizeEmail($_POST['email'] ?? ''); $name = trim($_POST['name'] ?? ''); $plate = sanitizePlate($_POST['plate'] ?? ''); if($email){ createUser($email, $name, $plate); loginUser($email); file_put_contents(__DIR__ . '/signins.txt', date('c') . ' | ' . $email . PHP_EOL, FILE_APPEND); header('Location: ' . $redirect); exit; } } include 'includes/header.php'; ?>
<main class="container">
  <section style="display:flex;justify-content:center;align-items:center;min-height:60vh;">
    <div style="width:380px;background:#0f1720;color:#fff;padding:22px;border-radius:12px;box-shadow:0 18px 40px rgba(2,6,23,0.6);">
      <h3 style="margin:0 0 6px 0;">Sign in to Fuel V</h3>
      <p style="margin:0 0 12px 0;color:#9aa3ad;">Enter your email to continue</p>
      <form method="POST" action="signin.php?redirect=<?php echo urlencode($redirect); ?>">
        <input name="name" type="text" placeholder="Your name (optional)" style="width:100%;padding:12px;border-radius:8px;border:0;margin-bottom:10px;">
        <input name="plate" type="text" placeholder="Plate number (optional)" style="width:100%;padding:12px;border-radius:8px;border:0;margin-bottom:10px;" >
        <input name="email" type="email" placeholder="name@example.com" style="width:100%;padding:12px;border-radius:8px;border:0;margin-bottom:10px;" required>
        <button class="btn btn-primary" type="submit" style="width:100%;padding:12px;border-radius:8px;font-weight:800;">Continue</button>
      </form>
      <div style="margin-top:12px;display:flex;gap:8px;flex-direction:column;">
        <button style="background:#fff;color:#000;padding:10px;border-radius:8px;border:0;font-weight:700;">Continue with Google</button>
        <button style="background:#111;color:#fff;padding:10px;border-radius:8px;border:0;font-weight:700;">Continue with GitHub</button>
        <button style="background:#000;color:#fff;padding:10px;border-radius:8px;border:0;font-weight:700;">Continue with Apple</button>
      </div>
      <p style="margin-top:12px;font-size:0.9rem;color:#9aa3ad;">By continuing, we will create your account if it doesn't exist.</p>
    </div>
  </section>
</main>
<?php include 'includes/footer.php'; ?>