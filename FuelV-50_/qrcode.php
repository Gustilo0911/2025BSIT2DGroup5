<?php require_once __DIR__ . '/includes/auth.php'; requireAuthOrRedirect(); $profile = getUserProfile(getCurrentUserEmail()); include 'includes/header.php'; ?>
<main class="container">
  <section class="section reveal">
    <h2>Scan to Authorize</h2>
    <p class="lead">Open your camera, point at the QR on-screen, and authorize at the pump.</p>
    <div style="display:flex;gap:20px;align-items:flex-start;flex-wrap:wrap;">
      <canvas id="qrCanvas" style="border:1px solid #eee;border-radius:10px;background:#fff;"></canvas>
      <div>
        <p id="qr-meta" style="font-weight:700;margin-top:6px;"></p>
        <div style="margin-top:12px;"><button id="toReceipt" class="btn btn-primary">Complete & View Receipt</button></div>
      </div>
    </div>
  </section>
</main>
<script>document.addEventListener('DOMContentLoaded',initQRPage);</script>
<?php if(!empty($profile['plate'])){ echo '<div id="autoPayPlate" style="display:none">'.htmlspecialchars($profile['plate']).'</div>'; } ?>
<?php include 'includes/footer.php'; ?>