<?php
// Usage in a page:  $page = 'gate'; $pageTitle = 'GATE Information'; include 'includes/header.php';
$nav = [
  'home'     => ['home.php',     'Home'],
  'gate'     => ['gate.php',     'GATE'],
  'neet'     => ['neet.php',     'NEET'],
  'pyq'      => ['pyq.php',      'PYQ'],
  'videos'   => ['videos.php',   'Videos'],
  'mocktest' => ['mocktest.php', 'Mock Test'],
  'contact'  => ['contact.php',  'Contact'],
  'feedback' => ['feedback.php', 'Feedback'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($pageTitle ?? 'Patshala') ?> - Patshala</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<a class="skip" href="#main">Skip to content</a>
<header class="header">
  <a class="logo" href="home.php">Patshala</a>
  <button class="nav-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="nav"><span></span><span></span><span></span></button>
  <nav class="nav" id="nav" aria-label="Main">
    <ul class="nav-links">
      <?php foreach ($nav as $key => [$href, $label]): ?>
        <li><a href="<?= $href ?>"<?= ($page ?? '') === $key ? ' class="active" aria-current="page"' : '' ?>><?= $label ?></a></li>
      <?php endforeach; ?>
    </ul>
    <div class="nav-user">
      <span>Hi, <?= e($displayName) ?></span>
      <a class="btn-sm" href="logout.php">Logout</a>
    </div>
  </nav>
</header>
<main id="main"></main>