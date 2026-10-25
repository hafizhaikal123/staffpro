<?php
include_once '../../classes/User.php';
session_start();
$user = new User();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deptId = $_POST['department_id'];
    $empId = $_POST['employee_id'];
    $deptName = $_POST['dept_name'];

    // echo $deptId;
    // echo $empId;
    // echo $deptName;
    $success = $user->assignManagerToDepartment($deptId, $empId, $deptName);
    if ($success) {
        $_SESSION['success'] = "Department updated successfully.";
        header('Location: ../../app/department.php');
    } else {
        $_SESSION['error'] = "Failed to update department.";
        header('Location: ../../app/updateDepartment.php');
    }
    exit;
}
