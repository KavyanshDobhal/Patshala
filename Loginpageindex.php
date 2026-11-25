<?php
session_start();
// Already logged in? Go straight to Skill Stream.
if (!empty($_SESSION['email'])) {
    header("Location: home.php");
    exit();
}
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
$tab = $flash['tab'] ?? 'signin';
function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign In - Skill Stream</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <main class="auth">
    <div class="brand">Skill Stream</div>
    <p class="tag">Learn, Grow, Succeed.</p>

    <div class="card">
      <div class="tabs" role="tablist">
        <button type="button" role="tab" id="tab-signin" aria-controls="signin" aria-selected="<?= $tab === 'signin' ? 'true' : 'false' ?>">Sign In</button>
        <button type="button" role="tab" id="tab-signup" aria-controls="signup" aria-selected="<?= $tab === 'signup' ? 'true' : 'false' ?>">Sign Up</button>
      </div>

      <?php if ($flash): ?>
        <div class="alert <?= $flash['type'] === 'error' ? 'alert-error' : 'alert-ok' ?>" role="alert"><?= e($flash['msg']) ?></div>
      <?php endif; ?>

      <!-- SIGN IN -->
      <form id="signin" method="post" action="register.php" role="tabpanel" aria-labelledby="tab-signin" <?= $tab === 'signin' ? '' : 'hidden' ?>>
        <div class="field">
          <label for="loginEmail">Email</label>
          <input type="email" id="loginEmail" name="email" autocomplete="email" required>
        </div>
        <div class="field">
          <label for="loginPassword">Password</label>
          <div class="pw">
            <input type="password" id="loginPassword" name="password" autocomplete="current-password" required>
            <button type="button" class="show" data-target="loginPassword" aria-label="Show password">Show</button>
          </div>
        </div>
        <button class="submit" type="submit" name="signIn" value="1">Sign In</button>
        <p class="switch">Don't have an account? <button type="button" data-go="signup">Sign Up</button></p>
      </form>

      <!-- SIGN UP -->
      <form id="signup" method="post" action="register.php" role="tabpanel" aria-labelledby="tab-signup" <?= $tab === 'signup' ? '' : 'hidden' ?>>
        <div class="row">
          <div class="field">
            <label for="fName">First name</label>
            <input type="text" id="fName" name="fName" autocomplete="given-name" required>
          </div>
          <div class="field">
            <label for="lName">Last name</label>
            <input type="text" id="lName" name="lName" autocomplete="family-name" required>
          </div>
        </div>
        <div class="field">
          <label for="signupEmail">Email</label>
          <input type="email" id="signupEmail" name="email" autocomplete="email" required>
        </div>
        <div class="field">
          <label for="signupPassword">Password <small>(min 6 characters)</small></label>
          <div class="pw">
            <input type="password" id="signupPassword" name="password" minlength="6" autocomplete="new-password" required>
            <button type="button" class="show" data-target="signupPassword" aria-label="Show password">Show</button>
          </div>
        </div>
        <button class="submit" type="submit" name="signUp" value="1">Create Account</button>
        <p class="switch">Already have an account? <button type="button" data-go="signin">Sign In</button></p>
      </form>
    </div>
  </main>
  <script src="js/login.js"></script>
</body>
</html>