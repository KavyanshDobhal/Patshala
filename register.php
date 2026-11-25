<?php
session_start();
include 'connect.php';

function back($type, $msg, $tab = 'signin') {
    $_SESSION['flash'] = ['type' => $type, 'msg' => $msg, 'tab' => $tab];
    header("Location: index.php");
    exit();
}

function loginUser($row) {
    session_regenerate_id(true);
    $_SESSION['user_id']   = $row['id'];
    $_SESSION['email']     = $row['email'];
    $_SESSION['firstName'] = $row['firstName'];
    $_SESSION['lastName']  = $row['lastName'];
    header("Location: home.php");   // <- after login / signup, Skill Stream opens
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit();
}

/* ---------------- SIGN UP ---------------- */
if (isset($_POST['signUp'])) {
    $firstName = trim($_POST['fName'] ?? '');
    $lastName  = trim($_POST['lName'] ?? '');
    $email     = strtolower(trim($_POST['email'] ?? ''));
    $password  = $_POST['password'] ?? '';

    if ($firstName === '' || $lastName === '') back('error', 'Pehla aur last name dono bharo.', 'signup');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) back('error', 'Sahi email daalo.', 'signup');
    if (strlen($password) < 6) back('error', 'Password kam se kam 6 characters ka rakho.', 'signup');

    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    if ($check->get_result()->num_rows > 0) {
        back('error', 'Ye email pehle se registered hai. Sign In karo.', 'signin');
    }

    $hash   = password_hash($password, PASSWORD_DEFAULT);
    $insert = $conn->prepare("INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)");
    $insert->bind_param("ssss", $firstName, $lastName, $email, $hash);

    if (!$insert->execute()) {
        back('error', 'Signup nahi ho paya, thodi der baad try karo.', 'signup');
    }

    loginUser([
        'id' => $conn->insert_id, 'email' => $email,
        'firstName' => $firstName, 'lastName' => $lastName
    ]);
}

/* ---------------- SIGN IN ---------------- */
if (isset($_POST['signIn'])) {
    $email    = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT id, firstName, lastName, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    // Same message for wrong email and wrong password (safer)
    if (!$user) back('error', 'Email ya password galat hai.', 'signin');

    $stored = $user['password'];

    if (password_verify($password, $stored)) {
        loginUser($user);
    }

    // Old MD5 accounts: upgrade to secure hash on first login
    if (strlen($stored) === 32 && hash_equals($stored, md5($password))) {
        $new = password_hash($password, PASSWORD_DEFAULT);
        $up  = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $up->bind_param("si", $new, $user['id']);
        $up->execute();
        loginUser($user);
    }

    back('error', 'Email ya password galat hai.', 'signin');
}

header("Location: index.php");
exit();