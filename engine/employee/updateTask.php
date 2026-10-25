<?php
require_once __DIR__ . '/../../classes/User.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = $_POST['task_id'];
    $status = $_POST['status'];

    $user = new User();
    $success = $user->updateTask($status, $task_id);

    if ($success) {
        $_SESSION['success'] = "Leave has been approved";
        header('Location: ../../app/task.php');
    } else {
        $_SESSION['error'] = "Leave has been rejected";
        header('Location: ../../app/task.php');
    }
    exit;
}
