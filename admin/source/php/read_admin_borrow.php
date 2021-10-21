<?php

include "conn_db.php";

$sql = "SELECT d.id, d.pur_yrs, d.device_no, dc.device_cat_name, d.device_type, d.model, d.status, dr.room, d.img
FROM device as d
INNER JOIN device_category as dc ON dc.id = d.device_cat
INNER JOIN device_room as dr ON dr.id = d.store_at
WHERE d.status = 1
ORDER By d.id DESC";

$result = mysqli_query($conn, $sql);