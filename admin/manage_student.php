<?php
include('source/php/manage_student.php');
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
                            <h1 class="m-0">จัดการข้อมูลนักศึกษา</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Home</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="my-4">
                        <a href="source/php/manage_student.php" class="btn btn-info text-white"><i class="fas fa-plus"></i> เพิ่มผู้ใช้</a>
                    </div>
                    <div class="row">
                        <?php if (mysqli_num_rows($result)) { ?>
                            <?php
                            $i = 0;
                            while ($rows = mysqli_fetch_assoc($result)) {
                                $i++; ?>
                                <div class="col-md-3">
                                    <!-- Widget: user widget style 1 -->

                                    <div class="card card-widget widget-user shadow-lg">
                                        <!-- Add the bg color to the header using any of the bg-* classes -->

                                        <div class="widget-user-header text-white" style="background: url('https://images.unsplash.com/photo-1633524418328-ad79c090329d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1175&q=80') center top;">
                                            <div class="float-right">
                                                <div class="btn btn-group">
                                                    <form action="source/php/manage_student_update.php">
                                                        <input type="text" value="<?= $rows['id'] ?>" hidden>
                                                        <button type="submit" class="btn btn-info btn-sm" name="submit"><i class="fas fa-edit"></i></button>
                                                    </form>
                                                    <a href="source/php/manage_student_delete?id=<?= $rows['id'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-user-image">
                                            <img class="img-circle bg-light" src="https://cdn-icons.flaticon.com/png/512/3899/premium/3899618.png?token=exp=1634052120~hmac=c21375b5119035a774f4a0f496cfcc66" alt="User Avatar">
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-center my-2">
                                                <h5 class="widget-user-desc text-center"><?php echo $rows['sname']; ?> <?php echo $rows['lname']; ?></h5>
                                                <p class="fs-5"><?= $rows['email'] ?></p>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 border-right">
                                                    <div class="description-block">
                                                        <h5 class="description-header"><?= $rows['student_id'] ?></h5>
                                                    </div>
                                                    <!-- /.description-block -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 border-right">
                                                    <div class="description-block">
                                                        <h5 class="description-header"><?= $rows['tel'] ?></h5>
                                                    </div>
                                                    <!-- /.description-block -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4">
                                                    <div class="description-block">
                                                        <h5 class="description-header"><?= $rows['stype'] ?></h5>
                                                    </div>
                                                    <!-- /.description-block -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                    </div>

                                    <!-- /.widget-user -->
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!-- ./Main Content -->
            <!-- ./Content Wrapper. Contains page content -->


            <!-- Control Sidebar -->
            <?php include('source/env/sidebar-right.php') ?>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <?php include('source/env/footer.php') ?>

            <!-- ./wrapper -->
        </div>

</body>

</html>