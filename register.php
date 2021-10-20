<?php 
session_start();
include "resource/env/header.php";
?>

<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center p-5">
        <form class="bg-light border shadow p-5 rounded" action="php/register.php" method="post">
            <div class="my-4">
                <h4 class="display-4 text-center">สมัครสมาชิก</h4>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fs-5">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="login.php">Login</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register</li>
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
                <div class="col-sm-12 col-md-6">
                    <div class=" form-group mb-4">
                        <label for="price">อีเมลล์</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="กรอกอีเมลล์">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group mb-4">
                        <label for="quantity">พาสเวิร์ด</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="กรอกพาสเวิร์ด">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="name">ชื่อจริง</label>
                        <input type="text" class="form-control" id="sname" name="sname" placeholder="กรอกชื่อจริง">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="name">นามสกุล</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="กรอกนามสกุล">
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="info">รหัสนักศึกษา</label>
                        <input type="text" class="form-control" id="student_id" name="student_id" placeholder="กรอกรหัสนักศึกษา">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="info">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" id="tel" name="tel" placeholder="กรอกเบอร์โทรศัพท์">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label for="sel-type">กรุณาเลือกชั้นปี</label>
                    <select class="form-select" aria-label="sel-type" name="sel-type">
                        <option value="ปี 1">ปี 1</option>
                        <option value="ปี 2">ปี 2</option>
                        <option value="ปี 3">ปี 3</option>
                        <option value="ปี 4">ปี 4</option>
                        <option value="ปี 3 ต่อเนื่อง">ปี 3 ต่อเนื่อง</option>
                        <option value="ปี 4 ต่อเนื่อง">ปี 4 ต่อเนื่อง</option>
                    </select>
                </div>
            </div>

            <div class="my-4">
                <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check"></i> สร้าง</button>
                <a href="login" class="btn btn-danger"><i class="fas fa-chevron-left"></i> กลับ</a>
            </div>
        </form>
    </div>
</body>

</html>