<?php
include('source/php/add_product.php');
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

    <?php include('source/env/borrow_notify.php'); ?>

    <div class="wrapper">

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
                            <h1 class="m-0">จัดการพัสดุ&ครุภัณฑ์</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index">หน้าแรก</a></li>
                                <li class="breadcrumb-item active">จัดการพัสดุ&ครุภัณฑ์</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-body">


                        <div class="container-fluid">
                            <!-- Add product button -->
                            <div class="my-2">
                                <a href="add_product" class="btn btn-info text-white"><i class="fas fa-plus"></i> เพิ่มพัสดุ/ครุภัณฑ์</a>
                            </div>
                            <!-- ./Add product button -->
                            <!-- TABLE-->
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">รายการพัสดุ&ครุภัณฑ์</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-3">
                                    <?php if (mysqli_num_rows($result)) { ?>
                                        <div class="table-responsive p-0">
                                            <table class="table table-borderless table-head-fixed text-nowrap">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>ลำดับ</th>
                                                        <th>ปีจัดซื้อ</th>
                                                        <th>หมายเลขวัสดุ/ครุภัณฑ์</th>
                                                        <th>ลักษณะอุปกรณ์</th>
                                                        <th>ประเภทอุปกรณ์วัสดุ</th>
                                                        <th>ชื่อรุ่น</th>
                                                        <th>สถานะอุปกรณ์</th>
                                                        <th>จัดเก็บที่</th>
                                                        <th>รูปภาพ</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 0;
                                                    while ($rows = mysqli_fetch_assoc($result)) {
                                                        $i++; ?>
                                                        <tr>
                                                            <th scope="row"><?= $i ?></th>
                                                            <td class="text-center">
                                                                <?php
                                                                $pur_yrs = strtotime($rows['pur_yrs']);
                                                                echo date('d/m/Y', $pur_yrs);
                                                                ?>
                                                            </td>
                                                            <td class="text-center"><?= $rows['device_no'] ?></td>
                                                            <td class="text-center"><?php echo $rows['device_cat_name']; ?></td>
                                                            <td class="text-center">
                                                                <?php
                                                                $r = $rows['device_type'];
                                                                if ($r == 1) {
                                                                    echo "วัสดุ";
                                                                } elseif ($r == 2) {
                                                                    echo "ครุภัณฑ์";
                                                                } else {
                                                                    echo "โปรดแก้ไขข้อมูล";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="text-center"><?php echo $rows['model']; ?></td>
                                                            <td class="text-center">
                                                                <?php
                                                                $r = $rows['status'];
                                                                if ($r == 1) {
                                                                    $r = "ว่าง";
                                                                    echo "<h5>" . "<span class=\"badge badge-pill badge-success\">" . $r . "</span>" . "</h5>";
                                                                } elseif ($r == 2) {
                                                                    $r = "ไม่ว่าง";
                                                                    echo "<h5>" . "<span class=\"badge badge-pill badge-warning\">" . $r . "</span>" . "</h5>";
                                                                } elseif ($r == 3) {
                                                                    $r = "ชำรุด";
                                                                    echo "<h5>" . "<span class=\"badge badge-pill badge-danger\">" . $r . "</span>" . "</h5>";
                                                                } else {
                                                                    $r = "อื่นๆ";
                                                                    echo "<h5>" . "<span class=\"badge badge-pill badge-info\">" . $r . "</span>" . "</h5>";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="text-center"><?php echo $rows['room']; ?></td>
                                                            <td class="text-center">
                                                                <?php if (!empty($rows['img'])) { ?>
                                                                    <img src="source/img/store-img/<?php echo $rows['img']; ?>" alt="Product Image" class="img-fluid" width="70px">
                                                                <?php } else { ?>
                                                                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png" alt="Product Image" class="img-fluid" width="70px">
                                                                <?php } ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="d-grid gap-2 px-3">
                                                                    <a href="update_product?id=<?= $rows['id'] ?>" class="btn btn-success "> <i class="fas fa-edit"></i> แก้ไข</a>
                                                                    <a href="source/php/delete_product.php?id=<?= $rows['id'] ?>" class="btn btn-danger"> <i class="fas fa-minus-circle"></i> ลบ</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    <?php } else { ?>
                                        <div class="text-center">
                                            <img class="img-fluid" src="source/img/empty.png" alt="Error loading data table!">
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- /.card-body -->
                                <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>




            <!-- /.content -->
        </div>
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