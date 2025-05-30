<?php
include(dirname(dirname(__FILE__)) . '/config.php');

$case = $_GET['case'];
if($case=='GeneratePayroll'){
    $month = $_GET['month'];
}
switch($case) {
	case 'LoginProcessHandler':
		LoginProcessHandler();
		break;
	case 'AttendanceProcessHandler':
		AttendanceProcessHandler();
		break;
	case 'LoadingAttendance':
		LoadingAttendance();
		break;
	case 'LoadingBulkUploadAttendance':
	    LoadingBulkUploadAttendance();
	break;
	
	case 'LoadingBulkUploadAttendance1':
	    LoadingBulkUploadAttendance1();
	break;
	
	
	case 'GenerateManualAttendance':
	    GenerateManualAttendance();
	break;
	
	case 'GenerateManualSalary':
	    GenerateManualSalary();
	break;
	
	case 'LoadingSalaries':
		LoadingSalaries();
		break;
	case 'LoadingEmployees':
		LoadingEmployees();
		break;
	case 'AssignPayheadsToEmployee':
		AssignPayheadsToEmployee();
		break;
	case 'InsertUpdateHolidays':
		InsertUpdateHolidays();
		break;
	case 'GetHolidayByID':
		GetHolidayByID();
		break;
	case 'DeleteHolidayByID':
		DeleteHolidayByID();
		break;
	case 'LoadingHolidays':
		LoadingHolidays();
		break;
	case 'InsertUpdatePayheads':
		InsertUpdatePayheads();
		break;
	case 'GetPayheadByID':
		GetPayheadByID();
		break;
	case 'DeletePayheadByID':
		DeletePayheadByID();
		break;
	case 'LoadingPayheads':
		LoadingPayheads();
		break;
	case 'GetAllPayheadsExceptEmployeeHave':
		GetAllPayheadsExceptEmployeeHave();
		break;
	case 'GetEmployeePayheadsByID':
		GetEmployeePayheadsByID();
		break;
	case 'GetEmployeeByID':
		GetEmployeeByID();
		break;
	case 'DeleteEmployeeByID':
		DeleteEmployeeByID();
		break;
	case 'EditEmployeeDetailsByID':
		EditEmployeeDetailsByID();
		break;
	case 'GeneratePaySlip':
		GeneratePaySlip();
		break;
	case 'SendPaySlipByMail':
		SendPaySlipByMail();
		break;
	case 'EditProfileByID':
		EditProfileByID();
		break;
	case 'EditLoginDataByID':
		EditLoginDataByID();
		break;
	case 'LoadingAllLeaves':
		LoadingAllLeaves();
		break;
	case 'LoadingMyLeaves':
		LoadingMyLeaves();
		break;
	case 'ApplyLeaveToAdminApproval':
		ApplyLeaveToAdminApproval();
		break;
	case 'ApproveLeaveApplication':
		ApproveLeaveApplication();
		break;
	case 'RejectLeaveApplication':
		RejectLeaveApplication();
		break;
	case 'GeneratePayroll':
		GeneratePayroll($month);
		break;	
		
	case 'AddEmployee':
		AddEmployee();
		break;	
	default:
		echo '404! Page Not Found.';
		break;
}

function LoginProcessHandler() {
	$result = array();
	global $db;

	$code = addslashes($_POST['code']);
    $password = addslashes($_POST['password']);
    if ( !empty($code) && !empty($password) ) {
	    $adminCheck = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "admin` WHERE `admin_code` = '$code' AND `admin_password` = '" . sha1($password) . "' LIMIT 0, 1");
	    if ( $adminCheck ) {
	        if ( mysqli_num_rows($adminCheck) == 1 ) {
	            $adminData = mysqli_fetch_assoc($adminCheck);
	            $_SESSION['Admin_ID'] = $adminData['admin_id'];
	            $_SESSION['Login_Type'] = 'admin';
	            $result['result'] = BASE_URL . 'demo/';
			    		$result['code'] = 0;
	        } else {
	        	$empCheck = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "employees` WHERE `emp_code` = '$code' AND `emp_password` = '" . sha1($password) . "' LIMIT 0, 1");
			    if ( $empCheck ) {
			        if ( mysqli_num_rows($empCheck) == 1 ) {
			        	$empData = mysqli_fetch_assoc($empCheck);
			            $_SESSION['Admin_ID'] = $empData['emp_id'];
			            $_SESSION['Login_Type'] = 'emp';
			            $result['result'] = BASE_URL . 'profile/';
			    		$result['code'] = 0;
			        } else {
			        	$result['result'] = 'Invalid Login Details.';
			        	$result['code'] = 1;
			        }
			    } else {
			    	$result['result'] = 'Something went wrong, please try again.';
		    		$result['code'] = 2;
			    }
	        }
	    } else {
	    	$result['result'] = 'Something went wrong, please try again.';
		    $result['code'] = 2;
	    }
	} else {
		$result['result'] = 'Login Details should not be blank.';
		$result['code'] = 3;
	}

    echo json_encode($result);
}

function AttendanceProcessHandler() {
	global $userData, $db;
	$result = array();

	$emp_code = $userData['emp_code'];
	$attendance_date = date('Y-m-d');
	$attendanceSQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "attendance` WHERE `emp_code` = '$emp_code' AND `attendance_date` = '$attendance_date'");
	if ( $attendanceSQL ) {
		$attendanceROW = mysqli_num_rows($attendanceSQL);
		if ( $attendanceROW == 0 ) {
			$action_name = 'punchin';
		} else {
			$attendanceDATA = mysqli_fetch_assoc($attendanceSQL);
			if ( $attendanceDATA['action_name'] == 'punchin' ) {
				$action_name = 'punchout';
			} else {
				$action_name = 'punchin';
			}
		}
	} else {
		$attendanceROW = 0;
		$action_name = 'punchin';
	}
	$action_time = date('H:i:s');
	$emp_desc = addslashes($_POST['desc']);

    $insertSQL = mysqli_query($db, "INSERT INTO `" . DB_PREFIX . "attendance`(`emp_code`, `attendance_date`, `action_name`, `action_time`, `emp_desc`) VALUES ('$emp_code', '$attendance_date', '$action_name', '$action_time', '$emp_desc')");
    if ( $insertSQL ) {
    	$result['next'] = ($action_name == 'punchin' ? 'Punch Out' : 'Punch In');
    	$result['complete'] = $attendanceROW + 1;
        $result['result'] = 'You have successfully punched in.';
		$result['code'] = 0;
    } else {
    	$result['result'] = 'Something went wrong, please try again.';
	    $result['code'] = 1;
    }

    echo json_encode($result);
}

function LoadingAttendance() {
	global $db;
	$requestData = $_REQUEST;
	$columns = array(
		0 => 'attendance_date',
		1 => 'emp_code',
		2 => 'first_name',
		3 => 'last_name',
		4 => 'action_time',
		5 => 'emp_desc'
	);

	$sql  = "SELECT `attendance_id`, `emp_code`, `attendance_date`, GROUP_CONCAT(`action_time`) AS `times`, GROUP_CONCAT(`emp_desc`) AS `descs` FROM `" . DB_PREFIX . "attendance` GROUP BY `emp_code`, `attendance_date`";
	$query = mysqli_query($db, $sql);
	$totalData = mysqli_num_rows($query);
	$totalFiltered = $totalData;

	$sql  = "SELECT `emp`.`emp_code`, `emp`.`first_name`, `emp`.`last_name`, `att`.`attendance_id`, `att`.`emp_code`, `att`.`attendance_date`, GROUP_CONCAT(`att`.`action_time`) AS `times`, GROUP_CONCAT(`att`.`emp_desc`) AS `descs`";
	$sql .= " FROM `" . DB_PREFIX . "employees` AS `emp`, `" . DB_PREFIX . "attendance` AS `att` WHERE `emp`.`emp_code` = `att`.`emp_code`";
	if ( !empty($requestData['search']['value']) ) {
		$sql .= " AND (`att`.`attendance_date` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR CONCAT(TRIM(`emp`.`first_name`), ' ', TRIM(`emp`.`last_name`)) LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `att`.`times` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `att`.`descs` LIKE '" . $requestData['search']['value'] . "%')";
	}
	$sql .= " GROUP BY `emp`.`emp_code`, `att`.`attendance_date`";

	$query = mysqli_query($db, $sql);
	$totalFiltered = mysqli_num_rows($query);
	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "";
	$query = mysqli_query($db, $sql);

	$data = array();
	$i = 1 + $requestData['start'];
	while ( $row = mysqli_fetch_assoc($query) ) {
		$nestedData = array();
		$nestedData[] = date('d-m-Y', strtotime($row['attendance_date']));
		$nestedData[] = $row["emp_code"];
		$nestedData[] = '<a target="_blank" href="' . REG_URL . 'reports/' . $row["emp_code"] . '/">' . $row["first_name"] . ' ' . $row["last_name"] . '</a>';
		$times = explode(',', $row["times"]);
		$descs = explode(',', $row["descs"]);
		$nestedData[] = isset($times[0]) ? date('h:i:s A', strtotime($times[0])) : '';
		$nestedData[] = isset($descs[0]) ? $descs[0] : '';
		$nestedData[] = isset($times[1]) ? date('h:i:s A', strtotime($times[1])) : '';
		$nestedData[] = isset($descs[1]) ? $descs[1] : '';

		$datetime1 = new DateTime($times[0]);
		$datetime2 = new DateTime($times[1]);
		$interval = $datetime1->diff($datetime2);
		$nestedData[] = (isset($times[0]) && isset($times[1])) ? $interval->format('%h') . " Hrs  |" . $interval->format('%i') . " Min" : 0 . "H";

		$data[] = $nestedData;
		$i++;
	}
	$json_data = array(
		"draw"            => intval($requestData['draw']),
		"recordsTotal"    => intval($totalData),
		"recordsFiltered" => intval($totalFiltered),
		"data"            => $data
	);

	echo json_encode($json_data);
}

function LoadingBulkUploadAttendance() {
	global $db;
	$requestData = $_REQUEST;
// 	echo '<pre>';echo '$requestData'; echo '</pre>'; die;
	
	$columns = array(
		0 => 'pdate',
		1 => 'empcode',
		2 => 'firstname',
		3 => 'lastname',
		4 => 'in_time',
		5 => 'out_time'
	);

	$sql = "select `ID`, `pdate`, `Intime`, `Outtime` from attendance order by id asc";
	$query = mysqli_query($db, $sql);
	//var_dump($query); 
	$totalData = mysqli_num_rows($query);
	$totalFiltered = $totalData;


	$sql = "select `emp`.`empid`, `emp`.`firstname`, `emp`.`lastname`, `att`.`pdate` ,`att`.`Intime`, `att`.`Outtime` from employee as emp , attendance as att where emp.empid = att.ID ";
	
// 	var_dump($sql);
	if ( !empty($requestData['search']['value']) ) {
		$sql .= " AND (`att`.`pdate` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR CONCAT(TRIM(`emp`.`firstname`), ' ', TRIM(`emp`.`lastname`)) LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `att`.`Intime` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `att`.`Outtime` LIKE '" . $requestData['search']['value'] . "%')";
	}
	$sql .= " GROUP BY `emp`.`empid`, `att`.`pdate` ";
	
// 	echo $sql; 

	$query = mysqli_query($db, $sql);
	$totalFiltered = mysqli_num_rows($query);
	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "";
	$query = mysqli_query($db, $sql);
	
// 	echo $query; die;

	$data = array();
	$i = 1 + $requestData['start'];
	while ( $row = mysqli_fetch_assoc($query) ) {
		$nestedData = array();
		$nestedData[] = date('d-m-Y', strtotime($row['pdate']));
		$nestedData[] = $row["empid"];
		$nestedData[] = '<a target="_blank" href="' . REG_URL . 'reports/' . $row["empid"] . '/">' . $row["firstname"] . ' ' . $row["lastname"] . '</a>';

        $time1 = $row["Intime"];
        $nestedData[] = $time1;
        $time2 = $row["Outtime"];
        $nestedData[] = $time2;
		$datetime1 = new DateTime($time1);
		$datetime2 = new DateTime($time2);
		$interval = $datetime1->diff($datetime2);
		$nestedData[] = (isset($time1) && isset($time2)) ? $interval->format('%h') . " Hrs  |" . $interval->format('%i') . " Min" : 0 . "H";

		$data[] = $nestedData;
		$i++;
	}
	$json_data = array(
		"draw"            => intval($requestData['draw']),
		"recordsTotal"    => intval($totalData),
		"recordsFiltered" => intval($totalFiltered),
		"data"            => $data
	);

 	echo json_encode($json_data);
}








