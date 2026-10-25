<?php
session_start();
require_once __DIR__ . '/../../classes/User.php';
$user = new User();

$description = $_POST['description'];
$remark = $_POST['remark'];
$deadline = $_POST['deadline'];
$emp_id = $_SESSION['emp_id'];

$success = $user->createTask($description, $remark, $deadline, $emp_id);
if ($success) {
    $_SESSION['success'] = "Leave applied";
    header('Location: ../../app/task.php');
} else {
    $_SESSION['error'] = "Failed to apply leave";
    header('Location: ../../app/task.php');
}
exit;
