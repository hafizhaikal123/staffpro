<?php
require_once __DIR__ . '/../../classes/User.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'emp_id' => $_SESSION['emp_id'],
        'description' => $_POST['description'],
        'type' => $_POST['type'],
        'start_date' => $_POST['start_date'],
        'end_date' => $_POST['end_date'],
    ];

    $user = new User();
    $success = $user->applyLeaves($data);
    if ($success) {
        $_SESSION['success'] = "Leave applied";
        header('Location: ../../app/leaves.php');
    } else {
        $_SESSION['error'] = "Failed to apply leave";
        header('Location: ../../app/leaves.php');
    }
    exit;
}
