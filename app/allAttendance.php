<?php
include __DIR__ . '/../includes/header.php'; ?>
<div class="layout-page">
    <?php include __DIR__ . '/../includes/topbar.php'; ?>
    <div class="content-wrapper"> <!-- Content wrapper -->
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <?php
            if ($_SESSION['user_type'] == 1) { //admin view 
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
                <div class="card">
                    <h5 class="card-header">Table Basic</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Project</th>
                                    <th>Client</th>
                                    <th>Users</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>
                                        <i class="icon-base bx bxl-angular icon-md text-danger me-4"></i> <span>Angular Project</span>
                                    </td>
                                    <td>Albert Cook</td>
                                    <td>
                                        <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Lilian Fuller">
                                                <img src="../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Sophia Wilkerson">
                                                <img src="../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Christina Parker">
                                                <img src="../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="icon-base bx bxl-react icon-md text-info me-4"></i> <span>React Project</span>
                                    </td>
                                    <td>Barry Hunter</td>
                                    <td>
                                        <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Lilian Fuller">
                                                <img src="../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Sophia Wilkerson">
                                                <img src="../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Christina Parker">
                                                <img src="../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td><span class="badge bg-label-success me-1">Completed</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-edit-alt me-2"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-trash me-2"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="icon-base bx bxl-vuejs icon-md text-success me-4"></i> <span>VueJs Project</span>
                                    </td>
                                    <td>Trevor Baker</td>
                                    <td>
                                        <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Lilian Fuller">
                                                <img src="../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Sophia Wilkerson">
                                                <img src="../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Christina Parker">
                                                <img src="../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td><span class="badge bg-label-info me-1">Scheduled</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-edit-alt me-2"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-trash me-2"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="icon-base bx bxl-bootstrap icon-md text-primary me-4"></i>
                                        <span>Bootstrap Project</span>
                                    </td>
                                    <td>Jerry Milton</td>
                                    <td>
                                        <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Lilian Fuller">
                                                <img src="../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Sophia Wilkerson">
                                                <img src="../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Christina Parker">
                                                <img src="../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td><span class="badge bg-label-warning me-1">Pending</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-edit-alt me-2"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-trash me-2"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } elseif ($_SESSION['user_type'] == 2) { //manager view 
            ?>

            <?php } elseif ($_SESSION['user_type'] == 3) { //staff view 
            ?>
                <div class="card">
                    <h5 class="card-header">Table Basic</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Project</th>
                                    <th>Client</th>
                                    <th>Users</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>
                                        <i class="icon-base bx bxl-angular icon-md text-danger me-4"></i> <span>Angular Project</span>
                                    </td>
                                    <td>Albert Cook</td>
                                    <td>
                                        <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Lilian Fuller">
                                                <img src="../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Sophia Wilkerson">
                                                <img src="../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Christina Parker">
                                                <img src="../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="icon-base bx bxl-react icon-md text-info me-4"></i> <span>React Project</span>
                                    </td>
                                    <td>Barry Hunter</td>
                                    <td>
                                        <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Lilian Fuller">
                                                <img src="../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Sophia Wilkerson">
                                                <img src="../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Christina Parker">
                                                <img src="../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td><span class="badge bg-label-success me-1">Completed</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-edit-alt me-2"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-trash me-2"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="icon-base bx bxl-vuejs icon-md text-success me-4"></i> <span>VueJs Project</span>
                                    </td>
                                    <td>Trevor Baker</td>
                                    <td>
                                        <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Lilian Fuller">
                                                <img src="../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Sophia Wilkerson">
                                                <img src="../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Christina Parker">
                                                <img src="../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td><span class="badge bg-label-info me-1">Scheduled</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-edit-alt me-2"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-trash me-2"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="icon-base bx bxl-bootstrap icon-md text-primary me-4"></i>
                                        <span>Bootstrap Project</span>
                                    </td>
                                    <td>Jerry Milton</td>
                                    <td>
                                        <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Lilian Fuller">
                                                <img src="../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Sophia Wilkerson">
                                                <img src="../assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                            <li
                                                data-bs-toggle="tooltip"
                                                data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                class="avatar avatar-xs pull-up"
                                                title="Christina Parker">
                                                <img src="../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle" />
                                            </li>
                                        </ul>
                                    </td>
                                    <td><span class="badge bg-label-warning me-1">Pending</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-edit-alt me-2"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="icon-base bx bx-trash me-2"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
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