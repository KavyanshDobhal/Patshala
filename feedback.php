<?php
require 'auth.php';
include 'connect.php';
$page = 'feedback'; $pageTitle = 'Feedback';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');
    if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $message === '') {
        $error = 'Please fill in all fields with a valid email.';
    } else {
        $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        if ($stmt->execute()) { header("Location: feedback.php?sent=1"); exit(); }
        $error = 'Could not save your feedback. Please try again.';
    }
}
$fullName = trim(($_SESSION['firstName'] ?? '') . ' ' . ($_SESSION['lastName'] ?? ''));
include 'includes/header.php';
?>
<div class="wrap section">
  <h1 class="center" style="margin-bottom:2rem">Feedback</h1>
  <form class="form panel" method="post" action="feedback.php">
    <?php if (isset($_GET['sent'])): ?><div class="alert alert-ok" role="status">Thank you! Your feedback has been received.</div><?php endif; ?>
    <?php if ($error): ?><div class="alert alert-error" role="alert"><?= e($error) ?></div><?php endif; ?>
    <div class="field"><label for="name">Name</label><input type="text" id="name" name="name" value="<?= e($_POST['name'] ?? $fullName) ?>" required></div>
    <div class="field"><label for="email">Email</label><input type="email" id="email" name="email" value="<?= e($_POST['email'] ?? $_SESSION['email']) ?>" required></div>
    <div class="field"><label for="message">Feedback</label><textarea id="message" name="message" rows="5" required><?= e($_POST['message'] ?? '') ?></textarea></div>
    <button class="btn" type="submit">Submit Feedback</button>
  </form>
</div>
<?php include 'includes/footer.php'; ?>