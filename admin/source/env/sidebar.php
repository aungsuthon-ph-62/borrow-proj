<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/index.php" class="brand-link">
        <img src="https://cdn-icons-png.flaticon.com/512/906/906343.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ยินดีต้อนรับ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://cdn-icons-png.flaticon.com/512/1794/1794707.png" class="img-circle elevation-2" alt="User Image">
            </div>
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
                    <a href="/admin/index.php" class="nav-link">
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
                            <a href="/admin/admin_borrow" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ยืมวัสดุ&ครุภัณฑ์</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/approve" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>อนุมัติ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/check_borrow" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>จัดการรายการยืม&คืน</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            จัดการ
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/add_product_read" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ข้อมูลวัสดุ&ครุภัณฑ์</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/manage_student" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>จัดการข้อมูลนักศึกษา</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/manage_teacher" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>จัดการข้อมูลอาจารย์</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/manage_device-category" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>จัดการลักษณะอุปกรณ์</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/manage_device-room" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>จัดการห้องเก็บอุปกรณ์</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../../../php/logout" class="nav-link">
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