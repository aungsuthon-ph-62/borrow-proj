<meta charset="UTF-8">

<?php  

include "conn_db.php";

$r_sql = "SELECT * FROM teacher";

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

	$t_name = validate($_POST['t_name']);
	

	if (empty($t_name)) {
		header("Location: ../../manage_teacher_create?error=กรุณากรอกชื่อจริง");
	} else {
		$c_sql = "INSERT INTO teacher(t_name)
               VALUES('$t_name')";
		$c_result = mysqli_query($conn, $c_sql);
		if ($c_result) {
			header("Location: ../../manage_teacher?success=เพิ่มข้อมูลสำเร็จ!");
		} else {
			header("Location: ../../manage_teacher_create?error=unknown error occurred");
		}
	}
}


echo '
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';

