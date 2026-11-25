<?php
// Database connection (XAMPP defaults). Change these if your MySQL user/password differ.
$host = "localhost";
$user = "root";
$pass = "";
$db   = "login";

mysqli_report(MYSQLI_REPORT_OFF);
$conn = @new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    http_response_code(500);
    die("Database se connect nahi ho paya. XAMPP me MySQL start karo aur setup.sql import karo.");
}
$conn->set_charset("utf8mb4");