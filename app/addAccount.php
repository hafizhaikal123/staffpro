<?php
require_once __DIR__ . '/../classes/User.php';
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
                        <h5 class="mb-0">Add New Account</h5>
                    </div>
                    <div class="card-body">
                        <form action="../engine/employee/addAccount.php" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="Employee">Employee</label>
                                <select class="form-select" id="emp_id" name="emp_id" required>
                                    <option value="">-- Select Employee --</option>
                                    <?php
                                    $employee = $user->getEmployeesWithoutAccount();
                                    foreach ($employee as $emp) {
                                        echo "<option value=\"{$emp['EMP_ID']}\">{$emp['EMP_NAME']}</option>";
                                    } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required />
                            </div>

                            <button type="submit" class="btn btn-primary">Add Account</button>
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