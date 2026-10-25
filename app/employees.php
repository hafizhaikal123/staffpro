<?php
require_once __DIR__ . '/../classes/User.php';
$user = new User();
include __DIR__ . '/../includes/header.php'; ?>
<div class="layout-page">
    <?php include __DIR__ . '/../includes/topbar.php'; ?>
    <div class="content-wrapper"> <!-- Content wrapper -->
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2 profile-report">
                    <div class="row">
                        <div class="col-6 mb-6 payments">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <img src="../assets/img/icons/unicons/paypal.png" alt="paypal" class="rounded" />
                                        </div>
                                    </div>
                                    <p class="mb-1">Total Employee</p>
                                    <h4 class="card-title mb-3"><?php $totalStaff = $user->countStaff();
                                                                echo $totalStaff['TOTAL_STAFF']; ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-6 transactions">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                                        </div>
                                    </div>
                                    <p class="mb-1">Total Staff</p>
                                    <h4 class="card-title mb-3"><?php $totalStaff = $user->countStaff(0, 1, 0);
                                                                echo $totalStaff['TOTAL_STAFF']; ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-6 transactions">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                                        </div>
                                    </div>
                                    <p class="mb-1">Total Manager</p>
                                    <h4 class="card-title mb-3"><?php $totalStaff = $user->countStaff(0, 0, 1);
                                                                echo $totalStaff['TOTAL_STAFF']; ?></h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Employee List</h5>
                    <a href="addEmployee.php">
                        <button type="button" class="btn btn-primary">
                            <span class="icon-base bx bx-plus me-1"></span>Add New Employee
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table id="employeesTable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                $employees = $user->getAllEmployees();
                                $no = 1;
                                foreach ($employees as $emp): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= 'EMP' . str_pad($emp['EMP_ID'], 3, '0', STR_PAD_LEFT) ?></td>
                                        <td><?= htmlspecialchars($emp['EMP_NAME']) ?></td>
                                        <td><?= htmlspecialchars($emp['EMAIL']) ?></td>
                                        <td><?= htmlspecialchars($emp['DEPT_NAME']) ?></td>
                                        <td><?php if ($emp['ROLE'] == 2) {
                                                echo "Manager";
                                            } elseif ($emp['ROLE'] == 3) {
                                                echo "Staff";
                                            }
                                            ?></td>
                                        <td>
                                            <!-- Edit Button: Navigates to the update page with the employee ID -->
                                            <a href="updateEmployee.php?id=<?= $emp['EMP_ID']; ?>" class="btn btn-sm btn-warning">Edit</a>

                                            <!-- Delete Button: Submits a form to handle deletion -->
                                            <form action="../engine/employee/delete_employee.php" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                                <input type="hidden" name="id" value="<?= $emp['EMP_ID']; ?>">
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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