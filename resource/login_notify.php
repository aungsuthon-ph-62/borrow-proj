<?php if (isset($_SESSION['success_register'])) : ?>
    <script>
            Swal.fire({
                icon: 'success',
                title: 'Successful login!',
                text: '<?php echo $_SESSION['success_register']; ?>',
                showConfirmButton: true,
                timer: '2500'
            })
        </script>
    <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
        <?php echo $_SESSION['success_register']; ?>
        <?php unset($_SESSION['success_register']); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<?php if (isset($_SESSION['msg'])) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...!',
            text: '<?php echo $_SESSION['msg']; ?>',
            showConfirmButton: true,
            timer: 2500
        })
    </script>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['msg']; ?>
        <?php unset($_SESSION['msg']); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<?php if (isset($_SESSION['error'])) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...!',
            text: '<?php echo $_SESSION['error']; ?>',
            showConfirmButton: true,
            timer: 2500
        })
    </script>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['error']; ?>
        <?php unset($_SESSION['error']); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<?php if (isset($_GET['logout_success'])) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Logout Success!',
            text: 'ออกจากระบบสำเร็จ!',
            showConfirmButton: true,
            timer: 2500
        })
    </script>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_GET['logout_success']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<?php if (isset($_GET['invalid_email'])) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...!',
            text: '<?php echo $_GET['invalid_email']; ?>',
            showConfirmButton: true,
            timer: 2500
        })
    </script>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $_GET['invalid_email']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<?php if (isset($_GET['invalid_pwd'])) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...!',
            text: '<?php echo $_GET['invalid_pwd']; ?>',
            showConfirmButton: true,
            timer: 2500
        })
    </script>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $_GET['invalid_pwd']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>