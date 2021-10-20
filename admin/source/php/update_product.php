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

    $sql = "SELECT d.id, d.pur_yrs, d.device_no, dc.device_cat_name, d.device_type, d.model, d.status, dr.room, d.img, d.device_cat, d.store_at
    FROM device as d
    INNER JOIN device_category as dc ON dc.id = d.device_cat
    INNER JOIN device_room as dr ON dr.id = d.store_at
    WHERE d.id=$id";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: ../../add_product_read?error=เกิดข้อผิดพลาด!");
    }

    $sql2 = "SELECT * FROM device_category";
    $sel_result2 = mysqli_query($conn, $sql2);

    $sql3 = "SELECT * FROM device_room";
    $sel_result3 = mysqli_query($conn, $sql3);
} else if (isset($_POST['submit'])) {
    include "conn_db.php";
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
    $p_id = validate($_POST['p_id']);

    if (isset($_POST['img'])) {
        $img = $_POST['img'];
    } else {
        $img = '';
    }

    date_default_timezone_set('Asia/Bangkok');
    $date = date("d-m-Y");

    $numrand = (mt_rand());

    $upload = $_FILES['img'];

    $newname = $_POST['hdn_img'];

    if (!empty($_FILES['img']['name'])) {
        $path = "../img/store-img/";

        $type = strchr($_FILES['img']['name'], '.');

        if (!empty($newname)) {
            unlink($path . $newname);
        }

        $newname = $date . $numrand . $type;
        $path_copy = $path . $newname;
        $path_link = "img/" . $newname;

        move_uploaded_file($_FILES['img']['tmp_name'], $path_copy);
    }

    $user_data = 'pur_yrs=' . $pur_yrs . '&device_no=' . $device_no . '&device_cat=' . $device_cat
        . '&device_type=' . $device_type . '&status=' . $status . '&store_at=' . $store_at . '&model=' . $model;

    if (empty($pur_yrs)) {
        header("Location: ../../update_product?id=$p_id&error=กรุณากรอกปีที่จัดซื้อ&$user_data");
    } else if (empty($device_no)) {
        header("Location: ../../update_product?id=$p_id&error=กรุณากรอกรหัสอุปกรณ์&$user_data");
    } else if (empty($device_cat)) {
        header("Location: ../../update_product?id=$p_id&error=กรุณาเลือกลักษณะอุปกรณ์&$user_data");
    } else if (empty($device_type)) {
        header("Location: ../../update_product?id=$p_id&error=กรุณาเลือกประเภทอุปกรณ์&$user_data");
    } else if (empty($status)) {
        header("Location: ../../update_product?id=$p_id&error=กรุณาเลือกสถานะอุปกรณ์&$user_data");
    } else if (empty($store_at)) {
        header("Location: ../../update_product?id=$p_id&error=กรุณาเลือกห้องที่จัดเก็บอุปกรณ์&$user_data");
    } else if (empty($model)) {
        header("Location: ../../update_product?id=$p_id&error=กรุณากรอกชื่ออุปกรณ์&$user_data");
    } else {
        $sql_update = "UPDATE device SET pur_yrs='$pur_yrs', device_no='$device_no', device_cat='$device_cat', 
       device_type='$device_type', status='$status', store_at='$store_at', model='$model', img='$newname' WHERE id = $p_id";
        $result_update = mysqli_query($conn, $sql_update);
        if ($result_update) {
            header("Location: ../../add_product_read?success=อัพเดตข้อมูลสำเร็จ!");
        } else {
            header("Location: ../../update_product?id=$p_id&error=unknown error occurred&$user_data");
        }
    }
} else {
    header("Location: ../../add_product_read?error=เกิดข้อผิดพลาด!");
}

echo '
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';
