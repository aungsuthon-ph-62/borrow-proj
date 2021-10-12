<meta charset="UTF-8">
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

    $sql = "SELECT d.id, d.pur_yrs, d.device_no, dc.device_cat_name, 
    d.device_type, d.model, d.status, dr.room, d.img, d.device_cat, d.store_at
    FROM device as d
    INNER JOIN device_category as dc ON dc.id = d.device_cat
    INNER JOIN device_room as dr ON dr.id = d.store_at
    WHERE d.status = 1
    ORDER By d.id DESC";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_assoc($result);
    } else {
        header("Location: /borrow-proj/admin/admin_borrow.php");
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

    $uid = validate($_SESSION['id']);
    $p_id = validate($_POST['price']);
    $return_date = ($_POST['return_date']);

    if (empty($return_date)) {
        header("Location: /borrow-proj/admin/borrow?id=$id&error=Returndate is empty");
    } else {
        $sql = "INSERT INTO borrow_transaction(device_id, borrower_id, borrow_date, t_approve, return_date, borrow_status) 
               VALUES('$p_id', '$uid', '$date', 0, '$return_date', 0)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: /borrow-proj/admin/admin_borrow?id=$id&success=เพิ่มคำขอสำเร็จ!");
        } else {
            header("Location: /borrow-proj/admin/borrow?id=$id&error=unknown error occurred");
        }
    }
}

echo '
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
';