function LoadingBulkUploadAttendance1() {
	global $db;
	$requestData = $_REQUEST;
// 	echo '<pre>';echo '$requestData'; echo '</pre>'; die;
	
	$columns = array(
		0 => 'pdate',
		1 => 'empcode',
		2 => 'firstname',
		3 => 'lastname',
		4 => 'in_time',
		5 => 'out_time'
	);

	$sql = "select `emp_id`, `attendance_date_in`, `attendance_date_out`, from new_attendance order by emp_id asc";
	$query = mysqli_query($db, $sql);
	//var_dump($query); 
	$totalData = mysqli_num_rows($query);
	$totalFiltered = $totalData;


	
	$sql ="select cast(att.attendance_date_in as date) as pdate, emp.empid,emp.firstname,emp.lastname, DATE_FORMAT(att.attendance_date_in,'%H:%i:%s') as Intime,
	DATE_FORMAT(att.attendance_date_out,'%H:%i:%s') as Outtime from employee as emp , new_attendance as att
	where emp.empid = att.emp_id GROUP BY `emp`.`empid`, att.attendance_date_in order by pdate desc";
	
	

	$query = mysqli_query($db, $sql);
	$totalFiltered = mysqli_num_rows($query);
// 	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "";
	$query = mysqli_query($db, $sql);
	
// 	echo $query; die;

	$data = array();
	$i = 1 + $requestData['start'];
	
	while ( $row = mysqli_fetch_assoc($query) ) {
	    
		$nestedData = array();
		$nestedData[] = date('d-m-Y', strtotime($row['pdate']));
		$nestedData[] = $row["empid"];
		$nestedData[] = '<a target="_blank" href="' . REG_URL . 'reports/' . $row["empid"] . '/">' . $row["firstname"] . ' ' . $row["lastname"] . '</a>';

        $time1 = $row["Intime"];
        $nestedData[] = $time1;
        $time2 = $row["Outtime"];
        $nestedData[] = $time2;
		$datetime1 = new DateTime($time1);
		$datetime2 = new DateTime($time2);
		$interval = $datetime1->diff($datetime2);
		$nestedData[] = (isset($time1) && isset($time2)) ? $interval->format('%h') . " Hrs  |" . $interval->format('%i') . " Min" : 0 . "H";

		$data[] = $nestedData;
		$i++;
	}
	$json_data = array(
		"draw"            => intval($requestData['draw']),
		"recordsTotal"    => intval($totalData),
		"recordsFiltered" => intval($totalFiltered),
		"data"            => $data
	);

 	echo json_encode($json_data);
}















function LoadingSalaries() {
	global $db;
	$requestData = $_REQUEST;
	if ( $_SESSION['Login_Type'] == 'admin' ) {
		$columns = array(
			0 => 'emp_code',
			1 => 'first_name',
			2 => 'last_name',
			3 => 'pay_month',
			4 => 'earning_total',
			5 => 'deduction_total',
			6 => 'net_salary'
		);

		$sql  = "SELECT * FROM `" . DB_PREFIX . "salaries` GROUP BY `emp_code`, `pay_month`";
		$query = mysqli_query($db, $sql);
		$totalData = mysqli_num_rows($query);
		$totalFiltered = $totalData;

		$sql  = "SELECT `emp`.`emp_code`, `emp`.`first_name`, `emp`.`last_name`, `salary`.*";
		$sql .= " FROM `" . DB_PREFIX . "salaries` AS `salary`, `" . DB_PREFIX . "employees` AS `emp` WHERE `emp`.`emp_code` = `salary`.`emp_code`";
		if ( !empty($requestData['search']['value']) ) {
			$sql .= " AND (`salary`.`emp_code` LIKE '" . $requestData['search']['value'] . "%'";
			$sql .= " OR CONCAT(TRIM(`emp`.`first_name`), ' ', TRIM(`emp`.`last_name`)) LIKE '" . $requestData['search']['value'] . "%'";
			$sql .= " OR `salary`.`pay_month` LIKE '" . $requestData['search']['value'] . "%'";
			$sql .= " OR `salary`.`earning_total` LIKE '" . $requestData['search']['value'] . "%'";
			$sql .= " OR `salary`.`deduction_total` LIKE '" . $requestData['search']['value'] . "%'";
			$sql .= " OR `salary`.`net_salary` LIKE '" . $requestData['search']['value'] . "%')";
		}
		$sql .= " GROUP BY `salary`.`emp_code`, `salary`.`pay_month`";

		$query = mysqli_query($db, $sql);
		$totalFiltered = mysqli_num_rows($query);

		$data = array();
		$i = 1 + $requestData['start'];
		while ( $row = mysqli_fetch_assoc($query) ) {
			$nestedData = array();
			$nestedData[] = $row['emp_code'];
			$nestedData[] = '<a target="_blank" href="' . REG_URL . 'reports/' . $row["emp_code"] . '/">' . $row["first_name"] . ' ' . $row["last_name"] . '</a>';
			$nestedData[] = $row['pay_month'];
			$nestedData[] = number_format($row['earning_total'], 2, '.', ',');
			$nestedData[] = number_format($row['deduction_total'], 2, '.', ',');
			$nestedData[] = number_format($row['net_salary'], 2, '.', ',');
			$nestedData[] = '<button type="button" class="btn btn-success btn-xs" onclick="openInNewTab(\'' . BASE_URL . 'payslips/' . $row['emp_code'] . '/' . str_replace(', ', '-', $row['pay_month']) . '/' . str_replace(', ', '-', $row['pay_month']) . '.pdf\');"><i class="fa fa-download"></i></button> <button type="button" class="btn btn-info btn-xs" onclick="sendPaySlipByMail(\'' . $row['emp_code'] . '\', \'' . $row['pay_month'] . '\');"><i class="fa fa-envelope"></i></button>';

			$data[] = $nestedData;
			$i++;
		}
	} else {
		$columns = array(
			0 => 'pay_month',
			1 => 'earning_total',
			2 => 'deduction_total',
			3 => 'net_salary'
		);
		$empData = GetDataByIDAndType($_SESSION['Admin_ID'], $_SESSION['Login_Type']);
		$sql  = "SELECT * FROM `" . DB_PREFIX . "salaries` GROUP BY `emp_code`, `pay_month` WHERE `emp_code` = '" . $empData['emp_code'] . "'";
		$query = mysqli_query($db, $sql);
		$totalData = mysqli_num_rows($query);
		$totalFiltered = $totalData;

		$sql  = "SELECT `emp`.`emp_code`, `emp`.`first_name`, `emp`.`last_name`, `salary`.*";
		$sql .= " FROM `" . DB_PREFIX . "salaries` AS `salary`, `" . DB_PREFIX . "employees` AS `emp` WHERE `emp`.`emp_code` = `salary`.`emp_code` AND `salary`.`emp_code` = '" . $empData['emp_code'] . "'";
		if ( !empty($requestData['search']['value']) ) {
			$sql .= " AND (`salary`.`emp_code` LIKE '" . $requestData['search']['value'] . "%'";
			$sql .= " OR CONCAT(TRIM(`emp`.`first_name`), ' ', TRIM(`emp`.`last_name`)) LIKE '" . $requestData['search']['value'] . "%'";
			$sql .= " OR `salary`.`pay_month` LIKE '" . $requestData['search']['value'] . "%'";
			$sql .= " OR `salary`.`earning_total` LIKE '" . $requestData['search']['value'] . "%'";
			$sql .= " OR `salary`.`deduction_total` LIKE '" . $requestData['search']['value'] . "%'";
			$sql .= " OR `salary`.`net_salary` LIKE '" . $requestData['search']['value'] . "%')";
		}
		$sql .= " GROUP BY `salary`.`emp_code`, `salary`.`pay_month`";

		$query = mysqli_query($db, $sql);
		$totalFiltered = mysqli_num_rows($query);

		$data = array();
		$i = 1 + $requestData['start'];
		while ( $row = mysqli_fetch_assoc($query) ) {
			$nestedData = array();
			$nestedData[] = $row['pay_month'];
			$nestedData[] = number_format($row['earning_total'], 2, '.', ',');
			$nestedData[] = number_format($row['deduction_total'], 2, '.', ',');
			$nestedData[] = number_format($row['net_salary'], 2, '.', ',');
			$nestedData[] = '<button type="button" class="btn btn-success btn-xs" onclick="openInNewTab(\'' . BASE_URL . 'payslips/' . $empData['emp_code'] . '/' . str_replace(', ', '-', $row['pay_month']) . '/' . str_replace(', ', '-', $row['pay_month']) . '.pdf\');"><i class="fa fa-download"></i></button>';

			$data[] = $nestedData;
			$i++;
		}
	}
	$json_data = array(
		"draw"            => intval($requestData['draw']),
		"recordsTotal"    => intval($totalData),
		"recordsFiltered" => intval($totalFiltered),
		"data"            => $data
	);

	echo json_encode($json_data);
}

function LoadingEmployees() {
	global $db;
	$requestData = $_REQUEST;
	$columns = array(
		0 => 'emp_code',
		1 => 'photo',
		2 => 'first_name',
		3 => 'last_name',
		4 => 'email',
		5 => 'mobile',
		6 => 'identity_doc',
		7 => 'identity_no',
		8 => 'dob',
		9 => 'joining_date',
		10 => 'blood_group',
		11 => 'emp_type'
	);

	$sql  = "SELECT `emp_id` ";
	$sql .= " FROM `" . DB_PREFIX . "employees`";
	$query = mysqli_query($db, $sql);
	$totalData = mysqli_num_rows($query);
	$totalFiltered = $totalData;

	$sql  = "SELECT *";
	$sql .= " FROM `" . DB_PREFIX . "employees` WHERE 1 = 1";
	if ( !empty($requestData['search']['value']) ) {
		$sql .= " AND (`emp_id` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR CONCAT(TRIM(`first_name`), ' ', TRIM(`last_name`)) LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `email` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `mobile` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR CONCAT(TRIM(`identity_doc`), ' - ', TRIM(`identity_no`)) LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `dob` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `joining_date` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `blood_group` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `emp_type` LIKE '" . $requestData['search']['value'] . "%')";
	}
	$query = mysqli_query($db, $sql);
	$totalFiltered = mysqli_num_rows($query);
	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "";
	$query = mysqli_query($db, $sql);

	$data = array();
	$i = 1 + $requestData['start'];
	while ( $row = mysqli_fetch_assoc($query) ) {
		$nestedData = array();
		$nestedData[] = $row["emp_code"];
		$nestedData[] = '<img width="50" src="' . REG_URL . 'photos/' . $row["photo"] . '" alt="' . $row["emp_code"] . '" />';
		$nestedData[] = '<a target="_blank" href="' . REG_URL . 'reports/' . $row["emp_code"] . '/">' . $row["first_name"] . ' ' . $row["last_name"] . '</a>';
		$nestedData[] = $row["email"];
		$nestedData[] = $row["mobile"];
		$nestedData[] = $row["identity_doc"] . ' - ' . $row["identity_no"];
		$nestedData[] = $row["dob"];
		$nestedData[] = $row["joining_date"];
		$nestedData[] = strtoupper($row["blood_group"]);
		$nestedData[] = ucwords($row["emp_type"]);
		$data[] = $nestedData;
		$i++;
	}
	$json_data = array(
		"draw"            => intval($requestData['draw']),
		"recordsTotal"    => intval($totalData),
		"recordsFiltered" => intval($totalFiltered),
		"data"            => $data
	);

	echo json_encode($json_data);
}

function AssignPayheadsToEmployee() {
	$result = array();
	global $db;

	$payheads = $_POST['selected_payheads'];
	$default_salary = $_POST['pay_amounts'];
	$emp_code = $_POST['empcode'];
	$checkSQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "pay_structure` WHERE `emp_code` = '$emp_code'");
	if ( $checkSQL ) {
		if ( !empty($payheads) && !empty($emp_code) ) {
			if ( mysqli_num_rows($checkSQL) == 0 ) {
				foreach ( $payheads as $payhead ) {
					mysqli_query($db, "INSERT INTO `" . DB_PREFIX . "pay_structure`(`emp_code`, `payhead_id`, `default_salary`) VALUES ('$emp_code', $payhead, " . (!empty($default_salary[$payhead]) ? $default_salary[$payhead] : 0) . ")");
				}
				$result['result'] = 'Payheads are successfully assigned to employee.';
				$result['code'] = 0;
			} else {
				mysqli_query($db, "DELETE FROM `" . DB_PREFIX . "pay_structure` WHERE `emp_code` = '$emp_code'");
				foreach ( $payheads as $payhead ) {
					mysqli_query($db, "INSERT INTO `" . DB_PREFIX . "pay_structure`(`emp_code`, `payhead_id`, `default_salary`) VALUES ('$emp_code', $payhead, " . (!empty($default_salary[$payhead]) ? $default_salary[$payhead] : 0) . ")");
				}
				$result['result'] = 'Payheads are successfully re-assigned to employee.';
				$result['code'] = 0;
			}
		} else {
			$result['result'] = 'Please select payheads and employee to assign.';
			$result['code'] = 2;
		}
	} else {
		$result['result'] = 'Something went wrong, please try again.';
		$result['code'] = 1;
	}

	echo json_encode($result);
}

function getmonthdetails_1($month,$ssn){
    $my=$month;
    $start_date = date('Y-m-01',strtotime($month));
    $end_date = date('Y-m-t',strtotime($month));
    $resultx = mysqli_query($db, "select * from attendance where ID=" . $ssn . " and pdate between '".$start_date."' and '".$end_date."'");
    $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '".$start_date."' and '".$end_date."'");
}

