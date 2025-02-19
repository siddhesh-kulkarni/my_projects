<?php
session_start();
include('headerstud.php');
include('studlinks.php');
include('../admin/inc/config.php');

if (isset($_GET['pid'])) {
    $id = $_GET['pid'];
    echo "Workshop ID:" . $id;}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>