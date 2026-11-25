<?php
require 'auth.php';
$page = 'videos'; $pageTitle = 'Video Lectures';

$sections = [
  'Free GATE Video Lectures' => [
    ['n9ZytPvXi7w', 'https://www.youtube.com/watch?v=n9ZytPvXi7w&list=PL3eEXnCBViH_ynvBiNPBBkzCOZ4vDCG7f', 'GATE Engineering Mathematics'],
    ['FgVdnXotCkI', 'https://www.youtube.com/watch?v=FgVdnXotCkI&list=PL3eEXnCBViH8nznEyq1bdI0M_IfBScJ2H', 'GATE Core Subject Overview'],
    ['pHNbm-4reIc', 'https://www.youtube.com/watch?v=pHNbm-4reIc', 'GATE Preparation Tips'],
  ],
  'Free NEET Video Lectures' => [
    ['1eoZ6xHx0DE', 'https://www.youtube.com/watch?v=1eoZ6xHx0DE', 'NEET Physics Concepts'],
    ['GeRUjzIEHqk', 'https://www.youtube.com/watch?v=GeRUjzIEHqk', 'NEET Chemistry Basics'],
    ['BdTrPwV-iLA', 'https://www.youtube.com/watch?v=BdTrPwV-iLA', 'NEET Biology Overview'],
  ],
];
include 'includes/header.php';
?>
<div class="wrap section">
  <h1 class="center" style="margin-bottom:2rem">Video Lectures</h1>
  <?php foreach ($sections as $title => $videos): ?>
    <h2 class="section-title" style="margin-top:2rem"><?= e($title) ?></h2>
    <div class="grid" style="grid-template-columns:repeat(auto-fit,minmax(min(100%,280px),1fr))">
      <?php foreach ($videos as [$id, $url, $label]): ?>
        <a class="video-card" href="<?= e($url) ?>" target="_blank" rel="noopener noreferrer">
          <img src="https://img.youtube.com/vi/<?= e($id) ?>/hqdefault.jpg" alt="" loading="lazy" width="480" height="360">
          <span><?= e($label) ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>
<?php include 'includes/footer.php'; ?>