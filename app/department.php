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
                        <div class="col-8 mb-6 payments">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <img src="../assets/img/icons/unicons/paypal.png" alt="paypal" class="rounded" />
                                        </div>
                                    </div>
                                    <p class="mb-1">Total Department</p>
                                    <h4 class="card-title mb-3"><?php $totalDepartment = $user->countDepartment(0);
                                                                echo $totalDepartment['TOTAL_DEPARTMENT']; ?></h4>
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
                                    <p class="mb-1">No Manager</p>
                                    <h4 class="card-title mb-3"><?php $totalDepartment = $user->countDepartment(1);
                                                                echo $totalDepartment['TOTAL_DEPARTMENT']; ?></h4>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Department List</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalCenter">
                        <span class="icon-base bx bx-plus me-1"></span> Add New Department
                    </button>
                    <!-- <div class="col-lg-4 col-md-6">

                        <div class="mt-4"> -->
                    <!-- Button trigger modal -->
                    <!-- <button
                                type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modalCenter"><span class="icon-base bx bx-plus me-1"></span>
                                Add New Department
                            </button> -->

                    <!-- Modal -->
                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Add New Department</h5>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="../engine/employee/addDepartment.php" method="post">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-6">
                                                <label for="nameWithTitle" class="form-label">Department Name</label>
                                                <input
                                                    type="text"
                                                    id="nameWithTitle"
                                                    name="department_name"
                                                    class="form-control"
                                                    placeholder="Enter Department Name"
                                                    required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-primary">Add Department</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- </div>
                    </div> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table id="employeesTable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Department Name</th>
                                    <th>Manager</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                $departments = $user->getAllDepartments();
                                $no = 1;
                                foreach ($departments as $dept): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $dept['DEPT_NAME']; ?></td>
                                        <td><?= $dept['EMP_NAME'] ?? 'No Manager Assign' ?></td>
                                        <td>
                                            <!-- Edit Button: Navigates to the update page with the employee ID -->
                                            <a href="updateDepartment.php?id=<?= $dept['DEPARTMENT_ID']; ?>" class="btn btn-sm btn-warning">Edit</a>

                                            <!-- Delete Button: Submits a form to handle deletion -->
                                            <form action="delete_employee.php" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                                <input type="hidden" name="id" value="123">
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