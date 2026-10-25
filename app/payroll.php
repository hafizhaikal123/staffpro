<?php
require_once __DIR__ . '/../classes/User.php';
$user = new User();
include __DIR__ . '/../includes/header.php'; ?>
<div class="layout-page">
    <?php include __DIR__ . '/../includes/topbar.php'; ?>
    <div class="content-wrapper"> <!-- Content wrapper -->
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <?php
            if ($_SESSION['user_type'] == 1) { //admin view 
            ?>

                <div class="card mt-2">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Payroll</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalCenter">
                            <span class="icon-base bx bx-plus me-1"></span>Generate Payroll
                        </button>
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Generate Payroll</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="../engine/employee/generatePayroll.php" method="post">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-6">
                                                    <label for="nameWithTitle" class="form-label">Month & Year</label>
                                                    <input
                                                        type="month"
                                                        id="nameWithTitle"
                                                        name="month"
                                                        class="form-control"
                                                        required />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-6">
                                                    <select class="form-select" id="employee_id" name="emp_id" required>
                                                        <option value="">-- Select Employee --</option>
                                                        <?php
                                                        $employee = $user->getEmployees();
                                                        foreach ($employee as $emp) {
                                                            echo "<option value=\"{$emp['EMP_ID']}\">{$emp['EMP_NAME']}</option>";
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Generate</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Emp ID</th>
                                        <th>Deduction</th>
                                        <th>Allowance</th>
                                        <th>Net Salary</th>
                                        <th>Month</th>
                                        <th>Year</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    $payroll = $user->getPayroll(0);
                                    $no = 1;
                                    foreach ($payroll as $pay): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= 'EMP' . str_pad($pay['EMP_ID'], 3, '0', STR_PAD_LEFT) ?></td>
                                            <td><?= $pay['DEDUCTION']; ?></td>
                                            <td><?= $pay['ALLOWANCE'] ?></td>
                                            <td><?= $pay['NET_PAY'] ?></td>
                                            <td><?= $pay['MONTH'] ?></td>
                                            <td><?= $pay['YEAR'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    <?php } elseif ($_SESSION['user_type'] == 2) { //manager view 
    ?>
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
                                <p class="mb-1">Total Department</p>
                                <h4 class="card-title mb-3">7</h4>
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
                                <h4 class="card-title mb-3">55</h4>
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
                                <h4 class="card-title mb-3">55</h4>
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
                                <h4 class="card-title mb-3">55</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Leaves History</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modalCenter">
                    <span class="icon-base bx bx-plus me-1"></span>Create Task
                </button>
                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Create Task</h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="../engine/employee/addTask.php" method="post">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="nameWithTitle" class="form-label">Description</label>
                                            <input
                                                type="text"
                                                id="nameWithTitle"
                                                name="description"
                                                class="form-control"
                                                required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-6">
                                            <label for="nameWithTitle" class="form-label">Remark</label>
                                            <input
                                                type="text"
                                                id="nameWithTitle"
                                                name="remark"
                                                class="form-control"
                                                required />
                                        </div>
                                    </div>
                                    <div class="row g-6">
                                        <div class="col mb-0">
                                            <label for="enddate" class="form-label">Deadline</label>
                                            <input type="date" id="deadline" name="deadline" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="employeesTable" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Task Name</th>
                                <th>Remark</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            $tasks = $user->getTask($_SESSION['emp_id']);
                            $no = 1;
                            foreach ($tasks as $task): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $task['DESCRIPTION']; ?></td>
                                    <td><?= $task['REMARK']; ?></td>
                                    <td><?php $deadline = date('Y-m-d', strtotime($task['DEADLINE']));
                                        echo $deadline; ?></td>
                                    <td><?php if ($task['STATUS'] == 0) {
                                            echo '<span class="badge bg-label-warning me-1">Pending</span>';
                                        } elseif ($task['STATUS'] == 1) {
                                            echo '<span class="badge bg-label-success me-1">Ongoing</span>';
                                        } elseif ($task['STATUS'] == 2) {
                                            echo '<span class="badge bg-label-danger me-1">Completed</span>';
                                        }
                                        ?></td>
                                    <td><a href="assignTask.php?id=<?= $task['TASK_ID']; ?>" class="btn btn-sm btn-warning">Assign</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <?php } elseif ($_SESSION['user_type'] == 3) { //staff view 
    ?>
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
                                <p class="mb-1">Total Department</p>
                                <h4 class="card-title mb-3">7</h4>
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
                                <h4 class="card-title mb-3">55</h4>
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
                                <h4 class="card-title mb-3">55</h4>
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
                                <h4 class="card-title mb-3">55</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Payroll</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Deduction</th>
                                <th>Allowance</th>
                                <th>Net Salary</th>
                                <th>Month</th>
                                <th>Year</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            $payroll = $user->getPayroll($_SESSION['emp_id']);
                            $no = 1;
                            foreach ($payroll as $pay): ?>
                                <tr>
                                    <td><?= $no++; ?></td>

                                    <td><?= $pay['DEDUCTION']; ?></td>
                                    <td><?= $pay['ALLOWANCE'] ?></td>
                                    <td><?= $pay['NET_PAY'] ?></td>
                                    <td><?= $pay['MONTH'] ?></td>
                                    <td><?= $pay['YEAR'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
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