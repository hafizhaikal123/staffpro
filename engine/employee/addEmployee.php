<?php
require_once __DIR__ . '/../../classes/User.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'emp_name' => $_POST['emp_name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'dob' => $_POST['dob'],
        'department_id' => $_POST['department_id'],
        'position' => $_POST['position'],
        'hire_date' => $_POST['hire_date'],
        'salary' => $_POST['salary'],
        // 'role' => $_POST['role'],
    ];

    $user = new User();
    $success = $user->insertEmployee($data);
    if ($success) {
        $_SESSION['success'] = "Employee added successfully.";
        header('Location: ../../app/employees.php');
    } else {
        $_SESSION['error'] = "Failed to add employee.";
        header('Location: ../../app/employee.php');
    }
    exit;
}