function getmonthdetails1($month,$ssn){
    $my=$month;
    
        if ($my == 'NOVEMBER 2020') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2020-11-01' and '2020-11-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2020-11-01' and '2020-11-30'");
            $nod = 23;
            $tnod = 30;
        }
        if ($my == 'OCTOBER 2020') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2020-11-01' and '2020-11-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2020-10-01' and '2020-10-31'");
            $nod = 25;
            $tnod = 31;
        }
        if ($my == 'SEPTEMBER 2020') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2020-09-01' and '2020-09-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2020-09-01' and '2020-09-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'AUGUST 2020') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2020-08-01' and '2020-08-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2020-08-01' and '2020-08-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'MARCH 2020') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2020-03-01' and '2020-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2020-03-01' and '2020-03-31'");
            $nod = 25;
            $tnod = 31;
        }
        if ($my == 'FEBRUARY 2020') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2020-02-01' and '2020-02-29'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2020-02-01' and '2020-02-29'");
            $nod = 25;
            $tnod = 29;
        }
        if ($my == 'JANUARY 2020') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2020-01-01' and '2020-01-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2020-01-01' and '2020-01-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'DECEMBER 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-12-01' and '2019-12-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-12-01' and '2019-12-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'NOVEMBER 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-11-01' and '2019-11-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-11-01' and '2019-11-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'OCTOBER 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-10-01' and '2019-10-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-10-01' and '2019-10-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'SEPTEMBER 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-09-01' and '2019-09-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-09-01' and '2019-09-30'");
            $nod = 25;
            $tnod = 30;
        }
        if ($my == 'AUGUST 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-08-01' and '2019-08-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-08-01' and '2019-08-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'july 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-07-01' and '2019-07-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-07-01' and '2019-07-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'june 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-06-01' and '2019-06-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-06-01' and '2019-06-30'");
            $nod = 25;
            $tnod = 30;
        }
        if ($my == 'MAY 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-05-01' and '2019-05-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-05-01' and '2019-05-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'APRIL 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-04-01' and '2019-04-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-04-01' and '2019-04-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'MARCH 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-03-01' and '2019-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-03-01' and '2019-03-31'");
            $nod = 25;
            $tnod = 31;
        }
        if ($my == 'FEBRUARY 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-02-01' and '2019-02-28'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-02-01' and '2019-02-28'");
            $nod = 24;
            $tnod = 28;
        }
        if ($my == 'JANUARY 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-01-01' and '2019-01-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-01-01' and '2019-01-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'DECEMBER 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-12-01' and '2018-12-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-12-01' and '2018-12-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'NOVEMBER 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $ssn . " and pdate between '2018-11-01' and '2018-11-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-11-01' and '2018-11-30'");
            $nod = 24;
            $tnod = 30;
        }
        if ($my == 'OCTOBER 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-10-01' and '2018-10-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-10-01' and '2018-10-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'SEPTEMBER 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-09-01' and '2018-09-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-09-01' and '2018-09-30'");
            $nod = 25;
            $tnod = 30;
        }
        if ($my == 'AUGUST 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-08-01' and '2018-08-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-08-01' and '2018-08-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'july 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-07-01' and '2018-07-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-07-01' and '2018-07-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'june 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-06-01' and '2018-06-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-06-01' and '2018-06-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'may 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-05-01' and '2018-05-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-05-01' and '2018-05-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'APRIL 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-04-01' and '2018-04-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-04-01' and '2018-04-30'");
            $nod = 25;
            $tnod = 30;
        }
        if ($my == 'MARCH 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-03-01' and '2018-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-03-01' and '2018-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'FEBRUARY 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-02-01' and '2018-02-28'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-02-01' and '2018-02-28'");
            $nod = 24;
            $tnod = 28;
        }
        if ($my == 'JANUARY 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-01-01' and '2018-01-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-01-01' and '2018-01-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'DECEMBER 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-12-01' and '2017-12-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-12-01' and '2017-12-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'NOVEMBER 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-11-01' and '2017-11-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-11-01' and '2017-11-30'");
            $nod = 25;
            $tnod = 30;
        }
        if ($my == 'OCTOBER 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-10-01' and '2017-10-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-10-01' and '2017-10-31'");
            $nod = 24;
            $tnod = 31;
        }
        if ($my == 'SEPTEMBER 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-09-01' and '2017-09-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-09-01' and '2017-09-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'AUGUST 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-08-01' and '2017-08-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-08-01' and '2017-08-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'JULY 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-07-01' and '2017-07-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-07-01' and '2017-07-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'JUNE 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-06-01' and '2017-06-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-06-01' and '2017-06-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'MAY 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-05-01' and '2017-05-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-05-01' and '2017-05-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'APRIL 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-04-01' and '2017-04-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-04-01' and '2017-04-30'");
            $nod = 25;
            $tnod = 30;
        }
        if ($my == 'MARCH 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-03-01' and '2017-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-03-01' and '2017-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'FEBRUARY 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-02-01' and '2017-02-28'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-01-01' and '2017-01-31'");
            $nod = 24;
            $tnod = 28;
        }
        if ($my == 'JANUARY 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-01-01' and '2017-01-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-01-01' and '2017-01-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'DECEMBER 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-12-01' and '2016-12-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-12-01' and '2016-12-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'NOVEMBER 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-11-01' and '2016-11-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-11-01' and '2016-11-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'OCTOBER 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-10-01' and '2016-10-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-10-01' and '2016-10-31'");
            $nod = 24;
            $tnod = 31;
        }
        if ($my == 'SEPTEMBER 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-03-01' and '2016-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-03-01' and '2016-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'AUGUST 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-03-01' and '2016-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-03-01' and '2016-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'JULY 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-03-01' and '2016-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-03-01' and '2016-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'JUNE 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-03-01' and '2016-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-03-01' and '2016-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'MAY 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-03-01' and '2016-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-03-01' and '2016-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'APRIL 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-03-01' and '2016-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-03-01' and '2016-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'MARCH 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-03-01' and '2016-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-03-01' and '2016-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'FEBRUARY 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-02-01' and '2016-02-29'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-02-01' and '2016-02-29'");
            $nod = 25;
            $tnod = 29;
        }
        if ($my == 'JANUARY 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-01-01' and '2016-01-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-01-01' and '2016-01-31'");
            $nod = 25;
            $tnod = 31;
        }
        if ($my == 'DECEMBER 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-12-01' and '2015-12-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-12-01' and '2015-12-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'NOVEMBER 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-11-01' and '2015-11-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-11-01' and '2015-11-30'");
            $nod = 23;
            $tnod = 30;
        }
        if ($my == 'OCTOBER 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-10-01' and '2015-10-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-10-01' and '2015-10-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'SEPTEMBER 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-09-01' and '2015-09-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-09-01' and '2015-09-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'AUGUST 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-08-01' and '2015-08-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-08-01' and '2015-08-31'");
            $nod = 25;
            $tnod = 31;
        }
        if ($my == 'JULY 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-07-01' and '2015-07-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-07-01' and '2015-07-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'JUNE 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-06-01' and '2015-06-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-06-01' and '2015-06-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'MAY 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-05-01' and '2015-05-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-05-01' and '2015-05-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'APRIL 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-04-01' and '2015-04-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-04-01' and '2015-04-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'MARCH 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-03-01' and '2015-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-03-01' and '2015-03-31'");
            $nod = 25;
            $tnod = 31;
        } else if ($my == 'FEBRUARY 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-02-01' and '2015-02-28'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-02-01' and '2015-02-28'");
            $nod = 24;
            $tnod = 28;
        } else if ($my == 'JANUARY 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-01-01' and '2015-01-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-01-01' and '2015-01-31'");
            $nod = 26;
            $tnod = 31;
        }
        //echo mysqli_num_rows($resultx)."<br>";
        while ($rowx = mysqli_fetch_row($resultx)) {
            $resulthw = mysqli_query($db, "select * from holiday where hdate='" . $rowx[2] . "'");
            if (mysqli_num_rows($resulthw) > 0) {
                $hw++;
            } else
                $present++;

            if ($rowx[5] >= 60) $cnt1++;
            else if ($rowx[5] >= 30) $cnt30++;
            else if ($rowx[5] >= 10) $cnt10++;

            $cnteg += $rowx[6];
            $ot += $rowx[7];
            $bt += $rowx[8];
        }
        if ($row[10] == 16)
            echo $present;
        while ($rowy = mysqli_fetch_row($resulthol)) {
            $yes = date('Y-m-d', (strtotime('-1 day', strtotime($rowy[0]))));
            $tom = date('Y-m-d', (strtotime('+1 day', strtotime($rowy[0]))));
            $ss = mysqli_query($db, "select * from holiday where hdate='" . $yes . "'");
            $ss1 = mysqli_query($db, "select * from holiday where hdate='" . $tom . "'");
            if (mysqli_num_rows($ss) == 0 and mysqli_num_rows($ss1) == 0) {
                $resultyes = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate='" . $yes . "'");
                $resulttom = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate='" . $tom . "'");
                if (mysqli_num_rows($resultyes) == 0 and mysqli_num_rows($resulttom) == 0)
                    $abs++;
            }
        }
        $absent = $nod - $present + $abs;

        $result_sal = mysqli_query($db, "select baseyear from salary where empid=" . $row[10]);
        $row_sal = mysqli_fetch_row($result_sal);
        $sal = $row_sal[0];
        $sal_day = $row_sal[0] / $tnod;
        $sal_hday = $sal_day / 2;
        $qry = mysqli_query($db, "select starttime,endtime from shifts where shiftid=(select sid from employee_shift where emp_id='" . $row[10] . "')");
        $qry1 = mysqli_fetch_array($qry);
        //echo $qr1[0];
        $strttime = strtotime($qry1[0]);
        $endtime = strtotime($qry1[1]);
        //   echo $strttime;
        //   echo $endtime;
        $diff = round(abs($strttime - $endtime) / 3600, 2);
        //   echo $diff.'-'.$row[10].'<br>';

        // $result_hrly=mysqli_query($db,"select hourlyrate from hourly where empid=".$row[0]);
        // $row_hrly=mysqli_fetch_row($result_hrly);

        $sal_hr = $sal_day / $diff;

        $sal_min = $sal_hr / 60;


        //   echo $sal_hr.'--'.$sal_min.'-'.$row[10].'='.$sal.'-'.$sal_day.'<br>';
        $ota = round($ot * $sal_min);
        // echo $ota;

        $bta = round($bt * $sal_min);
        $salary = $sal - (intval($cnt10 / 7) * $sal_hday) - (intval($cnt30 / 3) * $sal_hday) - ($cnt1 * $sal_hday) - ($cnteg * $sal_min) - ($absent * $sal_day) + ($hw * $sal_day);
        $roundsal = round($salary);
        $totalsal = round($ota+$bta);
        
        return $cnt10."_".$cnt30."_".$cnt1."_".$cnteg."_".$ot."_".$bt."_".$absent."_".$hw."_".$ota."_".$bta."_".$totalsal."_".$roundsal;

}

