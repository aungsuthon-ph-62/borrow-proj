<meta charset="UTF-8">

<?php  

include "conn_db.php";

$r_sql = "SELECT * FROM student";

$r_result = mysqli_query($conn, $r_sql);

// ---------- read --------------

// ---------- Create --------------

if (isset($_POST['submit'])) {
	include "conn_db.php";
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$sname = validate($_POST['sname']);
	$lname = validate($_POST['lname']);
	$email = validate($_POST['email']);
	$password = validate($_POST['password']);
	$student_id = validate($_POST['student_id']);
	$tel = validate($_POST['tel']);
	$stype = validate($_POST['stype']);
	$status = validate($_POST['status']);

	$password_enc = md5($password);

	if (empty($sname)) {
		header("Location: /borrow-proj/admin/student_create?error=กรุณากรอกชื่อจริง");
	} else if (empty($lname)) {
		header("Location: /borrow-proj/admin/student_create?error=กรุณากรอกนามสกุล");
	} else if (empty($email)) {
		header("Location: /borrow-proj/admin/student_create?error=กรุณากรอกอีเมลล์");
	} else if (empty($password)) {
		header("Location: /borrow-proj/admin/student_create?error=กรุณากรอกพาสเวิร์ด");
	} else if (empty($tel)) {
		header("Location: /borrow-proj/admin/student_create?error=กรุณากรอกเบอร์โทรศัพท์");
	} else if (empty($stype)) {
		header("Location: /borrow-proj/admin/student_create?error=กรุณากรอกชั้นปี");
	} else if (empty($student_id)) {
		header("Location: /borrow-proj/admin/student_create?error=กรุณากรอกรหัสนักศึกษา");
	} else if (empty($status)) {
		header("Location: /borrow-proj/admin/student_create?error=กรุณากรอกสถานะ");
	} else {
		$c_sql = "INSERT INTO student(sname, lname, email, password, student_id, tel, stype, status)
               VALUES('$sname', '$lname', '$email', '$password_enc', '$student_id', '$tel', '$stype', '$status')";
		$c_result = mysqli_query($conn, $c_sql);
		if ($c_result) {
			header("Location: /borrow-proj/admin/manage_student?success=เพิ่มข้อมูลสำเร็จ!");
		} else {
			header("Location: /borrow-proj/admin/student_create?error=unknown error occurred&$user_data");
		}
	}
}


echo '
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';

