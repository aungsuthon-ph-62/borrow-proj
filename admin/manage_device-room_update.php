<?php include "source/php/manage_device-room_update.php" ?>
<?php include "../resource/env/header.php" ?>

<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center p-5">
        <form class="bg-light border shadow p-5 rounded" action="source/php/manage_device-room_update.php" method="post" enctype="multipart/form-data">
            <div class="my-4">
                <h4 class="display-4 text-center">อัพเดตข้อมูล</h4>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fs-5">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="index">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">อัพเดตข้อมูล</li>
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

            <div class="row">
                <div class="col-12">
                    <div class=" form-group mb-4">
                        <label for="room">ห้องจัดเก็บอุปกรณ์</label>
                        <input type="text" class="form-control" id="room" name="room" value="<?= $row['room'] ?>">
                    </div>
                </div>
            </div>

            <input type="text" name="uid" value="<?= $row['id'] ?>" hidden>

            <div class="my-4">
                <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-check"></i> ยืนยัน</button>
                <a href="manage_device-room" class="btn btn-danger"><i class="fas fa-chevron-left"></i> กลับ</a>
            </div>

        </form>
    </div>
</body>

</html>