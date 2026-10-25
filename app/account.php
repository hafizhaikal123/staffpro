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
                                    <p class="mb-1">Total Account</p>
                                    <h4 class="card-title mb-3"><?php $totalDepartment = $user->countAccount(0);
                                                                echo $totalDepartment['ACC']; ?></h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card mt-2">
                <?php
                // if (isset($_SESSION['error']) && $_SESSION['error']) {
                //     unset($_SESSION['error']);
                //     echo '<div class="alert alert-danger" role="alert">Account delete failed</div>';
                //     unset($_SESSION['error']);
                // } elseif (isset($_SESSION['success']) && $_SESSION['success']) {
                //     unset($_SESSION['success']);
                //     echo '<div class="alert alert-success" role="alert">Account delete successfully</div>';
                //     unset($_SESSION['success']);
                // }
                ?>
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Account List</h5>
                    <a href="addAccount.php">
                        <button type="button" class="btn btn-primary">
                            <span class="icon-base bx bx-plus me-1"></span>Add New Account
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table id="employeesTable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Employee ID</th>
                                    <th>Username</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                $account = $user->getAllAccount();
                                $no = 1;
                                foreach ($account as $acc): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= 'EMP' . str_pad($acc['EMP_ID'], 3, '0', STR_PAD_LEFT) ?></td>
                                        <td><?= $acc['USERNAME']; ?></td>
                                        <td><?php echo ($acc['ROLE'] == 2) ? 'Manager' : 'Staff'; ?></td>
                                        <td><?php echo ($acc['STATUS'] == 1) ? '<span class="badge bg-label-primary me-1">Active</span>' :
                                                '<span class="badge bg-label-danger me-1">Inactive</span>'; ?></td>
                                        <td>
                                            <!-- Delete Button: Submits a form to handle deletion -->
                                            <form action="../engine/employee/deleteAcc.php" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this account?');">
                                                <input type="hidden" name="acc_id" value="<?= $acc['ACC_ID']; ?>">

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