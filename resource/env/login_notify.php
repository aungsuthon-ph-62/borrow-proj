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
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fas fa-check"></i> <?php echo $_SESSION['success_register']; ?></h5>
        </div>
        <?php unset($_SESSION['success_register']); ?>
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
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fas fa-times"></i> <?php echo $_SESSION['msg']; ?></h5>
        </div>
        <?php unset($_SESSION['msg']); ?>
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
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fas fa-times"> </i> <?php echo $_SESSION['error']; ?></h5>
        </div>
        <?php unset($_SESSION['error']); ?>
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
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fas fa-check"></i> <?php echo $_GET['logout_success']; ?></h5>
            <?php echo $_GET['logout_success']; ?>
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
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fas fa-times"></i> <?php echo $_GET['invalid_email']; ?></h5>
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
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="fas fa-times"></i> <?php echo $_GET['invalid_pwd']; ?></h5>
        </div>
    <?php endif ?>

    <!-- Notify msg -->
    <?php if (isset($_SESSION['success_login']) && (isset($_SESSION['user']))) : ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '<?php echo $_SESSION['success_login']; ?>',
                    text: 'ยินดีต้อนรับ! คุณ <?php echo $_SESSION['user']; ?>',
                    showConfirmButton: true,
                    timer: '4000'
                })
            </script>
            
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="fas fa-check"></i> <?php echo $_SESSION['success_login']; ?></h5>
                    ยินดีต้อนรับ, <?php echo $_SESSION['user']; ?>
                </div>
            
            <?php unset($_SESSION['success_login']); ?>

    <?php endif ?>
    <!-- ./Notify msg -->