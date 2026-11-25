<?php
require 'auth.php';
$page = 'neet'; $pageTitle = 'NEET Information';
include 'includes/header.php';
?>
<section class="banner" style="--img:url('images/neet.jpg'); background-position:center 20%">
  <div class="wrap"><h1>NEET Examination</h1><p>Eligibility, pattern, syllabus and preparation tips.</p>
    <div class="btn-row center"><a class="btn" href="mocktest.php?exam=neet">Take NEET Mock Test</a></div>
  </div>
</section>
<div class="wrap section stack">
  <div class="panel"><h3>Eligibility Criteria</h3>
    <ul class="ticks">
      <li>10+2 with Physics, Chemistry, Biology/Biotechnology and English.</li>
      <li>Minimum 50% marks in PCB for General category (40% for SC/ST/OBC).</li>
      <li>Minimum age: 17 years at the time of admission.</li>
    </ul></div>
  <div class="panel"><h3>NEET Exam Pattern</h3>
    <ul class="ticks">
      <li>Mode: Offline (pen and paper)</li>
      <li>Subjects: Physics, Chemistry, Biology (Botany and Zoology)</li>
      <li>Duration: 3 hours 20 minutes</li>
      <li>Total questions: 200 (180 to be answered)</li>
      <li>Correct answer: +4 marks. Wrong answer: −1 mark.</li>
    </ul></div>
  <div class="panel"><h3>Detailed NEET Syllabus</h3>
    <div class="syl"><h4>Physics</h4><p>Class 11 and 12 topics: Laws of Motion, Thermodynamics, Current Electricity, Modern Physics.</p></div>
    <div class="syl"><h4>Chemistry</h4><p>Physical, Organic and Inorganic Chemistry: Equilibrium, Hydrocarbons, Coordination Compounds and more.</p></div>
    <div class="syl"><h4>Biology</h4><p>Cell Structure, Human Physiology, Genetics, Biotechnology, Ecology, Diversity of Life Forms.</p></div></div>
  <div class="panel"><h3>Preparation Tips</h3>
    <ul class="ticks">
      <li>Focus on NCERT textbooks thoroughly.</li>
      <li>Solve previous year papers and mock tests.</li>
      <li>Manage time well with scheduled revisions.</li>
      <li>Stay consistent, motivated and stress-free.</li>
    </ul></div>
  <div class="btn-row center"><a class="btn btn-ghost" href="home.php">Back to Home</a></div>
</div>
<?php include 'includes/footer.php'; ?>