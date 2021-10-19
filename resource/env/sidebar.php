<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index" class="brand-link bg-secondary">
        <img src="img/head_web.png" alt="Logo" class="brand-image bg-white rounded">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <?php if (isset($_SESSION['status'])) { ?>
                <?php if ($_SESSION['status'] == 2) { ?>
                    <div class="image">
                        <img src="https://cdn-icons-png.flaticon.com/512/1794/1794707.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                <?php } else { ?>
                    <div class="image">
                        <img src="https://cdn-icons.flaticon.com/png/512/3899/premium/3899618.png?token=exp=1634052120~hmac=c21375b5119035a774f4a0f496cfcc66" class="img-circle elevation-2" alt="User Image">
                    </div>
                <?php } ?>
            <?php } ?>
            <div class="info">
                <?php if (isset($_SESSION['user'])) : ?>
                    <?php echo $_SESSION['user'] ?>
                <?php endif ?>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            หน้าแรก
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            ทำรายการ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                            <a href="check_approve" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายการรอตรวจสอบ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="check_borrow" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายการยืม</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="check_return" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายการคืน</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/borrow-proj/php/logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-in-alt"></i>
                        <p>
                            ออกจากระบบ
                        </p>
                    </a>
                </li>
            </ul>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>