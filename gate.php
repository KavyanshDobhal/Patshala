<?php
require 'auth.php';
$page = 'gate'; $pageTitle = 'GATE Information';
include 'includes/header.php';
?>
<section class="banner" style="--img:url('images/gate.jpg')">
  <div class="wrap"><h1>GATE Examination</h1><p>Eligibility, pattern, syllabus and preparation tips.</p>
    <div class="btn-row center"><a class="btn" href="mocktest.php?exam=gate">Take GATE Mock Test</a></div>
  </div>
</section>
<div class="wrap section stack">
  <div class="panel"><h3>Eligibility Criteria</h3>
    <ul class="ticks">
      <li>Bachelor's degree in Engineering / Technology / Architecture / Science / Commerce / Arts.</li>
      <li>Final-year students can also apply.</li>
      <li>No age limit for appearing in GATE.</li>
    </ul></div>
  <div class="panel"><h3>GATE Exam Pattern</h3>
    <ul class="ticks">
      <li>Mode: Online (Computer Based Test)</li>
      <li>Subjects: Engineering Mathematics, General Aptitude + Core Subject</li>
      <li>Duration: 3 hours</li>
      <li>Total questions: 65</li>
      <li>Correct answer: +1 or +2 marks. Wrong answer: −1/3 or −2/3 mark.</li>
    </ul></div>
  <div class="panel"><h3>Detailed GATE Syllabus</h3>
    <div class="syl"><h4>General Aptitude (all papers)</h4><p>Verbal Ability, Quantitative Aptitude, Analytical Skills, Spatial Reasoning.</p></div>
    <div class="syl"><h4>Engineering Mathematics</h4><p>Linear Algebra, Calculus, Probability, Differential Equations, Numerical Methods.</p></div>
    <div class="syl"><h4>Core Subject (branch-specific)</h4><p>Mechanical, Electrical, CSE, Civil, ECE, Chemical Engineering and more, based on your discipline.</p></div></div>
  <div class="panel"><h3>Preparation Tips</h3>
    <ul class="ticks">
      <li>Solve the previous 10 years of GATE papers.</li>
      <li>Understand concepts deeply instead of memorising.</li>
      <li>Practise mock tests to improve speed and accuracy.</li>
      <li>Revise formulas and key concepts regularly.</li>
    </ul></div>
  <div class="btn-row center"><a class="btn btn-ghost" href="home.php">Back to Home</a></div>
</div>
<?php include 'includes/footer.php'; ?>