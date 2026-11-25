<?php
require 'auth.php';
$page = 'contact'; $pageTitle = 'Contact Us';
include 'includes/header.php';
?>
<div class="wrap section">
  <h1 class="center" style="margin-bottom:2rem">Contact Us</h1>
  <div class="contact-grid">
    <div class="panel">
      <h3>Get in touch</h3>
      <p>If you have any questions or need assistance, please reach out to us.</p>
      <ul class="ticks" style="margin-top:1rem">
        <li>Email: <a href="mailto:skill@stream.com">skill@stream.com</a></li>
        <li>Phone: <a href="tel:+916398892341">+91 6398892341</a></li>
        <li>Address: Dehradun, Uttarakhand</li>
      </ul>
      <div class="btn-row"><a class="btn" href="feedback.php">Send Feedback</a><a class="btn btn-ghost" href="enroll.php">Enroll in a Course</a></div>
    </div>
    <img src="images/contact.jpg" alt="Scrabble tiles spelling CONTACT US on a green background" width="1600" height="1066">
  </div>
</div>
<?php include 'includes/footer.php'; ?>