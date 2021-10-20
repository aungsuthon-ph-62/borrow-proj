<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../../index.php" class="nav-link">หน้าหลัก</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="check_approve" class="nav-link">รายการรอตรวจสอบ</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="check_borrow" class="nav-link">รายการยืม</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="check_return" class="nav-link">รายการคืน</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        <?php if (isset($_SESSION['status'])) { ?>
            <?php if ($_SESSION['status'] == 2) { ?>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-danger btn-sm" href="../../admin/index">
                        <i class="fas fa-user"></i> เปลี่ยนเป็นแอดมิน
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
</nav>