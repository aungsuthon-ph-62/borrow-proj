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

	$sql = "DELETE FROM device
	        WHERE id=$id";
   $result = mysqli_query($conn, $sql);
   if ($result) {
   	  header("Location: ../../add_product_read?success_delete=ลบข้อมูลสำเร็จ!");
   }else {
      header("Location: ../../add_product_read?error=unknown error occurred&$user_data");
   }

}else {
	header("Location: ../../add_product_read");
}