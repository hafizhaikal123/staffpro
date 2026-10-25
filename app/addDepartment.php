<?php include __DIR__ . '/../includes/header.php'; ?>
<div class="layout-page">
    <?php include __DIR__ . '/../includes/topbar.php'; ?>
    <div class="content-wrapper"> <!-- Content wrapper -->
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xl">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add New Department</h5>
                    </div>
                    <div class="card-body">
                        <form action="../engine/" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="emp_name">Department Name</label>
                                <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="IT" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="department_id">Manager</label>
                                <select class="form-select" id="department_id" name="department_id" required>
                                    <option value="">-- Select Manager --</option>
                                    <!-- Populate dynamically from DB -->
                                    <option value="1">Ahmad</option>
                                    <option value="2">Ali</option>
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