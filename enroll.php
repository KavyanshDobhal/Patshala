<?php
require 'auth.php';
include 'connect.php';
$page = 'contact'; $pageTitle = 'Enroll';
$error = '';
$courses = ['gate' => 'GATE Preparation', 'neet' => 'NEET Preparation', 'programming' => 'Programming', 'data_science' => 'Data Science'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $course = $_POST['course'] ?? '';
    $message = trim($_POST['message'] ?? '');
    if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $phone === '' || !isset($courses[$course])) {
        $error = 'Please fill in all required fields correctly.';
    } else {
        $stmt = $conn->prepare("INSERT INTO enquiries (name, email, phone, course, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $course, $message);
        if ($stmt->execute()) { header("Location: enroll.php?sent=1"); exit(); }
        $error = 'Could not save your details. Please try again.';
    }
}
$fullName = trim(($_SESSION['firstName'] ?? '') . ' ' . ($_SESSION['lastName'] ?? ''));
include 'includes/header.php';
?>
<div class="wrap section">
  <h1 class="center" style="margin-bottom:2rem">Student Details</h1>
  <form class="form panel" method="post" action="enroll.php">
    <?php if (isset($_GET['sent'])): ?><div class="alert alert-ok" role="status">Thanks! We will contact you soon.</div><?php endif; ?>
    <?php if ($error): ?><div class="alert alert-error" role="alert"><?= e($error) ?></div><?php endif; ?>
    <div class="field"><label for="name">Full name</label><input type="text" id="name" name="name" value="<?= e($_POST['name'] ?? $fullName) ?>" required></div>
    <div class="field"><label for="email">Email address</label><input type="email" id="email" name="email" value="<?= e($_POST['email'] ?? $_SESSION['email']) ?>" required></div>
    <div class="field"><label for="phone">Phone number</label><input type="tel" id="phone" name="phone" value="<?= e($_POST['phone'] ?? '') ?>" required></div>
    <div class="field"><label for="course">Course interested in</label>
      <select id="course" name="course" required>
        <option value="">Select a course</option>
        <?php foreach ($courses as $k => $label): ?>
          <option value="<?= $k ?>"<?= ($_POST['course'] ?? '') === $k ? ' selected' : '' ?>><?= $label ?></option>
        <?php endforeach; ?>
      </select></div>
    <div class="field"><label for="message">Additional information</label><textarea id="message" name="message" rows="4"><?= e($_POST['message'] ?? '') ?></textarea></div>
    <button class="btn" type="submit">Submit</button>
  </form>
</div>
<?php include 'includes/footer.php'; ?>