<?php
require_once __DIR__ . '/../classes/User.php';
$user = new User();
include __DIR__ . '/../includes/header.php'; ?>
<div class="layout-page">
    <?php include __DIR__ . '/../includes/topbar.php'; ?>
    <div class="content-wrapper"> <!-- Content wrapper -->
        <?php
        if ($_SESSION['user_type'] == 1) { // admin navbar
        ?>
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">

                <div class="card">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Leaves History</h5>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Staff</th>
                                    <th>Description</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                $leaves = $user->getAllLeaves();
                                $no = 1;
                                foreach ($leaves as $leave): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= 'EMP' . str_pad($leave['EMP_ID'], 3, '0', STR_PAD_LEFT) . ' | ' . $leave['EMP_NAME']; ?></td>
                                        <td><?= $leave['DESCRIPTION']; ?></td>
                                        <td><?php $startDate = date('Y-m-d', strtotime($leave['START_DATE']));
                                            echo $startDate; ?></td>
                                        <td><?php $endDate = date('Y-m-d', strtotime($leave['END_DATE']));
                                            echo $endDate; ?></td>
                                        <td><?php if ($leave['STATUS'] == 0) {
                                                echo '<span class="badge bg-label-warning me-1">Pending</span>';
                                            } elseif ($leave['STATUS'] == 1) {
                                                echo '<span class="badge bg-label-success me-1">Approved</span>';
                                            } elseif ($leave['STATUS'] == 2) {
                                                echo '<span class="badge bg-label-danger me-1">Rejected</span>';
                                            }
                                            ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- / Content -->

        <?php } elseif ($_SESSION['user_type'] == 2) { //manager
        ?>
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
                <div class="card">
                    <?php
                    if (isset($_SESSION['error']) && $_SESSION['error']) {
                        echo '<div class="alert alert-danger" role="alert">Leave has been rejected</div>';
                        unset($_SESSION['error']);
                    } elseif (isset($_SESSION['success']) && $_SESSION['success']) {
                        echo '<div class="alert alert-success" role="alert">Leave has been approved</div>';
                        unset($_SESSION['success']);
                    }
                    ?>

                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Staff</th>
                                    <th>Description</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                $leaves = $user->getLeaveByDepartment($_SESSION['dept_id']);

                                $no = 1;
                                foreach ($leaves as $leave): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= 'EMP' . str_pad($leave['EMP_ID'], 3, '0', STR_PAD_LEFT) . ' | ' . $leave['EMP_NAME']; ?></td>
                                        <td><?= $leave['DESCRIPTION']; ?></td>
                                        <td><?php $startDate = date('Y-m-d', strtotime($leave['START_DATE']));
                                            echo $startDate; ?></td>
                                        <td><?php $endDate = date('Y-m-d', strtotime($leave['END_DATE']));
                                            echo $endDate; ?></td>
                                        <td><?php if ($leave['STATUS'] == 0) { ?>
                                                <form method="post" action="../engine/employee/updateLeave.php">
                                                    <input type="hidden" name="leave_id" value="<?= $leave['LEAVE_ID'] ?>">
                                                    <button name="action" value="1" class="btn btn-success btn-sm">Approve</button>
                                                    <button name="action" value="2" class="btn btn-danger btn-sm">Reject</button>
                                                </form>
                                            <?php } elseif ($leave['STATUS'] == 1) { ?>
                                                <span class="badge bg-label-success me-1">Approved</span>
                                            <?php } elseif ($leave['STATUS'] == 2) { ?>
                                                <span class="badge bg-label-danger me-1">Rejected</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } elseif ($_SESSION['user_type'] == 3) { //staff view
        ?>
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
                <div class="card">
                    <?php
                    if (isset($_SESSION['error']) && $_SESSION['error']) {
                        echo '<div class="alert alert-danger" role="alert">Failed to apply leave</div>';
                        unset($_SESSION['error']);
                    } elseif (isset($_SESSION['success']) && $_SESSION['success']) {
                        echo '<div class="alert alert-success" role="alert">Leave applied</div>';
                        unset($_SESSION['success']);
                    }
                    ?>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Leaves History</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalCenter">
                            <span class="icon-base bx bx-plus me-1"></span>Apply Leave
                        </button>
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Apply Leave</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="../engine/employee/applyLeave.php" method="post">
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
                                                    <label for="dobWithTitle" class="form-label">Leave Type</label>
                                                    <select class="form-select" id="type" name="type" required>
                                                        <option value="">-- Select Type --</option>
                                                        <option value="1">Medical Checkup</option>
                                                        <option value="2">Annual Leaves</option>
                                                        <option value="3">Maternity Leave</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row g-6">
                                                <div class="col mb-0">
                                                    <label for="startdate" class="form-label">Start Date</label>
                                                    <input
                                                        type="date"
                                                        id="start_date"
                                                        name="start_date"
                                                        class="form-control" />
                                                </div>
                                                <div class="col mb-0">
                                                    <label for="enddate" class="form-label">End Date</label>
                                                    <input type="date" id="end_date" name="end_date" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Apply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                $leaves = $user->getAllLeaves($_SESSION['emp_id']);
                                $no = 1;
                                foreach ($leaves as $leave): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $leave['DESCRIPTION']; ?></td>
                                        <td><?= $leave['LEAVE_TYPE']; ?></td>
                                        <td><?php $startDate = date('Y-m-d', strtotime($leave['START_DATE']));
                                            echo $startDate; ?></td>
                                        <td><?php $endDate = date('Y-m-d', strtotime($leave['END_DATE']));
                                            echo $endDate; ?></td>
                                        <td><?php if ($leave['STATUS'] == 0) {
                                                echo '<span class="badge bg-label-warning me-1">Pending</span>';
                                            } elseif ($leave['STATUS'] == 1) {
                                                echo '<span class="badge bg-label-success me-1">Approved</span>';
                                            } elseif ($leave['STATUS'] == 2) {
                                                echo '<span class="badge bg-label-danger me-1">Rejected</span>';
                                            }
                                            ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- / Content -->
        <?php } ?>
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