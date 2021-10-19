<?php

include "connect_db.php";

$sql = "SELECT d.id, d.pur_yrs, d.device_no, dc.device_cat_name, d.device_type, d.model, d.status, dr.room, d.img
FROM device as d
INNER JOIN device_category as dc ON dc.id = d.device_cat
INNER JOIN device_room as dr ON dr.id = d.store_at
WHERE d.status = 1
ORDER By d.id DESC";

$result = mysqli_query($conn, $sql);

$id = $_SESSION['id'];

$sql_count = "SELECT COUNT(b_id) AS count 
FROM borrow_transaction WHERE borrow_status = '0' AND borrower_id = '$id'";

$result_count = mysqli_query($conn, $sql_count);

$sql_count_approved = "SELECT COUNT(b_id) AS count 
FROM borrow_transaction WHERE borrow_status = '2' AND borrower_id = '$id'";

$result_count_approved = mysqli_query($conn, $sql_count_approved);

$sql_count_returned = "SELECT COUNT(b_id) AS count 
FROM borrow_transaction WHERE borrow_status = '1' AND borrower_id = '$id'";

$result_count_returned = mysqli_query($conn, $sql_count_returned);

