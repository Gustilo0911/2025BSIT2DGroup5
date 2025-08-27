<?php require_once __DIR__ . '/includes/auth.php'; requireAuthOrRedirect(); include 'includes/header.php'; ?>
<main class="container">
  <section class="section reveal">
    <h2>Receipt</h2>
    <p class="lead">Your receipt — print or save for your records.</p>
    <div class="card" style="max-width:560px;">
      <div id="receipt-details" style="margin-bottom:12px;"></div>
      <div style="display:flex;gap:12px;">
        <button id="printReceipt" class="btn btn-primary">Print / Download</button>
        <a class="btn btn-outline" href="index.php">Back to Home</a>
      </div>
    </div>
  </section>
</main>
<script>document.addEventListener('DOMContentLoaded',initReceiptPage);</script>
<?php include 'includes/footer.php'; ?>