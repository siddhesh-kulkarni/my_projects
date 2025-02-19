<?php
include('inc/config.php');
if(isset($_GET['deleteid'])){
$id=$_GET['deleteid'];

$sql="delete from `workshop` where wid=$id";
$res=mysqli_query($con,$sql);

if($res){
    header('location: workshop.php');
}
else{
    echo "not deleted";
}
}
?>