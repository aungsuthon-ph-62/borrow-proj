<?php include "php/read.php"; ?>
<?php include "resource/env/header.php"; ?>

<?php 

    session_start();

    if (!isset($_SESSION['sname'])) {
        $_SESSION['msg'] = "คุณต้องล็อกอินก่อน!!!";
        header('location: index.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['sname']);
        header('location: index.php');
    }


?>


<body>
    <?php include "resource/env/navbar.php"; ?>

    <div class="container">
        <!-- Notify msg -->
        <?php if(isset($_SESSION['success'])) : ?>
            <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
					<?php echo $_SESSION['success']; ?>
					<?php unset($_SESSION['success']); ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
        <?php endif ?>

        <div class="my-4">
            <h4 class="display-4 text-center">ระบบสารสนเทศเพื่อจัดการข้อมูลวัสดุและครุภัณฑ์ Lucky</h4>
        </div>

        <div class="link-right my-4">
            <a href="create.php" class="btn btn-info text-white"><i class="fas fa-plus"></i> ยืม</a>
        </div>
        <?php if (mysqli_num_rows($result)) { ?>
            <div class="table-responsive">
                <table class="table  table-striped table-hover border border-dark border-3 rounded shadow">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-center">ลำดับ</th>
                            <th scope="col" class="text-center">ปีจัดซื้อ</th>
                            <th scope="col" class="text-center">หมายเลขวัสดุ/ครุภัณฑ์</th>
                            <th scope="col" class="text-center">ลักษณะอุปกรณ์</th>
                            <th scope="col" class="text-center">ประเภทอุปกรณ์วัสดุ</th>
                            <th scope="col" class="text-center">ชื่อรุ่น</th>
                            <th scope="col" class="text-center">สถานะอุปกรณ์</th>
                            <th scope="col" class="text-center">จัดเก็บที่</th>
                            <th scope="col" class="text-center">รูปภาพ</th>
                            <th scope="col" class="text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                        <?php
                        $i = 0;
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $i++;
                        ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td class="text-center"><?= $rows['pur_yrs'] ?></td>
                                <td class="text-center"><?= $rows['device_no'] ?></td>
                                <td class="text-center"><?php echo $rows['device_cat_name']; ?></td>
                                <td class="text-center">
                                <?php
                                    $r = $rows['device_type'];
                                    if ($r == 1) {
                                        echo "วัสดุ";
                                    } elseif ($r == 2) {
                                        echo "ครุภัณฑ์";
                                    } else {
                                        echo "โปรดแก้ไขข้อมูล";
                                    }
                                    ?>
                                </td>
                                <td class="text-center"><?php echo $rows['model']; ?></td>
                                <td class="text-center">
                                    <?php
                                    $r = $rows['status'];
                                    if ($r == 0) {
                                        echo "โปรดแก้ไขข้อมูล";
                                    } elseif ($r == 2) {
                                        echo "ว่าง";
                                    } elseif ($r == 2) {
                                        echo "ไม่ว่าง";
                                    } elseif ($r == 3) {
                                        echo "ชำรุด";
                                    } else {
                                        echo "อื่นๆ";
                                    }
                                    ?>
                                </td>
                                <td class="text-center"><?php echo $rows['room']; ?></td>
                                <td class="text-center"><?php echo $rows['img']; ?></td>
                                <td class="text-center">
                                    <div class="d-grid gap-2 px-3">
                                        <a href="update.php?id=<?= $rows['id'] ?>" class="btn btn-success btn-md"> <i class="fas fa-edit"></i> Update</a>
                                        <a href="php/delete.php?id=<?= $rows['id'] ?>" class="btn btn-danger btn-md"> <i class="fas fa-minus-circle"></i> Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div>

</body>

</html>
