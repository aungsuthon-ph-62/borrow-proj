<?php
include('source/php/read_approve.php');
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
        <?php include "source/env/borrow_notify.php" ?>

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
                            <h1 class="m-0">ตรวจสอบอนุมัติ</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index">หน้าแรก</a></li>
                                <li class="breadcrumb-item active">ตรวจสอบอนุมัติ</li>
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
                            <!-- TABLE-->
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">รายการรออนุมัติทั้งหมด</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-3">
                                    <?php if (mysqli_num_rows($result)) { ?>
                                        <div class="table-responsive p-0 mb-5">
                                            <table class="table table-head-fixed table-borderless m-0 text-nowrap">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>ลำดับ</th>
                                                        <th>รูปภาพอุปกรณ์</th>
                                                        <th>รหัสนักศึกษา</th>
                                                        <th colspan="2">ชื่อจริง - นามสกุล</th>                                                       
                                                        <th>วันที่ยืม</th>
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
                                                            <td class="text-center" scope="row"><?= $i ?></td>
                                                            <td class="text-center">
                                                                <?php if (!empty($rows['img'])) { ?>
                                                                    <img src="source/img/store-img/<?php echo $rows['img']; ?>" alt="Product Image" class="img-fluid" width="70px">
                                                                <?php } else { ?>
                                                                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png" alt="Product Image" class="img-fluid" width="70px">
                                                                <?php } ?>
                                                            </td>
                                                            <td class="text-center"><?php echo $rows['student_id'] ?></td>
                                                            <td class="text-center" colspan="2"><?php echo $rows['sname'] ?> <?php echo $rows['lname'] ?></td>
                                                            <td class="text-center">
                                                                <?php
                                                                $borrow_date = strtotime($rows['borrow_date']);
                                                                echo date('d/m/Y', $borrow_date);
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
                                                                    <a href="approve_update.php?id=<?= $rows['b_id'] ?>" class="btn btn-success "> <i class="fas fa-edit"></i> อนุมัติ</a>
                                                                    <a href="source/php/approve_delete.php?id=<?= $rows['b_id'] ?>" class="btn btn-danger"> <i class="fas fa-minus-circle"></i> ลบ</a>
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