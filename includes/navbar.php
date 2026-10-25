<?php
$currentPage = basename($_SERVER['PHP_SELF'], ".php");
?>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="../app/home.php" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="../assets/img/favicon/SP-NOBG.png" alt="StaffPro" width="65" height="65" />
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">StaffPro</span>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>
    <div class="menu-inner-shadow"></div>

    <?php
    if ($_SESSION['user_type'] == 1) { // admin navbar
    ?>
        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item <?php echo ($currentPage == 'home') ? 'active' : ''; ?>">
                <a href="../app/home.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Dashboard</div>
                </a>
            </li>

            <!-- Employees -->
            <li class="menu-item <?php echo ($currentPage == 'employees' || $currentPage == 'addEmployee') ? 'active' : ''; ?>">
                <a href="../app/employees.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div>Employees</div>
                </a>
            </li>

            <li class="menu-item <?php echo ($currentPage == 'department') ? 'active' : ''; ?>">
                <a href="../app/department.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-buildings"></i>
                    <div>Department</div>
                </a>
            </li>

            <li class="menu-item <?php echo ($currentPage == 'account') ? 'active' : ''; ?>">
                <a href="../app/account.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div>Account</div>
                </a>
            </li>

            <li class="menu-item <?php echo ($currentPage == 'leaves') ? 'active' : ''; ?>">
                <a href="../app/leaves.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-calendar"></i>
                    <div>Leaves</div>
                </a>
            </li>

            <li class="menu-item <?php echo ($currentPage == 'task') ? 'active' : ''; ?>">
                <a href="../app/task.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-task"></i>
                    <div>Task</div>
                </a>
            </li>

            <li class="menu-item <?php echo ($currentPage == 'payroll') ? 'active' : ''; ?>">
                <a href="../app/payroll.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-money"></i>
                    <div>Payroll</div>
                </a>
            </li>

            <!-- ... rest of your original menu items ... -->
        </ul>
    <?php } elseif ($_SESSION['user_type'] == 2) { //manager
    ?>
        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item <?php echo ($currentPage == 'home') ? 'active' : ''; ?>">
                <a href="../app/home.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Dashboard</div>
                </a>
            </li>

            <!-- Employees -->
            <li class="menu-item <?php echo ($currentPage == 'team') ? 'active' : ''; ?>">
                <a href="../app/team.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div>My Team</div>
                </a>
            </li>

            <li class="menu-item <?php echo ($currentPage == 'task') ? 'active' : ''; ?>">
                <a href="../app/task.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-task"></i>
                    <div>Task</div>
                </a>
            </li>

            <li class="menu-item <?php echo ($currentPage == 'leaves') ? 'active' : ''; ?>">
                <a href="../app/leaves.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-calendar"></i>
                    <div>Leaves</div>
                </a>
            </li>

            <!-- ... rest of your original menu items ... -->
        </ul>
    <?php } elseif ($_SESSION['user_type'] == 3) { // staff
    ?>
        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item <?php echo ($currentPage == 'home') ? 'active' : ''; ?>">
                <a href="../app/home.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Dashboard</div>
                </a>
            </li>

            <!-- Employees -->
            <li class="menu-item <?php echo ($currentPage == 'task') ? 'active' : ''; ?>">
                <a href="../app/task.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-task"></i>
                    <div>Task</div>
                </a>
            </li>

            <li class="menu-item <?php echo ($currentPage == 'attendance') ? 'active' : ''; ?>">
                <a href="../app/attendance.php" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-buildings"></i>
                    <div>Attendance</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="../app/attendance.php" class="menu-link">
                            <div class="text-truncate" data-i18n="Clockin/Clockout">Clockin/Clockout</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../app/allAttendance.php" class="menu-link">
                            <div class="text-truncate" data-i18n="Attendance">Attendance</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item <?php echo ($currentPage == 'leaves') ? 'active' : ''; ?>">
                <a href="../app/leaves.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-calendar"></i>
                    <div>Leaves</div>
                </a>
            </li>

            <li class="menu-item <?php echo ($currentPage == 'payroll') ? 'active' : ''; ?>">
                <a href="../app/payroll.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-money"></i>
                    <div>Payroll</div>
                </a>
            </li>

            <!-- ... rest of your original menu items ... -->
        </ul>
    <?php } ?>
</aside>