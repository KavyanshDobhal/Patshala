<?php
require 'auth.php';
$page = 'pyq'; $pageTitle = 'Previous Year Questions';

$gate = [
  'https://media.geeksforgeeks.org/wp-content/uploads/20240328120758/CS124S5.pdf',
  'https://media.geeksforgeeks.org/wp-content/uploads/20240328120853/CS224S6.pdf',
  'https://media.geeksforgeeks.org/wp-content/uploads/20240803222831/DA24S1.pdf',
  'https://media.geeksforgeeks.org/wp-content/cdn-uploads/20211005201108/GATE2021_QP_CS-1.pdf',
  'https://media.geeksforgeeks.org/wp-content/cdn-uploads/20211005201506/GATE2018.pdf',
];
$neet = [
  'https://neetprep-test-series-2020.s3.ap-south-1.amazonaws.com/key_3577818_2024-05-07%2008%3A07%3A55%20%2B0000.pdf',
  'https://neetprep-test-series-2020.s3.ap-south-1.amazonaws.com/key_5057704_2025-02-13%2006%3A15%3A06%20%2B0000.pdf',
  'https://neetprep-test-series-2020.s3.ap-south-1.amazonaws.com/key_5057836_2025-02-17%2006%3A16%3A19%20%2B0000.pdf',
  'https://neetprep-test-series-2020.s3.ap-south-1.amazonaws.com/key_5057738_2025-02-17%2012%3A38%3A55%20%2B0000.pdf',
  'https://neetprep-test-series-2020.s3.ap-south-1.amazonaws.com/1854162.pdf',
];
include 'includes/header.php';
?>
<div class="wrap section stack">
  <h1 class="center">Previous Year Questions</h1>
  <div class="panel">
    <h3>How to use</h3>
    <ul class="ticks">
      <li>Open the papers from the links below (they open in a new tab).</li>
      <li>Practise regularly to improve your exam readiness.</li>
      <li>Analyse solutions and understand question patterns.</li>
    </ul>
  </div>
  <div class="panel">
    <h3>GATE past papers</h3>
    <ul class="paper-list">
      <?php foreach ($gate as $i => $url): ?>
        <li><a href="<?= e($url) ?>" target="_blank" rel="noopener noreferrer"><span>GATE Paper <?= $i + 1 ?></span><small>PDF</small></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="panel">
    <h3>NEET past papers</h3>
    <ul class="paper-list">
      <?php foreach ($neet as $i => $url): ?>
        <li><a href="<?= e($url) ?>" target="_blank" rel="noopener noreferrer"><span>NEET Paper <?= $i + 1 ?></span><small>PDF</small></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
<?php include 'includes/footer.php'; ?>