<?php
include('../admin/inc/config.php');
$id = $_SESSION['id'];
$query = "SELECT sfname,semail,smobile FROM student WHERE `sid`='$id'";
$query_run = mysqli_query($con, $query);
if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $row) {
        $sf = $row['sfname'];
        $semail = $row['semail'];
        $smobile = $row['smobile'];
    }
}

if (isset($_POST['send'])) {
    $sub = $_POST['qsub'];
    $que = $_POST['query'];

    $query1 = "INSERT INTO `queries`(`sid`, `sfname`, `semail`, `smobile`, `qsub`, `query`) VALUES ('$id','$sf','$semail','$smobile','$sub','$que')";
    $query_run1 = mysqli_query($con, $query1);

    if ($query_run1) {
        echo <<<JS
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <script>
            swal({
                title: "Successfully Sent",
                icon: "success",
                button: "OK",
            }).then(function() {
                window.location.href = 'studcontact.php';
            });
        </script>
JS;
         }
    }

?>