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

    $sql = "SELECT * FROM teacher WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: /borrow-proj/admin/manage_teacher?error=เกิดข้อผิดพลาด!");
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

    $t_name = validate($_POST['t_name']);
	$uid = validate($_POST['uid']);

    

    if (empty($t_name)) {
		header("Location: /borrow-proj/admin/manage_teacher_update?id=$uid&error=กรุณากรอกชื่อ");
	} else {
        $sql_update = "UPDATE teacher 
        SET t_name='$t_name' WHERE id = $uid";
        $result_update = mysqli_query($conn, $sql_update);
        if ($result_update) {
            header("Location: /borrow-proj/admin/manage_teacher?success=อัพเดตข้อมูลสำเร็จ!");
        } else {
            header("Location: /borrow-proj/admin/manage_teacher_update?id=$uid&error=unknown error occurred");
        }
    }
} else {
    header("Location: /borrow-proj/admin/manage_teacher?error=เกิดข้อผิดพลาด!");
}

echo '
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';
