<?php  

include "conn_db.php";

$q = "SELECT b.b_id, d.device_no, b.device_id, b.borrower_id, st.student_id, st.sname, st.lname, b.borrow_date, b.return_date, b.borrow_status, d.img
FROM borrow_transaction as b
INNER JOIN device as d ON d.id = b.device_id
INNER JOIN student as st ON st.id = b.borrower_id
WHERE b.borrow_status = 0
ORDER BY b.b_id DESC";

$result = mysqli_query($conn, $q);