<?php
session_start();
require_once __DIR__ . '/../../classes/User.php';
$user = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $monthYearInput = $_POST['month']; // input type="month"
    list($year, $month) = explode('-', $monthYearInput);
    $emp_id = $_POST['emp_id'];

    // Optional: Format for your query
    $month_year = $month . '-' . $year;
}

$success = $user->calculatePayroll($month, $year);
if ($success) {
    $_SESSION['success'] = "Leave applied";
    header('Location: ../../app/payroll.php');
} else {
    $_SESSION['error'] = "Failed to apply leave";
    header('Location: ../../app/payroll.php');
}
exit;
