<?php require_once __DIR__ . '/includes/auth.php'; ensureSessionStarted(); $email = getCurrentUserEmail(); if(!$email){ header('Location: signin.php'); exit; } $profile = getUserProfile($email); if($_SERVER['REQUEST_METHOD']==='POST'){ if(isset($_POST['name'])) updateUserName($email, $_POST['name']); if(isset($_POST['plate'])) updateUserPlate($email, $_POST['plate']); $profile = getUserProfile($email); } include 'includes/header.php'; ?>
<main class="container">
  <section class="section reveal">
    <h2>Your Account</h2>
    <p class="lead">Signed in as <strong><?php echo htmlspecialchars($email); ?></strong></p>
    <div class="card" style="max-width:560px;">
      <p>Welcome to Fuel V. From here you can quickly jump to actions.</p>
      <div style="display:flex;gap:12px;flex-wrap:wrap;">
        <a class="btn btn-primary" href="services.php">Fuel Now</a>
        <a class="btn btn-outline" href="qrcode.php">Show QR</a>
        <a class="btn btn-outline" href="receipt.php">View Receipt</a>
        <a class="btn btn-outline" href="logout.php">Logout</a>
      </div>
    </div>
  </section>
  <section class="section reveal">
    <h3>Profile</h3>
    <div class="card" style="max-width:560px;">
      <form method="POST" action="account.php" style="display:grid;gap:10px;">
        <input name="name" placeholder="Display name" value="<?php echo htmlspecialchars($profile['name'] ?? ''); ?>" style="padding:10px;border:1px solid #eee;border-radius:8px;">
        <input name="plate" placeholder="Plate number" value="<?php echo htmlspecialchars($profile['plate'] ?? ''); ?>" style="padding:10px;border:1px solid #eee;border-radius:8px;">
        <button class="btn btn-primary" type="submit">Save</button>
      </form>
    </div>
  </section>
  <section class="section reveal">
    <h3>Recent Sign-ins</h3>
    <div class="card" style="max-width:560px;">
      <pre style="white-space:pre-wrap;overflow:auto;">
<?php
$log = @file_get_contents(__DIR__ . '/signins.txt');
echo htmlspecialchars($log ? trim($log) : 'No sign-ins recorded yet.');
?>
      </pre>
    </div>
  </section>
</main>
<?php include 'includes/footer.php'; ?>

