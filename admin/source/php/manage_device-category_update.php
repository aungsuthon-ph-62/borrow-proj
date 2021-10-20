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

    $sql = "SELECT * FROM device_category WHERE b_id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: ../../manage_category-device?error=เกิดข้อผิดพลาด!");
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

    $device_cat_name = validate($_POST['device_cat_name']);
	$uid = validate($_POST['uid']);

    

    if (empty($device_cat_name)) {
		header("Location: ../../manage_device-category_update?id=$uid&error=กรุณากรอกชื่อ");
	} else {
        $sql_update = "UPDATE device_category 
        SET device_cat_name='$device_cat_name' WHERE id = $uid";
        $result_update = mysqli_query($conn, $sql_update);
        if ($result_update) {
            header("Location: ../../manage_device-category?success=อัพเดตข้อมูลสำเร็จ!");
        } else {
            header("Location: ../../manage_device-category_update?id=$uid&error=unknown error occurred");
        }
    }
} else {
    header("Location: ../../manage_device-category?error=เกิดข้อผิดพลาด!");
}

echo '
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';
