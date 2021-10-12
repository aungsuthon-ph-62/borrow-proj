<?php  

include "conn_db.php";

$qs = "SELECT d.id, d.pur_yrs, d.device_no ,dc.device_cat_name, d.device_type, d.model, d.status, dr.room, d.img
FROM device as d
INNER JOIN device_category as dc ON dc.id = d.device_cat
INNER JOIN device_room as dr ON dr.id = d.store_at
ORDER BY d.id DESC";

$q = "SELECT * FROM device";
$result = mysqli_query($conn, $qs);

$sql2 = "SELECT * FROM device_category";
$sel_result2 = mysqli_query($conn, $sql2);

$sql3 = "SELECT * FROM device_room";
$sel_result3 = mysqli_query($conn, $sql3);

if (isset($_POST['submit'])) {
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$pur_yrs = validate($_POST['pur_yrs']);
	$device_no = validate($_POST['device_no']);
	$device_cat = validate($_POST['device_cat']);
	$device_type = validate($_POST['device_type']);
	$status = validate($_POST['status']);
	$store_at = validate($_POST['store_at']);
	$model = validate($_POST['model']);
	
	if (isset($_POST['img'])) {
        $img = $_POST['img'];
    } else {
        $img = '';
    }

	$user_data = 'pur_yrs='.$pur_yrs.'&device_no='.$device_no.'&device_cat='.$device_cat
    .'&device_type='.$device_type.'&status='.$status.'&store_at='.$store_at.'&model='.$model;

	date_default_timezone_set('Asia/Bangkok');
	$date = date("d-m-Y");

	$numrand = (mt_rand());

	$upload = $_FILES['img'];

	if ($upload <> '') {
		$path = "../img/store-img/";

		$type = strchr($_FILES['img'] ['name'], '.');

		$newname = $date.$numrand.$type;
		$path_copy = $path.$newname;
		$path_link = "img/".$newname;

		move_uploaded_file($_FILES['img'] ['tmp_name'], $path_copy);
	}

	if (empty($pur_yrs)) {
		header("Location: /borrow-proj/admin/add_product?error=pur_yrs is required&$user_data");
	} else if (empty($device_no)) {
		header("Location: /borrow-proj/admin/add_product?error=device_no is required&$user_data");
	} else if (empty($device_cat)) {
		header("Location: /borrow-proj/admin/add_product?error=device_cat is required&$user_data");
	} else if (empty($device_type)) {
		header("Location: /borrow-proj/admin/add_product?error=device_type is required&$user_data");
	} else if (empty($status)) {
		header("Location: /borrow-proj/admin/add_product?error=status is required&$user_data");
	} else if (empty($store_at)) {
		header("Location: /borrow-proj/admin/add_product?error=store_at is required&$user_data");
	} else if (empty($model)) {
		header("Location: /borrow-proj/admin/add_product?error=model is required&$user_data");
	} else {
		$sql_add = "INSERT INTO device(pur_yrs, device_no, device_cat, device_type, status, store_at, model, img) 
               VALUES('$pur_yrs', '$device_no', '$device_cat', '$device_type', '$status', '$store_at', '$model', '$newname')";
		$result_add = mysqli_query($conn, $sql_add);
		if ($result_add) {
			header("Location: /borrow-proj/admin/add_product_read?success=เพิ่มข้อมูลสำเร็จ!");
		} else {
			header("Location: /borrow-proj/admin/add_product?error=unknown error occurred&$user_data");
		}
	}
}

echo '
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';
