<?php require_once __DIR__ . '/includes/auth.php'; ensureSessionStarted(); $redirect = $_GET['redirect'] ?? 'account.php'; if($_SERVER['REQUEST_METHOD']==='POST'){ $plate = sanitizePlate($_POST['plate'] ?? ''); if($plate){ $u = findUserByPlate($plate); if($u && !empty($u['email'])){ loginUser($u['email']); header('Location: ' . $redirect); exit; } } $email = sanitizeEmail($_POST['email'] ?? ''); $password = $_POST['password'] ?? ''; if($email && $password){ if(!userExists($email)) { createUser($email); } loginUser($email); header('Location: ' . $redirect); exit; } } include 'includes/header.php'; ?>
<main class="container">
  <section class="section reveal">
    <h2>Member Login</h2>
    <form method="POST" action="login.php?redirect=<?php echo urlencode($redirect); ?>">
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
        <input type="text" name="plate" placeholder="Plate number">
        <input type="email" name="email" placeholder="Email">
      </div>
      <div style="margin-top:10px;"><input type="password" name="password" placeholder="Password"></div>
      <button class="btn btn-primary" type="submit">Login</button>
    </form>
    <p class="lead">Login using plate or email. We'll create your account if needed.</p>
  </section>
</main>
<?php include 'includes/footer.php'; ?>