<?php
require_once __DIR__ . '/../../classes/User.php';

session_start();
$user = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emp_id = trim($_POST['emp_id']);

    $result = $user->deleteAccount($emp_id);

    if ($result) {
        $_SESSION['success'] = "Employee delete successfully";
    } else {
        $_SESSION['error'] = "Employee delete failed";
    }

    header("Location: ../../app/employee.php");
    exit();
}
