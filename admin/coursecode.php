<?php
include('inc/config.php');
// $con=mysqli_connect("localhost","root","","suvi");

if(isset($_POST['submit'])){
$onName = $_POST['cname'];
$onDes = $_POST['cdetails'];
$onFees = $_POST['cfees'];
$onStart = $_POST['cstart'];
$onEnd = $_POST['cend'];
$onimage=$_FILES['cimage']['name'];

if(file_exists('course/images/'.$onimage))
{
$filename=$_FILES['cimage']['name'];
$_SESSION['status']="Image already exists". $filename;
header('location: course.php');
}
else
{
    $query="INSERT INTO `courses` (cname,cdetails,cfees,cstart,cend,cimage) VALUES ('$onName','$onDes','$onFees','$onStart','$onEnd','$onimage')";
    $query_run=mysqli_query($con,$query);
    
    if($query_run)
    {
        $uploadDir='course/images/';
        $filename=$_FILES["cimage"]["name"];
        $destination=$uploadDir . $filename;
        move_uploaded_file($_FILES["cimage"]["tmp_name"], $destination);
        $_SESSION['status']="Image stored successfully";
        header('location: course.php');
    }
    else
    {
        $_SESSION['status']="Image not stored successfully";
        header('location: course.php');
    }
}
}
?>