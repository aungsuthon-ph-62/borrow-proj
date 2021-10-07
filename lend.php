<?php
session_start();
$page = 'lend';
?>
<?php
include "header.php";
include  "php/fucntion_query.php";
?>

<body>

  <!-- Navigation -->
  <?php include "navbar.php"; ?>
  <!-- Page Content -->

  <div class="container">
    <!-- <div class="row">
      <div class="col-lg-12 text-center">
        <img src="images/banner.jpg" class="img-fluid" alt="Responsive image">
      </div>
    </div> -->

    <div class="jumbotron">

      <div class="row">
        <div class="col-lg-12 ">
          <h2 class="display-5 text-center">ข้อมูลโครงงานทั้งหมด</h2>
          <br>

          <div class="container">
            <table id="example" class="table table-hover table-bordered table-dark" cellspacing="0" width="100%">
              <thead>
                <tr class="table-active">
                  <th width="5%">ลำดับ</th>
                  <th width="30%">รหัสอุปกรณ์</th>
                  <th width="15%">รหัสผู้ยืม</th>
                  <th width="20%">วันเดือนปีที่ยืม</th>
                  <th width="15%">ผู้อนุมัติ</th>
                  <th width="20%">กำหนดส่ง</th>
                  <th width="5%">สถานะ</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $book = GetDataBorrow();
                $link = '#';
                for ($i = 0; $i < count($book); $i++) {
                  if ($book[$i]->borrow_status == 'ปกติ') {
                    $status = 'info';
                    $link = "href='admin-page.php?book_id=" . $book[$i]->id . "'";
                  } elseif ($book[$i]->borrow_status == 'ถูกยืม') {
                    $status = 'warning';
                  } elseif ($book[$i]->borrow_status == 'หาย') {
                    $status = 'danger';
                  } else {
                    $status = 'secondary';
                  }
                  if (isset($_SESSION["status"])) {
                    if ($_SESSION["status"] != 0) {
                      $link = "href='book_update.php?book_id=" . $book[$i]->id . "'";
                    }
                  }

                ?>
                  <tr>
                    <td><?= $i + 1; ?></td>
                    <td>
                      <a <?= $link ?>>
                        <?php if (isset($_SESSION["status"])) {
                          if ($_SESSION["status"] != 0) { ?>
                            <img width="20" src="./images/pen.png">
                        <?php }
                        } ?>
                        <?= $book[$i]->device_id ?></a>
                    </td>
                    <td>
                      <?= !empty($book[$i]->borrower_id) ? str_replace(array("\n\r", "\n", "n/g"), '<br/>', $book[$i]->book_user) : '' ?>
                    </td>
                    <td><?= $book[$i]->book_techer ?></td>
                    <td><?= $book[$i]->book_year ?></td>
                    <td><?= DateThai($book[$i]->book_date) ?></td>
                    <td>
                      <h5><span class="badge badge-<?= $status ?>"><?= $book[$i]->book_status ?></span></h5>
                    </td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.0.0-beta/dt-1.10.16/datatables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
</body>

</html>