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

    $sql = "SELECT * FROM device_room WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: /borrow-proj/admin/manage_device-room?error=เกิดข้อผิดพลาด!");
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

    $room = validate($_POST['room']);
	$uid = validate($_POST['uid']);

    

    if (empty($room)) {
		header("Location: /borrow-proj/admin/manage_device-room_update?id=$uid&error=กรุณากรอกชื่อ");
	} else {
        $sql_update = "UPDATE device_room 
        SET room='$room' WHERE id = $uid";
        $result_update = mysqli_query($conn, $sql_update);
        if ($result_update) {
            header("Location: /borrow-proj/admin/manage_device-room?success=อัพเดตข้อมูลสำเร็จ!");
        } else {
            header("Location: /borrow-proj/admin/manage_device-room_update?id=$uid&error=unknown error occurred");
        }
    }
} else {
    header("Location: /borrow-proj/admin/manage_device-room?error=เกิดข้อผิดพลาด!");
}

echo '
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';
