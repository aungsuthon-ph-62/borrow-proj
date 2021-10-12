<?php include "source/php/admin_borrow.php"; ?>
<?php include "../resource/env/header.php" ?>

<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center p-5">
        <form class="bg-light border shadow p-5 rounded" action="source/php/admin_borrow.php" method="post" enctype="multipart/form-data">
            <div class="my-4">
                <h4 class="display-4 text-center">รายละเอียดการยืมพัสดุ&ครุภัณฑ์</h4>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fs-5">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="/borrow-proj/admin/index">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a class="text-decoration-none" href="/borrow-proj/admin/admin_borrow">Borrow</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php if (isset($_GET['id'])) { ?>
                            <?php echo $_GET['id'] ?>
                        <?php } ?>
                    </li>
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
                <div class="col-md-6 col-lg-4">
                    <div class=" form-group mb-4">
                        <label for="device_no">หมายเลขพัสดุ/ครุภัณฑ์</label>
                        <input type="text" class="form-control" id="device_no" name="device_no" value="<?= $rows['device_no'] ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class=" form-group mb-4">
                        <label for="model">ชื่อพัสดุ/อุปกรณ์</label>
                        <input type="text" class="form-control" id="model" name="model" value="<?= $rows['model'] ?>" readonly>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="form-group mb-4">
                        <label for="pur_yrs">วันที่จัดซื้อพัสดุ/ครุภัณฑ์</label>
                        <input type="date" class="form-control" id="pur_yrs" name="pur_yrs" value="<?= $rows['pur_yrs'] ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="form-group mb-4">
                        <label for="device_cat">ลักษณะพัสดุ/ครุภัณฑ์</label>
                        <input type="text" class="form-control" id="device_cat" name="device_cat" value="<?= $rows['device_cat_name'] ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group mb-4">
                        <label for="device_type">ประเภทอุปกรณ์</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="device_type" aria-describedby="device_type" value="<?= $rows['device_type'] ?>" readonly>
                            <span class="input-group-text" id="device_type">
                                <?php
                                $stat_r = $rows['device_type'];
                                $stat_msg = "";
                                if ($stat_r == 1) {
                                ?>
                                    <?php echo $stat_msg = "วัสดุ"; ?>
                                <?php } elseif ($stat_r == 2) { ?>
                                    <?php echo $stat_msg = "ครุภัณฑ์"; ?>
                                <?php } ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="form-group mb-4">
                        <label for="device_cat">จัดเก็บที่</label>
                        <input type="text" class="form-control" id="device_cat" name="device_cat" value="<?= $rows['room'] ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-4">
                        <?php if (!empty($rows['img'])) { ?>
                            <div class="text-center">
                                <img src="source/img/store-img/<?php $rows['img']?>" alt="Product Image" class="img-fluid" width="100vh">
                            </div>
                        <? } else { ?>
                            <div class="text-center">
                                <img src="https://cdn-icons-png.flaticon.com/512/2945/2945609.png" alt="Product Image" class="img-fluid" width="100vh">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-4">
                        <label for="return_date">วันที่คืน</label>
                        <input type="date" class="form-control" id="return_date" name="return_date">
                    </div>
                </div>
            </div>

            <input type="text" name="id" value="<?= $rows['id'] ?>" hidden>

            <div class="my-4">
                <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check"></i> ยืนยัน</button>
                <a href="/borrow-proj/admin/admin_borrow" class="btn btn-danger"><i class="fas fa-chevron-left"></i> กลับ</a>
            </div>

        </form>
    </div>
</body>

</html>