function getmonthdetails2($month,$ssn){
    $my = $month;
    
        if ($my == 'NOVEMBER 2020') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2020-11-01' and '2020-11-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2020-11-01' and '2020-11-30'");
            $nod = 23;
            $tnod = 30;
        }
        if ($my == 'OCTOBER 2020') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2020-10-01' and '2020-10-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2020-10-01' and '2020-10-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'SEPTEMBER 2020') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2020-09-01' and '2020-09-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2020-09-01' and '2020-09-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'AUGUST 2020') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2020-08-01' and '2020-08-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2020-08-01' and '2020-08-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'MARCH 2020') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2020-03-01' and '2020-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2020-03-01' and '2020-03-31'");
            $nod = 25;
            $tnod = 31;
        }
        if ($my == 'FEBRUARY 2020') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2020-02-01' and '2020-02-29'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2020-02-01' and '2020-02-29'");
            $nod = 25;
            $tnod = 29;
        }
        if ($my == 'JANUARY 2020') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2020-01-01' and '2020-01-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2020-01-01' and '2020-01-31'");
            $nod = 26;
            $tnod = 31;
        }

        if ($my == 'DECEMBER 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-12-01' and '2019-12-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-12-01' and '2019-12-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'NOVEMBER 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-11-01' and '2019-11-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-11-01' and '2019-11-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'OCTOBER 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-10-01' and '2019-10-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-10-01' and '2019-10-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'SEPTEMBER 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-09-01' and '2019-09-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-09-01' and '2019-09-30'");
            $nod = 25;
            $tnod = 30;
        }
        if ($my == 'AUGUST 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-08-01' and '2019-08-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-08-01' and '2019-08-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'july 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-07-01' and '2019-07-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-07-01' and '2019-07-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'june 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-06-01' and '2019-06-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-06-01' and '2019-06-30'");
            $nod = 25;
            $tnod = 30;
        }
        if ($my == 'MAY 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-05-01' and '2019-05-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-05-01' and '2019-05-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'APRIL 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-04-01' and '2019-04-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-04-01' and '2019-04-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'MARCH 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-03-01' and '2019-02-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-03-01' and '2019-03-31'");
            $nod = 25;
            $tnod = 31;
        }
        if ($my == 'FEBRUARY 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-02-01' and '2019-02-28'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-02-01' and '2019-02-28'");
            $nod = 24;
            $tnod = 28;
        }
        if ($my == 'JANUARY 2019') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2019-01-01' and '2019-01-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2019-01-01' and '2019-01-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'DECEMBER 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-12-01' and '2018-12-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-12-01' and '2018-12-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'NOVEMBER 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $ssn . " and pdate between '2018-11-01' and '2018-11-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-11-01' and '2018-11-30'");
            $nod = 24;
            $tnod = 30;
        }
        if ($my == 'OCTOBER 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-10-01' and '2018-10-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-10-01' and '2018-10-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'SEPTEMBER 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-09-01' and '2018-09-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-09-01' and '2018-09-30'");
            $nod = 25;
            $tnod = 30;
        }
        if ($my == 'AUGUST 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-08-01' and '2018-08-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-08-01' and '2018-08-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'july 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-07-01' and '2018-07-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-07-01' and '2018-07-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'june 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-06-01' and '2018-06-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-06-01' and '2018-06-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'may 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-05-01' and '2018-05-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-05-01' and '2018-05-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'APRIL 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-04-01' and '2018-04-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-04-01' and '2018-04-30'");
            $nod = 25;
            $tnod = 30;
        }
        if ($my == 'MARCH 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-03-01' and '2018-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-03-01' and '2018-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'FEBRUARY 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-02-01' and '2018-02-28'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-02-01' and '2018-02-28'");
            $nod = 24;
            $tnod = 28;
        }
        if ($my == 'JANUARY 2018') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2018-01-01' and '2018-01-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2018-01-01' and '2018-01-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'DECEMBER 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-12-01' and '2017-12-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-12-01' and '2017-12-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'NOVEMBER 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-11-01' and '2017-11-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-11-01' and '2017-11-30'");
            $nod = 25;
            $tnod = 30;
        }
        if ($my == 'OCTOBER 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-10-01' and '2017-10-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-10-01' and '2017-10-31'");
            $nod = 24;
            $tnod = 31;
        }
        if ($my == 'SEPTEMBER 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-09-01' and '2017-09-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-09-01' and '2017-09-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'AUGUST 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-08-01' and '2017-08-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-08-01' and '2017-08-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'JULY 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-07-01' and '2017-07-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-07-01' and '2017-07-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'JUNE 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-06-01' and '2017-06-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-06-01' and '2017-06-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'MAY 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-05-01' and '2017-05-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-05-01' and '2017-05-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'APRIL 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-04-01' and '2017-04-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-04-01' and '2017-03-30'");
            $nod = 25;
            $tnod = 30;
        }
        if ($my == 'MARCH 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-03-01' and '2017-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-03-01' and '2017-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'FEBRUARY 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-02-01' and '2017-02-28'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-02-01' and '2017-02-28'");
            $nod = 24;
            $tnod = 28;
        }
        if ($my == 'JANUARY 2017') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2017-01-01' and '2017-01-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2017-01-01' and '2017-01-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'DECEMBER 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-12-01' and '2016-12-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-12-01' and '2016-12-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'NOVEMBER 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-11-01' and '2016-11-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-11-01' and '2016-11-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'OCTOBER 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-10-01' and '2016-10-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-10-01' and '2016-10-31'");
            $nod = 22;
            $tnod = 31;
        }
        if ($my == 'SEPTEMBER 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-03-01' and '2016-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-03-01' and '2016-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'AUGUST 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-03-01' and '2016-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-03-01' and '2016-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'JULY 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-03-01' and '2016-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-03-01' and '2016-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'JUNE 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-03-01' and '2016-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-03-01' and '2016-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'MAY 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-03-01' and '2016-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-03-01' and '2016-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'APRIL 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-03-01' and '2016-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-03-01' and '2016-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'MARCH 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-03-01' and '2016-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-03-01' and '2016-03-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'FEBRUARY 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-02-01' and '2016-02-29'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-02-01' and '2016-02-29'");
            $nod = 25;
            $tnod = 29;
        }
        if ($my == 'JANUARY 2016') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2016-01-01' and '2016-01-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2016-01-01' and '2016-01-31'");
            $nod = 25;
            $tnod = 31;
        }
        if ($my == 'DECEMBER 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-12-01' and '2015-12-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-12-01' and '2015-12-30'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'NOVEMBER 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-11-01' and '2015-11-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-11-01' and '2015-11-30'");
            $nod = 23;
            $tnod = 30;
        }
        if ($my == 'OCTOBER 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-10-01' and '2015-10-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-10-01' and '2015-10-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'SEPTEMBER 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-09-01' and '2015-09-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-09-01' and '2015-09-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'AUGUST 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-08-01' and '2015-08-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-08-01' and '2015-08-31'");
            $nod = 25;
            $tnod = 31;
        }
        if ($my == 'JULY 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-07-01' and '2015-07-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-07-01' and '2015-07-31'");
            $nod = 27;
            $tnod = 31;
        }
        if ($my == 'JUNE 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-06-01' and '2015-06-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-06-01' and '2015-06-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'MAY 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-05-01' and '2015-05-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-05-01' and '2015-05-31'");
            $nod = 26;
            $tnod = 31;
        }
        if ($my == 'APRIL 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-04-01' and '2015-04-30'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-04-01' and '2015-04-30'");
            $nod = 26;
            $tnod = 30;
        }
        if ($my == 'MARCH 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-03-01' and '2015-03-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-03-01' and '2015-03-31'");
            $nod = 25;
            $tnod = 31;
        } else if ($my == 'FEBRUARY 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-02-01' and '2015-02-28'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-02-01' and '2015-02-28'");
            $nod = 24;
            $tnod = 28;
        } else if ($my == 'JANUARY 2015') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2015-01-01' and '2015-01-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2015-01-01' and '2015-01-31'");
            $nod = 26;
            $tnod = 31;
        } else if ($my == 'DECEMBER 2014') {
            $resultx = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate between '2014-12-01' and '2014-12-31'");
            $resulthol = mysqli_query($db, "select hdate from holiday where hdate between '2014-12-01' and '2014-12-31'");
            $nod = 27;
            $tnod = 31;
        }
        //echo mysqli_num_rows($resultx)."<br>";
        while ($rowx = mysqli_fetch_row($resultx)) {
            $resulthw = mysqli_query($db, "select * from holiday where hdate='" . $rowx[2] . "'");
            if (mysqli_num_rows($resulthw) > 0) {
                $hw++;
            } else
                $present++;
        }
        while ($rowy = mysqli_fetch_row($resulthol)) {
            $yes = date('Y-m-d', (strtotime('-1 day', strtotime($rowy[0]))));
            $tom = date('Y-m-d', (strtotime('+1 day', strtotime($rowy[0]))));
            $resultyes = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate='" . $yes . "'");
            $resulttom = mysqli_query($db, "select * from attendance where ID=" . $row[10] . " and pdate='" . $tom . "'");
            if (mysqli_num_rows($resultyes) == 0 and mysqli_num_rows($resulttom) == 0)
                $abs++;
        }
        $absent = $nod - $present + $abs;
        $result_sal = mysqli_query($db, "select baseyear from salary where empid=" . $row[10]);
        $row_sal = mysqli_fetch_row($result_sal);
        $sal = $row_sal[0];
        $sal_day = $row_sal[0] / $tnod;
        $sal_hday = $sal_day / 2;

        $ded = 0;
        if ($absent > 2) $ded = ($absent - 2) * $sal_day;

        $salary = $sal - $ded;
        $roundsal = round($salary);
        $null = 0;
        
        return $cnt10."_".$cnt30."_".$cnt1."_".$cnteg."_".$ot."_".$bt."_".$absent."_".$hw."_".$null."_".$null."_".$null."_".$roundsal;
        
    
}


function GenerateManualAttendance(){
    
    $result = array();
    
    global $db;
    
    date_default_timezone_set('Asia/Kolkata');
    
    $empid = $_POST['empid'];
    $date = $_POST['date'];
    $_date = date('Y-m-d', strtotime($date));
    $intime = $_POST['intime'];
    $_intime = date('H:i:s', strtotime($intime));
    $outtime = $_POST['outtime'];
    $_outtime = date('H:i:s', strtotime($outtime));
    
    $_in_att_date = $_date." ".$_intime;
    $_out_att_date = $_date." ".$_outtime;
    
    $created_at = date('Y-m-d H:i:s');
   //  $insql = mysqli_query($db,"insert into raw_attendance(emp_id, attendance_date,status,created_at) values ('".$empid."', '".$_in_att_date."', '1', '".$created_at."')  ");
   //  $outsql = mysqli_query($db,"insert into raw_attendance(emp_id, attendance_date,status,created_at) values ('".$empid."', '".$_out_att_date."', '1', '".$created_at."')  ");
   // $sql = mysqli_query($db,"insert into attendance(ID, pdate,Intime,Outtime,created_at) values ('".$empid."', '".$_date."', '".$_intime."', '".$_outtime."', '".$created_at."')  ");
    $sql = mysqli_query($db,"insert into new_attendance(emp_id, attendance_date_in,attendance_date_out,status,created_at) values ('".$empid."', '".$_in_att_date."', '".$_out_att_date."', '1', '".$created_at."')  ");
    if($sql){
        $result['result'] = "Data Inserted Successfully!!";
		$result['code'] = 0;
    } 
    else{
        $result['result'] = "Something Wrong !! Error !!";
		$result['code'] = 1;
    }
    
    
	echo json_encode($result);
}

function GenerateManualSalary(){
    
    $result = array();
    
    global $db;
    
    date_default_timezone_set('Asia/Kolkata');
    
    $empid = $_POST['empid'];
    $salary = $_POST['salary']; 
    
    
    $created_at = date('Y-m-d H:i:s');
    
    $sql = mysqli_query($db,"insert into salary(empid, baseyear) values ('".$empid."', '".$salary."')  ");
    if($sql){
        $result['result'] = "Data Inserted Successfully!!";
		$result['code'] = 0;
    } 
    else{
        $result['result'] = "Something Wrong !! Error !!";
		$result['code'] = 1;
    }
    
    
	echo json_encode($result);
}


