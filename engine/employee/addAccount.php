<?php
require_once __DIR__ . '/../../classes/User.php';

session_start();
$user = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emp_id = trim($_POST['emp_id']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $result = $user->createAccount($username, $password, $emp_id);

    if ($result['success']) {
        $_SESSION['success'] = "Account created successfully.";
    } else {
        $_SESSION['error'] = "Account creation failed: " . $result['error'];
    }

    header("Location: ../../app/account.php");
    exit();
}
