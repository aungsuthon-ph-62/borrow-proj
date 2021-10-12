<?php include "test.php"; ?>
<?php include("../env/header.php"); ?>
<?php session_start(); ?>

<?php if (isset($_SESSION['id'])) { ?>
    <?php $uid = $_SESSION['id'] ?>
<?php } else {
    header("location: /borrow-proj/login");
} ?>



<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center p-5">
        <form class="bg-light border shadow p-5 rounded" action="test.php" method="post" enctype="multipart/form-data">
            <div class="my-4">
                <h4 class="display-4 text-center">รายละเอียดการยืมพัสดุ&ครุภัณฑ์</h4>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fs-5">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="/borrow-proj/admin/index">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a class="text-decoration-none" href="/borrow-proj/admin/admin_borrow">Borrow</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php if (isset($_SESSION['id'])) { ?>
                            <?php echo $_SESSION['id'] ?>
                        <?php } ?>
                    </li>
                </ol>
            </nav>

            <hr class="my-4">

            <?php if (isset($_GET['error'])) : ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...!',
                        text: '<?php echo $_GET['error']; ?>',
                        showConfirmButton: true,
                        timer: '2500'
                    })
                </script>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_GET['error']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <?php if (isset($_GET['success'])) : ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '<?php echo $_GET['success']; ?>',
                        showConfirmButton: true,
                        timer: '2500'
                    })
                </script>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_GET['success']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class=" form-group mb-4">
                        <label for="device_id">รหัสอุปกรณ์</label>
                        <select class="form-control" aria-label="device_id" name="device_id">
                            <option value="" selected>กรุณาเลือก</option>
                            <?php foreach($sel_result as $rows) { ?>
                                <option value="<?php echo $rows['id']; ?>">
                                    <?php echo $rows['device_no']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class=" form-group mb-4">
                        <label for="borrower_id">รหัสผู้ยืม</label>
                        <input type="text" class="form-control" id="borrower_id" name="borrower_id" value="<?= $uid ?>" readonly>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="form-group mb-4">
                        <label for="borrow_date">วันเดือนปีที่ยืม</label>
                        <input type="date" class="form-control" id="borrow_date" name="borrow_date">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-4">
                        <label for="return_date">วันที่คืน</label>
                        <input type="date" class="form-control" id="return_date" name="return_date">
                    </div>
                </div>
            </div>

            

            <div class="my-4">
                <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check"></i> ยืนยัน</button>
                <a href="test" class="btn btn-danger"><i class="fas fa-chevron-left"></i> กลับ</a>
            </div>

        </form>
    </div>
</body>

</html>