function AddEmployee(){
    $result = array();
//     ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
    global $db;
    
    date_default_timezone_set('Asia/Kolkata');
    
    $salutation = $_POST['salutation'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $dob = $_POST['dob'];
    $_dob = date("Y-m-d",strtotime($dob));
    $gender = $_POST['gender'];
    $marital = $_POST['merital_status'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address = $_POST['address'];
    $active = $_POST['active'];
    $work_hours = $_POST['work_hours'];
    $empid = $_POST['empid'];
    $email = $_POST['email'];
    
    // $insertsql = mysqli_query($db,"insert into employee(salutation,firstname,lastname,dob,gender,marital,city,state,address1,active,perday_hours,ssn) values('".$salutation."','".$fname."','".$lname."','".$_dob."','".$gender."','".$marital."','".$city."','".$state."','".$address."','".$active."','".$work_hours."','".$empid."' "));
    $sqlinsert = "insert into employee(salutation,firstname,lastname,dob,gender,marital,city,state,address1,active,perday_hours,ssn,email) values('".$salutation."','".$fname."','".$lname."','".$_dob."','".$gender."','".$marital."','".$city."','".$state."','".$address."','".$active."','".$work_hours."','".$empid."','".$email."')";
    $insertsql = mysqli_query($db,$sqlinsert);
    
    if($insertsql){
        $result['result'] = "Data Inserted Successfully!!";
		$result['code'] = 0;
    } 
   else{
       $result['result'] = 
        $result['result'] = "Something Wrong !! Error !!";
		$result['code'] = 1;
    }
		
	echo json_encode($result);
}

function GeneratePayroll($month){
    
	global $db;
	$requestData = $_REQUEST;
 	$columns = array(
 		0 => 'empid',
 		1 => 'name',
 		2 => 'total_time',
 		3 => 'total_min',
 		4 => 'net_salary'

 	);

	$sql = "select * from employee order by ssn";
	$query = mysqli_query($db,$sql);
	$totalData = mysqli_num_rows($query);
	$totalFiltered = $totalData;
 	
 	
 	$sql = "select * from employee";
	$query = mysqli_query($db, $sql);
	$totalFiltered = mysqli_num_rows($query);
	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "";
	$query = mysqli_query($db, $sql);
	
	$total_Data = mysqli_num_rows($query);
	
 	
	$data = array();
    $month = str_replace("_"," ",$month);
    $i = 1 + $requestData['start'];
	while ($row = mysqli_fetch_array($query)) {
	    
	$cnt10 = 0;
    $cnt30 = 0;
    $cnt1 = 0;
    $cnteg = 0;
    $salary = 0;
    $present = 0;
    $hw = 0;
    $ot = 0;
    $abs = 0;
    $bt = 0;
    
      $ssn = $row['ssn'];
        if ($row[10] > 3 and $row[10] != 9) {
            $getmonthdetails1 = getmonthdetails1($month,$ssn); 
            $getmonthdetails1_arr = explode("_",$getmonthdetails1); 
            $id = $row[10];
            $fname = $row[8];
            $cnt10 = $getmonthdetails1_arr[0];
            $cnt30 = $getmonthdetails1_arr[1];
            $cnt1 = $getmonthdetails1_arr[2];
            $cnteg = $getmonthdetails1_arr[3];
            $ot = $getmonthdetails1_arr[4];
            $bt = $getmonthdetails1_arr[5];
            $abs = $getmonthdetails1_arr[6];
            $hw = $getmonthdetails1_arr[7];
            $ota = $getmonthdetails1_arr[8];
            $bta = $getmonthdetails1_arr[9];
            $totalsal = $getmonthdetails1_arr[10];
            $netsalary = $getmonthdetails1_arr[11];
            
        } else if ($row[10] == 9) {
            
            $getmonthdetails2 = getmonthdetails2($month,$ssn);
            $getmonthdetails2_arr = explode("_",$getmonthdetails2); 
            $id = $row[10];
            $fname = $row[8];
            $cnt10 = $getmonthdetails2_arr[0];
            $cnt30 = $getmonthdetails2_arr[1];
            $cnt1 = $getmonthdetails2_arr[2];
            $cnteg = $getmonthdetails2_arr[3];
            $ot = $getmonthdetails2_arr[4];
            $bt = $getmonthdetails2_arr[5];
            $abs = $getmonthdetails2_arr[6];
            $hw = $getmonthdetails2_arr[7];
            $ota = $getmonthdetails2_arr[8];
            $bta = $getmonthdetails2_arr[9];
            $totalsal = $getmonthdetails2_arr[10];
            $netsalary = $getmonthdetails2_arr[11];
        }
        
        
            $nesteddata = array();
         /*   $nesteddata[] = $id;
            $nesteddata[] = $fname;
            $nesteddata[] = $cnt10;
            $nesteddata[] = $cnt30;
            $nesteddata[] = $cnt1;
            $nesteddata[] = $cnteg;
            $nesteddata[] = $ot;
            $nesteddata[] = $bt;
            $nesteddata[] = $abs;
            $nesteddata[] = $hw;
            $nesteddata[] = $ota;
            $nesteddata[] = $bta;
            $nesteddata[] = $totalsal;
            $nesteddata[] = $netsalary;  */
            
            $nesteddata[] = $row['empid'];
            $nesteddata[] = $fname;
            $nesteddata[] = $cnt10;
            $nesteddata[] = $cnt30;
            $nesteddata[] = $totalsal;
            
            
            $data[] = $nesteddata;
		$i++;
	}
	$json_data = array(
	    
		"draw"            => intval($requestData['draw']),
		"recordsTotal"    => intval($totalData),
		"recordsFiltered" => intval($totalFiltered),
		"act_data"        => $month,
		"data"            => $data
	);

	echo json_encode($json_data);
}



function InsertUpdateHolidays() {
	$result = array();
	global $db;

	$holiday_title = stripslashes($_POST['holiday_title']);
    $holiday_desc = stripslashes($_POST['holiday_desc']);
    $holiday_date = stripslashes($_POST['holiday_date']);
    
    $holiday_type = stripslashes($_POST['holiday_type']);
    if ( !empty($holiday_title) && !empty($holiday_desc) && !empty($holiday_date) && !empty($holiday_type) ) {
	    if ( !empty($_POST['holiday_id']) ) {
	    	$holiday_id = addslashes($_POST['holiday_id']);
	    	$updateHoliday = mysqli_query($db, "UPDATE `" . DB_PREFIX . "holidays` SET `holiday_title` = '$holiday_title', `holiday_desc` = '$holiday_desc', `holiday_date` = '$holiday_date', `holiday_type` = '$holiday_type' WHERE `holiday_id` = $holiday_id");
		    if ( $updateHoliday ) {
		        $result['result'] = 'Holiday record has been successfully updated.';
		        $result['code'] = 0;
		    } else {
		    	$result['result'] = 'Something went wrong, please try again.';
		    	$result['code'] = 1;
		    }
	    } else {
	    	$insertHoliday = mysqli_query($db, "INSERT INTO `" . DB_PREFIX . "holidays`(`holiday_title`, `holiday_desc`, `holiday_date`, `holiday_type`) VALUES ('$holiday_title', '$holiday_desc', '$holiday_date', '$holiday_type')");
		    if ( $insertHoliday ) {
		        $result['result'] = 'Holiday record has been successfully inserted.';
		        $result['code'] = 0;
		    } else {
		    	$result['result'] = 'Something went wrong, please try again.';
		    	$result['code'] = 1;
		    }
		}
	} else {
		$result['result'] = 'Holiday details should not be blank.';
		$result['code'] = 2;
	}

	echo json_encode($result);
}

function GetHolidayByID() {
	$result = array();
	global $db;

	$id = $_POST['id'];
	$holiSQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "holidays` WHERE `holiday_id` = $id LIMIT 0, 1");
	if ( $holiSQL ) {
		if ( mysqli_num_rows($holiSQL) == 1 ) {
			$result['result'] = mysqli_fetch_assoc($holiSQL);
			$result['code'] = 0;
		} else {
			$result['result'] = 'Holiday record is not found.';
			$result['code'] = 1;
		}
	} else {
		$result['result'] = 'Something went wrong, please try again.';
		$result['code'] = 2;
	}

	echo json_encode($result);
}

function DeleteHolidayByID() {
	$result = array();
	global $db;

	$id = $_POST['id'];
	$holiSQL = mysqli_query($db, "DELETE FROM `" . DB_PREFIX . "holidays` WHERE `holiday_id` = $id");
	if ( $holiSQL ) {
		$result['result'] = 'Holiday record is successfully deleted.';
		$result['code'] = 0;
	} else {
		$result['result'] = 'Something went wrong, please try again.';
		$result['code'] = 1;
	}

	echo json_encode($result);
}

function LoadingHolidays() {
	global $db;
	$requestData = $_REQUEST;
	$columns = array(
		0 => 'holiday_id',
		1 => 'holiday_title',
		2 => 'holiday_desc',
		3 => 'holiday_date',
		4 => 'holiday_type',
	);

	$sql  = "SELECT `holiday_id` ";
	$sql .= " FROM `" . DB_PREFIX . "holidays`";
	$query = mysqli_query($db, $sql);
	$totalData = mysqli_num_rows($query);
	$totalFiltered = $totalData;

	$sql  = "SELECT *";
	$sql .= " FROM `" . DB_PREFIX . "holidays` WHERE 1 = 1";
	if ( !empty($requestData['search']['value']) ) {
		$sql .= " AND (`holiday_id` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `holiday_title` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `holiday_desc` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `holiday_date` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `holiday_type` LIKE '" . $requestData['search']['value'] . "%')";
		$sql .= " order by holiday_id desc";
	}
	$query = mysqli_query($db, $sql);
	$totalFiltered = mysqli_num_rows($query);
	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "";
	$query = mysqli_query($db, $sql);

	$data = array();
	$i = 1 + $requestData['start'];
	while ( $row = mysqli_fetch_assoc($query) ) {
		$nestedData = array();
		$nestedData[] = $row["holiday_id"];
		$nestedData[] = $row["holiday_title"];
		$nestedData[] = $row["holiday_desc"];
		$nestedData[] = date('d-m-Y', strtotime($row["holiday_date"]));
		if ( $row["holiday_type"] == 'compulsory' ) {
			$nestedData[] = '<span class="label label-success">' . ucwords($row["holiday_type"]) . '</span>';
		} else {
			$nestedData[] = '<span class="label label-danger">' . ucwords($row["holiday_type"]) . '</span>';
		}
		$data[] = $nestedData;
		$i++;
	}
	$json_data = array(
		"draw"            => intval($requestData['draw']),
		"recordsTotal"    => intval($totalData),
		"recordsFiltered" => intval($totalFiltered),
		"data"            => $data
	);

	echo json_encode($json_data);
}

function InsertUpdatePayheads() {
	$result = array();
	global $db;

	$payhead_name = stripslashes($_POST['payhead_name']);
    $payhead_desc = stripslashes($_POST['payhead_desc']);
    $payhead_type = stripslashes($_POST['payhead_type']);
    if ( !empty($payhead_name) && !empty($payhead_desc) && !empty($payhead_type) ) {
	    if ( !empty($_POST['payhead_id']) ) {
	    	$payhead_id = addslashes($_POST['payhead_id']);
	    	$updatePayhead = mysqli_query($db, "UPDATE `" . DB_PREFIX . "payheads` SET `payhead_name` = '$payhead_name', `payhead_desc` = '$payhead_desc', `payhead_type` = '$payhead_type' WHERE `payhead_id` = $payhead_id");
		    if ( $updatePayhead ) {
		        $result['result'] = 'Payhead record has been successfully updated.';
		        $result['code'] = 0;
		    } else {
		    	$result['result'] = 'Something went wrong, please try again.';
		    	$result['code'] = 1;
		    }
	    } else {
	    	$insertPayhead = mysqli_query($db, "INSERT INTO `" . DB_PREFIX . "payheads`(`payhead_name`, `payhead_desc`, `payhead_type`) VALUES ('$payhead_name', '$payhead_desc', '$payhead_type')");
		    if ( $insertPayhead ) {
		        $result['result'] = 'Payhead record has been successfully inserted.';
		        $result['code'] = 0;
		    } else {
		    	$result['result'] = 'Something went wrong, please try again.';
		    	$result['code'] = 1;
		    }
		}
	} else {
		$result['result'] = 'Payhead details should not be blank.';
		$result['code'] = 2;
	}

	echo json_encode($result);
}

function GetPayheadByID() {
	$result = array();
	global $db;

	$id = $_POST['id'];
	$holiSQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "payheads` WHERE `payhead_id` = $id LIMIT 0, 1");
	if ( $holiSQL ) {
		if ( mysqli_num_rows($holiSQL) == 1 ) {
			$result['result'] = mysqli_fetch_assoc($holiSQL);
			$result['code'] = 0;
		} else {
			$result['result'] = 'Payhead record is not found.';
			$result['code'] = 1;
		}
	} else {
		$result['result'] = 'Something went wrong, please try again.';
		$result['code'] = 2;
	}

	echo json_encode($result);
}

function DeletePayheadByID() {
	$result = array();
	global $db;

	$id = $_POST['id'];
	$holiSQL = mysqli_query($db, "DELETE FROM `" . DB_PREFIX . "payheads` WHERE `payhead_id` = $id");
	if ( $holiSQL ) {
		$result['result'] = 'Payhead record is successfully deleted.';
		$result['code'] = 0;
	} else {
		$result['result'] = 'Something went wrong, please try again.';
		$result['code'] = 1;
	}

	echo json_encode($result);
}

function LoadingPayheads() {
	global $db;
	$requestData = $_REQUEST;
	$columns = array(
		0 => 'payhead_id',
		1 => 'payhead_name',
		2 => 'payhead_desc',
		3 => 'payhead_type'
	);

	$sql  = "SELECT `payhead_id` ";
	$sql .= " FROM `" . DB_PREFIX . "payheads`";
	$query = mysqli_query($db, $sql);
	$totalData = mysqli_num_rows($query);
	$totalFiltered = $totalData;

	$sql  = "SELECT *";
	$sql .= " FROM `" . DB_PREFIX . "payheads` WHERE 1 = 1";
	if ( !empty($requestData['search']['value']) ) {
		$sql .= " AND (`payhead_id` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `payhead_name` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `payhead_desc` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `payhead_type` LIKE '" . $requestData['search']['value'] . "%')";
	}
	$query = mysqli_query($db, $sql);
	$totalFiltered = mysqli_num_rows($query);
	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "";
	$query = mysqli_query($db, $sql);

	$data = array();
	$arr = 1;
	$i = 1 + $requestData['start'];
	while ( $row = mysqli_fetch_assoc($query) ) {
		$nestedData = array();
		$nestedData[] = $arr;
		$nestedData[] = $row["payhead_name"];
		$nestedData[] = $row["payhead_desc"];
		if ( $row["payhead_type"] == 'earnings' ) {
			$nestedData[] = '<span class="label label-success">' . ucwords($row["payhead_type"]) . '</span>';
		} else {
			$nestedData[] = '<span class="label label-danger">' . ucwords($row["payhead_type"]) . '</span>';
		}
		$data[] = $nestedData;
		$i++;
		$arr++;
	}
	$json_data = array(
		"draw"            => intval($requestData['draw']),
		"recordsTotal"    => intval($totalData),
		"recordsFiltered" => intval($totalFiltered),
		"data"            => $data
	);

	echo json_encode($json_data);
}

function GetAllPayheadsExceptEmployeeHave() {
	$result = array();
	global $db;

	$emp_code = $_POST['emp_code'];
	$salarySQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "payheads` WHERE `payhead_id` NOT IN (SELECT `payhead_id` FROM `" . DB_PREFIX . "pay_structure` WHERE `emp_code` = '$emp_code')");
	if ( $salarySQL ) {
		if ( mysqli_num_rows($salarySQL) > 0 ) {
			while ( $data = mysqli_fetch_assoc($salarySQL) ) {
				$result['result'][] = $data;
			}
			$result['code'] = 0;
		} else {
			$result['result'] = 'Salary record is not found.';
			$result['code'] = 1;
		}
	} else {
		$result['result'] = 'Something went wrong, please try again.';
		$result['code'] = 2;
	}

	echo json_encode($result);
}

function GetEmployeePayheadsByID() {
	$result = array();
	global $db;

	$emp_code = $_POST['emp_code'];
	$salarySQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "pay_structure` AS `pay`, `" . DB_PREFIX . "payheads` AS `head` WHERE `head`.`payhead_id` = `pay`.`payhead_id` AND `pay`.`emp_code` = '$emp_code'");
	if ( $salarySQL ) {
		if ( mysqli_num_rows($salarySQL) > 0 ) {
			while ( $data = mysqli_fetch_assoc($salarySQL) ) {
				$result['result'][] = $data;
			}
			$result['code'] = 0;
		} else {
			$result['result'] = 'Salary record is not found.';
			$result['code'] = 1;
		}
	} else {
		$result['result'] = 'Something went wrong, please try again.';
		$result['code'] = 2;
	}

	echo json_encode($result);
}

function GetEmployeeByID() {
	$result = array();
	global $db;

	$emp_code = $_POST['emp_code'];
	$empSQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "employees` WHERE `emp_code` = '$emp_code' LIMIT 0, 1");
	if ( $empSQL ) {
		if ( mysqli_num_rows($empSQL) == 1 ) {
			$result['result'] = mysqli_fetch_assoc($empSQL);
			$result['code'] = 0;
		} else {
			$result['result'] = 'Employee record is not found.';
			$result['code'] = 1;
		}
	} else {
		$result['result'] = 'Something went wrong, please try again.';
		$result['code'] = 2;
	}

	echo json_encode($result);
}

