<?php  

include "connect_db.php";

$sql = "SELECT * FROM borrow_transaction";
$sql2 = "SELECT * FROM device";
$q = "SELECT b.b_id, d.device_no, s.student_id, b.borrow_date, t.t_name, b.return_date, b.borrow_status
FROM borrow_transaction as b
INNER JOIN device as d ON d.id = b.device_id
INNER JOIN student as s ON s.id = b.borrower_id
INNER JOIN teacher as t ON t.id = b.t_approve
ORDER BY b.b_id DESC";
$result = mysqli_query($conn, $q);