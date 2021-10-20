<meta charset="UTF-8">

<?php
include('connect_db.php');

if (isset($_POST['submit'])) {

    $errors = array();
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sname = mysqli_real_escape_string($conn, $_POST['sname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $stype = mysqli_real_escape_string($conn, $_POST['sel-type']);

    $user_check_query = "SELECT * FROM student WHERE email = '$email' OR student_id = '$student_id' LIMIT 1";
    $query = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($query);

    if ($user['email'] === $email) {
        array_push($errors, "อีเมลล์นี้มีคนใช้แล้ว!");
        header("Location: ../register.php?error=อีเมลล์ซ้ำ! กรุณากรอกใหม่อีกครั้ง&$errors");
    } elseif ($user['student_id'] === $student_id) {
        array_push($errors, "รหัสนักศึกษานี้มีคนใช้แล้ว!");
        header("Location: ../register.php?error=รหัสนักศึกษาซ้ำ! กรุณากรอกใหม่อีกครั้ง&$errors");
    } else {
        if (empty($email)) {
            array_push($errors, "Email is required");
            header("Location: ../register.php?error=กรุณากรอกอีเมลล์");
        } else if (empty($password)) {
            array_push($errors, "Password is required");
            header("Location: ../register.php?error=กรุณากรอกพาสเวิร์ด");
        } else if (empty($sname)) {
            array_push($errors, "Surname is required");
            header("Location: ../register.php?error=กรุณากรอกชื่อจริง");
        } else if (empty($lname)) {
            array_push($errors, "lname is required");
            header("Location: ../register.php?error=กรุณากรอกนามสกุล");
        } else if (empty($student_id)) {
            array_push($errors, "Student ID is required");
            header("Location: ../register.php?error=กรุณากรอกรหัสนักศึกษา");
        } else if (empty($stype)) {
            array_push($errors, "Select is required");
            header("Location: ../register.php?error=กรุณาเลือกชั้นปี");
        } else {
            $password_enc = md5($password);

            $sql = "INSERT INTO student (email, password, sname, lname, student_id, tel, stype, status)
                            VALUES ('$email', '$password_enc', '$sname', '$lname', '$student_id', '$tel', '$stype', 1)";
            $result_sql =  mysqli_query($conn, $sql);
            if ($result_sql) {
                $_SESSION['inp_email'] = $email;
                $_SESSION['success_register'] = "สมัครสมาชิกสำเร็จ!";
                header('location: ../login.php');
            } else {
                array_push($errors, "เกิดข้อผิดพลาด! กรุณาลองอีกครั้ง");
                header('location: ../register.php?error=เกิดข้อผิดพลาด! กรุณาลองอีกครั้ง');
            }
        }
    }
}






?>