function DeleteEmployeeByID() {
	$result = array();
	global $db;

	$emp_code = $_POST['emp_code'];
	$empSQL = mysqli_query($db, "DELETE FROM `" . DB_PREFIX . "employees` WHERE `emp_code` = '$emp_code'");
	if ( $empSQL ) {
		$result['result'] = 'Employee record is successfully deleted.';
		$result['code'] = 0;
	} else {
		$result['result'] = 'Something went wrong, please try again.';
		$result['code'] = 1;
	}

	echo json_encode($result);
}

function EditEmployeeDetailsByID() {
	$result = array();
	global $db;

	$emp_id = stripslashes($_POST['emp_id']);
    $first_name = stripslashes($_POST['first_name']);
    $last_name = stripslashes($_POST['last_name']);
    $dob = stripslashes($_POST['dob']);
    $gender = stripslashes($_POST['gender']);
    $merital_status = stripslashes($_POST['merital_status']);
    $nationality = stripslashes($_POST['nationality']);
    $address = stripslashes($_POST['address']);
    $city = stripslashes($_POST['city']);
    $state = stripslashes($_POST['state']);
    $country = stripslashes($_POST['country']);
    $email = stripslashes($_POST['email']);
    $mobile = stripslashes($_POST['mobile']);
    $telephone = stripslashes($_POST['telephone']);
    $identity_doc = stripslashes($_POST['identity_doc']);
    $identity_no = stripslashes($_POST['identity_no']);
    $emp_type = stripslashes($_POST['emp_type']);
    $joining_date = stripslashes($_POST['joining_date']);
    $blood_group = stripslashes($_POST['blood_group']);
    $designation = stripslashes($_POST['designation']);
    $department = stripslashes($_POST['department']);
    $pan_no = stripslashes($_POST['pan_no']);
    $bank_name = stripslashes($_POST['bank_name']);
    $account_no = stripslashes($_POST['account_no']);
    $ifsc_code = stripslashes($_POST['ifsc_code']);
    $pf_account = stripslashes($_POST['pf_account']);
    if ( !empty($first_name) && !empty($last_name) && !empty($dob) && !empty($gender) && !empty($merital_status) && !empty($nationality) && !empty($address) && !empty($city) && !empty($state) && !empty($country) && !empty($email) && !empty($mobile) && !empty($identity_doc) && !empty($identity_no) && !empty($emp_type) && !empty($joining_date) && !empty($blood_group) && !empty($designation) && !empty($department) && !empty($pan_no) && !empty($bank_name) && !empty($account_no) && !empty($ifsc_code) && !empty($pf_account) ) {
    	$updateEmp = mysqli_query($db, "UPDATE `" . DB_PREFIX . "employees` SET `first_name` = '$first_name', `last_name` = '$last_name', `dob` = '$dob', `gender` = '$gender', `merital_status` = '$merital_status', `nationality` = '$nationality', `address` = '$address', `city` = '$city', `state` = '$state', `country` = '$country', `email` = '$email', `mobile` = '$mobile', `telephone` = '$telephone', `identity_doc` = '$identity_doc', `identity_no` = '$identity_no', `emp_type` = '$emp_type', `joining_date` = '$joining_date', `blood_group` = '$blood_group', `designation` = '$designation', `department` = '$department', `pan_no` = '$pan_no', `bank_name` = '$bank_name', `account_no` = '$account_no', `ifsc_code` = '$ifsc_code', `pf_account` = '$pf_account' WHERE `emp_id` = $emp_id");
	    if ( $updateEmp ) {
	        $result['result'] = 'Employee details has been successfully updated.';
	        $result['code'] = 0;
	    } else {
	    	$result['result'] = 'Something went wrong, please try again.';
	    	$result['code'] = 1;
	    }
	} else {
		$result['result'] = 'All fields are mandatory except Telephone.';
		$result['code'] = 2;
	}

	echo json_encode($result);
}

