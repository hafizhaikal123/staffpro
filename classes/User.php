<?php
require_once __DIR__ . '/Database.php';

class User
{
    private $db;
    private $connection;
    private $userData;

    public function __construct()
    {
        $this->db = new Database();
        $this->connection = $this->db->connect();
    }

    // Check if database is connected
    public function isDatabaseConnected()
    {
        return $this->db->isConnected();
    }

    // Get database connection error if any
    public function getDatabaseError()
    {
        return $this->db->getErrorMessage();
    }

    public function login($username)
    {
        $query = "SELECT acc.ACC_ID, acc.USERNAME, acc.PASSWORD, acc.EMP_ID, emp.EMP_NAME, emp.ROLE, emp.DEPARTMENT_ID
        FROM account acc
        LEFT JOIN employee emp ON acc.EMP_ID = emp.EMP_ID
        WHERE acc.USERNAME = :username";

        $stmt = oci_parse($this->connection, $query);
        oci_bind_by_name($stmt, ":username", $username);

        oci_execute($stmt);

        if ($row = oci_fetch_assoc($stmt)) {
            return $row;
        }
        return false;
    }

    // 5. Delete User
    public function deleteUser($userId)
    {
        $query = "DELETE FROM user_login WHERE user_id = :id";
        $stmt = oci_parse($this->connection, $query);
        oci_bind_by_name($stmt, ":id", $userId);
        return oci_execute($stmt);
    }

    public function updateUser($userId, $email, $password)
    {
        $query = "UPDATE user_login SET email = :email, password = :password WHERE user_id = :id";
        $stmt = oci_parse($this->connection, $query);
        oci_bind_by_name($stmt, ":email", $email);
        oci_bind_by_name($stmt, ":password", $password);
        oci_bind_by_name($stmt, ":id", $userId);
        return oci_execute($stmt);
    }

    public function getUserData()
    {
        return $this->userData;
    }

    public function logout()
    {
        session_start();
        // $_SESSION = [];
        session_unset();
        session_destroy();
        return true;
    }

    public function createAccount($username, $password, $emp_id)
    {
        try {
            $sql = "INSERT INTO ACCOUNT (ACC_ID, USERNAME, PASSWORD, EMP_ID)
                VALUES (seq_account_id.NEXTVAL, :username, :password, :emp_id)";

            $stmt = oci_parse($this->connection, $sql);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            oci_bind_by_name($stmt, ':username', $username);
            oci_bind_by_name($stmt, ':password', $hashedPassword);
            oci_bind_by_name($stmt, ':emp_id', $emp_id);

            $success = oci_execute($stmt);

            if (!$success) {
                $e = oci_error($stmt);
                echo $e['message'];
                // return ['success' => false, 'error' => $e['message']];
            }

            return true;
        } finally {
            if (isset($stmt)) {
                oci_free_statement($stmt);
            }
            if (isset($this->conn)) {
                oci_close($this->connection);
            }
        }
    }

    public function deleteAccount($acc_id)
    {
        $sql = "DELETE FROM ACCOUNT WHERE ACC_ID = :acc_id";
        $stmt = oci_parse($this->connection, $sql);

        oci_bind_by_name($stmt, ':acc_id', $acc_id);
        $success = oci_execute($stmt);

        if (!$success) {
            $e = oci_error($stmt);
            // echo $e['message'];
            return false;
        }

        return true;
    }

    public function deleteEmployee($emp_id)
    {
        $sql = "DELETE FROM EMPLOYEE WHERE emp_id = :emp_id";
        $stmt = oci_parse($this->connection, $sql);

        oci_bind_by_name($stmt, ':emp_id', $emp_id);
        $success = oci_execute($stmt);

        if (!$success) {
            $e = oci_error($stmt);
            // echo $e['message'];
            return false;
        }

        return true;
    }

