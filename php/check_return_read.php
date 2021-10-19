<?php 

include "connect_db.php";

$uid = $_SESSION['id'];

$sql = "SELECT * FROM borrow_transaction WHERE borrower_id = '$uid' AND borrow_status = '1'";

$result = mysqli_query($conn, $sql);