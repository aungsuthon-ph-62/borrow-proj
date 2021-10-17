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

    $sql = "SELECT b.b_id, b.device_id, d.device_no, b.borrower_id, 
    st.student_id, b.borrow_date, b.return_date, b.borrow_status, b.t_approve, t.t_name
    FROM borrow_transaction as b
    INNER JOIN device as d ON d.id = b.device_id
    INNER JOIN student as st ON st.id = b.borrower_id
    INNER JOIN teacher as t ON t.id = b.t_approve
    WHERE b.b_id = $id";
    $result = mysqli_query($conn, $sql);

    $sql1 = "SELECT * FROM device";
    $sel_result1 = mysqli_query($conn, $sql1);

    $sql2 = "SELECT * FROM student";
    $sel_result2 = mysqli_query($conn, $sql2);

    $sql3 = "SELECT * FROM teacher";
    $sel_result3 = mysqli_query($conn, $sql3);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: /borrow-proj/admin/check_borrow_update?error=เกิดข้อผิดพลาด!");
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

    $id = validate($_POST['id']);
    $device_id = validate($_POST['device_id']);
    $borrower_id = validate($_POST['borrower_id']);
    $borrow_date = validate($_POST['borrow_date']);
    $return_date = validate($_POST['return_date']);
    $borrow_status = validate($_POST['borrow_status']);
    $t_approve = validate($_POST['t_approve']);



    if (empty($device_id)) {
        header("Location: /borrow-proj/admin/check_borrow_update?id=$id&error=กรุณาใส่ข้อมูลสถานะ");
    } elseif (empty($borrower_id)) {
        header("Location: /borrow-proj/admin/check_borrow_update?id=$id&error=กรุณากรอกข้อมูลรหัสผู้ยืม");
    } elseif (empty($borrow_date)) {
        header("Location: /borrow-proj/admin/check_borrow_update?id=$id&error=กรุณากรอกข้อมูลวันที่ยืม");
    } elseif (empty($return_date)) {
        header("Location: /borrow-proj/admin/check_borrow_update?id=$id&error=กรุณากรอกข้อมูลวันที่คืน");
    } elseif (empty($borrow_status)) {
        header("Location: /borrow-proj/admin/check_borrow_update?id=$id&error=กรุณากรอกข้อมูลสถานะการยืม");
    } elseif (empty($t_approve)) {
        header("Location: /borrow-proj/admin/check_borrow_update?id=$id&error=กรุณากรอกข้อมูลผู้อนุมัติ");
    } else {
        $sql_update = "UPDATE borrow_transaction 
        SET device_id='$device_id' ,borrower_id='$borrower_id' ,borrow_date='$borrow_date' ,return_date='$return_date' ,t_approve='$t_approve' ,borrow_status='$borrow_status' WHERE b_id = $id";
        $result_update = mysqli_query($conn, $sql_update);
        if ($result_update) {
            header("Location: /borrow-proj/admin/check_borrow?success=แก้ไขรายการสำเร็จ!");
        } else {
            header("Location: /borrow-proj/admin/check_borrow_update?id=$id&error=unknown error occurred");
        }
    }
} else {
    header("Location: /borrow-proj/admin/check_borrow?error=เกิดข้อผิดพลาด");
}

echo '
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';

