<?php include 'includes/header.php'; ?>
<main class="container">
  <section class="section reveal">
    <h2>Contact Us</h2>
    <p class="lead">Have questions? We're here to help. Send us a message and we'll get back to you as soon as possible.</p>
    
    <div class="contact-grid">
      <!-- Contact Form -->
      <div class="contact-form-section">
        <h3>Send us a message</h3>
        <form method="POST" action="contact.php" class="contact-form" id="contactForm">
          <div class="form-row">
            <div class="form-group">
              <label for="name">Your name *</label>
              <input 
                id="name"
                class="contact-input" 
                name="name" 
                placeholder="Enter your full name" 
                required
                aria-label="Your full name"
              >
            </div>
            <div class="form-group">
              <label for="email">Email address *</label>
              <input 
                id="email"
                class="contact-input" 
                type="email" 
                name="email" 
                placeholder="your.email@example.com" 
                required
                aria-label="Your email address"
              >
            </div>
          </div>
          
          <div class="form-group">
            <label for="subject">Subject</label>
            <select id="subject" name="subject" class="contact-input">
              <option value="">Select a topic</option>
              <option value="general">General Inquiry</option>
              <option value="technical">Technical Support</option>
              <option value="billing">Billing Question</option>
              <option value="feedback">Feedback</option>
              <option value="partnership">Partnership</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="message">Message *</label>
            <textarea 
              id="message"
              class="contact-input" 
              name="message" 
              placeholder="Tell us how we can help you..." 
              rows="5"
              required
              aria-label="Your message"
            ></textarea>
          </div>
          
          <button class="btn btn-primary contact-submit" type="submit">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Send Message
          </button>
        </form>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $name = strip_tags($_POST['name'] ?? '');
          $email = strip_tags($_POST['email'] ?? '');
          $subject = strip_tags($_POST['subject'] ?? 'General Inquiry');
          $message = strip_tags($_POST['message'] ?? '');
          $line = date('c') . " | $name <$email> | $subject | " . str_replace(["\r","\n"], ' ', $message) . "\n";
          file_put_contents(__DIR__ . '/messages.txt', $line, FILE_APPEND);
          echo '<div class="success-message">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <polyline points="22,4 12,14.01 9,11.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <div>
              <h4>Message sent successfully!</h4>
              <p>Thank you for contacting us. We\'ll get back to you within 24 hours.</p>
            </div>
          </div>';
        }
        ?>
      </div>
      
      <!-- Contact Information -->
      <div class="contact-info-section">
        <h3>Get in touch</h3>
        
        <div class="contact-info-grid">
          <div class="contact-item">
            <div class="contact-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="contact-details">
              <h4>Visit us</h4>
              <p>123 Fuel Street<br>Manila, Philippines 1000</p>
            </div>
          </div>
          
          <div class="contact-item">
            <div class="contact-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="contact-details">
              <h4>Call us</h4>
              <p>+63 2 8123 4567<br>+63 917 123 4567</p>
            </div>
          </div>
          
          <div class="contact-item">
            <div class="contact-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="contact-details">
              <h4>Email us</h4>
              <p>support@fuelv.local<br>info@fuelv.local</p>
            </div>
          </div>
          
          <div class="contact-item">
            <div class="contact-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <polyline points="12,6 12,12 16,14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="contact-details">
              <h4>Operating Hours</h4>
              <p>Open 24/7<br>365 days a year</p>
            </div>
          </div>
        </div>
        
        <!-- FAQ Section -->
        <div class="faq-section">
          <h4>Frequently Asked Questions</h4>
          <div class="faq-item">
            <h5>How do I scan my QR code?</h5>
            <p>Simply open your Fuel V app, point your camera at the QR code on the pump, and confirm the transaction.</p>
          </div>
          <div class="faq-item">
            <h5>What payment methods do you accept?</h5>
            <p>We accept all major credit cards, debit cards, and digital wallets through our QR payment system.</p>
          </div>
          <div class="faq-item">
            <h5>Is my payment information secure?</h5>
            <p>Yes, we use bank-level encryption and never store your payment details on our servers.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Google Maps Section -->
  <section class="section reveal">
    <h3>Find our station</h3>
    <div class="map-container">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.8!2d120.9842!3d14.5995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ca03571ec38b%3A0x69d1d5751069c11f!2sManila%2C%20Metro%20Manila%2C%20Philippines!5e0!3m2!1sen!2sus!4v1234567890"
        width="100%" 
        height="400" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade"
        title="Fuel V Station Location"
      ></iframe>
    </div>
  </section>
</main>

<?php include 'includes/footer.php'; ?>