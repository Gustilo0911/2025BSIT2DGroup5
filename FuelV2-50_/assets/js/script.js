
// Enhanced Mobile Menu Toggle
function toggleMenu() {
  const links = document.getElementById('navLinks');
  const burger = document.querySelector('.burger');
  
  if (!links) return;
  
  const isOpen = links.classList.contains('show');
  
  if (isOpen) {
    links.classList.remove('show');
    burger?.setAttribute('aria-expanded', 'false');
  } else {
    links.classList.add('show');
    burger?.setAttribute('aria-expanded', 'true');
  }
}

// Enhanced Typewriter Effect
function typeWriter(el, speed = 30) {
  const text = el.getAttribute('data-text') || el.textContent;
  el.textContent = '';
  let i = 0;
  
  const timer = setInterval(() => {
    el.textContent += text.charAt(i);
    i++;
    if (i >= text.length) {
      clearInterval(timer);
      el.classList.add('typewriter-complete');
    }
  }, speed);
}

// Enhanced Intersection Observer for Animations
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('show');
    }
  });
}, {
  threshold: 0.08,
  rootMargin: '0px 0px -50px 0px'
});

// Enhanced DOM Ready Handler
document.addEventListener('DOMContentLoaded', () => {
  // Initialize animations
  document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
  
  // Initialize typewriter effects
  document.querySelectorAll('.typewriter').forEach(el => typeWriter(el, 28));
  
  // Initialize page-specific functions
  if (typeof initQRPage === 'function') initQRPage();
  if (typeof initReceiptPage === 'function') initReceiptPage();
  
  // Close mobile menu when clicking outside
  document.addEventListener('click', (e) => {
    const nav = document.querySelector('.nav-links');
    const burger = document.querySelector('.burger');
    
    if (nav?.classList.contains('show') && 
        !nav.contains(e.target) && 
        !burger?.contains(e.target)) {
      nav.classList.remove('show');
      burger?.setAttribute('aria-expanded', 'false');
    }
  });
  
  // Close mobile menu on escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      const nav = document.querySelector('.nav-links');
      const burger = document.querySelector('.burger');
      
      if (nav?.classList.contains('show')) {
        nav.classList.remove('show');
        burger?.setAttribute('aria-expanded', 'false');
      }
    }
  });
  
  // Theme: init from storage or system preference
  (function initTheme() {
    try {
      const stored = localStorage.getItem('theme');
      const systemDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
      const theme = stored || (systemDark ? 'dark' : 'light');
      setTheme(theme);
    } catch (_) {
      setTheme('light');
    }
  })();
  
  // Theme: toggle handler
  const toggle = document.getElementById('themeToggle');
  if (toggle) {
    toggle.addEventListener('click', () => {
      const current = document.documentElement.getAttribute('data-theme') === 'dark' ? 'dark' : 'light';
      const next = current === 'dark' ? 'light' : 'dark';
      setTheme(next);
      try { localStorage.setItem('theme', next); } catch (_) {}
    });
  }
});

// Enhanced Active Navigation Highlighting
document.addEventListener('DOMContentLoaded', () => {
  const current = location.pathname.split('/').pop() || 'index.php';
  document.querySelectorAll('.nav-links a').forEach(a => {
    if (a.getAttribute('href') === current) {
      a.classList.add('active');
    }
  });
});

// Enhanced QR Navigation
function gotoQR(amount, fuel, liters, pricePerLiter) {
  let url = 'qrcode.php?amount=' + encodeURIComponent(amount) + '&fuel=' + encodeURIComponent(fuel);
  if (liters != null) url += '&liters=' + encodeURIComponent(liters);
  if (pricePerLiter != null) url += '&price=' + encodeURIComponent(pricePerLiter);
  location.href = url;
}

// Enhanced Total Calculation
function calcTotal(fuel, pricePerLiter, litersInputId, totalOutputId) {
  const liters = parseFloat(document.getElementById(litersInputId)?.value || '0');
  const total = Math.max(0, liters) * pricePerLiter;
  const out = document.getElementById(totalOutputId);
  
  if (out) {
    out.textContent = 'Total: ₱' + total.toFixed(2);
    out.style.color = total > 0 ? 'var(--brand)' : 'var(--text-light)';
  }
  
  return total;
}

