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


include('source/env/header.php');
include('source/php/read.php');
include 'source/php/count.php';
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
          <!-- Alert -->
          <?php include "source/env/borrow_notify.php"; ?>
          <!-- ./Alert -->
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
        <div class="card">
          <div class="card-body">
            <div class="container-fluid">

              <!-- Small boxes (Stat box) -->
              <div class="row">
                <div class="col-md-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-orange text-light">
                    <div class="inner text-light">
                      <?php if (isset($count_approve_result)) { ?>
                        <?php foreach ($count_approve_result as $rows) { ?>
                          <h3><?php echo $rows['count_approve'] ?></h3>
                        <?php } ?>
                      <?php } else { ?>
                        <div class="my-2">
                          <i class="fas fa-spinner fa-spin"></i>
                        </div>
                      <?php } ?>
                      <p>รออนุมัติ</p>
                    </div>
                    <div class="icon text-light">
                      <i class="fas fa-tasks"></i>
                    </div>
                    <a href="approve" class="small-box-footer"> <span class="text-light">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></span> </a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-md-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <?php if (isset($count_approve2_result)) { ?>
                        <?php foreach ($count_approve2_result as $rows) { ?>
                          <h3><?php echo $rows['count_approve'] ?></h3>
                        <?php } ?>
                      <?php } else { ?>
                        <div class="my-2">
                          <i class="fas fa-spinner fa-spin"></i>
                        </div>
                      <?php } ?>
                      <p>ยังไม่คืน</p>
                    </div>
                    <div class="icon text-light">
                      <i class="fas fa-times"></i>
                    </div>
                    <a href="check_borrow" class="small-box-footer">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-md-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-teal">
                    <div class="inner">
                      <?php if (isset($count_approve3_result)) { ?>
                        <?php foreach ($count_approve3_result as $rows) { ?>
                          <h3><?php echo $rows['count_approve'] ?></h3>
                        <?php } ?>
                      <?php } else { ?>
                        <div class="my-2">
                          <i class="fas fa-spinner fa-spin"></i>
                        </div>
                      <?php } ?>
                      <p>คืนแล้ว</p>
                    </div>
                    <div class="icon text-light">
                      <i class="fas fa-check-circle"></i>
                    </div>
                    <a href="check_borrow" class="small-box-footer">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-md-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-indigo">
                    <div class="inner">
                      <?php if (isset($count_result)) { ?>
                        <?php foreach ($count_result as $rows) { ?>
                          <h3><?php echo $rows['count_id'] ?></h3>
                        <?php } ?>
                      <?php } else { ?>
                        <div class="my-2">
                          <i class="fas fa-spinner fa-spin"></i>
                        </div>
                      <?php } ?>
                      <p>อุปกรณ์ในคลัง</p>
                    </div>
                    <div class="icon text-light">
                      <i class="fas fa-box-open"></i>
                    </div>
                    <a href="add_product_read" class="small-box-footer">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->


              <!-- PIE CHART -->
              <div class="card">
                <div class="card-body">
                  <?php include "source/chart/chart.php"; ?>
                  <div id="chart_div"></div>
                </div>
              </div>
              <!-- ./PIE CHART -->



              <div class="row">
                <div class="col-md-6">
                  <!-- TABLE-->
                  <div class="card">
                    <div class="card-header border-transparent bg-black">
                      <h3 class="card-title text-light">รายการทั้งหมด <i class="fas fa-sync-alt fa-spin"></i></h3>
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
                        <div class="table-responsive p-0">
                          <table class="table table-head-fixed text-nowrap">
                            <thead class="bg-secondary">
                              <tr class="text-center">
                                <th>ลำดับ</th>
                                <th>รหัสอุปกรณ์</th>
                                <th>รหัสนักศึกษา</th>
                                <th>วันที่ยืม</th>
                                <th>วันที่คืน</th>
                                <th>สถานะ</th>
                              </tr>
                            </thead>
                            <tbody class="bg-dark">
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
                          <img class="img-fluid" src="source/img/empty.png" alt="Error loading data table!">
                        </div>
                      <?php } ?>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card-footer -->
                  </div>
                  <!-- /.card -->
                </div>
                <div class="col-md-6">
                  <!-- PRODUCT LIST -->
                  <div class="card mb-5">
                    <div class="card-header bg-black">
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
                              <div class="product-img badge bg-light p-3">
                                <?php if (!empty($rows['img'])) { ?>
                                  <img src="source/img/store-img/<?php echo $rows['img']; ?>" alt="Product Image" class="img-fluid" width="100vh">
                                <?php } else { ?>
                                  <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png" alt="Product Image" class="img-fluid" width="100vh">
                                <?php } ?>
                              </div>

                              <div class="product-info pl-5">
                                <h5 class="product-title">
                                  <span class="badge bg-indigo text-wrap"><?php echo $rows['model'] ?></span>
                                  <?php
                                  $stat_r = $rows['status'];
                                  $stat_msg = "";
                                  if ($stat_r == 1) { ?>
                                    <span class="badge badge-success badge-pill float-right"><?php echo $stat_msg = "ว่าง"; ?></span>
                                  <?php } elseif ($stat_r == 2) { ?>
                                    <span class="badge badge-warning badge-pill float-right"><?php echo $stat_msg = "ไม่ว่าง"; ?></span>
                                  <?php } elseif ($stat_r == 3) { ?>
                                    <span class="badge badge-danger badge-pill float-right"><?php echo $stat_msg = "ชำรุด"; ?></span>
                                  <?php } elseif ($stat_r == 4) { ?>
                                    <span class="badge badge-info badge-pill float-right"><?php echo $stat_msg = "อื่นๆ"; ?></span>
                                  <?php } ?>
                                </h5>


                                <span class="product-description">
                                  <b class="text-light"><i class="fas fa-bookmark"></i> ลักษณะ :</b> <?php echo $rows['device_cat_name'] ?>
                                </span>
                                <span class="product-description">
                                  <b class="text-light"><i class="fas fa-tag"></i> ประเภท :</b>
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
              </div>






            </div>
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
  </div>
</body>

</html>