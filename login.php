<?php
session_start();
?>
<?php include("resource/env/header.php") ?>

<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center p-5">

        <form class="bg-light border shadow p-5 rounded" action="php/login.php" method="post">

            <div class="d-flex justify-content-center align-items-center mb-4">
                <img class="img-fluid me-md-4" src="img/Logoubu.gif" alt="UBU Logo" width="100vh">
                <h4 class="display-4 text-center text-nowrap">เข้าสู่ระบบ</h4>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fs-5">
                    <li class="breadcrumb-item active">Login <i class="fas fa-sign-in-alt"></i></li>
                </ol>
            </nav>

            <hr class="my-4">

            <!-- Notification -->
            <?php include("resource/env/login_notify.php") ?>

            <!-- Input Form -->
            <div class="row">
                <div class="col-sm-12 col-md-12">

                    <div class=" form-group mb-4">
                        <label for="email">อีเมลล์</label>

                        <input type="email" class="form-control" id="email" name="email" placeholder="กรอกอีเมลล์" value="<?php if (isset($_SESSION['inp_email'])) : ?><?php echo ($_SESSION['inp_email']); ?> <?php endif ?>">

                    </div>

                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group mb-4">
                        <label for="password">พาสเวิร์ด</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="กรอกพาสเวิร์ด">
                    </div>
                </div>
            </div>


            <div class="row align-items-center">
                <div class="col-12 col-md-auto my-2">
                    <button type="submit" class="btn btn-success" name="login"><i class="fas fa-lock"></i> ล็อกอิน</button>
                </div>
                <div class="col-12 col-md-auto my-2">
                    <a href="register" class="btn btn-info text-light"><i class="far fa-address-card"></i> สมัครสมาชิก</a>
                </div>
            </div>



        </form>

</body>

</html>