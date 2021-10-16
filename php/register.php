<meta charset="UTF-8">

<?php 
    session_start();
    include('connect_db.php');

    $errors = array();

    if (isset($_POST['register'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $sname = mysqli_real_escape_string($conn, $_POST['sname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $stype = mysqli_real_escape_string($conn, $_POST['sel-type']);

        $user_data = 'email=' . $email . '&password=' . $password . '&sname=' . $sname . '&lname=' . $lname . '&student_id=' . $student_id . '&stype=' . $stype;

        if (empty($email)) {
            header("Location: ../register.php?error=Email is required&$user_data");
        } else if (empty($password)) {
            header("Location: ../register.php?error=Password is required&$user_data");
        } else if (empty($sname)) {
            header("Location: ../register.php?error=Surname is required&$user_data");
        } else if (empty($lname)) {
            header("Location: ../register.php?error=lname is required&$user_data");
        } else if (empty($student_id)) {
            header("Location: ../register.php?error=Student ID is required&$user_data");
        } else if (empty($stype)) {
            header("Location: ../register.php?error=Select is required&$user_data");
        } else {
            header("Location: ../register.php?error=unknown error occurred&$user_data");
        }

        $user_check_query = "SELECT * FROM student WHERE email = '$email' OR student_id = '$student_id' OR tel = '$tel' ";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) {
            if ($result['email'] === $email) {
                array_push($errors, "อีเมลล์นี้มีคนใช้แล้ว!");
                header("Location: ../register.php?error=Email is already exists&$errors");
            }
            if ($result['student_id'] === $student_id) {
                array_push($errors, "รหัสนักศึกษานี้มีคนใช้แล้ว!");
                header("Location: ../register.php?error=Student ID is already exists&$errors");
            }
            if ($result['tel'] === $tel) {
                array_push($errors, "เบอร์โทรศัพท์นี้มีคนใช้แล้ว!");
                header("Location: ../register.php?error=Phone number is already exists&$errors");
            }
        }

        if (count($errors) == 0) {
            $password_enc = md5($password);

            $sql = "INSERT INTO student (email, password, sname, lname, student_id, tel, stype, status)
                    VALUES ('$email', '$password_enc', '$sname', '$lname', '$student_id', '$tel', '$stype', '1')";
            $q_result = mysqli_query($conn, $sql);

            $_SESSION['inp_email'] = $email;
            $_SESSION['success_register'] = "สมัครสมาชิกสำเร็จ!";
            header('location: ../login.php');
        } else {
            array_push($errors, "Email is already exists");
            header('location: ../register.php?error=Email is already exists');
        }
    }






?>