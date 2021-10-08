<?php include "php/register.php" ?>
<?php include "resource/env/header.php" ?>

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

            <?php if (isset($_GET['error'])) { ?>
                <?php
                echo "<script>";
                echo "
					 Swal.fire({
						 icon: 'error',
						 title: 'Oops...!',
						 text: 'Something went wrong!',
						 showConfirmButton: true,
						 timer: '2500'
					 })
				 ";
                echo "</script>";
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_GET['error']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class=" form-group mb-4">
                        <label for="price">อีเมลล์</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($_GET['email'])) {
                                                                                                    echo ($_GET['email']);
                                                                                                } ?>" placeholder="กรอกอีเมลล์">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group mb-4">
                        <label for="quantity">พาสเวิร์ด</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php if (isset($_GET['password'])) {
                                                                                                                echo ($_GET['password']);
                                                                                                            } ?>" placeholder="กรอกพาสเวิร์ด">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="name">ชื่อจริง</label>
                        <input type="text" class="form-control" id="sname" name="sname" value="<?php if (isset($_GET['sname'])) {
                                                                                                    echo ($_GET['sname']);
                                                                                                } ?>" placeholder="กรอกชื่อจริง">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="name">นามสกุล</label>
                        <input type="text" class="form-control" id="lname" name="lname" value="<?php if (isset($_GET['lname'])) {
                                                                                                    echo ($_GET['lname']);
                                                                                                } ?>" placeholder="กรอกนามสกุล">
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="info">รหัสนักศึกษา</label>
                        <input type="text" class="form-control" id="student_id" name="student_id" value="<?php if (isset($_GET['student_id'])) {
                                                                                                                echo ($_GET['student_id']);
                                                                                                            }
                                                                                                            ?>" placeholder="กรอกรหัสนักศึกษา">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="info">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" id="tel" name="tel" value="<?php if (isset($_GET['tel'])) {
                                                                                                echo ($_GET['tel']);
                                                                                            }
                                                                                            ?>" placeholder="กรอกเบอร์โทรศัพท์">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <select class="form-select" aria-label="sel-type" name="sel-type">
                        <option selected>กรุณาเลือกชั้นปี</option>
                        <option value="1">ปี 1</option>
                        <option value="2">ปี 2</option>
                        <option value="3">ปี 3</option>
                        <option value="4">ปี 4</option>
                    </select>
                </div>
            </div>

            <div class="my-4">
                <button type="submit" class="btn btn-primary" name="register"><i class="fas fa-plus"></i> Create</button>
                <a href="index.php" class="btn btn-warning"> <i class="fas fa-arrow-left"></i> Back</a>
            </div>

        </form>
    </div>
</body>

</html>