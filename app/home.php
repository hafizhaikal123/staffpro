<?php
require_once '../classes/User.php';
$user = new User();
include __DIR__ . '/../includes/header.php'; ?>
<div class="layout-page">
  <?php include __DIR__ . '/../includes/topbar.php'; ?>
  <div class="content-wrapper"> <!-- Content wrapper -->
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-xxl-8 mb-6 order-0">
          <div class="card">
            <div class="d-flex align-items-start row">
              <div class="col-sm-7">
                <div class="card-body">
                  <h5 class="card-title text-primary mb-3">Welcome! <?php echo $_SESSION['username']; ?> 🎉</h5>
                  <p class="mb-6"><b>
                      <?php echo date("l, d F Y");
                      ?></b>
                  </p>
                </div>
              </div>
              <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-6">
                  <img
                    src="../assets/img/illustrations/man-with-laptop.png"
                    height="175"
                    alt="View Badge User" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-4 col-lg-12 col-md-4 order-1">
          <div class="row">
            <div class="col-lg-8 col-md-12 col-6 mb-6">
              <div class="card h-100">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div class="avatar flex-shrink-0">
                      <img
                        src="../assets/img/icons/unicons/chart-success.png"
                        alt="chart success"
                        class="rounded" />
                    </div>
                    <div class="dropdown">
                      <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt3"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                      </div>
                    </div>
                  </div>
                  <p class="mb-1">Total Salary Paid</p>
                  <h4 class="card-title mb-3">RM <?php $salary = $user->getTotalNetPay();
                                                  echo $salary; ?></h4>
                  <small class="text-success fw-medium"><i class="icon-base bx bx-up-arrow-alt"></i> +72.80%</small>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2 profile-report">
          <div class="row">
            <div class="col-6 mb-6 payments">
              <div class="card h-100">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div class="avatar flex-shrink-0">
                      <img src="../assets/img/icons/unicons/paypal.png" alt="paypal" class="rounded" />
                    </div>
                    <div class="dropdown">
                      <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt4"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                      </div>
                    </div>
                  </div>
                  <p class="mb-1">Total Department</p>
                  <h4 class="card-title mb-3"><?php $totalDepartment = $user->countDepartment();
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
                    <div class="dropdown">
                      <button
                        class="btn p-0"
                        type="button"
                        id="cardOpt1"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="icon-base bx bx-dots-vertical-rounded text-body-secondary"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="cardOpt1">
                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                      </div>
                    </div>
                  </div>
                  <p class="mb-1">Total Employee</p>
                  <h4 class="card-title mb-3"><?php $totalStaff = $user->countStaff(1);
                                              echo $totalStaff['TOTAL_STAFF']; ?></h4>
                </div>
              </div>
            </div>
            <div class="col-12 mb-6 profile-report">
              <div class="card h-100">
                <div class="card-body">
                  <div
                    class="d-flex justify-content-between align-items-center flex-sm-row flex-column gap-10 flex-wrap">
                    <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                      <div class="card-title mb-6">
                        <h5 class="text-nowrap mb-1">Profile Report</h5>
                        <span class="badge bg-label-warning">YEAR 2022</span>
                      </div>
                      <div class="mt-sm-auto">
                        <span class="text-success text-nowrap fw-medium"><i class="icon-base bx bx-up-arrow-alt"></i> 68.2%</span>
                        <h4 class="mb-0">$84,686k</h4>
                      </div>
                    </div>
                    <div id="profileReportChart"></div>
                  </div>
                </div>
              </div>
            </div>
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