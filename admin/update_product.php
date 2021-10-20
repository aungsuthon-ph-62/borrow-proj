<?php include "source/php/update_product.php" ?>
<?php include "../resource/env/header.php" ?>

<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center p-5">
        <form class="bg-light border shadow p-5 rounded" action="source/php/update_product.php" method="post" enctype="multipart/form-data">
            <div class="my-4">
                <h4 class="display-4 text-center">เพิ่มพัสดุ/ครุภัณฑ์</h4>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fs-5">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="index">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">เพิ่มพัสดุ&ครุภัณฑ์</li>
                </ol>
            </nav>

            <hr class="my-4">

            <?php if (isset($_GET['error'])) : ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...!',
                        text: '<?php echo $_GET['error']; ?>',
                        showConfirmButton: true,
                        timer: '2500'
                    })
                </script>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_GET['error']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class=" form-group mb-4">
                        <label for="pur_yrs">ปีที่จัดซื้อ</label>
                        <input type="date" class="form-control" id="pur_yrs" name="pur_yrs" value="<?= $row['pur_yrs']; ?>">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="device_no">หมายเลขพัสดุ/ครุภัณฑ์</label>
                        <input type="text" class="form-control" id="device_no" name="device_no" value="<?= $row['device_no']; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="device_cat">ลักษะณะอุปกรณ์</label>
                        <select class="form-control" aria-label="device_cat" name="device_cat">
                            <option value="">--กรุณาเลือก--</option>
                            <option value="<?= $row['device_cat']; ?>" selected><?= $row['device_cat_name'] ?></option>
                            <?php foreach ($sel_result2 as $rows) { ?>
                                <option value="<?php echo $rows['id']; ?>">
                                    <?php echo $rows['device_cat_name']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="device_type">ประเภทอุปกรณ์</label>
                        <select class="form-control" aria-label="device_type" name="device_type">
                            <option value="">--กรุณาเลือก--</option>
                            <?php if ((isset($row['device_type']))) { ?>
                                <?php if ($row['device_type'] == 1) { ?>
                                    <option value="<?= $row['device_type'] ?>" selected>วัสดุ</option>
                                <?php } else { ?>
                                    <option value="<?= $row['device_type'] ?>" selected>ครุภัณฑ์</option>
                                <?php } ?>
                            <?php } ?>
                            <option value="1">วัสดุ</option>
                            <option value="2">ครุภัณฑ์</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="status">สถานะ</label>
                        <select class="form-control" aria-label="status" name="status">
                            <option value="">--กรุณาเลือก--</option>
                            <?php if ((isset($row['status']))) { ?>
                                <?php if ($row['status'] == 1) { ?>
                                    <option value="<?= $row['status'] ?>" selected>ว่าง</option>
                                <?php } elseif ($row['status'] == 2) { ?>
                                    <option value="<?= $row['status'] ?>" selected>ไม่ว่าง</option>
                                <?php } elseif ($row['status'] == 3) { ?>
                                    <option value="<?= $row['status'] ?>" selected>ชำรุด</option>
                                <?php } elseif ($row['status'] == 4) { ?>
                                    <option value="<?= $row['status'] ?>" selected>อื่นๆ</option>
                                <?php } ?>
                            <?php } ?>
                            <option value="1">ว่าง</option>
                            <option value="2">ไม่ว่าง</option>
                            <option value="3">ชำรุด</option>
                            <option value="4">อื่นๆ</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="store_at">จัดเก็บที่</label>
                        <select class="form-control" aria-label="store_at" name="store_at">
                            <option value="">--กรุณาเลือก--</option>
                            <option value="<?= $row['store_at']; ?>" selected><?= $row['room']; ?></option>
                            <?php foreach ($sel_result3 as $rows) { ?>
                                <option value="<?php echo $rows['id']; ?>">
                                    <?php echo $rows['room']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group mb-4">
                        <label for="model">ชื่ออุปกรณ์</label>
                        <input type="text" class="form-control" id="model" name="model" value="<?= $row['model']; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group mb-4">
                        <div class="input-group mb-4">
                            <label for="img">รูปภาพอุปกรณ์</label>
                            <span class="input-group-text"><i class="fas fa-hdd"></i></span>
                            <input type="text" class="form-control" id="img" name="img" value="<?= $row['img']; ?>" readonly>
                        </div>
                        <div class="text-center mb-4">
                            <?php if (!empty($row['img'])) { ?>
                                <img src="source/img/store-img/<?php echo $row['img']; ?>" alt="Product Image" class="img-fluid" width="100vh">
                            <?php } else { ?>
                                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png" alt="Product Image" class="img-fluid">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group mb-4">
                        <label for="img" class="form-label">แก้ไขรูปภาพ</label>
                        <input class="form-control" type="file" id="img" name="img" value="<?= $row['img']; ?>">
                    </div>
                </div>
            </div>

            <input type="hidden" name="hdn_img" value="<?= $row['img']; ?>">
            <input type="text" name="p_id" value="<?= $row['id'] ?>" hidden>

            <div class="my-2">
                <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check"></i> ยืนยัน</button>
                <a href="add_product_read" class="btn btn-danger"><i class="fas fa-chevron-left"></i> กลับ</a>
            </div>

        </form>
    </div>
</body>

</html>