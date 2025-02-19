<?php
// session_start();
require('code.php');
require('links.php');
require('scripts.php');
// require('coursedb.php');
// require("dashboard.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COURSES</title>
</head>
<body>
  <!-- <div class="container-fluid bg-dark text-light p-2 d-flex align-items-center justify-content-between sticky-top">
    <h3 class="mb-0 h-font">SUVI INSTRUMENTS</h3>
    <form method="POST">
      <button name="logout" class="btn btn-light btn-sm mt-2">LOG OUT</button>
    </form> -->

  </div>
  <div class="container-fluid">
    <div class="row">
    <?php
if(isset($_SESSION['status']) && $_SESSION!=''){
  ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>HEY</strong> <?php echo $_SESSION['status']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

  <?php
  unset($_SESSION['status']);
}
?>
      <div class="d-flex  border-top border-2 border-secondary flex-column fixed-left text-white bg-dark " style="width:20%;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
          </svg>
          <span class="fs-4">ADMIN PANEL</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
          <a class="nav-link text-white" href="#"><i class="bi bi-speedometer2 mx-2"></i>DASHBOARD</a>
          </li>
          <li>
          <a class="nav-link text-white" href="#"><i class="bi bi-book mx-2"></i>COURSES</a>
          </li>
          <li>
          <a class="nav-link text-white" href="#"><i class="bi bi-border-all mx-2"></i>WORKSHOPS</a>
          </li>
          <li>
          <a class="nav-link text-white" href="#"><i class="bi bi-motherboard mx-2"></i>MODULES</a>
          </li>
          <li>
          <a class="nav-link text-white" href="#"><i class="bi bi-person-circle mx-2"></i>STUDENTS</a>
          </li>
        </ul>
        <hr>
      </div>
      <div class="col-lg-10 mt-5 w-50 p-4 mx-5 mb-2">
        <form method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label>Course Name</label>
            <input type="text" class="form-control" placeholder="Enter Course Name" autocomplete="off" name="cname" required>
          </div>
          <div class="mb-3">
            <label>Course Details</label>
            <input type="text" class="form-control" placeholder="Enter Course Details" autocomplete="off" name="cdetails" required>
          </div>
          <div class="mb-3">
            <label>Course Fees</label>
            <input type="text" class="form-control" placeholder="Enter Course Name" autocomplete="off" name="cfees" required>
          </div>
          <div class="mb-3">
            <label>Start Date</label>
            <input type="date" class="form-control" autocomplete="off" name="cstart" required>
          </div>
          <div class="mb-3">
            <label>End Date</label>
            <input type="date" class="form-control" autocomplete="off" name="cend" required>
          </div>
          <div class="mb-3">
            <label>Course Image</label>
            <input type="file" class="form-control" autocomplete="off" name="cimage" required>
            <!-- <img src="#" alt=""> -->
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
      </div>

    </div>
  </div>
</body>

</html>
<?php
    // $onName=$_POST['cname'];
    // $onDes=$_POST['cdetails'];
    // $onFees=$_POST['cfees'];
    // $onStart=$_POST['cstart'];
    // $onEnd=$_POST['cend'];

    // $uploadDir='admin/images/';

    // if(!file_exists($uploadDir)){
    //     mkdir($uploadDir,0777,true);
    // }

    // $filename=uniqid(). '_'. $_FILES["cimage"]["name"];
    // $destination=$uploadDir . $filename;

    // if(move_uploaded_file($_FILES["cimage"]["tmp_name"], $destination)){
    //     $servername="localhost";
    //     $username="root";
    //     $password="";
    //     $dbname="suvi";

    //     $conn=new mysqli($servername,$username,$password,$dbname);

    //     if($conn->connect_error){
    //         die("connection failed: ". $conn->connect_error);
    //     }
    //     $staticpath="http://localhost/SuVi";
    //     $imagepath=$staticpath. '/' . $destination;
    //     // $stmt=$conn->prepare("insert into `courses` values('','$name','$detail','$fees','$start','$end','')");
    //     $stmt=$conn->prepare("INSERT INTO `courses`(`cid`, `cname`, `cdetails`, `cfees`, `cstart`, `cend`, `cimg`, `cimgpath`) VALUES ('',?,?,?,?,?,?,?)");
    //     $stmt->bind_param("sssssss",$onName,$onDes,$onFees,$onStart,$onEnd,$filename,$imagepath);

    //     if($stmt->execute()){
    //         echo "Image uploaded and inserted into database";
    //     }
    //     else{
    //         echo "Not inserted";
    //     }
    //     $stmt->close();
    //     $conn->close();
    // }

    ?>
