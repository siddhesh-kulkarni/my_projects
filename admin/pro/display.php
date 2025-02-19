<?php require('links.php');
require('scripts.php');
require('coursedb.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DISPLAY</title>
</head>
<!-- <body>
<div class="container-fluid bg-dark text-light p-2 d-flex align-items-center justify-content-between sticky-top">
        <h3 class="mb-0 h-font">SUVI INSTRUMENTS</h3>
        <form method="POST">
            <button name="logout" class="btn btn-light btn-sm mt-2">LOG OUT</button>
        </form>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2 text-light">ADMIN PANEL</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="navbarSupportedContent">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#"><i class="bi bi-speedometer2 mx-2"></i></i>DASHBOARD</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="course/index.php"><i class="bi bi-book mx-2"></i>COURSES</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#"><i class="bi bi-border-all mx-2"></i>WORKSHOPS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#"><i class="bi bi-motherboard mx-2"></i>MODULES</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-10 mt-5 w-50 p-4 mx- mb-2">
            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
            </div>
</body> -->

<body>
  <div class="container-fluid bg-dark text-light p-2 d-flex align-items-center justify-content-between sticky-top">
    <h3 class="mb-0 h-font">SUVI INSTRUMENTS</h3>
    <form method="POST">
      <button name="logout" class="btn btn-light btn-sm mt-2">LOG OUT</button>
    </form>

  </div>
  <div class="container-fluid">
    <div class="row" style="height: 89%;">
      <div class="d-flex border-top border-2 border-secondary flex-column fixed-left text-white bg-dark" style="width: 20%; height:101%">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
          </svg>
          <span class="fs-4">ADMIN PANEL</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link text-white" href="#"><i class="bi bi-speedometer2 mx-2"></i></i>DASHBOARD</a>
          </li>
          <li>
            <a class="nav-link text-white" href="indexc.php"><i class="bi bi-book mx-2"></i>COURSES</a>
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
      <!-- <div class="col-lg-8 p-4 ms-4"> -->
      <!-- <form method="POST">
          <div class="mb-3">
            <label>Course Name</label>
            <input type="text" class="form-control" placeholder="Enter Course Name" autocomplete="off" name="cname">
          </div>
          <div class="mb-3">
            <label>Course Details</label>
            <input type="text" class="form-control" placeholder="Enter Course Details" autocomplete="off" name="cdetails">
          </div>
          <div class="mb-3">
            <label>Course Fees</label>
            <input type="text" class="form-control" placeholder="Enter Course Name" autocomplete="off" name="cfees">
          </div>
          <div class="mb-3">
            <label>Start Date</label>
            <input type="date" class="form-control" autocomplete="off" name="cstart">
          </div>
          <div class="mb-3">
            <label>End Date</label>
            <input type="date" class="form-control" autocomplete="off" name="cend">
          </div>
          <div class="mb-3">
            <label>Course Image</label>
            <input type="file" class="form-control" autocomplete="off" name="cimg">
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form> -->
      <div class="col-lg-10 mt-5 w-50 p-4 mb-2">
        <button class="btn btn-primary mb-5"><a href="indexc.php" class="text-light text-decoration-none">Add Course</button>
<div class="container-fluid">

  <table class="table w-100" border="2px" >
    <thead class="table">
      <tr>
        <th scope="col">Sr No.</th>
        <th scope="col">Course Name</th>
        <th scope="col">Course Details</th>
        <th scope="col">Course Fees</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Course Image</th>
        <th scope="col">Operations</th>
      </tr>
    </thead>
    <tbody>
     <?php

     $conn=mysqli_connect("localhost","root","","sang");

     $query="SELECT * FROM course";
     $query_run=mysqli_query($conn,$query);
     
        if(mysqli_num_rows($query_run)>0){
          foreach($query_run as $row){
            ?>
            <tr>
            <td><?php echo $row['cid'];?></td>
            <td><?php echo $row['cname'];?></td>
            <td><?php echo $row['cdetails'];?></td>
            <td><?php echo $row['cfees'];?></td>
            <td><?php echo $row['cstart'];?></td>
            <td><?php echo $row['cend'];?></td>
            <td>
              <img src="<?php echo 'admin/upload/'.$row['cimage'];?>" width="100px" alt="images">
            </td>
          </tr>
            <?php
          }
        }
        else{
          echo "no records";
        }

     ?>


      <!-- 
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr> -->
    </tbody>
  </table>
</div>
      </div>

    </div>
  </div>
</body>

</html>