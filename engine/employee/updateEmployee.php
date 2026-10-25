<?php
require_once __DIR__ . '/../../classes/User.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'emp_id' => $_POST['emp_id'],
        'emp_name' => $_POST['emp_name'],
        'department_id' => $_POST['department_id'],
        'position' => $_POST['position'],
        'hire_date' => $_POST['hire_date'],
        'salary' => $_POST['salary'],
    ];

    $user = new User();
    $success = $user->updateEmployee($data);
    if ($success) {
        $_SESSION['success'] = "Employee update successfully.";
        header('Location: ../../app/employees.php');
    } else {
        $_SESSION['error'] = "Failed to update employee.";
        header('Location: ../../app/employees.php');
    }
    exit;
}
