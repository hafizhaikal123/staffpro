<?php
session_start();
require_once __DIR__ . '/../../classes/User.php';
$user = new User();

$emp_ids = $_POST['emp_ids'];
$task_id = $_POST['task_id'];
$manager_id = $_SESSION['emp_id'];

foreach ($emp_ids as $emp_id) {
    $user->assignToStaff($task_id, $emp_id, $manager_id);
}

header('Location: ../../app/task.php');
