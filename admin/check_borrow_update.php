<?php include "source/php/check_borrow_update.php" ?>
<?php include "../resource/env/header.php" ?>

<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center p-5">
        <form class="bg-light border shadow p-5 rounded" action="source/php/check_borrow_update.php" method="post">
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
                    <div class="form-group mb-4">
                        <label for="device_id">รหัสอุปกรณ์ที่ยืม</label>
                        <select class="form-select" aria-label="device_id" name="device_id">
                            <option value="">-----กรุณาเลือก-----</option>
                            <option value="<?= $row['device_id'] ?>" selected><?= $row['device_no'] ?></option>
                            <?php foreach ($sel_result1 as $rows) { ?>
                                <option value="<?php echo $rows['id']; ?>">
                                    <?php echo $rows['device_no']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="borrower_id">รหัสผู้ยืม</label>
                        <select class="form-select" aria-label="borrower_id" name="borrower_id">
                            <option value="">-----กรุณาเลือก-----</option>
                            <option value="<?= $row['borrower_id'] ?>" selected><?= $row['student_id'] ?></option>
                            <?php foreach ($sel_result2 as $rows) { ?>
                                <option value="<?php echo $rows['id']; ?>">
                                    <?php echo $rows['student_id']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="name">วันเดือนปีที่ยืม</label>
                        <input type="date" class="form-control" id="borrw_date" name="borrow_date" value="<?= $row['borrow_date'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="info">วันเดือนปีที่คืน</label>
                        <input type="date" class="form-control" id="return_date" name="return_date" value="<?= $row['return_date'] ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-4">
                        <label for="name">ผู้อนุมัติ</label>
                        <select class="form-select mt-2" aria-label="t_approve" name="t_approve">
                            <option value="">-----กรุณาเลือก-----</option>
                            <option value="<?= $row['t_approve'] ?>" selected><?= $row['t_name'] ?></option>
                            <?php foreach ($sel_result3 as $rows) { ?>
                                <option value="<?php echo $rows['id']; ?>">
                                    <?php echo $rows['t_name']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="info">สถานะ</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="borrow_status" id="borrow_status" value="NULL" <?php if ($row['borrow_status'] == 0) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                        <label class="form-check-label" for="borrow_status">รอตรวจสอบ</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="borrow_status" id="borrow_status" value="1" <?php if ($row['borrow_status'] == 2) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                        <label class="form-check-label" for="borrow_status">คืนแล้ว</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="borrow_status" id="borrow_status" value="1" <?php if ($row['borrow_status'] == 2) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                        <label class="form-check-label" for="borrow_status">ยังไม่คืน</label>
                    </div>
                </div>
            </div>

            <input type="text" name="id" value="<?= $row['b_id'] ?>" hidden>

            <div class="my-4">
                <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check"></i> ยืนยัน</button>
                <a href="check_borrow" class="btn btn-danger"><i class="fas fa-chevron-left"></i> กลับ</a>
            </div>

        </form>
    </div>
</body>

</html>