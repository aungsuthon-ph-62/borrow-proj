<?php

session_start();

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

    $sql = "SELECT d.id, d.pur_yrs, d.device_no, d.device_cat, dc.device_cat_name, d.device_type, d.model, d.status, d.store_at, dr.room, d.img
    FROM device as d
    INNER JOIN device_category as dc ON dc.id = d.device_cat
    INNER JOIN device_room as dr ON dr.id = d.store_at 
    WHERE d.id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: ../../admin_borrow?error=เกิดข้อผิดพลาด!");
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

    $device_id = validate($_POST['id']);
    $borrower_id = validate($_SESSION['id']);
    $return_date = validate($_POST['return_date']);

    date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d");

    $borrow_date = $date;

    $t_approve = "0";

    if (empty($return_date)) {
        header("Location: ../../borrow?id=$device_id&error=กรุณาเลือกวันคืนอุปกรณ์");
    } else {
        $sql = "INSERT INTO borrow_transaction(device_id, borrower_id, borrow_date, t_approve, return_date, borrow_status)
        VALUES('$device_id', '$borrower_id', '$borrow_date', '$t_approve', '$return_date', '0')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: ../../admin_borrow?success=เพิ่มคำขอสำเร็จ! กรุณารอการยืนยันข้อมูล");
        } else {
            header("Location: ../../borrow?id=$device_id&error=unknown error occurred");
        }
    }
} else {
    header("Location: ../../admin_borrow?error=เกิดข้อผิดพลาด!");
}
