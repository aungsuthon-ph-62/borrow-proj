<?php include "source/php/borrow.php" ?>
<?php include "../resource/env/header.php" ?>

<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center p-5">
        <form class="bg-light border shadow p-5 rounded" action="source/php/borrow.php" method="post" enctype="multipart/form-data">
            <div class="my-4">
                <h4 class="display-4 text-center">ยืมวัสดุ/ครุภัณฑ์</h4>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fs-5">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="index">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ยืมวัสดุ/ครุภัณฑ์</li>
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

            <div class="text-center mb-4">
                <?php if (!empty($row['img'])) { ?>
                    <img src="source/img/store-img/<?php echo $row['img']; ?>" alt="Product Image" class="img-fluid" width="100vh">
                <?php } else { ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png" alt="Product Image" class="img-fluid">
                <?php } ?>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class=" form-group mb-4">
                        <label for="pur_yrs">ปีที่จัดซื้อ</label>
                        <input type="date" class="form-control" id="pur_yrs" name="pur_yrs" value="<?= $row['pur_yrs']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="device_no">หมายเลขพัสดุ/ครุภัณฑ์</label>
                        <input type="text" class="form-control" id="device_no" name="device_no" value="<?= $row['device_no']; ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="device_cat">ลักษะณะอุปกรณ์</label>
                        <select class="form-control" aria-label="device_cat" name="device_cat" disabled>
                            <option value="<?= $row['device_cat']; ?>" selected><?= $row['device_cat_name'] ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="device_type">ประเภทอุปกรณ์</label>
                        <select class="form-control" aria-label="device_type" name="device_type" disabled>
                            <option value="<?= $row['device_type']; ?>" selected><?= $row['device_type']; ?></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="status">สถานะ</label>
                        <select class="form-control" aria-label="status" name="status" disabled>
                            <option value="<?= $row['status']; ?>" selected><?= $row['status']; ?></option>
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
                        <select class="form-control" aria-label="store_at" name="store_at" disabled>
                            <option value="<?= $row['store_at']; ?>" selected><?= $row['room']; ?></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group mb-4">
                        <label for="model">ชื่ออุปกรณ์</label>
                        <input type="text" class="form-control" id="model" name="model" value="<?= $row['model']; ?>" disabled>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group mb-4">
                        <label for="return_date">วันที่คืน</label>
                        <input type="date" class="form-control" id="return_date" name="return_date">
                    </div>
                </div>
            </div>



            
            <input type="text" name="id" value="<?= $row['id'] ?>" hidden>

            <div class="my-2">
                <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check"></i> ยืนยัน</button>
                <a href="admin_borrow" class="btn btn-danger"><i class="fas fa-chevron-left"></i> กลับ</a>
            </div>

        </form>
    </div>
</body>

</html>