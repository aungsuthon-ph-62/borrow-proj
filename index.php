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

include('php/read.php');
include('resource/env/main-header.php');
?>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper mb-sm-5">
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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <?php include('resource/env/login_notify.php'); ?>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">ระบบสารสนเทศเพื่อจัดการข้อมูลวัสดุ&ครุภัณฑ์</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="index">หน้าแรก</a></li> -->
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <!-- Default box -->

                <!-- Info box -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-12">
                                <a href="check_approve">
                                    <div class="info-box shadow-none bg-light border border-warning">
                                        <span class="info-box-icon bg-warning shadow"><i class="fas fa-tasks"></i></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text font-weight-bold">รายการรอตรวจสอบ :</span>
                                            <div class="info-box-text">
                                                <?php if (isset($result_count)) { ?>
                                                    <?php foreach ($result_count as $rows) { ?>
                                                        <h5><span class="badge badge-warning"><?= $rows['count'] ?></span></h5>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <div class="my-2">
                                                        <i class="fas fa-spinner fa-spin"></i>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </a>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4 col-sm-6 col-12">
                                <a href="check_borrow">
                                    <div class="info-box shadow-none bg-light border border-success">
                                        <span class="info-box-icon bg-success shadow"><i class="far fa-check-circle"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text font-weight-bold">รายการอนุมัติแล้ว :</span>
                                            <div class="info-box-text">
                                                <?php if (isset($result_count_approved)) { ?>
                                                    <?php foreach ($result_count_approved as $rows) { ?>
                                                        <h5><span class="badge bg-teal"><?= $rows['count'] ?></span></h5>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <div class="my-2">
                                                        <i class="fas fa-spinner fa-spin"></i>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </a>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4 col-sm-6 col-12">
                                <a href="check_return">
                                    <div class="info-box shadow-none bg-light border border-info">
                                        <span class="info-box-icon bg-info shadow"><i class="fas fa-inbox"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text font-weight-bold">รายการคืนแล้ว :</span>
                                            <div class="info-box-text">
                                                <?php if (isset($result_count_returned)) { ?>
                                                    <?php foreach ($result_count_returned as $rows) { ?>
                                                        <h5><span class="badge bg-info"><?= $rows['count'] ?></span></h5>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <div class="my-2">
                                                        <i class="fas fa-spinner fa-spin"></i>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </a>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./Info box -->
                    <hr class="bg-light mx-3" style="height: 2px;">
                    <div class="card-body p-3">
                        <h1 class="">ยืมวัสดุ/ครุภัณฑ์</h1>
                        <div class="row">
                            <?php if (mysqli_num_rows($result)) { ?>
                                <?php
                                $i = 0;
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    $i++;
                                ?>
                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                        <div class="card d-flex flex-fill shadow rounded-lg">
                                            <div class="card-header text-muted border-bottom-0 text-nowrap">
                                                <span>
                                                    <div class="badge bg-primary">
                                                        <?= $i ?>
                                                    </div>
                                                </span>
                                                : <?php echo $rows['device_no']; ?>
                                            </div>

                                            <div class="card-body bg-gradient-dark">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <div class="bg-dark rounded rounded-lg">
                                                            <h5 class="font-weight-bold text-center p-2"><?php echo $rows['model'] ?></h5>
                                                        </div>
                                                        <ul class="ml-0 mb-0 fa-ul text-muted">
                                                            <li><b>ลักษณะ:</b> <?php echo $rows['device_cat_name'] ?></li>
                                                            <li><b>ประเภท:</b>
                                                                <?php
                                                                $stat_r = $rows['device_type'];
                                                                $stat_msg = "";
                                                                if ($stat_r == 1) {
                                                                ?>
                                                                    <p class="badge bg-lightblue"><?php echo $stat_msg = "วัสดุ"; ?></p>
                                                                <?php } elseif ($stat_r == 2) { ?>
                                                                    <p class="badge bg-olive"><?php echo $stat_msg = "ครุภัณฑ์"; ?></p>
                                                                <?php } ?>
                                                            </li>
                                                        </ul>
                                                        <ul class="ml-3 mb-0 fa-ul text-muted">
                                                            <li class="small text-nowrap"><span class="fa-li"><i class="fas fa-database"></i></span> จัดเก็บที่: <?php echo $rows['room'] ?></li>
                                                            <li class="small"><span class="fa-li"><i class="fas fa-calendar-alt"></i></span> วันที่จัดซื้อ: <?php echo $rows['pur_yrs'] ?></li>
                                                            <li class="small">
                                                                <span class="fa-li">
                                                                    <i class="fas fa-question-circle"></i>
                                                                </span>
                                                                สถานะ:
                                                                <?php
                                                                $stat_r = $rows['status'];
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
                                                    <div class="col-5 text-center">
                                                        <?php if (!empty($rows['img'])) { ?>
                                                            <div class="badge bg-white">
                                                                <img src="admin/source/img/store-img/<?php echo $rows['img']; ?>" alt="Product Image" class="img-fluid">
                                                            </div>
                                                        <?php } else { ?>
                                                            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png" alt="Product Image" class="img-fluid">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-right">
                                                    <a class="btn btn-sm bg-info" href="borrow?id=<?= $rows['id'] ?>">
                                                        <i class="fas fa-box-open"></i> ยืม
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="text-center">
                                    <img src="admin/source/img/empty.png" alt="Error loading data table" class="img-fluid">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
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