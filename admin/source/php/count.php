<?php 

include "conn_db.php";

$q = "SELECT COUNT(id) AS count_id FROM device";

$count_result = mysqli_query($conn, $q);

$q2 = "SELECT COUNT(b_id) AS count_approve 
FROM borrow_transaction WHERE borrow_status = '0'";

$count_approve_result = mysqli_query($conn, $q2);

$q3 = "SELECT COUNT(b_id) AS count_approve 
FROM borrow_transaction WHERE borrow_status = '0'";

$count_approve_result = mysqli_query($conn, $q3);