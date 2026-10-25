<?php
require_once __DIR__ . '/../../classes/User.php';
session_start();
$user = new User();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $departmentName = trim($_POST['department_name']);

    if (!empty($departmentName)) {
        if ($user->insertDepartment($departmentName)) {
            $_SESSION['success'] = "Department added successfully.";
        } else {
            $_SESSION['error'] = "Failed to add department.";
        }
    } else {
        $_SESSION['error'] = "Department name cannot be empty.";
    }

    header("Location: /../../app/department.php");
    exit;
}
