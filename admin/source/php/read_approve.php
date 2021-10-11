<?php  

include "conn_db.php";

$q = "SELECT b.b_id, d.device_no, s.student_id, b.borrow_date, b.return_date, b.borrow_status, t.t_name
FROM borrow_transaction as b
INNER JOIN device as d ON d.id = b.device_id
INNER JOIN student as s ON s.id = b.borrower_id
INNER JOIN teacher as t ON t.id = b.t_approve
WHERE b.borrow_status = 0
ORDER BY b.b_id DESC";

$result = mysqli_query($conn, $q);