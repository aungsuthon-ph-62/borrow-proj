<?php
session_start();

include('connect_db.php');
unset($_SESSION['inp_email']);
unset($_SESSION['inp_pwd']);


$errors = array();

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "กรุณากรอกอีเมลล์");
        header('location: ../login?invalid_email=กรุณากรอกอีเมลล์');
    }
    if (empty($password)) {
        array_push($errors, "กรุณากรอกพาสเวิร์ด");
        header('location: ../login?invalid_pwd=กรุณากรอกพาสเวิร์ด');
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM student WHERE email = '$email' AND password = '$password' ";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['auth'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['user'] = $row['sname'] . " " . $row['lname'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);

            if ($_SESSION['status'] == 1) {
                $_SESSION['success_login'] = "เข้าสู่ระบบสำเร็จ!";
                header('location: ../index');
            }

            if ($_SESSION['status'] == 2) {
                $_SESSION['success_login'] = "เข้าสู่ระบบสำเร็จ!";
                header('location: ../admin/index');
            }
        } else {
            array_push($errors, "อีเมลล์หรือพาสเวิร์ดผิด!");
            $_SESSION['error'] = "อีเมลล์หรือพาสเวิร์ดผิด! กรุณาลองอีกครั้ง";
            header('location: ../login');
        }
    }
}
