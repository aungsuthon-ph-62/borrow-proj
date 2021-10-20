<?php include "source/php/manage_student.php" ?>
<?php include "../resource/env/header.php" ?>

<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center p-5">
        <form class="bg-light border shadow p-5 rounded" action="source/php/manage_student.php" method="post" enctype="multipart/form-data">
            <div class="my-4">
                <h4 class="display-4 text-center">เพิ่มข้อมูลผู้ใช้</h4>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fs-5">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="index">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">เพิ่มข้อมูลผู้ใช้</li>
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
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="password">พาสเวิร์ด</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="sname">ชื่อจริง</label>
                        <input type="text" class="form-control" id="sname" name="sname">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="lname">นามสกุล</label>
                        <input type="text" class="form-control" id="lname" name="lname">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="tel">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" id="tel" name="tel">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="student_id">รหัสนักศึกษา</label>
                        <input type="text" class="form-control" id="student_id" name="student_id">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="stype">ชั้นปี</label>
                        <select class="form-control" aria-label="stype" name="stype">
                            <option value="">-----กรุณาเลือก-----</option>
                            <option value="ปี 1">ปี 1</option>
                            <option value="ปี 2">ปี 2</option>
                            <option value="ปี 2">ปี 3</option>
                            <option value="ปี 4">ปี 4</option>
                            <option value="ปี 3 ต่อเนื่อง">ปี 3 ต่อเนื่อง</option>
                            <option value="ปี 4 ต่อเนื่อง">ปี 4 ต่อเนื่อง</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="form-group mb-4">
                        <label for="status">สถานะ</label>
                        <select class="form-control" aria-label="status" name="status">
                        <option value="">-----กรุณาเลือก-----</option>
                            <option value="1">Member</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="my-4">
                <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check"></i> ยืนยัน</button>
                <a href="manage_student" class="btn btn-danger"><i class="fas fa-chevron-left"></i> กลับ</a>
            </div>

        </form>
    </div>
</body>

</html>