<?php
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

include('php/check_return_read.php');
include('resource/env/main-header.php');
?>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Notify -->
        <?php include "resource/env/login_notify.php" ?>

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
                <div class="container">
                    <!-- TABLE-->
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">รายการรอตรวจสอบ : <?= $_SESSION['user'] ?> | <?= $_SESSION['st_id'] ?> </h3>
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
                                                <th>วันที่ยืม</th>
                                                <th>วันที่คืน</th>
                                                <th>สถานะ</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $i++; ?>
                                                <tr>
                                                    <th class="text-center" scope="row"><?= $i ?></th>
                                                    <td class="text-center">
                                                        <?php
                                                        $borrow_date = strtotime($rows['borrow_date']);
                                                        echo date('d/m/Y', $borrow_date);
                                                        ?>
                                                    </td>
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