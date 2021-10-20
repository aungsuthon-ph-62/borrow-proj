<?php

if (isset($_GET['id'])) {
    include "conn_db.php";

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "SELECT * FROM student WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: ../../manage_student?error=เกิดข้อผิดพลาด!");
    }

} else if (isset($_POST['submit'])) {
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
	$uid = validate($_POST['uid']);

    

    if (empty($sname)) {
		header("Location: ../../update_manage_student?id=$uid&error=กรุณากรอกชื่อจริง");
	} else if (empty($lname)) {
		header("Location: ../../update_manage_student?id=$uid&error=กรุณากรอกนามสกุล");
	} else if (empty($email)) {
		header("Location: ../../update_manage_student?id=$uid&error=กรุณากรอกอีเมลล์");
	} else if (empty($password)) {
		header("Location: ../../update_manage_student?id=$uid&error=กรุณากรอกพาสเวิร์ด");
	} else if (empty($tel)) {
		header("Location: ../../update_manage_student?id=$uid&error=กรุณากรอกเบอร์โทรศัพท์");
	} else if (empty($stype)) {
		header("Location: ../../update_manage_student?id=$uid&error=กรุณากรอกชั้นปี");
	} else if (empty($student_id)) {
		header("Location: ../../update_manage_student?id=$uid&error=กรุณากรอกรหัสนักศึกษา");
	} else if (empty($status)) {
		header("Location: ../../update_manage_student?id=$uid&error=กรุณากรอกสถานะ");
	} else {
        $sql_update = "UPDATE student 
        SET student_id='$student_id', email='$email', password='$password', 
        sname='$sname', lname='$lname', tel='$tel', stype='$stype', status='$status' 
        WHERE id = $uid";
        $result_update = mysqli_query($conn, $sql_update);
        if ($result_update) {
            header("Location: ../../manage_student?success=อัพเดตข้อมูลสำเร็จ!");
        } else {
            header("Location: ../../update_manage_student?id=$uid&error=unknown error occurred");
        }
    }
} else {
    header("Location: ../../manage_student?error=เกิดข้อผิดพลาด!");
}

echo '
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';
