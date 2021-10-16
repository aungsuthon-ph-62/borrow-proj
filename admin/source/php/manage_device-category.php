<meta charset="UTF-8">

<?php  

include "conn_db.php";

$sql = "SELECT * FROM device_category";

$result = mysqli_query($conn, $sql);

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

	$device_cat_name = validate($_POST['device_cat_name']);
	

	if (empty($device_cat_name)) {
		header("Location: /borrow-proj/admin/manage_device-category_create?error=กรุณากรอกชื่อจริง");
	} else {
		$c_sql = "INSERT INTO device_category(device_cat_name)
               VALUES('$device_cat_name')";
		$c_result = mysqli_query($conn, $c_sql);
		if ($c_result) {
			header("Location: /borrow-proj/admin/manage_device-category?success=เพิ่มข้อมูลสำเร็จ!");
		} else {
			header("Location: /borrow-proj/admin/manage_device-category_create?error=unknown error occurred");
		}
	}
}


echo '
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';

