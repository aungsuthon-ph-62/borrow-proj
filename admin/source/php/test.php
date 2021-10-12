<meta charset="UTF-8">
<?php

    include "conn_db.php";

    $q = "SELECT * 
    FROM borrow_transaction as b
    INNER JOIN device as d ON d.id = b.device_id
    INNER JOIN student as stu ON stu.id = b.borrower_id
    INNER JOIN teacher as t ON t.id = b.t_approve
    INNER JOIN device_category as dc ON dc.id = d.device_cat
    INNER JOIN device_room as dr ON dr.id = d.store_at";

    $sql2 = "SELECT * FROM device";
    $sel_result = mysqli_query($conn, $sql2);

if (isset($_POST['submit'])) {
	include "conn_db.php";
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$device_id = validate($_POST['device_id']);
	$borrower_id = validate($_POST['borrower_id']);
	$borrow_date = $_POST['borrow_date'];
	$return_date = $_POST['return_date'];
	

	$user_data = 'device_id='.$device_id.'&borrower_id='.$borrower_id.'&borrow_date='.$borrow_date.'&return_date='.$return_date;


	if (empty($device_id)) {
		header("Location: test_add.php?error=device_id is required&$user_data");
	} else if (empty($borrower_id)) {
		header("Location: test_add.php?error=borrower_id is required&$user_data");
	} else if (empty($borrow_date)) {
		header("Location: test_add.php?error=borrow_date is required&$user_data");
	} else if (empty($return_date)) {
		header("Location: test_add.php?error=return_date is required&$user_data");
	} else {
		$sql = "INSERT INTO borrow_transaction(device_id, borrower_id, borrow_date, t_approve, return_date, status) 
               VALUES('$device_id', '$borrower_id', '$borrow_date', 0, '$return_date', 0)";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			header("Location: test_add.php?success=successfully created");
		} else {
			header("Location: test_add.php?error=unknown error occurred&$user_data");
		}
	}
}

echo '
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';