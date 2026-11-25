<?php
require 'auth.php';
$page = 'mocktest'; $pageTitle = 'Mock Test';
$extraScript = 'js/mocktest.js';
include 'includes/header.php';
?>
<div class="wrap section">
  <h1 class="center">Mock Test</h1>
  <p class="center muted" style="margin:.5rem 0 1.5rem">Pick a test, answer every question, then submit to see your score and the correct answers.</p>
  <div class="chips" id="chips" role="group" aria-label="Choose test"></div>
  <form class="quiz" id="quiz" novalidate></form>
  <p class="best" id="best"></p>
</div>
<?php include 'includes/footer.php'; ?>