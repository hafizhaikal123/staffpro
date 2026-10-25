<?php
require_once __DIR__ . '/../../classes/User.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $leaveId = $_POST['leave_id'];
    $status = ($_POST['action'] == 1) ? 1 : 2;

    $user = new User();
    $success = $user->updateLeave($leaveId, $status);

    if ($success) {
        $_SESSION['success'] = "Leave has been approved";
        header('Location: ../../app/leaves.php');
    } else {
        $_SESSION['error'] = "Leave has been rejected";
        header('Location: ../../app/leaves.php');
    }
    exit;
}
