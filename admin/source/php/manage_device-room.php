<meta charset="UTF-8">

<?php  

include "conn_db.php";

$r_sql = "SELECT * FROM device_room";

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

	$room = validate($_POST['room']);
	

	if (empty($room)) {
		header("Location: /borrow-proj/admin/manage_device-room_create?error=กรุณากรอกชื่อจริง");
	} else {
		$c_sql = "INSERT device_room(room)
               VALUES('$room')";
		$c_result = mysqli_query($conn, $c_sql);
		if ($c_result) {
			header("Location: /borrow-proj/admin/manage_device-room?success=เพิ่มข้อมูลสำเร็จ!");
		} else {
			header("Location: /borrow-proj/admin/manage_device-room_create?error=unknown error occurred");
		}
	}
}