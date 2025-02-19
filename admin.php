<?php
session_start();
include('../project/admin/inc/config.php');
include('inc/header copy.php');
include('inc/links.php');

$con = mysqli_connect($hname, $uname, $pass, $db,$port);
if (!$con) {
    die("Cannot connect to database" . mysqli_connect_error());
}

if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM admin WHERE aemail=? AND apass=?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        echo <<<JS
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <script>
            swal({
                title: "Login Successful!",
                text: "Welcome back, Admin",
                icon: "success",
                button: "OK",
            }).then(function() {
                window.location.href = 'admin/dashboardcopy.php';
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
    <link rel="shortcut icon" type="x-icon" href="Images/favicon.ico">

    <title>Admin Login Panel</title>
    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-5 mt-2">
                <div class="card my-3 shadow">
                    <h4 class="text-white bg-dark py-3 text-center">Admin Login</h4>
                    <div class="card-body mt-2 h-50">
                        <form method="POST">
                            <div class="container-fluid">
                            <div class="mb-3">
                                    <input type="email" name="email" class="form-control shadow-none text-center" placeholder="Enter Email" autofocus required>
                                </div>
                                <div class="mb-4">
                                    <input type="password" name="pass" class="form-control shadow-none text-center" placeholder="Enter Password" required>
                                </div>
                                <div class="text-center mb-2">
                                    <button type="submit" class="btn text-white custom-bg shadow-none" name='signin'>LOGIN</button>
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
<?php
include('inc/footer.php');
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">