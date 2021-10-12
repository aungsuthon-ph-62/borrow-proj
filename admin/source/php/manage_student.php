<meta charset="UTF-8">

<?php  

include "conn_db.php";

$sql = "SELECT * FROM student";

$result = mysqli_query($conn, $sql);


if (isset($_POST['create'])) {
	include "../db_conn.php";
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$name = validate($_POST['name']);
	$price = validate($_POST['price']);
	$info = validate($_POST['info']);
	$quantity = $_POST['quantity'];
	
	if (isset($_POST['fileupload'])) {
        $fileupload = $_POST['filepload'];
    } else {
        $fileupload = '';
    }

	$user_data = 'name='.$name.'&price='.$price.'&info='.$info.'&quantity='.$quantity;

	date_default_timezone_set('Asia/Bangkok');
	$date = date("Ymd");

	$numrand = (mt_rand());

	$upload = $_FILES['fileupload'];

	if ($upload <> '') {
		$path = "../upload/";

		$type = strchr($_FILES['fileupload'] ['name'], '.');

		$newname = $date.$numrand.$type;
		$path_copy = $path.$newname;
		$path_link = "fileupload/".$newname;

		move_uploaded_file($_FILES['fileupload'] ['tmp_name'], $path_copy);

	}

	if (empty($name)) {
		header("Location: ../create.php?error=Name is required&$user_data");
	} else if (empty($price)) {
		header("Location: ../create.php?error=price is required&$user_data");
	} else if (empty($info)) {
		header("Location: ../create.php?error=info is required&$user_data");
	} else if (empty($quantity)) {
		header("Location: ../create.php?error=quantity is required&$user_data");
	} else {
		$sql = "INSERT INTO users(name, price, info, fileupload, quantity) 
               VALUES('$name', '$price', '$info', '$newname', '$quantity')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			header("Location: ../index.php?success_create=successfully created");
		} else {
			header("Location: ../create.php?error=unknown error occurred&$user_data");
		}
	}
}

echo '
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';

