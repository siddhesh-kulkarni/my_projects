<?php
session_start();
include('../project/admin/inc/config.php');
include('../project/inc/header copy.php');
include('../project/inc/links.php');

// $con = mysqli_connect($hname, $uname, $pass, $db);
if (!$con) {
    die("Cannot connect to database" . mysqli_connect_error());
}

if (isset($_POST['sign'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    // $_SESSION['email']=$email;
    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM student WHERE semail=? AND spass=?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $student_id = $row['sid'];
        // echo $student_id;
        $_SESSION['id'] = $student_id;
    }
    else{
        echo 'No student avaliable';
    }
    // $_SESSION['id'] = $student_id;
    if (mysqli_num_rows($result) == 1) {

        echo <<<JS
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <script>
            swal({
                title: "Login Successful!",
                text: "Welcome back, Student",
                icon: "success",
                button: "OK",
            }).then(function() {
                window.location.href = '../project/student/studprofile.php';
            });
            sessionStorage.setItem('loggedin', true);
            sessionStorage.setItem('email', '$email');
        </script>
JS;
    } else {
        echo <<<JS
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
            <script>
                swal({
                    title: "Login Failed!",
                    text: "Invalid Credentials",
                    icon: "error",
                    button: "OK",
                });
            </script>
    JS;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body style="background-color:#F3F3F3;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-5 mt-2">
                <div class="card my-3 shadow">
                    <h4 class="text-center text-white bg-dark py-3"><i class="bi bi-people-fill me-2"></i>Student Login</h4>
                    <div class="card-body mt-2 h-50">
                        <form method="POST">
                            <div class="container-fluid">
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control shadow-none text-center" placeholder="Enter Email" autofocus required>
                                </div>
                                <div class="mb-4">
                                    <input type="password" name="pass" class="form-control shadow-none text-center" placeholder="Enter Password" required>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <button type="submit" class="btn text-white custom-bg shadow-none" name='sign'>LOGIN</button>
                                    <a href="studreg.php" class="text-decoration-none">New Student? Register Here</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php require('inc/footer.php'); ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">