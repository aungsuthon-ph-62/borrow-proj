<?php include "source/php/check_borrow_update.php" ?>
<?php include "../resource/env/header.php" ?>

<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center p-5">
        <form class="bg-light border shadow p-5 rounded" action="source/php/approve_update.php" method="post">
            <div class="my-4">
                <h4 class="display-4 text-center">ตรวจสอบการยืม/คืนอุปกรณ์</h4>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fs-5">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="login.php">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ตรวจสอบการยืม/คืนอุปกรณ์</li>
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
                        <label for="device_id">รหัสอุปกรณ์ที่ยืม</label>
                        <input type="text" class="form-control" id="device_id" name="device_id" value="<?= $row['device_no'] ?>" disabled>
                        <input type="text" class="form-control" id="device_id" name="device_id" value="<?= $row['device_id'] ?>" hidden>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="quantity">รหัสผู้ยืม</label>
                        <input type="text" class="form-control" id="borrower_id" name="borrower_id" value="<?= $row['student_id'] ?>" disabled>
                        <input type="text" class="form-control" id="borrower_id" name="borrower_id" value="<?= $row['borrower_id'] ?>" hidden>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="name">วันเดือนปีที่ยืม</label>
                        <input type="date" class="form-control" id="borrw_date" name="borrow_date" value="<?= $row['borrow_date'] ?>" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="info">วันเดือนปีที่คืน</label>
                        <input type="date" class="form-control" id="return_date" name="return_date" value="<?= $row['return_date'] ?>" disabled>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-4">
                        <label for="name">ผู้อนุมัติ</label>
                        <select class="form-select mt-2" aria-label="t_approve" name="t_approve">
                            <option value="">-----กรุณาเลือก-----</option>
                            <?php foreach ($sel_result as $rows) { ?>
                                <option value="<?php echo $rows['id']; ?>">
                                    <?php echo $rows['t_name']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="info">สถานะ</label>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="borrow_status" id="borrow_status" value="0" checked>
                            <label class="form-check-label" for="borrow_status">รอตรวจสอบ</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="borrow_status" id="borrow_status" value="2">
                            <label class="form-check-label" for="borrow_status">อนุมัติ</label>
                        </div>
                    </div>
                </div>
            </div>

            <input type="text" name="id" value="<?= $row['b_id'] ?>" hidden>

            <div class="my-4">
                <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check"></i> ยืนยัน</button>
                <a href="approve" class="btn btn-danger"><i class="fas fa-chevron-left"></i> กลับ</a>
            </div>

        </form>
    </div>
</body>

</html>