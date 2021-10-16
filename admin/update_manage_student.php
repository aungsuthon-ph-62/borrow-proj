<?php include "source/php/manage_student_update.php" ?>
<?php include "../resource/env/header.php" ?>

<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center p-5">
        <form class="bg-light border shadow p-5 rounded" action="source/php/manage_student_update.php" method="post">
            <div class="my-4">
                <h4 class="display-4 text-center">แก้ไข้ข้อมูลผู้ใช้</h4>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fs-5">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="index">แก้ไข้ข้อมูลผู้ใช้</a></li>
                    <li class="breadcrumb-item active" aria-current="page">แก้ไข้ข้อมูลผู้ใช้</li>
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
                        <label for="email">อีเมลล์</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $row['email'] ?>">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="password">พาสเวิร์ด</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?= $row['password'] ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="sname">ชื่อจริง</label>
                        <input type="text" class="form-control" id="sname" name="sname" value="<?= $row['sname'] ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="lname">นามสกุล</label>
                        <input type="text" class="form-control" id="lname" name="lname" value="<?= $row['lname'] ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="tel">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" id="tel" name="tel" value="<?= $row['tel'] ?>">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="student_id">รหัสนักศึกษา</label>
                        <input type="text" class="form-control" id="student_id" name="student_id" value="<?= $row['student_id'] ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="stype">ชั้นปี</label>
                        <select class="form-control" aria-label="stype" name="stype">
                            <option value="">-----กรุณาเลือก-----</option>
                            <option value="<?= $row['stype'] ?>" selected><?= $row['stype'] ?></option>
                            <option value="ปี 1">ปี 1</option>
                            <option value="ปี 2">ปี 2</option>
                            <option value="ปี 2">ปี 3</option>
                            <option value="ปี 4">ปี 4</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="status">สถานะ</label>
                        <select class="form-control" aria-label="status" name="status">
                            <option value="">-----กรุณาเลือก-----</option>
                            <option value="<?= $row['status'] ?>" selected><?php if($row['status'] == 1) {echo "Member"; }else {echo "Admin";} ?></option>
                            <option value="1">Member</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                </div>
            </div>

            <input type="text" name="uid" value="<?= $row['id'] ?>" hidden>

            <div class="my-2">
                <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check"></i> ยืนยัน</button>
                <a href="manage_student" class="btn btn-danger"><i class="fas fa-chevron-left"></i> กลับ</a>
            </div>

        </form>
    </div>
</body>

</html>