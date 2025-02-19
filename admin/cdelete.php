<?php
include('inc/config.php');
if(isset($_GET['deleteid'])){
$id=$_GET['deleteid'];

$sql="delete from `courses` where cid=$id";
$res=mysqli_query($con,$sql);

if($res){
    header('location: course.php');
}
else{
    echo "not deleted";
}
}
?>