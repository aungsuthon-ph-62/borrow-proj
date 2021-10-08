<meta charset="UTF-8">
<?php


if (isset($_POST['register'])) {
	include "connect_db.php";
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$email = validate($_POST['email']);
	$password = $_POST['password'];
	$sname = validate($_POST['sname']);
	$lname = validate($_POST['lname']);
	$student_id = validate($_POST['student_id']);
	$option = $_POST['sel_type'];

	if (empty($option)) {
		header("Location: ../register.php?error=Select is requird&$user_data");
	} elseif ($option == 0) {
		header("Location: ../register.php?error=Select is required&$user_data");
	} elseif ($option == 1) {
		$option = "ปี 2";
	} elseif ($option == 2) {
		$option = "ปี 3";
	} elseif ($option == 3) {
		$option = "ปี 4";
	} elseif ($option == 4) {
		$option = "ปี 4";
	} else {
		header("Location: ../register.php?error=Select is requird&$user_data");
	}

	$user_data = 'email=' . $email . '&password=' . $password . '&sname=' . $sname . '&lname=' . $lname . '&student_id=' . $student_id . '&option=' . $option;


	if (empty($email)) {
		header("Location: ../register.php?error=Email is required&$user_data");
	} else if (empty($password)) {
		header("Location: ../register.php?error=Password is required&$user_data");
	} else if (empty($sname)) {
		header("Location: ../register.php?error=Surname is required&$user_data");
	} else if (empty($lname)) {
		header("Location: ../register.php?error=lname is required&$user_data");
	} else if (empty($student_id)) {
		header("Location: ../register.php?error=Student ID is required&$user_data");
	} else {
		$sql = "INSERT INTO users(student_id, email, password, sname, lname, tel, stype) 
               VALUES('$student_id', '$email', '$password', '$sname', '$lname', '$tel', '$option')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			header("Location: ../index.php?success_create=successfully created");
		} else {
			header("Location: ../register.php?error=unknown error occurred&$user_data");
		}
	}
}


echo '
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';
