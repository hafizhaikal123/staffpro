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

            <?php } elseif ($_SESSION['user_type'] == 2) { //manager view 
            ?>

            <?php } elseif ($_SESSION['user_type'] == 3) { //staff view 
            ?>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Checkin/Checkout</h5>
                    </div>
                    <?php $empId = $_SESSION['emp_id'];
                    $today = $user->getTodayAttendance($empId); ?>

                    <div class="card-body text-center mb-12 mt-4">
                        <div id="clock" class="alert alert-dark mb-4 pt-4 pb-4 text-center fs-1 fw-bold" role="alert"></div>
                        <form method="post" action="../engine/employee/clockin-clockout.php">
                            <?php if (!$today): ?>
                                <button type="submit" name="action" value="1" class="btn btn-success fs-5 fw-semibold me-3 mt-4">Clock In</button>
                                <button type="submit" class="btn btn-danger fs-5 fw-semibold ms-3 mt-4" disabled>Clock Out</button>
                            <?php elseif ($today['CHECKIN'] && !$today['CHECKOUT']): ?>
                                <button type="submit" class="btn btn-success fs-5 fw-semibold me-3 mt-4" disabled>Clock In</button>
                                <button type="submit" name="action" value="2" class="btn btn-danger fs-5 fw-semibold ms-3 mt-4">Clock Out</button>
                            <?php else: ?>
                                <button type="button" class="btn btn-success fs-5 fw-semibold me-3 mt-4" disabled>Clock In</button>
                                <button type="button" class="btn btn-danger fs-5 fw-semibold ms-3 mt-4" disabled>Clock Out</button>
                            <?php endif; ?>
                        </form>
                    </div>


                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Clock in</th>
                                    <th>Clock out</th>
                                    <th>Total Work Hours</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <?php if ($today): ?>
                                        <td> <?= $today['CHECKIN'] ?></td>
                                        <td> <?= $today['CHECKOUT'] ?: '-' ?></td>
                                        <td> <?= $today['HOURS'] ?: '-' ?></td>
                                    <?php else: ?>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>
                                    <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>
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