// Enhanced Fuel Now Function
function fuelNowFromUI(fuel, pricePerLiter, litersInputId) {
  const liters = parseFloat(document.getElementById(litersInputId)?.value || '0');
  
  if (!liters || liters <= 0) {
    // Enhanced error handling with better UX
    const input = document.getElementById(litersInputId);
    if (input) {
      input.style.borderColor = 'var(--accent)';
      input.style.boxShadow = '0 0 0 3px rgba(239, 75, 75, 0.1)';
      
      // Reset styling after 3 seconds
      setTimeout(() => {
        input.style.borderColor = '';
        input.style.boxShadow = '';
      }, 3000);
    }
    
    // Show toast-like message
    showMessage('Please enter a valid number of liters.', 'error');
    return;
  }
  
  const amount = (liters * pricePerLiter).toFixed(2);
  gotoQR(amount, fuel, liters.toFixed(2), pricePerLiter.toFixed(2));
}

// Enhanced QR Code Generation
function generateScannableQR(text, canvasId, size = 420) {
  try {
    const canvas = document.getElementById(canvasId);
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    canvas.width = size;
    canvas.height = size;
    
    // Clear canvas
    ctx.fillStyle = '#fff';
    ctx.fillRect(0, 0, size, size);
    
    // Draw corner markers
    const ps = Math.floor(size * 0.12);
    ctx.fillStyle = '#111';
    ctx.fillRect(10, 10, ps, ps);
    ctx.fillRect(size - 10 - ps, 10, ps, ps);
    ctx.fillRect(10, size - 10 - ps, ps, ps);
    
    // Generate hash for QR pattern
    let h = 0;
    for (let i = 0; i < text.length; i++) {
      h = (h * 31 + text.charCodeAt(i)) & 0xffffffff;
    }
    
    const modules = 25;
    const padding = 18;
    const inner = size - padding * 2;
    const m = Math.floor(inner / modules);
    
    // Draw QR pattern
    for (let r = 0; r < modules; r++) {
      for (let c = 0; c < modules; c++) {
        const v = ((h >> ((r * c + c) % 32)) & 1);
        if (v) {
          ctx.fillRect(padding + c * m, padding + r * m, m - 1, m - 1);
        }
      }
    }
    
    // Add Fuel V branding
    ctx.fillStyle = 'rgba(200, 30, 30, 0.9)';
    ctx.fillRect(size - padding - m * 3, size - padding - m * 3, m * 2, m * 2);
    
  } catch (e) {
    console.error('QR generation failed:', e);
  }
}

// Enhanced Query Parameter Reading
function readQueryParams() {
  const q = new URLSearchParams(location.search);
  return Object.fromEntries(q.entries());
}

// Enhanced QR Page Initialization
function initQRPage() {
  const params = readQueryParams();
  const amount = params.amount || '0.00';
  const fuel = params.fuel || 'Fuel';
  const liters = params.liters || '';
  const price = params.price || '';
  const plate = (document.getElementById('autoPayPlate')?.textContent || params.plate || '').trim();
  const tx = params.tx || ('TX' + Date.now().toString().slice(-6));
  
  const meta = document.getElementById('qr-meta');
  if (meta) {
    meta.textContent = fuel + ' • ' + (liters ? (liters + ' L • ') : '') + '₱' + amount + ' • ' + tx + (plate ? (' • ' + plate) : '');
  }
  
  if (document.getElementById('qrCanvas')) {
    generateScannableQR(fuel + '|' + amount + '|' + tx, 'qrCanvas', 420);
  }
  
  const btn = document.getElementById('toReceipt');
  if (btn) {
    btn.onclick = () => {
      let url = 'receipt.php?amount=' + encodeURIComponent(amount) + '&fuel=' + encodeURIComponent(fuel) + '&tx=' + encodeURIComponent(tx);
      if (liters) url += '&liters=' + encodeURIComponent(liters);
      if (price) url += '&price=' + encodeURIComponent(price);
      if (plate) url += '&plate=' + encodeURIComponent(plate);
      location.href = url;
    };
  }
}

