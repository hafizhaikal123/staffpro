<?php
require_once __DIR__ . '/../../classes/User.php';

session_start();
$user = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acc_id = trim($_POST['acc_id']);

    $result = $user->deleteAccount($acc_id);

    if ($result) {
        $_SESSION['success'] = "Account delete successfully";
    } else {
        $_SESSION['error'] = "Account delete failed";
    }

    header("Location: ../../app/account.php");
    exit();
}
