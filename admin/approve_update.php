<?php include "../resource/env/header.php" ?>

<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center p-5">
        <form class="bg-light border shadow p-5 rounded" action="php/register.php" method="post">
            <div class="my-4">
                <h4 class="display-4 text-center">ตรวจสอบอนุมัติ</h4>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fs-5">
                    <!-- <li class="breadcrumb-item"><a class="text-decoration-none" href="login.php">Login</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register</li> -->
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
                <div class="col-sm-12 col-md-12">
                    <div class=" form-group mb-4">
                        <label for="price">รหัสอุปกรณ์ที่ยืม</label>
                        <input type="int" class="form-control" id="device_id" name="device_id" placeholder="กรอกรหัสอุปกรณ์ที่ยืม" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group mb-4">
                        <label for="quantity">รหัสผู้ยืม</label>
                        <input type="int" class="form-control" id="borrower_id" name="borrower_id" placeholder="กรอกรหัสผู้ยืม" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="name">วันเดือนปีที่ยืม</label>
                        <input type="date" class="form-control" id="borrw_date" name="borrow_date" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="info">วันเดือนปีที่คืน</label>
                        <input type="date" class="form-control" id="return_date" name="return_date" placeholder="กรอกรหัสนักศึกษา" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-4">
                        <label for="name">ผู้อนุมัติ</label>
                        <select class="form-select mt-2" aria-label="t_approve" name="t_approve" required>
                            <option value="1">admin 1</option>
                            <option value="2">admin 2</option>
                            <option value="3">admin 3</option>
                            <option value="4">admin 4</option>
                        </select>
                        <!-- <input type="text" class="form-control" id="t_approve" name="t_approve" placeholder="กรอกนามสกุล" required> -->
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="info">สถานะ</label>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="borrow_status" id="borrow_status" value="0">
                            <label class="form-check-label" for="inlineRadio1">รอตรวจสอบ</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="borrow_status" id="borrow_status" value="1">
                            <label class="form-check-label" for="inlineRadio1">คืนแล้ว</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="borrow_status" id="borrow_status" value="2">
                            <label class="form-check-label" for="inlineRadio1">ยังไม่คืน</label>
                        </div>
                        <!-- <input type="text" class="form-control" id="tel" name="tel" placeholder="กรอกเบอร์โทรศัพท์" required> -->
                    </div>
                </div>
            </div>
            <div class="my-4">
                <button type="submit" class="btn btn-primary" name="register"><i class="fas fa-check"></i> ยืนยัน</button>
                <a href="login" class="btn btn-danger"><i class="fas fa-chevron-left"></i> กลับ</a>
            </div>

        </form>
    </div>
</body>

</html>