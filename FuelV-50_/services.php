<?php require_once __DIR__ . '/includes/auth.php'; ensureSessionStarted(); include 'includes/header.php'; ?>
<main class="container">
  <section class="section reveal">
    <h2>Fueling Services</h2>
    <p class="lead">Choose your fuel type, enter liters, and we'll compute your total. Prices per liter: Regular ₱50.10, Premium ₱61.15, Diesel ₱54.65.</p>
    <div class="grid">
      <div class="card">
        <h3>Pump 1 — Regular</h3>
        <p>₱50.10 / L</p>
        <div style="display:flex;gap:10px;align-items:center;margin-top:8px;">
          <input type="number" id="liters-regular" min="1" step="0.1" placeholder="Liters" style="flex:1;padding:10px;border:1px solid #eee;border-radius:8px;">
          <button class="btn btn-outline" onclick="calcTotal('Regular',50.10,'liters-regular','total-regular')">Compute</button>
        </div>
        <p id="total-regular" class="lead" style="margin:8px 0 0 0;">Total: ₱0.00</p>
        <div style="margin-top:12px;"><button class="btn btn-primary" onclick="fuelNowFromUI('Regular',50.10,'liters-regular')">Fuel Now</button></div>
      </div>
      <div class="card">
        <h3>Pump 2 — Premium</h3>
        <p>₱61.15 / L</p>
        <div style="display:flex;gap:10px;align-items:center;margin-top:8px;">
          <input type="number" id="liters-premium" min="1" step="0.1" placeholder="Liters" style="flex:1;padding:10px;border:1px solid #eee;border-radius:8px;">
          <button class="btn btn-outline" onclick="calcTotal('Premium',61.15,'liters-premium','total-premium')">Compute</button>
        </div>
        <p id="total-premium" class="lead" style="margin:8px 0 0 0;">Total: ₱0.00</p>
        <div style="margin-top:12px;"><button class="btn btn-primary" onclick="fuelNowFromUI('Premium',61.15,'liters-premium')">Fuel Now</button></div>
      </div>
      <div class="card">
        <h3>Pump 3 — Diesel</h3>
        <p>₱54.65 / L</p>
        <div style="display:flex;gap:10px;align-items:center;margin-top:8px;">
          <input type="number" id="liters-diesel" min="1" step="0.1" placeholder="Liters" style="flex:1;padding:10px;border:1px solid #eee;border-radius:8px;">
          <button class="btn btn-outline" onclick="calcTotal('Diesel',54.65,'liters-diesel','total-diesel')">Compute</button>
        </div>
        <p id="total-diesel" class="lead" style="margin:8px 0 0 0;">Total: ₱0.00</p>
        <div style="margin-top:12px;"><button class="btn btn-primary" onclick="fuelNowFromUI('Diesel',54.65,'liters-diesel')">Fuel Now</button></div>
      </div>
    </div>
  </section>
</main>
<?php include 'includes/footer.php'; ?>