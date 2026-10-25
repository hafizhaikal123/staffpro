<?php
require_once __DIR__ . '/../../classes/User.php';
session_start();

$user = new User();
$empId = $_SESSION['emp_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    if ($action == 1) {
        $user->clockIn($empId);
    } elseif ($action == 2) {
        $user->clockOut($empId);
    }
    header('Location: ../../app/attendance.php');
    exit;
}
