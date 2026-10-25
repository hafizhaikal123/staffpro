<?php require_once '../classes/User.php';
$user = new User();
include __DIR__ . '/../includes/header.php'; ?>

<div class="layout-page">
    <?php include __DIR__ . '/../includes/topbar.php'; ?>
    <div class="content-wrapper"> <!-- Content wrapper -->
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add New Employee</h5>
                    </div>
                    <div class="card-body">
                        <form action="../engine/employee/addEmployee.php" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="emp_name">Full Name</label>
                                <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Enter Name" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="john@staffpro.com" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="012-3456789" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="hire_date">DOB</label>
                                <input type="date" class="form-control" id="dob" name="dob" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="department_id">Department</label>
                                <select class="form-select" id="department_id" name="department_id" required>
                                    <option value="">-- Select Department --</option>
                                    <!-- Populate dynamically from DB -->
                                    <?php
                                    $departments = $user->getAllDepartments();
                                    foreach ($departments as $dept) {
                                        echo "<option value=\"{$dept['DEPARTMENT_ID']}\">{$dept['DEPT_NAME']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="position">Position</label>
                                <input type="text" class="form-control" id="position" name="position" placeholder="Software Engineer" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="hire_date">Hire Date</label>
                                <input type="date" class="form-control" id="hire_date" name="hire_date" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="salary">Salary</label>
                                <input type="number" class="form-control" id="salary" name="salary" placeholder="4000" required />
                            </div>

                            <!-- <div class="mb-3">
                                <label class="form-label" for="role">Role</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option value="">-- Select Role --</option>
                                    <option value="3">Staff</option>
                                    <option value="2">Manager</option>
                                </select>
                            </div> -->

                            <button type="submit" class="btn btn-primary">Add Employee</button>
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