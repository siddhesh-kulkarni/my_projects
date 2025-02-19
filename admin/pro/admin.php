<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admib Login Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
     .but{
        background-color:#28D1B5  ;
     }
     .but:hover{
        background-color:#26BDA4 ;
     }
     div.login-form{
        position:absolute;
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);
        width:400px;
     }
    </style>
</head>
<body class="bg-light">
    <div class="login-form text-center rounded shadow overflow-hidden">
        <form>
            <h4 class="text-white bg-dark py-3">Admin Login</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input type="email" name="aemail"class="form-control shadow-non text-center" placeholder="Enter Email">
                </div>
                <div class="mb-4">
                    <input type="password" name="apass"class="form-control shadow-none text-center" placeholder="Enter Password">
                </div>
                <button type="submit" class="btn text-white but shadow-none">LOGIN</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php


?>