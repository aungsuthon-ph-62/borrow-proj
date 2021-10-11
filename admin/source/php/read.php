<?php  

include "conn_db.php";

$q = "SELECT b.b_id, d.device_no, s.student_id, b.borrow_date, b.return_date, b.borrow_status
FROM borrow_transaction as b
INNER JOIN device as d ON d.id = b.device_id
INNER JOIN student as s ON s.id = b.borrower_id
ORDER BY b.b_id ASC";
$result = mysqli_query($conn, $q);

$sql = "SELECT d.id, d.pur_yrs, d.device_no, dc.device_cat_name, d.device_type, d.model, d.status, dr.room, d.img
FROM device as d
INNER JOIN device_category as dc ON dc.id = d.device_cat
INNER JOIN device_room as dr ON dr.id = d.store_at
ORDER By d.id ASC";

$device_result = mysqli_query($conn, $sql);

