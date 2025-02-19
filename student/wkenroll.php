<?php
session_start();
include('headerstud.php');
include('studlinks.php');
include('../admin/inc/config.php');

if (isset($_GET['wkid'])) {
    $wid = $_GET['wkid'];
    // echo "---".$wid;
    $q = "SELECT * FROM workshop WHERE wid=$wid";
    $qr = mysqli_query($con, $q);
    if (mysqli_num_rows($qr) > 0) {
        $row = mysqli_fetch_assoc($qr);
        $wname = $row['wname'];
        // echo $wname;
        // echo $row;
    }

    // echo $wid;
}
$id = $_SESSION['id'];

// $query = "SELECT sfname,smobile FROM student WHERE `sid`='$id'";
// $query_run = mysqli_query($con, $query);
// if (mysqli_num_rows($query_run) > 0) 
// {
//   foreach ($query_run as $row)
//    {
//     // $sf = $row['sfname'];
//     // $smobile = $row['smobile'];

//   }
// echo $id;

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mob = $_POST['mob'];
    $trid = $_POST['transaction'];

    $query1 = "INSERT INTO `wkenroll`(`wid`, `wname`, `sid`, `sfname`, `smobile`, `transaction_id`, `payment`) VALUES ('$wid','$wname','$id','$name','$mob','$trid','Pending')";
    $res = mysqli_query($con, $query1);
    if ($res) {
        echo <<<JS
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <script>
            swal({
                title: "Paid Successfully",
                text: "Wait for confirmation",
                icon: "success",
                button: "OK",
            }).then(function() {
                window.location.href = 'studprofile.php';
            });
        </script>
JS;
    } else {
        echo <<<JS
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
            <script>
                swal({
                    title: "Not Paid!",
                    text: "Check Details",
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
    <title>Document</title>
    <style>
        .learnworlds-button-normal {
            background-color: #04AA6D;
            font-weight: bold;
            font-size: 1.10rem;
            padding-top: 10px;
            padding-right: 20px;
            padding-bottom: 10px;
            padding-left: 20px;
            border-radius: 10px;
            color: white;
        }
    </style>
</head>
<body style="background-color:#F3F3F3;">
    <div class="container bg-dark text-white px-5 py-3 mt-5">
        <!-- <div class="container-fluid"> -->
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-6 mb-4 rm3 order-lg-1 order-3">
                <form method="POST">
                    <div class="container-fluid mt-5">
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control shadow-none text-center" placeholder="Enter Name" autofocus required>
                        </div>
                        <div class="mb-4">
                            <input type="text" name="mob" class="form-control shadow-none text-center" maxlength="10" required pattern="[7-9][0-9]{9}" placeholder="Enter Mobile No" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="transaction" class="form-control shadow-none text-center" placeholder="Enter Transaction ID" autofocus required>
                        </div>
                    </div>
                    <button class="learnworlds-button-normal cursor-pointer ms-3 mb-2" name="submit">
                        Submit
                    </button>
                    <button class="learnworlds-button-normal cursor-pointer mb-2 mx-2">
                        <a href="../student/studwshop.php" class="text-decoration-none text-white">Cancel</a>
                    </button>
                </form>
            </div>
            <div class="col-md-4 col-lg-4 mt-5 order-1">
                <img src="../Courses/QR.jpg" height="300px" width="300px" class="shadow" alt="images">
            </div>
        </div>
    </div>
</body>

</html>