function GeneratePaySlip() {
	global $mpdf, $db;
	$result = array();

	$emp_code = $_POST['emp_code'];
    $pay_month = $_POST['pay_month'];
    $earnings_heads = $_POST['earnings_heads'];
    $earnings_amounts = $_POST['earnings_amounts'];
    $deductions_heads = $_POST['deductions_heads'];
    $deductions_amounts = $_POST['deductions_amounts'];
    if ( !empty($emp_code) && !empty($pay_month) ) {
	    for ( $i = 0; $i < count($earnings_heads); $i++ ) {
	    	$checkSalSQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "salaries` WHERE `emp_code` = '$emp_code' AND `payhead_name` = '" . $earnings_heads[$i] . "' AND `pay_month` = '$pay_month' AND `pay_type` = 'earnings' LIMIT 0, 1");
	    	if ( $checkSalSQL ) {
	    		if ( mysqli_num_rows($checkSalSQL) == 0 ) {
	    			mysqli_query($db, "INSERT INTO `" . DB_PREFIX . "salaries`(`emp_code`, `payhead_name`, `pay_amount`, `earning_total`, `deduction_total`, `net_salary`, `pay_type`, `pay_month`, `generate_date`) VALUES ('$emp_code', '" . $earnings_heads[$i] . "', " . number_format($earnings_amounts[$i], 2, '.', '') . ", " . number_format(array_sum($earnings_amounts), 2, '.', '') . ", " . number_format(array_sum($deductions_amounts), 2, '.', '') . ", " . number_format((array_sum($earnings_amounts) - array_sum($deductions_amounts)), 2, '.', '') . ", 'earnings', '$pay_month', '" . date('Y-m-d H:i:s') . "')");
	    		}
	    	}
	    }
	    for ( $i = 0; $i < count($deductions_heads); $i++ ) {
	    	$checkSalSQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "salaries` WHERE `emp_code` = '$emp_code' AND `payhead_name` = '" . $deductions_heads[$i] . "' AND `pay_month` = '$pay_month' AND `pay_type` = 'deductions' LIMIT 0, 1");
	    	if ( $checkSalSQL ) {
	    		if ( mysqli_num_rows($checkSalSQL) == 0 ) {
	    			mysqli_query($db, "INSERT INTO `" . DB_PREFIX . "salaries`(`emp_code`, `payhead_name`, `pay_amount`, `earning_total`, `deduction_total`, `net_salary`, `pay_type`, `pay_month`, `generate_date`) VALUES ('$emp_code', '" . $deductions_heads[$i] . "', " . number_format($deductions_amounts[$i], 2, '.', '') . ", " . number_format(array_sum($earnings_amounts), 2, '.', '') . ", " . number_format(array_sum($deductions_amounts), 2, '.', '') . ", " . number_format((array_sum($earnings_amounts) - array_sum($deductions_amounts)), 2, '.', '') . ", 'deductions', '$pay_month', '" . date('Y-m-d H:i:s') . "')");
	    		}
	    	}
	    }
	    $empData = GetEmployeeDataByEmpCode($emp_code);
	    $empSalary = GetEmployeeSalaryByEmpCodeAndMonth($emp_code, $pay_month);
	    $empLeave = GetEmployeeLWPDataByEmpCodeAndMonth($emp_code, $pay_month);
	    $totalEarnings = 0;
		$totalDeductions = 0;
		$html = '<style>
		@page{margin:20px 20px;font-family:Arial;font-size:14px;}
    	.div_half{float:left;margin:0 0 30px 0;width:50%;}
    	.logo{width:250px;padding:0;}
    	.com_title{text-align:center;font-size:16px;margin:0;}
    	.reg_no{text-align:center;font-size:12px;margin:5px 0;}
    	.subject{text-align:center;font-size:20px;font-weight:bold;}
    	.emp_info{width:100%;margin:0 0 30px 0;}
    	.table{border:1px solid #ccc;margin:0 0 30px 0;}
    	.salary_info{width:100%;margin:0;}
    	.salary_info th,.salary_info td{border:1px solid #ccc;margin:0;padding:5px;vertical-align:middle;}
    	.net_payable{margin:0;color:#050;}
    	.in_word{text-align:right;font-size:12px;margin:5px 0;}
    	.signature{margin:0 0 30px 0;}
    	.signature strong{font-size:12px;padding:5px 0 0 0;border-top:1px solid #000;}
    	.com_info{font-size:12px;text-align:center;margin:0 0 30px 0;}
    	.noseal{text-align:center;font-size:11px;}
	    </style>';
	    $html .= '<div class="div_half">';
	    $html .= '<img class="logo" src="' . BASE_URL . 'dist/img/logo.png" alt="Wisely Online Services Private Limited" />';
	    $html .= '</div>';
	    $html .= '<div class="div_half">';
	    $html .= '<h2 class="com_title">Wisely Online Services Private Limited</h2>';
	    $html .= '<p class="reg_no">Registration Number: 063838, Bangalore</p>';
	    $html .= '</div>';

	    $html .= '<p class="subject">Salary Slip for ' . $pay_month . '</p>';

	    $html .= '<table class="emp_info">';
	    $html .= '<tr>';
	    $html .= '<td width="25%">Employee Code</td>';
	    $html .= '<td width="25%">: ' . strtoupper($emp_code) . '</td>';
	    $html .= '<td width="25%">Bank Name</td>';
	    $html .= '<td width="25%">: ' . ucwords($empData['bank_name']) . '</td>';
	    $html .= '</tr>';

	    $html .= '<tr>';
	    $html .= '<td>Employee Name</td>';
	    $html .= '<td>: ' . ucwords($empData['first_name'] . ' ' . $empData['last_name']) . '</td>';
	    $html .= '<td>Bank Account</td>';
	    $html .= '<td>: ' . $empData['account_no'] . '</td>';
	    $html .= '</tr>';

	    $html .= '<tr>';
	    $html .= '<td>Designation</td>';
	    $html .= '<td>: ' . ucwords($empData['designation']) . '</td>';
	    $html .= '<td>IFSC Code</td>';
	    $html .= '<td>: ' . strtoupper($empData['ifsc_code']) . '</td>';
	    $html .= '</tr>';

	    $html .= '<tr>';
	    $html .= '<td>Gender</td>';
	    $html .= '<td>: ' . ucwords($empData['gender']) . '</td>';
	    $html .= '<td>PAN</td>';
	    $html .= '<td>: ' . strtoupper($empData['pan_no']) . '</td>';
	    $html .= '</tr>';

	    $html .= '<tr>';
	    $html .= '<td>Location</td>';
	    $html .= '<td>: ' . ucwords($empData['city']) . '</td>';
	    $html .= '<td>PF Account</td>';
	    $html .= '<td>: ' . strtoupper($empData['pf_account']) . '</td>';
	    $html .= '</tr>';

	    $html .= '<tr>';
	    $html .= '<td>Department</td>';
	    $html .= '<td>: ' . ucwords($empData['department']) . '</td>';
	    $html .= '<td>Payable/Working Days</td>';
	    $html .= '<td>: ' . ($empLeave['workingDays'] - $empLeave['withoutPay']) . '/' . $empLeave['workingDays'] . ' Days</td>';
	    $html .= '</tr>';

	    $html .= '<tr>';
	    $html .= '<td>Date of Joining</td>';
	    $html .= '<td>: ' . date('d-m-Y', strtotime($empData['joining_date'])) . '</td>';
	    $html .= '<td>Taken/Remaining Leaves</td>';
	    $html .= '<td>: ' . $empLeave['payLeaves'] . '/' . ($empLeave['totalLeaves'] - $empLeave['payLeaves']) . ' Days</td>';
	    $html .= '</tr>';
	    $html .= '</table>';

		$html .= '<table class="table" cellspacing="0" cellpadding="0" width="100%">';
			$html .= '<thead>';
				$html .= '<tr>';
					$html .= '<th width="50%" valign="top">';
						$html .= '<table class="salary_info" cellspacing="0">';
							$html .= '<tr>';
								$html .= '<th align="left">Earnings</th>';
								$html .= '<th width="110" align="right">Amount (Rs.)</th>';
							$html .= '</tr>';
						$html .= '</table>';
					$html .= '</th>';
					$html .= '<th width="50%" valign="top">';
						$html .= '<table class="salary_info" cellspacing="0">';
							$html .= '<tr>';
								$html .= '<th align="left">Deductions</th>';
								$html .= '<th width="110" align="right">Amount (Rs.)</th>';
							$html .= '</tr>';
						$html .= '</table>';
					$html .= '</th>';
				$html .= '</tr>';
			$html .= '</thead>';

			if ( !empty($empSalary) ) {
				$html .= '<tr>';
					$html .= '<td width="50%" valign="top">';
						$html .= '<table class="salary_info" cellspacing="0">';
						foreach ( $empSalary as $salary ) {
							if ( $salary['pay_type'] == 'earnings' ) {
								$totalEarnings += $salary['pay_amount'];
								$html .= '<tr>';
									$html .= '<td align="left">';
										$html .= $salary['payhead_name'];
									$html .= '</td>';
									$html .= '<td width="110" align="right">';
										$html .= number_format($salary['pay_amount'], 2, '.', ',');
									$html .= '</td>';
								$html .= '</tr>';
							}
						}
						$html .= '</table>';
					$html .= '</td>';

					$html .= '<td width="50%" valign="top">';
						$html .= '<table class="salary_info" cellspacing="0">';
						foreach ( $empSalary as $salary ) {
							if ( $salary['pay_type'] == 'deductions' ) {
								$totalDeductions += $salary['pay_amount'];
								$html .= '<tr>';
									$html .= '<td align="left">';
										$html .= $salary['payhead_name'];
									$html .= '</td>';
									$html .= '<td width="110" align="right">';
										$html .= number_format($salary['pay_amount'], 2, '.', ',');
									$html .= '</td>';
								$html .= '</tr>';
							}
						}
						$html .= '</table>';
					$html .= '</td>';
				$html .= '</tr>';
			} else {
				$html .= '<tr>';
					$html .= '<td colspan="2" width="100%">No payheads are assigned for this employee</td>';
				$html .= '</tr>';
			}

			$html .= '<tr>';
				$html .= '<td width="50%" valign="top">';
					$html .= '<table class="salary_info" cellspacing="0">';
						$html .= '<tr>';
							$html .= '<td align="left">';
								$html .= '<strong>Total Earnings</strong>';
							$html .= '</td>';
							$html .= '<td width="110" align="right">';
								$html .= '<strong>' . number_format($totalEarnings, 2, '.', ',') . '</strong>';
							$html .= '</td>';
						$html .= '</tr>';
					$html .= '</table>';
				$html .= '</td>';
				$html .= '<td width="50%" valign="top">';
					$html .= '<table class="salary_info" cellspacing="0">';
						$html .= '<tr>';
							$html .= '<td align="left">';
								$html .= '<strong>Total Deductions</strong>';
							$html .= '</td>';
							$html .= '<td width="110" align="right">';
								$html .= '<strong>' . number_format($totalDeductions, 2, '.', ',') . '</strong>';
							$html .= '</td>';
						$html .= '</tr>';
					$html .= '</table>';
				$html .= '</td>';
			$html .= '</tr>';
		$html .= '</table>';

		$html .= '<div class="div_half">';
			$html .= '<h3 class="net_payable">';
				$html .= 'Net Salary Payable: Rs.' . number_format(($totalEarnings - $totalDeductions), 2, '.', ',');
			$html .= '</h3>';
		$html .= '</div>';
		$html .= '<div class="div_half">';
			$html .= '<h3 class="net_payable">';
				$html .= '<p class="in_word">(In words: ' . ucfirst(ConvertNumberToWords(($totalEarnings - $totalDeductions))) . ')</p>';
			$html .= '</h3>';
		$html .= '</div>';

		$html .= '<div class="signature">';
			$html .= '<table class="emp_info">';
				$html .= '<thead>';
					$html .= '<tr>';
						$html .= '<td>Date: ' . date('d-m-Y') . '</td>';
						$html .= '<th width="200">';
							$html .= '<img width="100" src="' . BASE_URL . 'dist/img/signature.png" alt="Nani Gopal Paul" /><br />';
							$html .= '<strong>Nani Gopal Paul, Director</strong>';
						$html .= '</th>';
					$html .= '</tr>';
				$html .= '</thead>';
			$html .= '</table>';
		$html .= '</div>';

		$html .= '<p class="com_info">';
			$html .= 'No. 15, 20th Main, 100 Feet Road,<br/>';
			$html .= '1st Phase, 2nd Stage, BTM Layout,<br/>';
			$html .= 'Bangalore, 560076,<br/>';
			$html .= 'Karnataka, INDIA<br/>';
			$html .= 'www.wisely.co';
		$html .= '</p>';
		$html .= '<p class="noseal"><small>Note: This is an electronically generated copy & therefore doesn’t require seal.</small></p>';

	    $mpdf->WriteHTML($html);
	    $pay_month = str_replace(', ', '-', $pay_month);
	    $payslip_path = dirname(dirname(__FILE__)) . '/payslips/';
	    if ( ! file_exists($payslip_path . $emp_code . '/') ) {
	    	mkdir($payslip_path . $emp_code, 0777);
	    }
	    if ( ! file_exists($payslip_path . $emp_code . '/' . $pay_month . '/') ) {
	    	mkdir($payslip_path . $emp_code . '/' . $pay_month, 0777);
	    }
		$mpdf->Output($payslip_path . $emp_code . '/' . $pay_month . '/' . $pay_month . '.pdf', 'F');
    	$result['code'] = 0;
    	$_SESSION['PaySlipMsg'] = $pay_month . ' PaySlip has been successfully generated for ' . $emp_code . '.';
    } else {
    	$result['code'] = 1;
    	$result['result'] = 'Something went wrong, please try again.';
    }

	echo json_encode($result);
}

function SendPaySlipByMail() {
	$result = array();
	global $db;

	$emp_code = $_POST['emp_code'];
	$month 	  = $_POST['month'];
	$empData  = GetEmployeeDataByEmpCode($emp_code);
	if ( $empData ) {
		$empName  = $empData['first_name'] . ' ' . $empData['last_name'];
		$empEmail = $empData['email'];
		$subject  = 'PaySlip for ' . $month;
		$message  = '<p>Hi ' . $empData['first_name'] . '</p>';
		$message .= '<p>Here is your attached Salary Slip for the period of ' . $month . '.</p>';
		$message .= '<hr/>';
		$message .= '<p>Thank You,<br/>Wisely Online Services Private Limited</p>';
		$attachment[0]['src'] = dirname(dirname(__FILE__)) . '/payslips/' . $emp_code . '/' . str_replace(', ', '-', $month) . '/' . str_replace(', ', '-', $month) . '.pdf';
		$attachment[0]['name'] = str_replace(', ', '-', $month);
		$send = Send_Mail($subject, $message, $empName, $empEmail, FALSE, FALSE, FALSE, FALSE, $attachment);
		if ( $send == 0 ) {
			$result['code'] = 0;
			$result['result'] = 'PaySlip for ' . $month . ' has been successfully send to ' . $empName;
		} else {
			$result['code'] = 1;
			$result['result'] = 'PaySlip is not send, please try again.';
		}
	} else {
		$result['code'] = 2;
		$result['result'] = 'No such employee found.';
	}

	echo json_encode($result);
}

function EditProfileByID() {
	$result = array();
	global $db;

	if ( $_SESSION['Login_Type'] == 'admin' ) {
		$admin_id = $_SESSION['Admin_ID'];
		$admin_name = addslashes($_POST['admin_name']);
		$admin_email = addslashes($_POST['admin_email']);
		if ( !empty($admin_name) && !empty($admin_email) ) {
			$editSQL = mysqli_query($db, "UPDATE `" . DB_PREFIX . "admin` SET `admin_name` = '$admin_name', `admin_email` = '$admin_email' WHERE `admin_id` = $admin_id");
			if ( $editSQL ) {
				$result['code'] = 0;
				$result['result'] = 'Profile data has been successfully updated.';
			} else {
				$result['code'] = 1;
				$result['result'] = 'Something went wrong, please try again.';
			}
		} else {
			$result['code'] = 2;
			$result['result'] = 'All fields are mandatory.';
		}
	} else {
		$emp_id = stripslashes($_SESSION['Admin_ID']);
	    $first_name = stripslashes($_POST['first_name']);
	    $last_name = stripslashes($_POST['last_name']);
	    $dob = stripslashes($_POST['dob']);
	    $gender = stripslashes($_POST['gender']);
	    $merital_status = stripslashes($_POST['merital_status']);
	    $nationality = stripslashes($_POST['nationality']);
	    $address = stripslashes($_POST['address']);
	    $city = stripslashes($_POST['city']);
	    $state = stripslashes($_POST['state']);
	    $country = stripslashes($_POST['country']);
	    $email = stripslashes($_POST['email']);
	    $mobile = stripslashes($_POST['mobile']);
	    $telephone = stripslashes($_POST['telephone']);
	    $identity_doc = stripslashes($_POST['identity_doc']);
	    $identity_no = stripslashes($_POST['identity_no']);
	    $emp_type = stripslashes($_POST['emp_type']);
	    $joining_date = stripslashes($_POST['joining_date']);
	    $blood_group = stripslashes($_POST['blood_group']);
	    $designation = stripslashes($_POST['designation']);
	    $department = stripslashes($_POST['department']);
	    $pan_no = stripslashes($_POST['pan_no']);
	    $bank_name = stripslashes($_POST['bank_name']);
	    $account_no = stripslashes($_POST['account_no']);
	    $ifsc_code = stripslashes($_POST['ifsc_code']);
	    $pf_account = stripslashes($_POST['pf_account']);
	    if ( !empty($first_name) && !empty($last_name) && !empty($dob) && !empty($gender) && !empty($merital_status) && !empty($nationality) && !empty($address) && !empty($city) && !empty($state) && !empty($country) && !empty($email) && !empty($mobile) && !empty($identity_doc) && !empty($identity_no) && !empty($emp_type) && !empty($joining_date) && !empty($blood_group) && !empty($designation) && !empty($department) && !empty($pan_no) && !empty($bank_name) && !empty($account_no) && !empty($ifsc_code) && !empty($pf_account) ) {
	    	$updateEmp = mysqli_query($db, "UPDATE `" . DB_PREFIX . "employees` SET `first_name` = '$first_name', `last_name` = '$last_name', `dob` = '$dob', `gender` = '$gender', `merital_status` = '$merital_status', `nationality` = '$nationality', `address` = '$address', `city` = '$city', `state` = '$state', `country` = '$country', `email` = '$email', `mobile` = '$mobile', `telephone` = '$telephone', `identity_doc` = '$identity_doc', `identity_no` = '$identity_no', `emp_type` = '$emp_type', `joining_date` = '$joining_date', `blood_group` = '$blood_group', `designation` = '$designation', `department` = '$department', `pan_no` = '$pan_no', `bank_name` = '$bank_name', `account_no` = '$account_no', `ifsc_code` = '$ifsc_code', `pf_account` = '$pf_account' WHERE `emp_id` = $emp_id");
		    if ( $updateEmp ) {
		        $result['result'] = 'Profile data has been successfully updated.';
		        $result['code'] = 0;
		    } else {
		    	$result['result'] = 'Something went wrong, please try again.';
		    	$result['code'] = 1;
		    }
		} else {
			$result['result'] = 'All fields are mandatory except Telephone.';
			$result['code'] = 2;
		}
	}

	echo json_encode($result);
}

function EditLoginDataByID() {
	$result = array();
	global $db;

	if ( $_SESSION['Login_Type'] == 'admin' ) {
		$admin_id = $_SESSION['Admin_ID'];
		$admin_code = addslashes($_POST['admin_code']);
		$admin_password = addslashes($_POST['admin_password']);
		$admin_password_conf = addslashes($_POST['admin_password_conf']);
		if ( !empty($admin_code) && !empty($admin_password) && !empty($admin_password_conf) ) {
			if ( $admin_password == $admin_password_conf ) {
				$editSQL = mysqli_query($db, "UPDATE `" . DB_PREFIX . "admin` SET `admin_code` = '$admin_code', `admin_password` = '" . sha1($admin_password) . "' WHERE `admin_id` = $admin_id");
				if ( $editSQL ) {
					$result['code'] = 0;
					$result['result'] = 'Login data has been successfully updated.';
				} else {
					$result['code'] = 1;
					$result['result'] = 'Something went wrong, please try again.';
				}
			} else {
				$result['code'] = 2;
				$result['result'] = 'Confirm password does not match.';
			}
		} else {
			$result['code'] = 3;
			$result['result'] = 'All fields are mandatory.';
		}
	} else {
		$emp_id = $_SESSION['Admin_ID'];
		$old_password = addslashes($_POST['old_password']);
		$new_password = addslashes($_POST['new_password']);
		$password_conf = addslashes($_POST['password_conf']);
		if ( !empty($old_password) && !empty($new_password) && !empty($password_conf) ) {
			$checkPassSQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "employees` WHERE `emp_id` = $emp_id");
			if ( $checkPassSQL ) {
				if ( mysqli_num_rows($checkPassSQL) == 1 ) {
					$passData = mysqli_fetch_assoc($checkPassSQL);
					if ( sha1($old_password) == $passData['emp_password'] ) {
						if ( $new_password == $password_conf ) {
							$editSQL = mysqli_query($db, "UPDATE `" . DB_PREFIX . "employees` SET `emp_password` = '" . sha1($new_password) . "' WHERE `emp_id` = $emp_id");
							if ( $editSQL ) {
								$result['code'] = 0;
								$result['result'] = 'Password has been successfully updated.';
							} else {
								$result['code'] = 1;
								$result['result'] = 'Something went wrong, please try again.';
							}
						} else {
							$result['code'] = 2;
							$result['result'] = 'Confirm password does not match.';
						}
					} else {
						$result['code'] = 3;
						$result['result'] = 'Entered wrong existing password.';
					}
				} else {
					$result['code'] = 4;
					$result['result'] = 'No such employee found.';
				}
			} else {
				$result['code'] = 5;
				$result['result'] = 'Something went wrong, please try again.';
			}
		} else {
			$result['code'] = 6;
			$result['result'] = 'All fields are mandatory.';
		}
	}

	echo json_encode($result);
}

function LoadingAllLeaves() {
	global $db;
	$empData = GetDataByIDAndType($_SESSION['Admin_ID'], $_SESSION['Login_Type']);
	$requestData = $_REQUEST;
	$columns = array(
		0 => 'leave_id',
		1 => 'emp_code',
		2 => 'leave_subject',
		3 => 'leave_dates',
		4 => 'leave_message',
		5 => 'leave_type',
		6 => 'leave_status'
	);

	$sql  = "SELECT `leave_id` ";
	$sql .= " FROM `" . DB_PREFIX . "leaves`";
	$query = mysqli_query($db, $sql);
	$totalData = mysqli_num_rows($query);
	$totalFiltered = $totalData;

	$sql  = "SELECT *";
	$sql .= " FROM `" . DB_PREFIX . "leaves` WHERE 1=1";
	if ( !empty($requestData['search']['value']) ) {
		$sql .= " AND (`leave_id` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `emp_code` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `leave_subject` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `leave_dates` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `leave_message` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `leave_type` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `leave_status` LIKE '" . $requestData['search']['value'] . "%')";
	}
	$query = mysqli_query($db, $sql);
	$totalFiltered = mysqli_num_rows($query);
	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "";
	$query = mysqli_query($db, $sql);

	$data = array();
	$i = 1 + $requestData['start'];
	while ( $row = mysqli_fetch_assoc($query) ) {
		$nestedData = array();
		$nestedData[] = $row["leave_id"];
		$nestedData[] = '<a target="_blank" href="' . REG_URL . 'reports/' . $row["emp_code"] . '/">' . $row["emp_code"] . '</a>';
		$nestedData[] = $row["leave_subject"];
		$nestedData[] = $row["leave_dates"];
		$nestedData[] = $row["leave_message"];
		$nestedData[] = $row["leave_type"];
		if ( $row["leave_status"] == 'pending' ) {
			$nestedData[] = '<span class="label label-warning">' . ucwords($row["leave_status"]) . '</span>';
		} elseif ( $row['leave_status'] == 'approve' ) {
			$nestedData[] = '<span class="label label-success">' . ucwords($row["leave_status"]) . 'd</span>';
		} elseif ( $row['leave_status'] == 'reject' ) {
			$nestedData[] = '<span class="label label-danger">' . ucwords($row["leave_status"]) . 'ed</span>';
		}
		$data[] = $nestedData;
		$i++;
	}
	$json_data = array(
		"draw"            => intval($requestData['draw']),
		"recordsTotal"    => intval($totalData),
		"recordsFiltered" => intval($totalFiltered),
		"data"            => $data
	);

	echo json_encode($json_data);
}

function LoadingMyLeaves() {
	global $db;
	$empData = GetDataByIDAndType($_SESSION['Admin_ID'], $_SESSION['Login_Type']);
	$requestData = $_REQUEST;
	$columns = array(
		0 => 'leave_id',
		1 => 'leave_subject',
		2 => 'leave_dates',
		3 => 'leave_message',
		4 => 'leave_type',
		5 => 'leave_status'
	);

	$sql  = "SELECT `leave_id` ";
	$sql .= " FROM `" . DB_PREFIX . "leaves` WHERE `emp_code` = '" . $empData['emp_code'] . "'";
	$query = mysqli_query($db, $sql);
	$totalData = mysqli_num_rows($query);
	$totalFiltered = $totalData;

	$sql  = "SELECT *";
	$sql .= " FROM `" . DB_PREFIX . "leaves` WHERE `emp_code` = '" . $empData['emp_code'] . "'";
	if ( !empty($requestData['search']['value']) ) {
		$sql .= " AND (`leave_id` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `leave_subject` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `leave_dates` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `leave_message` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `leave_type` LIKE '" . $requestData['search']['value'] . "%'";
		$sql .= " OR `leave_status` LIKE '" . $requestData['search']['value'] . "%')";
	}
	$query = mysqli_query($db, $sql);
	$totalFiltered = mysqli_num_rows($query);
	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "";
	$query = mysqli_query($db, $sql);

	$data = array();
	$i = 1 + $requestData['start'];
	while ( $row = mysqli_fetch_assoc($query) ) {
		$nestedData = array();
		$nestedData[] = $row["leave_id"];
		$nestedData[] = $row["leave_subject"];
		$nestedData[] = $row["leave_dates"];
		$nestedData[] = $row["leave_message"];
		$nestedData[] = $row["leave_type"];
		if ( $row["leave_status"] == 'pending' ) {
			$nestedData[] = '<span class="label label-warning">' . ucwords($row["leave_status"]) . '</span>';
		} elseif ( $row['leave_status'] == 'approve' ) {
			$nestedData[] = '<span class="label label-success">' . ucwords($row["leave_status"]) . 'd</span>';
		} elseif ( $row['leave_status'] == 'reject' ) {
			$nestedData[] = '<span class="label label-danger">' . ucwords($row["leave_status"]) . 'ed</span>';
		}
		$data[] = $nestedData;
		$i++;
	}
	$json_data = array(
		"draw"            => intval($requestData['draw']),
		"recordsTotal"    => intval($totalData),
		"recordsFiltered" => intval($totalFiltered),
		"data"            => $data
	);

	echo json_encode($json_data);
}

function ApplyLeaveToAdminApproval() {
	$result = array();
	global $db;

	$adminData = GetAdminData(1);
	$empData   = GetDataByIDAndType($_SESSION['Admin_ID'], $_SESSION['Login_Type']);

	$leave_subject = addslashes($_POST['leave_subject']);
	$leave_dates   = addslashes($_POST['leave_dates']);
	$leave_message = addslashes($_POST['leave_message']);
	$leave_type    = addslashes($_POST['leave_type']);
	if ( !empty($leave_subject) && !empty($leave_dates) && !empty($leave_message) && !empty($leave_type) ) {
		$AppliedDates = '';
		if ( strpos($leave_dates, ',') !== false ) {
			$dates = explode(',', $leave_dates);
			foreach ( $dates as $date ) {
				$checkLeaveSQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "leaves` WHERE `leave_dates` LIKE '%$date%' AND `emp_code` = '" . $empData['emp_code'] . "'");
				if ( $checkLeaveSQL ) {
					if ( mysqli_num_rows($checkLeaveSQL) > 0 ) {
						$AppliedDates .= $date . ', ';
					}
				}
			}
		}
		if ( empty($AppliedDates) ) {
			$leaveSQL = mysqli_query($db, "INSERT INTO `" . DB_PREFIX . "leaves` (`emp_code`, `leave_subject`, `leave_dates`, `leave_message`, `leave_type`, `apply_date`) VALUES('" . $empData['emp_code'] . "', '$leave_subject', '$leave_dates', '$leave_message', '$leave_type', '" . date('Y-m-d H:i:s') . "')");
			if ( $leaveSQL ) {
				$empName    = $empData['first_name'] . ' ' . $empData['last_name'];
				$empEmail   = $empData['email'];
				$adminEmail = $adminData['admin_email'];
				$subject 	= 'Leave Application: ' . $leave_subject;
				$message    = '<p>Employee: ' . $empName . ' (' . $empData['emp_code'] . ')' . '</p>';
				$message   .= '<p>Leave Message: ' . $leave_message . '</p>';
				$message   .= '<p>Leave Date(s): ' . $leave_dates . '</p>';
				$message   .= '<p>Leave Type: ' . $leave_type . '</p>';
				$message   .= '<hr/>';
				$message   .= '<p>Please click on the buttons below or log into the admin area to get an action:</p>';
				$message   .= '<form method="post" action="' . BASE_URL . 'ajax/?case=ApproveLeaveApplication&id=' . mysqli_insert_id() . '" style="display:inline;">';
				$message   .= '<input type="hidden" name="id" value="' . mysqli_insert_id() . '" />';
				$message   .= '<button type="submit" style="background:green; border:1px solid green; color:white; padding:0 5px 3px; cursor:pointer; margin-right:15px;">Approve</button>';
				$message   .= '</form>';
				$message   .= '<form method="post" action="' . BASE_URL . 'ajax/?case=RejectLeaveApplication&id=' . mysqli_insert_id() . '" style="display:inline;">';
				$message   .= '<input type="hidden" name="id" value="' . mysqli_insert_id() . '" />';
				$message   .= '<button type="submit" style="background:red; border:1px solid red; color:white; padding:0 5px 3px; cursor:pointer;">Reject</button>';
				$message   .= '</form>';
				$message   .= '<p style="font-size:85%;">After clicking the button, please click on OK and then Continue to make your action complete.</p>';
				$message   .= '<hr/>';
				$message   .= '<p>Thank You<br/>' . $empName . '</p>';
				$adminName 	= $adminData['admin_name'];
				$send = Send_Mail($subject, $message, $adminName, $adminEmail, $empName, $empEmail);
				if ( $send == 0 ) {
					$result['code'] = 0;
					$result['result'] = 'Leave Application has been successfully send to your employer through mail.';
				} else {
					$result['code'] = 1;
					$result['result'] = 'Notice: Leave Application not send through E-Mail, please try again.';
				}
			} else {
				$result['code'] = 1;
				$result['result'] = 'Something went wrong, please try again.';
			}
		} else {
			$alreadyDates = substr($AppliedDates, 0, -2);
			$result['code'] = 2;
			$result['result'] = 'You have already applied for leave on ' . $alreadyDates . '. Please change the leave dates.';
		}
	} else {
		$result['code'] = 3;
		$result['result'] = 'All fields are mandatory.';
	}

	echo json_encode($result);
}

