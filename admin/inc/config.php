<?php

$hname='localhost';
$uname='root';
$pass='';
$db='suvi';
$port='3306';

$con=mysqli_connect($hname,$uname,$pass,$db,$port);
if(!$con){
    die("Cannot connect to database".mysqli_connect_error());
}

// if(!$_SESSION['aname']){
//     header('location: index.php');
// }

// function select($sql,$values,$datatypes)
// {
//     $con=$GLOBALS['con'];
//     if($stmt=mysqli_prepare($con,$sql))
//     {
//         mysqli_stmt_bind_param($stmt,$datatypes,...$values);
//         if(mysqli_stmt_execute($stmt)){
//             $res=mysqli_stmt_get_result($stmt);
//             mysqli_stmt_close($stmt);
//             return $res;
//         }
//         else{
//             mysqli_stmt_close($stmt);
//             die("Query cannot be prepared");
//         }
//     }
//     else{
//         die("Query not executed");
//     }
// }
?>
