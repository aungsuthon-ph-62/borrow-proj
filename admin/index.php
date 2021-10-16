<?php
include('source/php/read.php');
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
              <h1 class="m-0">ระบบจัดการหลังบ้าน</h1>
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
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
                  <p>รออนุมัติ</p>
                </div>
                <div class="icon">
                  <i class="fas fa-tasks"></i>
                </div>
                <a href="approve" class="small-box-footer">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>

                  <p>ยังไม่คืน</p>
                </div>
                <div class="icon">
                  <i class="fas fa-times"></i>
                </div>
                <a href="check_borrow" class="small-box-footer">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-12">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>44</h3>

                  <p>คืนแล้ว</p>
                </div>
                <div class="icon">
                  <i class="fas fa-check-circle"></i>
                </div>
                <a href="check_borrow" class="small-box-footer">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->


          <!-- TABLE-->
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">รายการทั้งหมด <i class="fas fa-sync-alt fa-spin"></i></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <?php if (mysqli_num_rows($result)) { ?>
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                      <tr class="text-center">
                        <th>ลำดับ</th>
                        <th>รหัสอุปกรณ์</th>
                        <th>รหัสนักศึกษา</th>
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
                          <td class="text-center"><?= $rows['device_no'] ?></td>
                          <td class="text-center"><?php echo $rows['student_id'] ?></td>
                          <td class="text-center"><?php echo $rows['borrow_date']; ?></td>
                          <td class="text-center"><?php echo $rows['return_date']; ?></td>
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
                  <img class="img-fluid" src="source/img/empty.png" alt="Error loading data table!">
                </div>
              <?php } ?>
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->


          <!-- PRODUCT LIST -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">รายการวัสดุ&ครุภัณฑ์ <i class="fas fa-cubes"></i></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <ul class="products-list product-list-in-card pl-2 pr-2">
                <?php if (mysqli_num_rows($device_result)) { ?>
                  <?php
                  $i = 0;
                  while ($rows = mysqli_fetch_assoc($device_result)) {
                    $i++; ?>
                    <li class="item">
                      <div class="product-img">
                        <?php if (!empty($rows['img'])) { ?>
                          <img src="source/img/store-img/<?php echo $rows['img']; ?>" alt="Product Image" class="img-fluid" width="70px">
                        <?php } else { ?>
                          <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png" alt="Product Image" class="img-fluid" width="70px">
                        <?php } ?>
                      </div>
                      <div class="product-info">
                        <a class="product-title text-primary"><?php echo $rows['model'] ?>
                          <?php
                          $stat_r = $rows['status'];
                          $stat_msg = "";
                          if ($stat_r == 1) {
                          ?>
                            <span class="badge badge-success float-right"><?php echo $stat_msg = "ว่าง"; ?></span>
                          <?php } elseif ($stat_r == 2) { ?>
                            <span class="badge badge-success float-right"><?php echo $stat_msg = "ไม่ว่าง"; ?></span>
                          <?php } elseif ($stat_r == 3) { ?>
                            <span class="badge badge-success float-right"><?php echo $stat_msg = "ชำรุด"; ?></span>
                          <?php } elseif ($stat_r == 4) { ?>
                            <span class="badge badge-success float-right"><?php echo $stat_msg = "อื่นๆ"; ?></span>
                          <?php } ?>
                        </a>
                        <span class="product-description">
                          ลักษณะ : <?php echo $rows['device_cat_name'] ?>
                        </span>
                        <span class="product-description">
                          ประเภท :
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
                        </span>
                      </div>
                    </li>
                  <?php } ?>
                <?php } else { ?>
                  <div class="text-center">
                    <img class="img-fluid" src="source/img/empty.png" alt="Empty data table!">
                  </div>
                <?php } ?>
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="add_product_read" class="uppercase">แสดงรายละเอียดเพิ่มเติม <i class="fas fa-arrow-right"></i></a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->


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