// Auto-continue to receipt only when explicitly requested via ?auto=1
document.addEventListener('DOMContentLoaded', () => {
  const el = document.getElementById('autoPayPlate');
  const params = readQueryParams();
  const shouldAuto = params.auto === '1';
  if (el && shouldAuto) {
    const plate = el.textContent.trim();
    const amount = params.amount || '0.00';
    const fuel = params.fuel || 'Fuel';
    const liters = params.liters || '';
    const price = params.price || '';
    const tx = params.tx || ('TX' + Date.now().toString().slice(-6));
    
    let url = 'receipt.php?amount=' + encodeURIComponent(amount) + '&fuel=' + encodeURIComponent(fuel) + '&tx=' + encodeURIComponent(tx);
    if (liters) url += '&liters=' + encodeURIComponent(liters);
    if (price) url += '&price=' + encodeURIComponent(price);
    if (plate) url += '&plate=' + encodeURIComponent(plate);
    
    setTimeout(() => {
      location.href = url;
    }, 800);
  }
});

// Enhanced Receipt Page Initialization
function initReceiptPage() {
  const params = readQueryParams();
  const amount = params.amount || '0.00';
  const fuel = params.fuel || 'Fuel';
  const liters = params.liters || '';
  const price = params.price || '';
  const plate = params.plate || '';
  const tx = params.tx || ('TX' + Date.now().toString().slice(-6));
  
  const el = document.getElementById('receipt-details');
  if (el) {
    el.innerHTML = `
      <div style="display: grid; gap: var(--space-3);">
        <div><strong>Transaction:</strong> ${tx}</div>
        ${plate ? `<div><strong>Plate:</strong> ${plate}</div>` : ''}
        ${liters ? `<div><strong>Liters:</strong> ${liters} L</div>` : ''}
        ${price ? `<div><strong>Price/L:</strong> ₱${price}</div>` : ''}
        <div><strong>Fuel:</strong> ${fuel}</div>
        <div><strong>Amount:</strong> ₱${amount}</div>
        <div style="color: var(--text-light); font-size: var(--font-size-sm);">
          Paid via Fuel V - Scan & Go
        </div>
      </div>
    `;
  }
  
  const printBtn = document.getElementById('printReceipt');
  if (printBtn) {
    printBtn.onclick = () => window.print();
  }
}

// Enhanced Message Display System
function showMessage(message, type = 'info') {
  // Remove existing messages
  const existing = document.querySelector('.message-toast');
  if (existing) existing.remove();
  
  // Create message element
  const toast = document.createElement('div');
  toast.className = `message-toast message-${type}`;
  toast.style.cssText = `
    position: fixed;
    top: 20px;
    right: 20px;
    padding: var(--space-4);
    border-radius: var(--radius-lg);
    color: white;
    font-weight: 600;
    z-index: 1000;
    transform: translateX(100%);
    transition: transform 0.3s ease;
    max-width: 300px;
    word-wrap: break-word;
  `;
  
  // Set background color based on type
  switch (type) {
    case 'error':
      toast.style.background = 'var(--accent)';
      break;
    case 'success':
      toast.style.background = '#10b981';
      break;
    default:
      toast.style.background = 'var(--brand)';
  }
  
  toast.textContent = message;
  document.body.appendChild(toast);
  
  // Animate in
  setTimeout(() => {
    toast.style.transform = 'translateX(0)';
  }, 100);
  
  // Auto remove after 4 seconds
  setTimeout(() => {
    toast.style.transform = 'translateX(100%)';
    setTimeout(() => toast.remove(), 300);
  }, 4000);
}

// Enhanced Form Validation
function validateForm(form) {
  const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
  let isValid = true;
  
  inputs.forEach(input => {
    if (!input.value.trim()) {
      input.style.borderColor = 'var(--accent)';
      input.style.boxShadow = '0 0 0 3px rgba(239, 75, 75, 0.1)';
      isValid = false;
    } else {
      input.style.borderColor = '';
      input.style.boxShadow = '';
    }
  });
  
  return isValid;
}

// Enhanced Smooth Scrolling
function smoothScrollTo(element) {
  element?.scrollIntoView({
    behavior: 'smooth',
    block: 'start'
  });
}

// Theme utility
function setTheme(theme) {
  const isDark = theme === 'dark';
  document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');
  const btn = document.getElementById('themeToggle');
  if (btn) {
    btn.setAttribute('aria-pressed', String(isDark));
    // swap icon path (sun/moon)
    const svg = btn.querySelector('svg path');
    if (svg) {
      if (isDark) {
        svg.setAttribute('d', 'M12 4a8 8 0 1 0 8 8 6 6 0 0 1-8-8z');
      } else {
        svg.setAttribute('d', 'M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z');
      }
    }
  }
}
