<?php

include "conn_db.php";

$q = "SELECT d.device_no, st.student_id, b.borrow_date, t.t_name, b.return_date, b.borrow_status
FROM borrow_transaction as b
INNER JOIN device as d ON d.id = b.device_id
INNER JOIN student as st ON st.id = b.borrower_id
INNER JOIN teacher as t ON t.id = b.t_approve
ORDER BY b.b_id DESC";
$result = mysqli_query($conn, $q);

$sql = "SELECT d.id, d.pur_yrs, d.device_no, dc.device_cat_name, d.device_type, d.model, d.status, dr.room, d.img
FROM device as d
INNER JOIN device_category as dc ON dc.id = d.device_cat
INNER JOIN device_room as dr ON dr.id = d.store_at
ORDER By d.id DESC";

$device_result = mysqli_query($conn, $sql);