function ApproveLeaveApplication() {
	$result = array();
	global $db;

	$leaveId = $_REQUEST['id'];
	$leaveSQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "leaves` WHERE `leave_id` = $leaveId AND `leave_status` = 'pending' LIMIT 0, 1");
	if ( $leaveSQL ) {
		if ( mysqli_num_rows($leaveSQL) == 1 ) {
			$leaveData = mysqli_fetch_assoc($leaveSQL);
			$update = mysqli_query($db, "UPDATE `" . DB_PREFIX . "leaves` SET `leave_status` = 'approve' WHERE `leave_id` = $leaveId");
			if ( $update ) {
				$empData  = GetEmployeeDataByEmpCode($leaveData['emp_code']);
				if ( $empData ) {
					$empName  = $empData['first_name'] . ' ' . $empData['last_name'];
					$empEmail = $empData['email'];
					$subject  = 'Leave Application Approved';
					$message  = '<p>Hi ' . $empData['first_name'] . '</p>';
					$message .= '<p>Your leave application is approved.</p>';
					$message .= '<p>Application Details:</p>';
					$message .= '<p>Subject: ' . $leaveData['leave_subject'] . '</p>';
					$message .= '<p>Leave Date(s): ' . $leaveData['leave_dates'] . '</p>';
					$message .= '<p>Message: ' . $leaveData['leave_message'] . '</p>';
					$message .= '<p>Leave Type: ' . $leaveData['leave_type'] . '</p>';
					$message .= '<p>Status: ' . ucwords($leaveData['leave_status']) . '</p>';
					$message .= '<hr/>';
					$message .= '<p>Thank You,<br/>Wisely Online Services Private Limited</p>';
					$send = Send_Mail($subject, $message, $empName, $empEmail);
					if ( $send == 0 ) {
						$result['code'] = 0;
						$result['result'] = 'Leave Application is successfully approved. An email notification will be send to the employee.';
					} else {
						$result['code'] = 1;
						$result['result'] = 'Leave Application is not approved, please try again.';
					}
				} else {
					$result['code'] = 2;
					$result['result'] = 'No such employee found.';
				}
			} else {
				$result['code'] = 1;
				$result['result'] = 'Something went wrong, please try again.';
			}
		} else {
			$result['code'] = 2;
			$result['result'] = 'This leave application is already verified.';
		}
	} else {
		$result['code'] = 3;
		$result['result'] = 'Something went wrong, please try again.';
	}

	echo json_encode($result);
}

function RejectLeaveApplication() {
	$result = array();
	global $db;

	$leaveId = $_REQUEST['id'];
	$leaveSQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "leaves` WHERE `leave_id` = $leaveId AND `leave_status` = 'pending' LIMIT 0, 1");
	if ( $leaveSQL ) {
		if ( mysqli_num_rows($leaveSQL) == 1 ) {
			$leaveData = mysqli_fetch_assoc($leaveSQL);
			$update = mysqli_query($db, "UPDATE `" . DB_PREFIX . "leaves` SET `leave_status` = 'reject' WHERE `leave_id` = $leaveId");
			if ( $update ) {
				$empData  = GetEmployeeDataByEmpCode($leaveData['emp_code']);
				if ( $empData ) {
					$empName  = $empData['first_name'] . ' ' . $empData['last_name'];
					$empEmail = $empData['email'];
					$subject  = 'Leave Application Rejected';
					$message  = '<p>Hi ' . $empData['first_name'] . '</p>';
					$message .= '<p>Your leave application is rejected.</p>';
					$message .= '<p>Application Details:</p>';
					$message .= '<p>Subject: ' . $leaveData['leave_subject'] . '</p>';
					$message .= '<p>Leave Date(s): ' . $leaveData['leave_dates'] . '</p>';
					$message .= '<p>Message: ' . $leaveData['leave_message'] . '</p>';
					$message .= '<p>Leave Type: ' . $leaveData['leave_type'] . '</p>';
					$message .= '<p>Status: ' . ucwords($leaveData['leave_status']) . '</p>';
					$message .= '<hr/>';
					$message .= '<p>Thank You,<br/>Wisely Online Services Private Limited</p>';
					$send = Send_Mail($subject, $message, $empName, $empEmail);
					if ( $send == 0 ) {
						$result['code'] = 0;
						$result['result'] = 'Leave Application is rejected. An email notification will be send to the employee.';
					} else {
						$result['code'] = 1;
						$result['result'] = 'Leave Application is not rejected, please try again.';
					}
				} else {
					$result['code'] = 2;
					$result['result'] = 'No such employee found.';
				}
			} else {
				$result['code'] = 1;
				$result['result'] = 'Something went wrong, please try again.';
			}
		} else {
			$result['code'] = 2;
			$result['result'] = 'This leave application is already verified.';
		}
	} else {
		$result['code'] = 3;
		$result['result'] = 'Something went wrong, please try again.';
	}

	echo json_encode($result);
}