    public function getAllAccount()
    {
        $sql = "SELECT acc.ACC_ID, acc.USERNAME, acc.STATUS, acc.EMP_ID, emp.ROLE
                FROM account acc
                LEFT JOIN employee emp ON acc.EMP_ID = emp.EMP_ID
                WHERE acc.EMP_ID IS NOT NULL";

        $stmt = oci_parse($this->connection, $sql);
        oci_execute($stmt);

        $account = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $account[] = $row;
        }
        return $account;
    }

    public function insertDepartment($deptName)
    {
        $sql = "INSERT INTO department (DEPARTMENT_ID, DEPT_NAME) VALUES (seq_department_id.NEXTVAL, :dept_name)";
        $stmt = oci_parse($this->connection, $sql);
        oci_bind_by_name($stmt, ":dept_name", $deptName);
        return oci_execute($stmt);
    }

    public function getAllDepartments()
    {
        $sql = "SELECT 
                d.DEPARTMENT_ID,
                d.DEPT_NAME,
                e.EMP_NAME
            FROM 
                department d
            LEFT JOIN 
                employee e ON d.EMP_ID = e.EMP_ID
            ORDER BY 
                d.DEPARTMENT_ID ASC";

        $stmt = oci_parse($this->connection, $sql);
        oci_execute($stmt);

        $departments = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $departments[] = $row;
        }
        return $departments;
    }

    public function getDepartmentById($dept_id)
    {
        $sql = "SELECT * FROM department WHERE department_id = :dept_id";
        $stmt = oci_parse($this->connection, $sql);
        oci_bind_by_name($stmt, ":dept_id", $dept_id);
        oci_execute($stmt);

        return oci_fetch_assoc($stmt);
    }

    public function getEmployeeByDepartmentId($dept_id)
    {
        $sql = "SELECT * FROM employee WHERE DEPARTMENT_ID = :dept_id AND ROLE = 3";
        $stmt = oci_parse($this->connection, $sql);
        oci_bind_by_name($stmt, ":dept_id", $dept_id);
        oci_execute($stmt);

        $emp = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $emp[] = $row;
        }
        return $emp;
    }

    public function getEmployeeById($emp_id)
    {
        $sql = "SELECT * FROM employee WHERE EMP_ID = :emp_id";
        $stmt = oci_parse($this->connection, $sql);
        oci_bind_by_name($stmt, ":emp_id", $emp_id);
        oci_execute($stmt);

        return oci_fetch_assoc($stmt);
    }

    public function updateEmployee($data)
    {
        $sql = "UPDATE employee SET EMP_NAME = :emp_name, DEPARTMENT_ID = :dept_id, POSITION = :position, 
        HIRE_DATE = TO_DATE(:hire_date, 'YYYY-MM-DD'), SALARY = :salary WHERE EMP_ID = :emp_id";
        $stmt = oci_parse($this->connection, $sql);
        oci_bind_by_name($stmt, ':emp_id', $data['emp_id']);
        oci_bind_by_name($stmt, ':emp_name', $data['emp_name']);
        oci_bind_by_name($stmt, ':dept_id', $data['department_id']);
        oci_bind_by_name($stmt, ':position', $data['position']);
        oci_bind_by_name($stmt, ':hire_date', $data['hire_date']);
        oci_bind_by_name($stmt, ':salary', $data['salary']);

        $success = oci_execute($stmt);

        if (!$success) {
            $e = oci_error($stmt);
            echo $e['message'];
            // return false;
        }

        return true;
    }

    public function insertEmployee($data)
    {
        $sql = "INSERT INTO employee 
        (EMP_ID, EMP_NAME, EMAIL, PHONE, DOB, DEPARTMENT_ID, POSITION, HIRE_DATE, SALARY)
        VALUES 
        (seq_employee_id.NEXTVAL, :emp_name, :email, :phone, TO_DATE(:dob, 'YYYY-MM-DD'), :department_id, :position, 
        TO_DATE(:hire_date, 'YYYY-MM-DD'), :salary)";

        $stmt = oci_parse($this->connection, $sql);

        oci_bind_by_name($stmt, ':emp_name', $data['emp_name']);
        oci_bind_by_name($stmt, ':email', $data['email']);
        oci_bind_by_name($stmt, ':phone', $data['phone']);
        oci_bind_by_name($stmt, ':dob', $data['dob']);
        oci_bind_by_name($stmt, ':department_id', $data['department_id']);
        oci_bind_by_name($stmt, ':position', $data['position']);
        oci_bind_by_name($stmt, ':hire_date', $data['hire_date']);
        oci_bind_by_name($stmt, ':salary', $data['salary']);

        $success = oci_execute($stmt);

        if (!$success) {
            $e = oci_error($stmt);
            return false;
        }
        return true;
    }

    public function getAllEmployees()
    {
        $sql = "SELECT e.*, d.DEPT_NAME
            FROM employee e
            LEFT JOIN department d ON e.department_id = d.department_id
            ORDER BY e.EMP_ID ASC";
        $stmt = oci_parse($this->connection, $sql);
        oci_execute($stmt);

        $employees = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $employees[] = $row;
        }
        return $employees;
    }

    public function getEmployees()
    {
        $sql = "SELECT *
            FROM employee 
            ORDER BY EMP_ID ASC";
        $stmt = oci_parse($this->connection, $sql);
        oci_execute($stmt);

        $employees = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $employees[] = $row;
        }
        return $employees;
    }



    public function assignManagerToDepartment($deptId, $newEmpId, $dept_name)
    {
        try {
            // Begin transaction
            oci_execute(oci_parse($this->connection, "BEGIN"));

            // Step 1: Get current manager
            $sql = "SELECT EMP_ID FROM department WHERE DEPARTMENT_ID = :dept_id";
            $stmt = oci_parse($this->connection, $sql);
            oci_bind_by_name($stmt, ':dept_id', $deptId);
            oci_execute($stmt);
            oci_fetch($stmt);
            $currentManagerId = oci_result($stmt, 'EMP_ID');

            // Step 2: Revert old manager to staff (role 3)
            if ($currentManagerId && $currentManagerId != $newEmpId) {
                $sqlRevert = "UPDATE employee SET role = 3 WHERE emp_id = :old_manager_id";
                $stmtRevert = oci_parse($this->connection, $sqlRevert);
                oci_bind_by_name($stmtRevert, ':old_manager_id', $currentManagerId);
                oci_execute($stmtRevert, OCI_NO_AUTO_COMMIT);
            }

            // Step 3: Assign new manager in department
            $sql1 = "UPDATE department SET emp_id = :emp_id WHERE department_id = :dept_id";
            $stmt1 = oci_parse($this->connection, $sql1);
            oci_bind_by_name($stmt1, ':emp_id', $newEmpId);
            oci_bind_by_name($stmt1, ':dept_id', $deptId);
            oci_execute($stmt1, OCI_NO_AUTO_COMMIT);

            // Step 4: Promote new manager (role = 2)
            $sql2 = "UPDATE employee SET role = 2 WHERE emp_id = :emp_id";
            $stmt2 = oci_parse($this->connection, $sql2);
            oci_bind_by_name($stmt2, ':emp_id', $newEmpId);
            oci_execute($stmt2, OCI_NO_AUTO_COMMIT);

            $sql3 = "UPDATE department SET dept_name = :dept_name WHERE department_id = :dept_id";
            $stmt3 = oci_parse($this->connection, $sql3);
            oci_bind_by_name($stmt3, ':dept_name', $dept_name);
            oci_bind_by_name($stmt3, ':dept_id', $deptId);
            oci_execute($stmt3, OCI_NO_AUTO_COMMIT);

            // Commit all
            oci_commit($this->connection);
            return true;
        } catch (Exception $e) {
            oci_rollback($this->connection);
            return false;
        }
    }

    public function getEmployeesWithoutAccount()
    {
        $sql = "SELECT e.EMP_ID, e.EMP_NAME FROM employee e LEFT JOIN account ac ON e.EMP_ID = ac.EMP_ID WHERE ac.EMP_ID IS NULL";
        $stmt = oci_parse($this->connection, $sql);
        oci_execute($stmt);

        $employees = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $employees[] = $row;
        }
        return $employees;
    }

    public function applyLeaves($data)
    {

        $sql = "INSERT INTO leave (LEAVE_ID, EMP_ID, DESCRIPTION, LEAVE_TYPE, START_DATE, END_DATE) 
        VALUES (seq_leave_id.NEXTVAL, :emp_id, :description, :leave_type, 
        TO_DATE(:start_date, 'YYYY-MM-DD'), TO_DATE(:end_date, 'YYYY-MM-DD'))";

        $stmt = oci_parse($this->connection, $sql);
        oci_bind_by_name($stmt, ":emp_id", $data['emp_id']);
        oci_bind_by_name($stmt, ":description", $data['description']);
        oci_bind_by_name($stmt, ":leave_type", $data['type']);
        oci_bind_by_name($stmt, ":start_date", $data['start_date']);
        oci_bind_by_name($stmt, ":end_date", $data['end_date']);

        $success = oci_execute($stmt);

        if (!$success) {
            $e = oci_error($stmt);
            // echo $e['message'];
            return false;
        }

        return true;
    }

    public function updateLeave($leaveId, $status)
    {
        $sql = "UPDATE LEAVE SET status = :status WHERE leave_id = :leave_id";
        $stmt = oci_parse($this->connection, $sql);
        oci_bind_by_name($stmt, ":status", $status);
        oci_bind_by_name($stmt, ":leave_id", $leaveId);
        $success =  oci_execute($stmt);
        if (!$success) {
            $e = oci_error($stmt);
            // echo $e['message'];
            return false;
        }

        return true;
    }

    public function updateTask($status, $task_id)
    {
        $sql = "UPDATE TASK SET status = :status WHERE task_id = :task_id";
        $stmt = oci_parse($this->connection, $sql);
        oci_bind_by_name($stmt, ":status", $status);
        oci_bind_by_name($stmt, ":task_id", $task_id);
        $success =  oci_execute($stmt);
        if (!$success) {
            $e = oci_error($stmt);
            // echo $e['message'];
            return ['success' => false, 'error' => $e['message']];
        }

        return true;
    }

    public function getLeaveByDepartment($departmentId)
    {
        $query = "SELECT l.*, e.EMP_NAME, e.EMP_ID
        FROM leave l
        JOIN employee e ON l.EMP_ID = e.EMP_ID
        WHERE e.department_id = :deptId
        ORDER BY l.LEAVE_ID DESC";

        $stmt = oci_parse($this->connection, $query);
        oci_bind_by_name($stmt, ":deptId", $departmentId);
        oci_execute($stmt);

        $result = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $result[] = $row;
        }
        return $result;
    }

    public function getAllLeaves($emp_id = 0)
    {
        if ($emp_id != 0) {
            $sql = "SELECT * FROM leave WHERE EMP_ID = :emp_id ORDER BY LEAVE_ID DESC";

            $stmt = oci_parse($this->connection, $sql);
            oci_bind_by_name($stmt, ":emp_id", $emp_id);
            oci_execute($stmt);

            $leaves = [];
            while ($row = oci_fetch_assoc($stmt)) {
                $leaves[] = $row;
            }
            return $leaves;
        } else {
            $sql = "SELECT l.*, e.EMP_NAME, e.EMP_ID
            FROM leave l
            JOIN employee e ON l.EMP_ID = e.EMP_ID
            ORDER BY LEAVE_ID DESC";

            $stmt = oci_parse($this->connection, $sql);
            oci_execute($stmt);

            $leaves = [];
            while ($row = oci_fetch_assoc($stmt)) {
                $leaves[] = $row;
            }
            return $leaves;
        }
    }

    public function getTodayAttendance($empId)
    {
        $query = "SELECT emp_id, TO_CHAR(checkin, 'HH24:MI:SS') AS checkin, TO_CHAR(checkout, 'HH24:MI:SS') AS checkout, hours, created_date 
        FROM attendance 
        WHERE emp_id = :emp_id AND TRUNC(created_date) = TRUNC(SYSDATE)";
        $stmt = oci_parse($this->connection, $query);
        oci_bind_by_name($stmt, ":emp_id", $empId);
        oci_execute($stmt);
        return oci_fetch_assoc($stmt);
    }

    public function clockIn($empId)
    {
        $query = "INSERT INTO attendance (attendance_id, emp_id, checkin, created_date) 
        VALUES (seq_attendance_id.NEXTVAL, :emp_id, SYSTIMESTAMP, SYSDATE)";

        $stmt = oci_parse($this->connection, $query);
        oci_bind_by_name($stmt, ":emp_id", $empId);
        return oci_execute($stmt);
    }

    public function clockOut($empId)
    {
        $query = "UPDATE attendance 
        SET checkout = SYSTIMESTAMP, hours = ROUND((CAST(SYSTIMESTAMP AS DATE) - CAST(checkin AS DATE)) * 24, 2)
        WHERE emp_id = :emp_id AND TRUNC(created_date) = TRUNC(SYSDATE) AND checkout IS NULL";
        $stmt = oci_parse($this->connection, $query);
        oci_bind_by_name($stmt, ":emp_id", $empId);
        return oci_execute($stmt);
    }

    public function createTask($description, $remark, $deadline, $emp_id)
    {
        $query = "INSERT INTO task (TASK_ID, DESCRIPTION, REMARK, DEADLINE, EMP_ID) 
              VALUES (seq_task_id.NEXTVAL, :descript, :remark, TO_DATE(:deadline, 'YYYY-MM-DD'), :emp_id)";

        $stmt = oci_parse($this->connection, $query);

        oci_bind_by_name($stmt, ":descript", $description);
        oci_bind_by_name($stmt, ":remark", $remark);
        oci_bind_by_name($stmt, ":deadline", $deadline);
        oci_bind_by_name($stmt, ":emp_id", $emp_id);
        return oci_execute($stmt);
    }

    public function getTask($emp_id)
    {
        $query = "SELECT * FROM task WHERE EMP_ID = :emp_id";

        $stmt = oci_parse($this->connection, $query);
        oci_bind_by_name($stmt, ":emp_id", $emp_id);
        oci_execute($stmt);

        $result = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $result[] = $row;
        }
        return $result;
    }

    public function assignToStaff($task_id, $emp_id, $manager_id)
    {
        $query = "INSERT INTO staff_task (TASK_ID, EMP_ID, ASSIGN_BY, ASSIGNED_DATE)
              VALUES (:task_id, :emp_id, :manager_id, SYSDATE)";

        $stmt = oci_parse($this->connection, $query);

        oci_bind_by_name($stmt, ":task_id", $task_id);
        oci_bind_by_name($stmt, ":emp_id", $emp_id);
        oci_bind_by_name($stmt, ":manager_id", $manager_id);

        oci_execute($stmt);
    }

    public function getStaffTask($emp_id = 1)
    {
        if ($emp_id > 0) {
            $query = "SELECT 
            t.TASK_ID, t.DESCRIPTION, t.REMARK, t.DEADLINE, t.STATUS,
            s.ASSIGNED_DATE, s.ASSIGN_BY
          FROM 
            staff_task s
          JOIN 
            task t ON s.TASK_ID = t.TASK_ID
          WHERE 
            s.EMP_ID = :emp_id";

            $stmt = oci_parse($this->connection, $query);
            oci_bind_by_name($stmt, ":emp_id", $emp_id);
            oci_execute($stmt);

            $result = [];
            while ($row = oci_fetch_assoc($stmt)) {
                $result[] = $row;
            }
            return $result;
        } else {
            $query = "SELECT 
    t.task_id,
    t.description,
    t.remark,
    t.deadline,
    t.status,
    s.assigned_date,
    s.assign_by,
    s.emp_id,              
    e.emp_name,             
    e.position
FROM 
    staff_task s
JOIN 
    task t ON s.task_id = t.task_id
JOIN
    employee e ON s.emp_id = e.emp_id
";


            $stmt = oci_parse($this->connection, $query);
            oci_execute($stmt);

            $result = [];
            while ($row = oci_fetch_assoc($stmt)) {
                $result[] = $row;
            }
            return $result;
        }
    }

    public function calculatePayroll($month, $year)
    {
        $month_year = $month . '-' . $year;

        // 1. Get all employees
        $query = "SELECT EMP_ID, SALARY FROM employee";
        $stmt = oci_parse($this->connection, $query);
        oci_execute($stmt);
        $employees = [];
        while ($row = oci_fetch_assoc($stmt)) {
            $employees[] = $row;
        }

        // 2. Loop and calculate payroll
        foreach ($employees as $emp) {
            $emp_id = $emp['EMP_ID'];
            $basic_salary = $emp['SALARY'];

            // 3. Get total hours worked for this employee in that month
            $sql = "SELECT SUM((CAST(checkout AS DATE) - CAST(checkin AS DATE)) * 24) AS HOURS_WORKED
            FROM attendance
            WHERE EMP_ID = :emp_id AND TO_CHAR(checkin, 'MM-YYYY') = :month_year";

            $stmt2 = oci_parse($this->connection, $sql);
            oci_bind_by_name($stmt2, ":emp_id", $emp_id);
            oci_bind_by_name($stmt2, ":month_year", $month_year);
            oci_execute($stmt2);
            $data = oci_fetch_assoc($stmt2);
            $hours_worked = $data['HOURS_WORKED'] ?: 0;

            // 4. Dummy allowance/deduction
            $allowances = 100; // fixed
            $deductions = 50;  // fixed
            $net_pay = $basic_salary + $allowances - $deductions;

            // 5. Insert into payroll
            $insert = "INSERT INTO payroll (PAYROLL_ID, EMP_ID, MONTH, YEAR, SALARY, HOURS_WORK, DEDUCTION, ALLOWANCE, NET_PAY)
               VALUES (seq_payroll_id.NEXTVAL, :emp_id, :month, :year, :basic_salary, :hours_worked, :deductions, :allowances, :net_pay)";

            $stmt3 = oci_parse($this->connection, $insert);
            oci_bind_by_name($stmt3, ":emp_id", $emp_id);
            oci_bind_by_name($stmt3, ":month", $month);
            oci_bind_by_name($stmt3, ":year", $year);
            oci_bind_by_name($stmt3, ":basic_salary", $basic_salary);
            oci_bind_by_name($stmt3, ":hours_worked", $hours_worked);
            oci_bind_by_name($stmt3, ":deductions", $deductions);
            oci_bind_by_name($stmt3, ":allowances", $allowances);
            oci_bind_by_name($stmt3, ":net_pay", $net_pay);
            oci_execute($stmt3);
        }
    }

    public function getPayroll($emp_id = 1)
    {
        if ($emp_id > 0) {
            $query = "SELECT * FROM payroll WHERE EMP_ID = :emp_id ORDER BY DATE_CREATED DESC";
            $stmt = oci_parse($this->connection, $query);
            oci_bind_by_name($stmt, ":emp_id", $emp_id);
            oci_execute($stmt);

            $result = [];
            while ($row = oci_fetch_assoc($stmt)) {
                $result[] = $row;
            }
            return $result;
        } else {
            $query = "SELECT * FROM payroll ORDER BY DATE_CREATED DESC";
            $stmt = oci_parse($this->connection, $query);
            oci_execute($stmt);

            $result = [];
            while ($row = oci_fetch_assoc($stmt)) {
                $result[] = $row;
            }
            return $result;
        }
    }

    public function countStaff($employee = 0, $staff = 0, $manager = 0)
    {
        if ($staff != 0) {
            $sql = "SELECT COUNT(*) AS total_staff FROM employee WHERE ROLE = 3";
            $stmt = oci_parse($this->connection, $sql);
            oci_execute($stmt);
            $row = oci_fetch_assoc($stmt);

            return $row;
        } elseif ($manager != 0) {
            $sql = "SELECT COUNT(*) AS total_staff FROM employee WHERE ROLE = 2";
            $stmt = oci_parse($this->connection, $sql);
            oci_execute($stmt);
            $row = oci_fetch_assoc($stmt);

            return $row;
        } else {
            $sql = "SELECT COUNT(*) AS total_staff FROM employee";
            $stmt = oci_parse($this->connection, $sql);
            oci_execute($stmt);
            $row = oci_fetch_assoc($stmt);

            return $row;
        }
    }

    public function countDepartment($manager = 0)
    {
        if ($manager != 0) {
            $sql = "SELECT COUNT(*) AS total_department FROM department WHERE EMP_ID IS NULL";
            $stmt = oci_parse($this->connection, $sql);
            oci_execute($stmt);
            $row = oci_fetch_assoc($stmt);

            return $row;
        } else {
            $sql = "SELECT COUNT(*) AS total_department FROM department";
            $stmt = oci_parse($this->connection, $sql);
            oci_execute($stmt);
            $row = oci_fetch_assoc($stmt);

            return $row;
        }
    }

    public function countLeave($status)
    {
        if ($status == 0) {
            $sql = 'SELECT COUNT(*) AS le FROM "LEAVE" WHERE STATUS = 0';
            $stmt = oci_parse($this->connection, $sql);
            oci_execute($stmt);
            $row = oci_fetch_assoc($stmt);
            return $row;
        } elseif ($status == 1) {
            $sql = "SELECT COUNT(*) AS leaves FROM leave WHERE STATUS = 1";
            $stmt = oci_parse($this->connection, $sql);
            oci_execute($stmt);
            $row = oci_fetch_assoc($stmt);

            return $row;
        } elseif ($status == 2) {
            $sql = "SELECT COUNT(*) AS leaves FROM leave WHERE STATUS = 2";
            $stmt = oci_parse($this->connection, $sql);
            oci_execute($stmt);
            $row = oci_fetch_assoc($stmt);

            return $row;
        }
    }

    public function countAccount($acc = 0)
    {
        $sql = "SELECT COUNT(*) AS acc FROM ACCOUNT WHERE EMP_ID IS NOT NULL";
        $stmt = oci_parse($this->connection, $sql);
        oci_execute($stmt);
        $row = oci_fetch_assoc($stmt);

        return $row;
    }

    public function getTotalNetPay()
    {
        $sql = "SELECT SUM(NET_PAY) AS total_net_pay FROM payroll";
        $stmt = oci_parse($this->connection, $sql);
        oci_execute($stmt);

        $row = oci_fetch_assoc($stmt);
        return $row['TOTAL_NET_PAY'];
    }

    public function countTask()
    {
        $sql = "SELECT COUNT(*) AS acc FROM ACCOUNT WHERE EMP_ID IS NOT NULL";
        $stmt = oci_parse($this->connection, $sql);
        oci_execute($stmt);
        $row = oci_fetch_assoc($stmt);

        return $row;
    }
}
