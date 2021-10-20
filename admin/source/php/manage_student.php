<meta charset="UTF-8">

<?php

include "conn_db.php";

$r_sql = "SELECT * FROM student WHERE status = 1";

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

	$user_check_query = "SELECT * FROM student WHERE email = '$email' OR student_id = '$student_id' LIMIT 1";
	$query = mysqli_query($conn, $user_check_query);
	$user = mysqli_fetch_assoc($query);

	if ($user['email'] === $email) {
		array_push($errors, "อีเมลล์นี้มีคนใช้แล้ว!");
		header("Location: ../../student_create?error=อีเมลล์ซ้ำ! กรุณากรอกใหม่อีกครั้ง&$errors");
	} elseif ($user['student_id'] === $student_id) {
		array_push($errors, "รหัสนักศึกษานี้มีคนใช้แล้ว!");
		header("Location: ../../student_create?error=รหัสนักศึกษาซ้ำ! กรุณากรอกใหม่อีกครั้ง&$errors");
	} else {
		if (empty($sname)) {
			header("Location: ../../student_create?error=กรุณากรอกชื่อจริง");
		} else if (empty($lname)) {
			header("Location: ../../student_create?error=กรุณากรอกนามสกุล");
		} else if (empty($email)) {
			header("Location: ../../student_create?error=กรุณากรอกอีเมลล์");
		} else if (empty($password)) {
			header("Location: ../../student_create?error=กรุณากรอกพาสเวิร์ด");
		} else if (empty($tel)) {
			header("Location: ../../student_create?error=กรุณากรอกเบอร์โทรศัพท์");
		} else if (empty($stype)) {
			header("Location: ../../student_create?error=กรุณากรอกชั้นปี");
		} else if (empty($student_id)) {
			header("Location: ../../student_create?error=กรุณากรอกรหัสนักศึกษา");
		} else if (empty($status)) {
			header("Location: ../../student_create?error=กรุณากรอกสถานะ");
		} else {
			$c_sql = "INSERT INTO student(sname, lname, email, password, student_id, tel, stype, status)
				   VALUES('$sname', '$lname', '$email', '$password_enc', '$student_id', '$tel', '$stype', '$status')";
			$c_result = mysqli_query($conn, $c_sql);
			if ($c_result) {
				header("Location: ../../manage_student?success=เพิ่มข้อมูลสำเร็จ!");
			} else {
				header("Location: ../../student_create?error=unknown error occurred&$user_data");
			}
		}
	}
}


echo '
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';
