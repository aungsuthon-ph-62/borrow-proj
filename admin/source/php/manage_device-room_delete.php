<?php

if(isset($_GET['id'])){
	include "conn_db.php";
	 function validate($data){
		 $data = trim($data);
		 $data = stripslashes($data);
		 $data = htmlspecialchars($data);
		 return $data;
	 }
 
	 $d_id = validate($_GET['id']);
 
	 $d_sql = "DELETE FROM device_room
			 WHERE id=$d_id";
	$d_result = mysqli_query($conn, $d_sql);
	if ($d_result) {
		  header("Location: /borrow-proj/admin/manage_device-room?success_delete=ลบข้อมูลสำเร็จ!");
	}else {
	   header("Location: /borrow-proj/admin/manage_device-room?error=unknown error occurred del&");
	}
 
 }

 ?>