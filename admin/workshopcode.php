<?php

session_start();
include('inc/config.php');
// $con=mysqli_connect("localhost","root","","suvi");
if(isset($_POST['submit1'])){
$onName = $_POST['wname'];
$onDes = $_POST['wdetails'];
$onFees = $_POST['wfees'];
$onStart = $_POST['wstart'];
$onEnd = $_POST['wend'];
$onimage=$_FILES['wimage']['name'];

if(file_exists('workshop/images/'.$onimage))
{
$filename=$_FILES['wimage']['name'];
$_SESSION['status']="Image already exists". $filename;
header('location: workshop.php');
}
else
{
    $query="INSERT INTO `workshop` (wname,wdetails,wfees,wstart,wend,wimage) VALUES ('$onName','$onDes','$onFees','$onStart','$onEnd','$onimage')";
    $query_run=mysqli_query($con,$query);
    
    if($query_run)
    {
        $uploadDir='workshop/images/';
        $filename=$_FILES["wimage"]["name"];
        $destination=$uploadDir . $filename;
        move_uploaded_file($_FILES["wimage"]["tmp_name"], $destination);
        $_SESSION['status']="Image stored successfully";
        header('location: workshop.php');
    }
    else
    {
        $_SESSION['status']="Image not stored successfully";
        header('location: workshop.php');
    }
}
}
?>