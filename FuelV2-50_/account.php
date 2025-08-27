<?php 
require_once __DIR__ . '/includes/auth.php'; 
ensureSessionStarted(); 
$email = getCurrentUserEmail(); 
if(!$email){ 
  header('Location: signin.php'); 
  exit; 
} 
$profile = getUserProfile($email); 
if($_SERVER['REQUEST_METHOD']==='POST'){ 
  if(isset($_POST['name'])) updateUserName($email, $_POST['name']); 
  if(isset($_POST['plate'])) updateUserPlate($email, $_POST['plate']); 
  $profile = getUserProfile($email); 
} 
include 'includes/header.php'; 
?>

<main class="container">
  <section class="section reveal">
    <h2>Your Account</h2>
    <p class="lead">Signed in as <strong><?php echo htmlspecialchars($email); ?></strong></p>
    
    <div class="card" style="max-width: 600px; margin: 0 auto;">
      <h3>Quick Actions</h3>
      <p>Welcome to Fuel V. From here you can quickly jump to actions.</p>
      <div class="cta-row">
        <a class="btn btn-primary" href="services.php">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Fuel Now
        </a>
        <a class="btn btn-outline" href="qrcode.php">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3 3h6v6H3zM15 3h6v6h-6zM3 15h6v6H3zM15 15h6v6h-6z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Show QR
        </a>
        <a class="btn btn-outline" href="receipt.php">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <polyline points="14,2 14,8 20,8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <line x1="16" y1="13" x2="8" y2="13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <line x1="16" y1="17" x2="8" y2="17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <polyline points="10,9 9,9 8,9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          View Receipt
        </a>
      </div>
    </div>
  </section>
  
  <section class="section reveal">
    <h3>Profile Settings</h3>
    <div class="card" style="max-width: 600px; margin: 0 auto;">
      <form method="POST" action="account.php">
        <div style="margin-bottom: var(--space-4);">
          <label for="name" style="display: block; margin-bottom: var(--space-2); font-weight: 600; color: var(--text);">Display Name</label>
          <input 
            id="name"
            name="name" 
            placeholder="Enter your display name" 
            value="<?php echo htmlspecialchars($profile['name'] ?? ''); ?>"
            required
          >
        </div>
        
        <div style="margin-bottom: var(--space-6);">
          <label for="plate" style="display: block; margin-bottom: var(--space-2); font-weight: 600; color: var(--text);">Plate Number</label>
          <input 
            id="plate"
            name="plate" 
            placeholder="Enter your vehicle plate number" 
            value="<?php echo htmlspecialchars($profile['plate'] ?? ''); ?>"
            required
          >
        </div>
        
        <button class="btn btn-primary" type="submit">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <polyline points="17,21 17,13 7,13 7,21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <polyline points="7,3 7,8 15,8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Save Changes
        </button>
      </form>
    </div>
  </section>
  
  <section class="section reveal">
    <h3>Recent Sign-ins</h3>
    <div class="card" style="max-width: 600px; margin: 0 auto;">
      <div style="display: flex; align-items: center; gap: var(--space-3); margin-bottom: var(--space-4);">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" fill="currentColor"/>
        </svg>
        <span style="font-weight: 600; color: var(--text);">Activity Log</span>
      </div>
      <pre style="white-space: pre-wrap; overflow: auto; max-height: 300px;">
<?php
$log = @file_get_contents(__DIR__ . '/signins.txt');
echo htmlspecialchars($log ? trim($log) : 'No sign-ins recorded yet.');
?>
      </pre>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>

