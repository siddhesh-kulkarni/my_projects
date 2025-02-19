<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SuVi</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <?php require('studlinks.php'); 
  include('../admin/inc/config.php');
  ?>

</head>

<body style="background-color:#F3F3F3;">

  <?php require('headerstud.php');
  ?>

  <!--title start-->
  <!-- <div class="content">
    <img src="Images/suvititle.png" class="rm">
  </div> -->
  <!--title end-->

  <!--Carousel start-->

  <div class="container-fluid">
    <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="../Images/1.png" class="m-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="../Images/2.jpg" class="m-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="../Images/3.jpg" class="m-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="../Images/4.png" class="m-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="../Images/5.jpg" class="m-100 d-block" />
        </div>
      </div>
    </div>
  </div>
  <!--Carousel End-->

  <!--Our Courses start-->
  <!-- <h2 class="mt-3 pt-4 mb-4 text-center fw-bold h-font">Our Courses</h2>
  <div class="container">
    <div class="row">
      <?php
      $i = 1;
      // $conn = mysqli_connect("localhost", "root", "", "suvi");

      $query = "SELECT * FROM courses";
      $query_run = mysqli_query($con, $query);

      if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $row) {
          $id = $row['cid'];
          $name = $row['cname'];
          $detail = $row['cdetails'];
          $fees = $row['cfees'];
          $start = $row['cstart'];
          $end = $row['cend'];
      ?>
          <div class="col-lg-4 col-md-6 my-3 p-0 m-0">
            <div class="card border-0 shadow h-100" style="width: 350px; margin:auto;">
              <img src="<?php echo 'admin/course/images' . $row['cimage']; ?>" height="250px" width="350px" alt="images">
              <div class="card-body">
                <h5 class="card-title"><?php echo $name; ?></h5>
                <h6 class="mb-4"><?php echo $fees; ?></h6>
                <div class="features mb-4">
                  <h6 class="mb-2">About Course</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    60 Hrs/Days
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $start; ?>
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $end; ?>
                  </span>
                  <h6 class="mt-2"><?php echo $detail; ?></h6>
                </div>
                <div class="d-flex justify-content-evenly mb-2">
                  <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Enroll Now</a>
                </div>
              </div>
            </div>
          </div>
      <?php

        }
      } else {
        echo "no records";
      }
      ?> -->
      <!-- <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow h-100" style="width: 350px; margin:auto;">
          <img src="Courses/ds.png" class="card-img-top h-100">
          <div class="card-body">
            <h5 class="card-title">Data Science and Machine Learning</h5>
            <h6 class="mb-4">₹1500/-</h6>
            <div class="features mb-4">
              <h6 class="mb-2">About Course</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Online Course
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                60 Hrs/Days
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Certificate
              </span>
              <h6 class="mt-2">Students are learning about: Artificial Intelligence and its Applications, Machine Learning algorithms
                and its application, Deep Learning and Data Science.</h6>
            </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Enroll Now</a>
              <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Deatils</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow h-100" style="width: 350px; margin:auto;">
          <img src="Courses/bluetooth.png.jpg" class="card-img-top h-100">
          <div class="card-body">
            <h5 class="card-title">Embedded System Designing with Sensor Interfacing</h5>
            <h6 class="mb-4">₹4000/-</h6>
            <div class="features mb-4">
              <h6 class="mt-1">About Course</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Offline Workshop
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                60 Hrs/Days
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Certificate
              </span>
              <h6 class="mt-2">Student able to learn: Embedded C with industry level microcontrollers,
                Various sensors and devices interfacing, Students can build up to 20 projects.</h6>
            </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Enroll Now</a>
              <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Deatils</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow h-100" style="width: 350px; margin:auto;">
          <img src="Courses/raspberry_pi.jpg" class="card-img-top h-50 mb-2">
          <div class="card-body">
            <h5 class="card-title">Python & IoT Services with Raspberry pi</h5>
            <h6 class="mb-4">₹2500/-</h6>
            <div class="features mb-4">
              <h6 class="mt-1">About Course</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Offline Workshop
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                21 Hrs/Days
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Certificate
              </span>
                <h6 class="mt-3">Student able to learn: Python with Various sensors and devices interfacing,
                  IoT Configuration, able to build up to 10 projects on that.</h6>
            </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Enroll Now</a>
              <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Deatils</a>
            </div>
          </div>
        </div>
      </div> -->
      <!-- <div class="col-lg-12 text-center mt-5">
        <a href="#" class="btn btn-sm btn-outline-dark roundede-0 fw-bold shadow-none">More Workshops >>></a>
      </div> -->

    </div>
  </div>
  <!--Our courses end-->

  <!--Our Courses start-->
   <!-- <h2 class="mt-3 pt-4 mb-4 text-center fw-bold h-font">Our Workshops</h2>
  <div class="container">
    <div class="row "> -->
      <?php
      // $i = 1;
      // $conn = mysqli_connect("localhost", "root", "", "suvi");

      // $query = "SELECT * FROM workshop";
      // $query_run = mysqli_query($conn, $query);

      // if (mysqli_num_rows($query_run) <5) {
      //   foreach ($query_run as $row) {
      //     $id = $row['wid'];
      //     $name = $row['wname'];
      //     $detail = $row['wdetails'];
      //     $fees = $row['wfees'];
      //     $start = $row['wstart'];
      //     $end = $row['wend'];
      ?>
          <!-- <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow h-100" style="width: 350px; margin:auto;">
              <img src="<?php echo 'admin/workshop/images/' . $row['wimage']; ?>" height="250px" width="350px" alt="images">
        
              <div class="card-body">
                <h5 class="card-title"><?php echo $name; ?></h5>
                <h6 class="mb-4"><?php echo $fees; ?></h6>
                <div class="features mb-4">
                  <h6 class="mb-2">About Course</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    60 Hrs/Days
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $start; ?>
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $end; ?>
                  </span>
                  <h6 class="mt-2"><?php echo $detail; ?></h6>
                </div>
                <div class="d-flex justify-content-evenly mb-2">
                  <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Enroll Now</a>
              
                </div>
              </div>
            </div>
          </div> -->
      <?php
      //   }
      // } else {
      //   echo "no records";
      // }
      ?> 
      <!-- <div class="col-lg-3 col-md-3 my-3">
        <div class="card border-0 shadow p-0 h-100" style="width: 300px; margin:auto;">
          <img src="../Courses/ds.png" class="card-img-top h-100">
          <div class="card-body">
            <h5 class="card-title">Data Science and Machine Learning</h5>
            <h6 class="mb-4">₹1500/-</h6>
            <div class="features mb-4">
              <h6 class="mb-2">About Course</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Online Course
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                60 Hrs/Days
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Certificate
              </span>
              <h6 class="mt-2">Students are learning about: Artificial Intelligence and its Applications, Machine Learning algorithms
                and its application, Deep Learning and Data Science.</h6>
            </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Enroll Now</a>
              <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Deatils</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 my-3">
        <div class="card border-0 shadow p-0 h-100" style="width: 300px; margin:auto;">
          <img src="../Courses/ds.png" class="card-img-top h-100">
          <div class="card-body">
            <h5 class="card-title">Data Science and Machine Learning</h5>
            <h6 class="mb-4">₹1500/-</h6>
            <div class="features mb-4">
              <h6 class="mb-2">About Course</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Online Course
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                60 Hrs/Days
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Certificate
              </span>
              <h6 class="mt-2">Students are learning about: Artificial Intelligence and its Applications, Machine Learning algorithms
                and its application, Deep Learning and Data Science.</h6>
            </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Enroll Now</a>
              <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Deatils</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 my-3">
        <div class="card border-0 shadow p-0 h-100" style="width: 300px; margin:auto;">
          <img src="../Courses/ds.png" class="card-img-top h-100">
          <div class="card-body">
            <h5 class="card-title">Data Science and Machine Learning</h5>
            <h6 class="mb-4">₹1500/-</h6>
            <div class="features mb-4">
              <h6 class="mb-2">About Course</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Online Course
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                60 Hrs/Days
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Certificate
              </span>
              <h6 class="mt-2">Students are learning about: Artificial Intelligence and its Applications, Machine Learning algorithms
                and its application, Deep Learning and Data Science.</h6>
            </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Enroll Now</a>
              <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Deatils</a>
            </div>
          </div>
        </div>
      </div> -->
      <!-- <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow h-100" style="width: 350px; margin:auto;">
          <img src="../Courses/bluetooth.png.jpg" class="card-img-top h-100">
          <div class="card-body">
            <h5 class="card-title">Embedded System Designing with Sensor Interfacing</h5>
            <h6 class="mb-4">₹4000/-</h6>
            <div class="features mb-4">
              <h6 class="mt-1">About Course</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Offline Workshop
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                60 Hrs/Days
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Certificate
              </span>
              <h6 class="mt-2">Student able to learn: Embedded C with industry level microcontrollers,
                Various sensors and devices interfacing, Students can build up to 20 projects.</h6>
            </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Enroll Now</a>
              <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Deatils</a>
            </div>
          </div>
        </div>
      </div> -->
      <!-- <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow h-100" style="width: 350px; margin:auto;">
          <img src="Courses/raspberry_pi.jpg" class="card-img-top h-50 mb-2">
          <div class="card-body">
            <h5 class="card-title">Python & IoT Services with Raspberry pi</h5>
            <h6 class="mb-4">₹2500/-</h6>
            <div class="features mb-4">
              <h6 class="mt-1">About Course</h6>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Offline Workshop
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                21 Hrs/Days
              </span>
              <span class="badge rounded-pill bg-light text-dark text-wrap">
                Certificate
              </span>
              <h6 class="mt-3">Student able to learn: Python with Various sensors and devices interfacing,
                IoT Configuration, able to build up to 10 projects on that.</h6>
            </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Enroll Now</a>
              <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Deatils</a>
            </div>
          </div>
        </div>
      </div> -->
      <!-- <div class="col-lg-12 text-center mt-5">
        <a href="#" class="btn btn-sm btn-outline-dark roundede-0 fw-bold shadow-none">More Workshops >>></a>
      </div> -->

    </div>
  </div>
  <!--Our courses end-->

  <!--Reach us start -->
  <h2 class="mt-4 pt-4 text-center fw-bold h-font mb-4">REACH US</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 p-4 mb-lg-0 bg-white rounded shadow">
        <iframe class="w-100 rounded" height="330px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3802.0596364803628!2d75.90998837494101!3d17.64733428328484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc5db41f11402e1%3A0x5747f71faa06b6ce!2sSuVi%20Instruments!5e0!3m2!1sen!2sin!4v1706204953994!5m2!1sen!2sin" loading="lazy"></iframe>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="bg-white p-4 rounded mb-3 shadow">
          <h5>Call Us</h5>
          <a href="tel: +918087373881" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i>+918087373881</a><br>
          <a href="tel: +918087373881" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i>+919284211884</a>
          <h5>Email</h5>
          <a href="tel: +918087373881" class="d-inline-block text-decoration-none text-dark">
            <i class="bi bi-envelope me-2"></i>suvi.instrument@gmail.com</a>
        </div>

        <div class="bg-white p-4 rounded mb-3 shadow">
          <h5>Follow Us</h5>
          <a href="#" class="d-inline-block">
            <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-facebook me-1"></i>Facebook</span>
          </a> <br>
          <a href="#" class="d-inline-block">
            <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-instagram me-1"></i>Instagram</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!--Reach us end -->

  <?php require('studfooter.php'); ?>
  <!-- <div class="content">
      <img src="Images/Suvi2-removebg-preview11.png" class="rm" height="200px" width="200px">
      <h1 class="name">Welcome to SuVi Instruments</h1>
      <small class="name">Innovative Embedded System Design</small><br><br>
      <a href="login.html" class="btn btn-danger">Get Started</a>
</div> -->

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      }
    });
  </script>
</body>

</html>