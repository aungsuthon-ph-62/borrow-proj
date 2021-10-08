<?php include("resource/env/header.php") ?>

<body class="bg-primary">
    <div class="container d-flex justify-content-center align-items-center p-5">
        <form class="bg-light border shadow p-5 rounded" action="php/register.php" method="post">
            <div class="my-4">
                <h4 class="display-4 text-center">เข้าสู่ระบบ</h4>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fs-5">
                    <li class="breadcrumb-item active">Login</li>
                </ol>
            </nav>

            <hr class="my-4">

            <?php if (isset($_GET['success_create'])) { ?>
                <?php
                echo "<script>";
                echo "
						Swal.fire({
							icon: 'success',
							title: 'Create Success!',
							showConfirmButton: false,
							timer: 2500
						})
					";
                echo "</script>";
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $_GET['success_create']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class=" form-group mb-4">
                        <label for="price">อีเมลล์</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($_GET['email'])) {
                                                                                                    echo ($_GET['email']);
                                                                                                } ?>" placeholder="กรอกอีเมลล์">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group mb-4">
                        <label for="quantity">พาสเวิร์ด</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php if (isset($_GET['password'])) {
                                                                                                                echo ($_GET['password']);
                                                                                                            } ?>" placeholder="กรอกพาสเวิร์ด">
                    </div>
                </div>
            </div>

            <div class="my-4">
                <button type="submit" class="btn btn-success" name="login"><i class="fas fa-plus"></i> ล็อกอิน!</button>
                <a href="register.php" class="btn btn-info text-light"> <i class="fas fa-arrow-left"></i> สมัครสมาชิก</a>
            </div>
        </form>

</body>

</html>