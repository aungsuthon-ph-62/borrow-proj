<?php

if(isset($_GET['id'])){
	include "conn_db.php";
	 function validate($data){
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	 }
 
	 $id = validate($_GET['id']);
 
	 $sql = "DELETE FROM borrow_transaction
			 WHERE b_id=$id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		  header("Location: /borrow-proj/admin/approve?success_delete=ลบข้อมูลสำเร็จ!");
	}else {
	   header("Location: /borrow-proj/admin/aprove?error=unknown error occurred");
	}
 
 }

 ?>