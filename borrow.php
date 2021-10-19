<?php
session_start();
if (!$_SESSION['auth']) {
    $_SESSION['msg'] = "คุณต้องเข้าสู่ระบบก่อน!";
    header("location: login");
} else {
    $currentTime = time();
    if ($currentTime > $_SESSION['expire']) {
        session_unset();
        session_destroy();
        header('location: login');
    }
}

include('php/borrow.php');
include('resource/env/main-header.php');
?>


<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">


        <!-- Preloader -->
        <?php include('resource/env/preload.php') ?>
        <!-- ./Preloader -->

        <!-- Navbar -->
        <?php include('resource/env/navbar.php') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include('resource/env/sidebar.php') ?>
        <!-- ./Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content-header">
                <!-- Notify -->
                <?php include('resource/env/login_notify.php') ?>
                <!-- ./Notify -->
                <div class="container">
                    <!-- Default box -->
                    <div class="card shadow shadow-lg">
                        <div class="card-body bg-gradient-dark rounded rounded-lg">
                            <div class="row">
                                <div class="col-12 col-sm-6 p-sm-5">
                                    <div class="text-center">
                                        <h3 class="d-inline-block d-sm-none bg-dark rounded rounded-lg p-2"><b><?= $row['model'] ?></b></h3>
                                    </div>
                                    <div class="col-12 p-5 bg-light rounded">
                                        <?php if (!empty($row['img'])) { ?>
                                            <img src="admin/source/img/store-img/<?php echo $row['img']; ?>" alt="Product Image" class="img-fluid">
                                        <?php } else { ?>
                                            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png" alt="Product Image" class="img-fluid">
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="text-right">
                                        <p># <?= $row['id'] ?></p>
                                    </div>
                                    <h3 class="my-3 d-none d-sm-block bg-dark rounded rounded-lg text-center p-3"><b><?= $row['model'] ?></b></h3>
                                    <hr>
                                    <div class="card">
                                        <div class="card-body bg-dark">
                                            <div class="d-flex justify-content-start">
                                                <div class="pr-5 border-right">
                                                    <h5 class="text-wrap">ลักษณะอุปกรณ์ : </h5>
                                                    <label>
                                                        <?= $row['device_cat_name'] ?>
                                                    </label>
                                                </div>
                                                <div class="pl-5 border-left">
                                                    <h5 class="text-warp">ประเภทอุปกรณ์ : </h5>
                                                    <div>
                                                        <?php
                                                        $stat_r = $row['device_type'];
                                                        $stat_msg = "";
                                                        if ($stat_r == 1) {
                                                        ?>
                                                            <p class="badge bg-lightblue"><?php echo $stat_msg = "วัสดุ"; ?></p>
                                                        <?php } elseif ($stat_r == 2) { ?>
                                                            <p class="badge bg-olive"><?php echo $stat_msg = "ครุภัณฑ์"; ?></p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="bg-gray py-2 px-3 mt-4" style="width: 30vh;">
                                                <ul class="ml-3 mb-0 fa-ul text-light">
                                                    <li class=" text-nowrap"><span class="fa-li"><i class="fas fa-database"></i></span> จัดเก็บที่: <?php echo $row['room'] ?></li>
                                                    <li><span class="fa-li"><i class="fas fa-calendar-alt"></i></span> วันที่จัดซื้อ: <?php echo $row['pur_yrs'] ?></li>
                                                    <li>
                                                        <span class="fa-li">
                                                            <i class="fas fa-question-circle"></i>
                                                        </span>
                                                        สถานะ:
                                                        <?php
                                                        $stat_r = $row['status'];
                                                        $stat_msg = "";
                                                        if ($stat_r == 1) {
                                                        ?>
                                                            <span class="badge badge-success"><?php echo $stat_msg = "ว่าง"; ?></span>
                                                        <?php } elseif ($stat_r == 2) { ?>
                                                            <span class="badge badge-success"><?php echo $stat_msg = "ไม่ว่าง"; ?></span>
                                                        <?php } elseif ($stat_r == 3) { ?>
                                                            <span class="badge badge-success"><?php echo $stat_msg = "ชำรุด"; ?></span>
                                                        <?php } elseif ($stat_r == 4) { ?>
                                                            <span class="badge badge-success"><?php echo $stat_msg = "อื่นๆ"; ?></span>
                                                        <?php } ?>
                                                    </li>
                                                </ul>
                                            </div>

                                            <form class="my-3" action="php/borrow.php" method="POST">
                                                <div class="form-group">
                                                    <label for="input-group" class="font-weight-light">วันที่คืน : </label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text border border-success bg-olive" id="return_date"><i class="fas fa-calendar-alt text-light"></i></span>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <input type="date" class="form-control border border-success" id="return_date" name="return_date">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="text" name="u_id" value="<?= $_SESSION['id'] ?>" hidden>
                                                <input type="text" name="id" value="<?= $row['id'] ?>" hidden>

                                                <button type="submit" name="submit" class="btn btn-lg bg-gradient-info ">
                                                    <i class="fas fa-box-open"></i>
                                                    ยืม
                                                </button>

                                                <a href="index" class="btn btn-lg bg-gradient-danger ">
                                                    <i class="fas fa-arrow-left"></i>
                                                    กลับ
                                                </a>
                                            </form>

                                        </div>
                                    </div>






                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </section>
            <!-- /.content -->
        </div>


        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <?php include('resource/env/sidebar-right.php') ?>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php include('resource/env/footer.php') ?>

    </div>
    <!-- ./wrapper -->

</body>

</html>