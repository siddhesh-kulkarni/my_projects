 <?php
    session_start();
    include('inc/config.php');
    include('inc/links.php');
    include('../inc/header copy.php');
    // include('../contact.php');
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
            // echo "<script>";
            // echo "sessionStorage.setItem('loggedin', true);";
            // echo "sessionStorage.setItem('email', '$email');";
            // echo "window.location.href = 'dashboard.php';";
            // echo "</script>";
            // exit;
            // header("Location: dashboard.php");
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
                window.location.href = 'dashboardcopy.php';
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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php');
    ?>
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
    <script type="text/javascript">
    window.history.forward();
    function noBack()
    {
        window.history.forward();
    }
</script>
</head>
<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
    <div class="login-form text-center rounded shadow overflow-hidden">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <h4 class="text-white bg-dark py-3">Admin Login</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input type="email" name="email" class="form-control shadow-none text-center" placeholder="Enter Email" required>
                </div>
                <div class="mb-4">
                    <input type="password" name="pass" class="form-control shadow-none text-center" placeholder="Enter Password" required>
                </div>
                <button type="submit" class="btn text-white custom-bg shadow-none" name='signin'>LOGIN</button>
            </div>
        </form>
    </div>
   
    <?php require('inc/scripts.php'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

</body>
</html>