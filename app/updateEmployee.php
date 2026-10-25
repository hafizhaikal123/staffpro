<?php
require_once '../classes/User.php';
$user = new User();

if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];
    $employee = $user->getEmployeeById($emp_id);
    $hireDate = date('Y-m-d', strtotime($employee['HIRE_DATE']));
} else {
    header('Location: employees.php');
    exit;
}
include __DIR__ . '/../includes/header.php'; ?>
<div class="layout-page">
    <?php include __DIR__ . '/../includes/topbar.php'; ?>
    <div class="content-wrapper"> <!-- Content wrapper -->
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Update Employee</h5>
                    </div>
                    <div class="card-body">
                        <form action="../engine/employee/updateEmployee.php" method="post">
                            <input type="hidden" name="emp_id" value="<?= $employee['EMP_ID']; ?>">
                            <div class="mb-3">
                                <label class="form-label" for="emp_name">Full Name</label>
                                <input type="text" class="form-control" id="emp_name" name="emp_name" value="<?= $employee['EMP_NAME']; ?>" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="department_id">Department</label>
                                <select class="form-select" id="department_id" name="department_id" required>
                                    <option value="">-- Select Department --</option>
                                    <?php
                                    $departments = $user->getAllDepartments();
                                    foreach ($departments as $dept) {
                                        $selected = ($dept['DEPARTMENT_ID'] == $employee['DEPARTMENT_ID']) ? 'selected' : '';
                                        echo "<option value=\"{$dept['DEPARTMENT_ID']}\" $selected>{$dept['DEPT_NAME']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="position">Position</label>
                                <input type="text" class="form-control" id="position" name="position" value="<?= $employee['POSITION']; ?>" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="hire_date">Hire Date</label>
                                <input type="date" class="form-control" id="hire_date" name="hire_date" value="<?= $hireDate; ?>" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="salary">Salary</label>
                                <input type="number" class="form-control" id="salary" name="salary" value="<?= $employee['SALARY']; ?>" required />
                            </div>
                            <button type="submit" class="btn btn-primary">Update Employee</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- / Content -->

        <?php include __DIR__ . '/../includes/footer.php'; ?>
        <div class="content-backdrop fade"></div>
    </div> <!-- Content wrapper -->
</div> <!-- / Layout page -->
</div> <!-- layout container -->
<div class="layout-overlay layout-menu-toggle"></div> <!-- Overlay -->
</div> <!-- layout wrapper -->
<?php include __DIR__ . '/../includes/scripts.php'; ?>
</body>

</html>