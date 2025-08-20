<?php include 'includes/header.php'; ?>
<main class="container">
  <section class="section reveal">
    <h2>Contact</h2>
    <p class="lead">Questions? Send us a message and we will record it.</p>
    <form method="POST" action="contact.php" data-validate>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;"><input class="contact-input" name="name" placeholder="Your name" required><input class="contact-input" type="email" name="email" placeholder="Email" required></div>
      <textarea class="contact-input" name="message" placeholder="Message" required></textarea>
      <button class="btn btn-primary" type="submit">Send</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = strip_tags($_POST['name'] ?? '');
      $email = strip_tags($_POST['email'] ?? '');
      $message = strip_tags($_POST['message'] ?? '');
      $line = date('c') . " | $name <$email> | " . str_replace(["\r","\n"], ' ', $message) . "\n";
      file_put_contents(__DIR__ . '/messages.txt', $line, FILE_APPEND);
      echo '<p class="lead">Thanks — your message has been recorded.</p>';
    }
    ?>
  </section>
</main>
<?php include 'includes/footer.php'; ?>