<?php
include __DIR__ . '/../includes/header.php'; ?>
<div class="layout-page">
    <?php include __DIR__ . '/../includes/topbar.php'; ?>
    <div class="content-wrapper"> <!-- Content wrapper -->
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Assign Task</h5>
                    </div>
                    <div class="card-body">
                        <?php require_once __DIR__ . '/../classes/User.php';
                        $user = new User();
                        $task_id = $_GET['id'];
                        $staffList = $user->getEmployeeByDepartmentId($_SESSION['dept_id']); ?>
                        <form action="../engine/employee/assignTask.php" method="post">
                            <input type="hidden" name="task_id" value="<?= $task_id ?>">
                            <div class="form-check">
                                <?php foreach ($staffList as $staff): ?>
                                    <input class="form-check-input" type="checkbox" name="emp_ids[]" value="<?= $staff['EMP_ID'] ?>">
                                    <label class="form-check-label" for="defaultCheck2"><?= $staff['EMP_NAME'] ?></label>
                                <?php endforeach; ?>
                            </div>
                            <button type="submit" class="btn btn-primary mt-6">Assign Task</button>
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