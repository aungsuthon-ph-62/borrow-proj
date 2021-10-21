<?php 

include "connect_db.php";

$uid = $_SESSION['id'];

$sql = "SELECT *, t.t_name 
FROM borrow_transaction as b
INNER JOIN teacher as t ON t.id = b.t_approve
WHERE borrower_id = '$uid' AND borrow_status = '2'";

$result = mysqli_query($conn, $sql);