<?php
require 'auth.php';
$page = 'home'; $pageTitle = 'Home';
include 'includes/header.php';
?>
<div class="wrap">
  <section class="hero">
    <div>
      <h1>Welcome, <?= e($displayName) ?>.</h1>
      <p class="lead">Learn modern skills from industry experts. Study the syllabus, practise with mock tests and previous year papers, and watch free lectures for GATE and NEET, all in one place.</p>
      <div class="btn-row">
        <a class="btn" href="mocktest.php">Start a Mock Test</a>
        <a class="btn btn-ghost" href="videos.php">Watch Lectures</a>
      </div>
    </div>
    <img src="images/student.jpg" alt="A student reading a book between library shelves" width="1066" height="1600">
  </section>

  <section class="section">
    <h2 class="section-title">Choose your exam</h2>
    <div class="grid" style="grid-template-columns:repeat(auto-fit,minmax(min(100%,320px),1fr))">
      <article class="exam-card" style="--img:url('images/gate.jpg')">
        <div>
          <h3>GATE</h3>
          <p>Eligibility, pattern, syllabus and preparation tips for engineering aspirants.</p>
          <a class="btn" href="gate.php">GATE Info</a>
        </div>
      </article>
      <article class="exam-card" style="--img:url('images/neet.jpg'); background-position:center 20%">
        <div>
          <h3>NEET</h3>
          <p>Everything about the medical entrance: PCB syllabus, marking scheme and tips.</p>
          <a class="btn" href="neet.php">NEET Info</a>
        </div>
      </article>
    </div>
  </section>

  <section class="section">
    <h2 class="section-title">Why choose Patshala?</h2>
    <div class="grid">
      <div class="panel"><h3>Expert Instructors</h3><p>Learn from industry professionals with years of experience.</p></div>
      <div class="panel"><h3>Interactive Learning</h3><p>Engage with quizzes and mock tests that show you what you got wrong.</p><a class="btn" href="mocktest.php">Explore Tests</a></div>
      <div class="panel"><h3>Comprehensive Resources</h3><p>Video lectures, previous year questions and study material.</p><a class="btn" href="videos.php">Watch Videos</a></div>
      <div class="panel"><h3>Need Help?</h3><p>Get in touch for any queries or support.</p><a class="btn" href="contact.php">Contact Us</a></div>
    </div>
  </section>
</div>
<?php include 'includes/footer.php'; ?>