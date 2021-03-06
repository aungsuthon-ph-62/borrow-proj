<?php
include('source/php/read_check_borrow.php');
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

        <!-- Notify -->
        <?php include('source/env/borrow_notify.php') ?>

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
                            <h1 class="m-0">จัดการรายการยืม&คืน</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index">หน้าแรก</a></li>
                                <li class="breadcrumb-item active">จัดการรายการยืม&คืน</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">


                            <!-- TABLE-->
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">รายการยืม&คืนทั้งหมด</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <?php if (mysqli_num_rows($result)) { ?>
                                    <div class="card-body table-responsive p-0 mb-5">
                                        <table class="table table-head-fixed table-borderless m-0 text-nowrap">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>ลำดับ</th>
                                                    <th>รหัสอุปกรณ์</th>
                                                    <th>รหัสนักศึกษา</th>
                                                    <th>วันที่ยืม</th>
                                                    <th>ผู้อนุมัติ</th>
                                                    <th>วันที่คืน</th>
                                                    <th>สถานะ</th>
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
                                                        <td class="text-center"><?= $rows['device_no'] ?></td>
                                                        <td class="text-center"><?php echo $rows['student_id'] ?></td>
                                                        <td class="text-center">
                                                            <?php
                                                            $borrow_date = strtotime($rows['borrow_date']);
                                                            echo date('d/m/Y', $borrow_date);
                                                            ?>
                                                        </td>
                                                        <td class="text-center"><?php echo $rows['t_name']; ?></td>
                                                        <td class="text-center">
                                                            <?php
                                                            $return_date = strtotime($rows['return_date']);
                                                            echo date('d/m/Y', $return_date);
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?php
                                                            $r = $rows['borrow_status'];
                                                            if ($r == 0) {
                                                                $r = "รอตรวจสอบ";
                                                                echo "<h5>" . "<span class=\"badge badge-warning\">" . $r . "</span>" . "</h5>";
                                                            } elseif ($r == 1) {
                                                                $r = "คืนแล้ว";
                                                                echo "<h5>" . "<span class=\"badge badge-success\">" . $r . "</span>" . "</h5>";
                                                            } elseif ($r == 2) {
                                                                $r = "ยังไม่คืน";
                                                                echo "<h5>" . "<span class=\"badge badge-danger\">" . $r . "</span>" . "</h5>";
                                                            } else {
                                                                $r = "อื่นๆ";
                                                                echo "<h5>" . "<span class=\"badge badge-info\">" . $r . "</span>" . "</h5>";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="d-grid gap-2 px-3">
                                                                <a href="check_borrow_update.php?id=<?= $rows['b_id'] ?>" class="btn btn-warning"> <i class="fas fa-edit"></i> แก้ไข</a>
                                                                <a href="source/php/check_borrow_delete.php?id=<?= $rows['b_id'] ?>" class="btn btn-danger"> <i class="fas fa-minus-circle"></i> ลบ</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                        <!-- /.table-responsive -->
                                    <?php } else { ?>
                                        <div>
                                            <img class="img-fluid" src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" alt="Error loading data table!">
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