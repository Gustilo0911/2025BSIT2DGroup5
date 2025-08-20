<?php include 'includes/header.php'; ?>
<main class="container">
  <section class="hero">
    <div class="hero-card reveal">
      <h1><span class="typewriter" data-text="Fuel V — Scan & Go: Fast fueling, zero wait."></span></h1>
      <p class="lead">Power your drive with instant QR authorization, transparent pricing, and clean digital receipts — designed for speed at every stop.</p>
      <div class="cta-row">
        <a class="btn btn-primary" href="services.php">Fuel Now</a>
        <a class="btn btn-outline" href="qrcode.php">Show QR</a>
      </div>
    </div>
    <img class="reveal" src="assets/images/hero.jpg" width="700" height="400" alt="Hero image">
  </section>
  <section class="section reveal">
    <h2>Why choose Fuel V?</h2>
    <div class="grid">
      <article class="card"><h3>Scan & Authorize</h3><p>One QR, instant approval at the pump. No cards, no cash.</p></article>
      <article class="card"><h3>No Queues</h3><p>Start, pay, and go — your time matters.</p></article>
      <article class="card"><h3>Digital Receipts</h3><p>Auto-generated, easy to print or save anytime.</p></article>
    </div>
  </section>
  <section class="section reveal">
    <h2>How it works</h2>
    <div class="grid">
      <article class="card"><h3>1 — Pick fuel</h3><p>Select Regular, Premium, or Diesel and enter liters.</p></article>
      <article class="card"><h3>2 — Scan QR</h3><p>Authorize payment right from your phone.</p></article>
      <article class="card"><h3>3 — Pump & Go</h3><p>Fuel completes, receipt is ready instantly.</p></article>
    </div>
  </section>
  <section class="section reveal">
    <h2>Our Services</h2>
    <div class="grid">
      <article class="card">
        <h3>Everyday — Regular</h3><p>Reliable fuel for daily driving.</p>
        <p class="lead">₱50.10 / L</p>
        <div style="margin-top:12px;"><a class="btn btn-primary" href="services.php">Start fueling</a></div>
      </article>
      <article class="card">
        <h3>Performance — Premium</h3><p>Engine-optimizing blend for higher performance.</p>
        <p class="lead">₱61.15 / L</p>
        <div style="margin-top:12px;"><a class="btn btn-primary" href="services.php">Start fueling</a></div>
      </article>
      <article class="card">
        <h3>Commercial — Diesel</h3><p>High-capacity fueling for heavy workloads.</p>
        <p class="lead">₱54.65 / L</p>
        <div style="margin-top:12px;"><a class="btn btn-primary" href="services.php">Start fueling</a></div>
      </article>
    </div>
  </section>
  <section class="section reveal">
    <h2>Transparent Pricing</h2>
    <div class="grid">
      <article class="card"><h3>Regular</h3><p class="lead">₱50.10 / L</p><small>Everyday value and dependable performance.</small></article>
      <article class="card"><h3>Premium</h3><p class="lead">₱61.15 / L</p><small>Optimized blend for power and efficiency.</small></article>
      <article class="card"><h3>Diesel</h3><p class="lead">₱54.65 / L</p><small>High-capacity fueling for heavy workloads.</small></article>
    </div>
  </section>
  <section class="section reveal">
    <h2>What drivers say</h2>
    <div class="grid">
      <article class="card"><p>“Fastest pit stop I’ve had. Scan, fuel, done.”</p><small>— Shem, daily commuter</small></article>
      <article class="card"><p>“No more waiting in line. The QR flow is so smooth.”</p><small>— Franclehn, rideshare driver</small></article>
      <article class="card"><p>“Digital receipt in seconds. Super convenient.”</p><small>— Steve, small business owner</small></article>
    </div>
  </section>
</main>
<div class="fab" title="Fuel Now" onclick="location.href='services.php'"><span class="pulse"></span>⛽</div>
<?php include 'includes/footer.php'; ?>