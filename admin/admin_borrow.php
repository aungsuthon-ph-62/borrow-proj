<?php
include('source/php/read_admin_borrow.php');
include('source/env/header.php');


session_start();
if (!$_SESSION['auth']) {
    $_SESSION['msg'] = "คุณต้องเข้าสู่ระบบก่อน!";
    header("location: ../login");
} else {
    $currentTime = time();
    if ($currentTime > $_SESSION['expire']) {
        session_unset();
        session_destroy();
        header('location: ../login');
    }
}
?>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php include('source/env/borrow_notify.php'); ?>
        <!-- Preloader -->
        <?php include('source/env/preload.php') ?>
        <!-- ./Preloader -->

        <!-- Navbar -->
        <?php include('source/env/navbar.php') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include('source/env/sidebar.php') ?>
        <!-- ./Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">ยืมวัสดุ&ครุภัณฑ์</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index">หน้าแรก</a></li>
                                <li class="breadcrumb-item active">ยืมวัสดุ&ครุภัณฑ์</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row">
                            <?php if (mysqli_num_rows($result)) { ?>
                                <?php
                                $i = 0;
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    $i++;
                                ?>
                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                        <div class="card bg-dark d-flex flex-fill border border-secondary rounded-lg">
                                            <div class="card-header text-muted border-bottom-0">
                                                <span>
                                                    <a href="#" class="btn btn-sm bg-navy disabled">
                                                        <?= $i ?>
                                                    </a>
                                                </span>
                                                <?php echo $rows['device_no']; ?>
                                            </div>

                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h5 class="fw-bold"><span class="badge bg-olive p-2"><?php echo $rows['model'] ?></span></h5>
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
                                                            <li class="small"><span class="fa-li"><i class="fas fa-database"></i></span> จัดเก็บที่: <?php echo $rows['room'] ?></li>
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
                                                                <img src="source/img/store-img/<?php echo $rows['img']; ?>" alt="Product Image" class="img-fluid">
                                                            </div>
                                                        <?php } else { ?>
                                                            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png" alt="Product Image" class="img-fluid">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-right">
                                                    <a class="btn btn-outline-light btn-sm bg-indigo" href="borrow?id=<?= $rows['id'] ?>">
                                                        <i class="fas fa-box-open"></i> ยืม
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>
                            <?php } else { ?>
                                <div class="text-center">
                                    <img src="source/img/empty.png" alt="Error loading data table" class="img-fluid">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->

            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <?php include('source/env/sidebar-right.php') ?>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <?php include('source/env/footer.php') ?>

        </div>
        <!-- ./wrapper -->

</body>

</html>