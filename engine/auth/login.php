<?php
require_once __DIR__ . '/../../classes/User.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $user = new User();

    if ($user->isDatabaseConnected()) {
        $loginSuccess = $user->login($username);
        if ($loginSuccess && password_verify($password, $loginSuccess['PASSWORD'])) {
            // $row = $user->getUserData();
            $_SESSION['acc_id'] = $loginSuccess['ACC_ID'];
            if (!$loginSuccess['ROLES']) {
                $_SESSION['user_type'] = 1;
                $_SESSION['username'] = 'Admin';
            } else {
                $_SESSION['user_type'] = $loginSuccess['ROLE'];
                $_SESSION['username'] = $loginSuccess['EMP_NAME'];
                $_SESSION['dept_id'] = $loginSuccess['DEPARTMENT_ID'];
                $_SESSION['emp_id'] = $loginSuccess['EMP_ID'];
            }

            header("Location: ../../app/home.php");
            exit;
        } else {
            $_SESSION['error'] = "Invalid username or password.";
            header("Location: ../..");
            exit;
        }
    } else {
        $error = "Database connection failed: " . $user->getDatabaseError();
    }
}
