<?php 
require_once __DIR__ . '/includes/auth.php'; 
ensureSessionStarted(); 
include 'includes/header.php'; 
?>

<main class="container">
  <section class="section reveal">
    <h2>Fueling Services</h2>
    <p class="lead">Choose your fuel type, enter liters, and we'll compute your total. Prices per liter: Regular ₱50.10, Premium ₱61.15, Diesel ₱54.65, Ethanol ₱79.49.</p>
    
    <div class="grid">
      <div class="card service-pump-card">
        <div class="pump-header">
          <div class="pump-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <div class="pump-info">
            <h3>Pump 1 — Regular</h3>
            <p class="pump-price">₱50.10 / L</p>
          </div>
        </div>
        
        <div class="pump-controls">
          <div class="input-group">
            <input 
              type="number" 
              id="liters-regular" 
              min="1" 
              step="0.1" 
              placeholder="Enter liters"
              class="pump-input"
            >
            <button 
              class="btn btn-outline" 
              onclick="calcTotal('Regular',50.10,'liters-regular','total-regular')"
            >
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 11H1l8-8 8 8h-8v8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              Compute
            </button>
          </div>
          <p id="total-regular" class="pump-total">Total: ₱0.00</p>
          <button 
            class="btn btn-primary pump-action" 
            onclick="fuelNowFromUI('Regular',50.10,'liters-regular')"
          >
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Fuel Now
          </button>
        </div>
      </div>
      
      <div class="card service-pump-card">
        <div class="pump-header">
          <div class="pump-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <div class="pump-info">
            <h3>Pump 2 — Premium</h3>
            <p class="pump-price">₱61.15 / L</p>
          </div>
        </div>
        
        <div class="pump-controls">
          <div class="input-group">
            <input 
              type="number" 
              id="liters-premium" 
              min="1" 
              step="0.1" 
              placeholder="Enter liters"
              class="pump-input"
            >
            <button 
              class="btn btn-outline" 
              onclick="calcTotal('Premium',61.15,'liters-premium','total-premium')"
            >
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 11H1l8-8 8 8h-8v8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              Compute
            </button>
          </div>
          <p id="total-premium" class="pump-total">Total: ₱0.00</p>
          <button 
            class="btn btn-primary pump-action" 
            onclick="fuelNowFromUI('Premium',61.15,'liters-premium')"
          >
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Fuel Now
          </button>
        </div>
      </div>
      
      <div class="card service-pump-card">
        <div class="pump-header">
          <div class="pump-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <div class="pump-info">
            <h3>Pump 3 — Diesel</h3>
            <p class="pump-price">₱54.65 / L</p>
          </div>
        </div>
        
        <div class="pump-controls">
          <div class="input-group">
            <input 
              type="number" 
              id="liters-diesel" 
              min="1" 
              step="0.1" 
              placeholder="Enter liters"
              class="pump-input"
            >
            <button 
              class="btn btn-outline" 
              onclick="calcTotal('Diesel',54.65,'liters-diesel','total-diesel')"
            >
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 11H1l8-8 8 8h-8v8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              Compute
            </button>
          </div>
          <p id="total-diesel" class="pump-total">Total: ₱0.00</p>
          <button 
            class="btn btn-primary pump-action" 
            onclick="fuelNowFromUI('Diesel',54.65,'liters-diesel')"
          >
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Fuel Now
          </button>
        </div>
      </div>

      <div class="card service-pump-card">
        <div class="pump-header">
          <div class="pump-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2v20M2 12h20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <div class="pump-info">
            <h3>Pump 4 — Ethanol</h3>
            <p class="pump-price">₱79.49 / L</p>
          </div>
        </div>
        
        <div class="pump-controls">
          <div class="input-group">
            <input 
              type="number" 
              id="liters-ethanol" 
              min="1" 
              step="0.1" 
              placeholder="Enter liters"
              class="pump-input"
            >
            <button 
              class="btn btn-outline" 
              onclick="calcTotal('Ethanol',79.49,'liters-ethanol','total-ethanol')"
            >
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 11H1l8-8 8 8h-8v8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              Compute
            </button>
          </div>
          <p id="total-ethanol" class="pump-total">Total: ₱0.00</p>
          <button 
            class="btn btn-primary pump-action" 
            onclick="fuelNowFromUI('Ethanol',79.49,'liters-ethanol')"
          >
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Fuel Now
          </button>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>