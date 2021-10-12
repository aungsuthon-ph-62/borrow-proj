<?php if (isset($_GET['error'])) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...!',
            text: '<p class="text-light"><?php echo $_GET['error']; ?></p>',
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