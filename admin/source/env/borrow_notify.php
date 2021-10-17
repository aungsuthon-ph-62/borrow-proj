<?php if (isset($_GET['error'])) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...!',
            text: '<?php echo $_GET['error']; ?>',
            showConfirmButton: true,
            timer: 2500
        })
    </script>
<?php endif ?>

<?php if (isset($_GET['success'])) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'สำเร็จ!',
            text: '<?= $_GET['success'] ?>',
            showConfirmButton: true,
            timer: 2500
        })
    </script>
<?php endif ?>

<?php if (isset($_GET['success_delete'])) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'สำเร็จ!',
            text: '<?= $_GET['success_delete'] ?>',
            showConfirmButton: true,
            timer: 2500
        })
    </script>
<?php endif ?>

<?php if (isset($_SESSION['success_login'])) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '<?php echo $_SESSION['success_login']; ?>  ยินดีต้อนรับ! <?php echo $_SESSION['user']; ?>',
            showConfirmButton: true,
            timer: 4500
        })
    </script>
    <div class="card-body">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> <?php echo $_SESSION['success_login']; ?></h5>
            ยินดีต้อนรับ! <?php echo $_SESSION['user']; ?>
        </div>
    </div>
    <?php unset($_SESSION['success_login']); ?>
<?php endif ?>