<?php
// Include this at the TOP of every protected page.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
$displayName = $_SESSION['firstName'] ?? 'Student';

function e($s) {
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}