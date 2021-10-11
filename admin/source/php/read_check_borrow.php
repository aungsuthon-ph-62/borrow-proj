<?php 
include('conn_db.php');

$sql = "SELECT b.b_id, d.device_no, s.student_id, b.borrow_date, b.return_date, t.t_name, b.borrow_status
FROM borrow_transaction as b
INNER JOIN device as d ON d.id = b.device_id
INNER JOIN student as s ON s.id = b.borrower_id
INNER JOIN teacher as t ON t.id = b.t_approve
WHERE b.borrow_status = 1 OR b.borrow_status = 2
ORDER BY b.b_id DESC";

$result = mysqli_query($conn, $sql)

?>