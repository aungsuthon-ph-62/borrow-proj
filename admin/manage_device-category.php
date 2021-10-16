<?php
include('source/php/manage_device-category.php');
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
                            <h1 class="m-0">จัดการลักษณะอุปกรณ์</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index">หน้าแรก</a></li>
                                <li class="breadcrumb-item active">จัดการลักษณะอุปกรณ์</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Add product button -->
                    <div class="my-2">
                        <a href="manage_device-category_create" class="btn btn-info text-white"><i class="fas fa-plus"></i> เพิ่มข้อมูล</a>
                    </div>
                    <!-- ./Add product button -->
                    <!-- TABLE-->
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">รายการลักษณะอุปกรณ์ทั้งหมด</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-3">
                            <?php if (mysqli_num_rows($result)) { ?>
                                <div class="table-responsive">
                                    <table class="table table-borderless m-0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>ลำดับ</th>
                                                <th>ชื่อลักษณะอุปกรณ์</th>
                                                <th>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $i++; ?>
                                                <tr>
                                                    <th class="text-center" scope="row"><?= $i ?></th>
                                                    <td class="text-center"><?= $rows['device_cat_name'] ?></td>
                                                    <td class="text-center">
                                                        <div class="d-grid gap-2 px-3">
                                                            <a href="manage_device-category_update?id=<?= $rows['id'] ?>" class="btn btn-success "> <i class="fas fa-edit"></i> แก้ไข</a>
                                                            <a href="source/php/manage_device-category_delete.php?id=<?= $rows['id'] ?>" class="btn btn-danger"> <i class="fas fa-minus-circle"></i> ลบ</a>
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