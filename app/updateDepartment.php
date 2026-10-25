<?php
require_once '../classes/User.php';
$user = new User();

if (isset($_GET['id'])) {
    $deptId = $_GET['id'];
    $department = $user->getDepartmentById($deptId);
    $employee = $user->getEmployeeByDepartmentId($deptId); // Optional: for manager selection
} else {
    header('Location: department.php');
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
                        <h5 class="mb-0">Update Department</h5>
                    </div>
                    <div class="card-body">
                        <form action="../engine/employee/updateDepartment.php" method="post">
                            <input type="hidden" name="department_id" value="<?= $department['DEPARTMENT_ID'] ?>">
                            <div class="mb-3">
                                <label class="form-label" for="emp_name">Department Name</label>
                                <input type="text" class="form-control" id="dept_name" name="dept_name" value="<?= $department['DEPT_NAME'] ?>" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="department_id">Manager</label>
                                <select class="form-select" id="employee_id" name="employee_id" required>
                                    <option value="">-- Select Manager --</option>
                                    <?php foreach ($employee as $emp) {
                                        echo "<option value=\"{$emp['EMP_ID']}\">{$emp['EMP_NAME']}</option>";
                                    }
                                    ?>

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Department</button>
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