<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SuVi-Company</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <?php 
  session_start();
  require('studlinks.php');
  require('headerstud.php');
  include('studqueries.php');
  include('../admin/inc/config.php');
  ?>
</head>
<body style="background-color:#F3F3F3;">
<div>
  <div class="container">
      <div class="my-5 px-3">
        <h2 class="fw-bold h-font text-center">About Suvi</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
          Our mission is to provide comprehensive, cost-effective next-generation
          embedded hardware and software solutions<br> in the quickest time feasible,
          allowing our customers to launch their product ideas sooner.
        </p>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 mb-5 px-4">
          <div class="col-lg-12 col-md-12 p-4 mb-lg-0 mb-1 bg-white rounded shadow">
            <iframe class="w-100 rounded" height="239px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3802.0596364803628!2d75.90998837494101!3d17.64733428328484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc5db41f11402e1%3A0x5747f71faa06b6ce!2sSuVi%20Instruments!5e0!3m2!1sen!2sin!4v1706204953994!5m2!1sen!2sin" loading="lazy"></iframe>
            <h5>Address</h5>
            <a href="https://maps.app.goo.gl/9xBpgfDd967LBtAX8" class="d-inline-block text-decoration-none text-dark mb-2">
              <i class="bi bi-geo-alt-fill"></i>Shop no. 03, Sudeep Complex, Hotgi Rd, Sainath Nagar, Solapur, Maharashtra 413003</a>
            <h5>Call Us</h5>
            <a href="tel: +918087373881" class="d-inline-block mb-2 text-decoration-none text-dark">
              <i class="bi bi-telephone-fill"></i>+918087373881</a><br>
            <a href="tel: +918087373881" class="d-inline-block mb-2 text-decoration-none text-dark">
              <i class="bi bi-telephone-fill"></i>+919284211884</a>
            <h5>Email</h5>
            <a href="tel: +918087373881" class="d-inline-block mb-2 text-decoration-none text-dark">
              <i class="bi bi-envelope me-2"></i>suvi.instrument@gmail.com</a>
              <h5>Follow Us</h5>
          <a href="#" class="d-inline-block">
            <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-facebook me-1"></i>Facebook</span>
          </a> <br>
          <a href="#" class="d-inline-block">
            <span class="badge bg-light text-dark fs-6 p-2"><i class="bi bi-instagram me-1"></i>Instagram</span>
          </a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 px-4">
          <div class="bg-white rounded shadow p-4">
            <form method="POST">
              <h5>Ask Queries</h5>
              <div class="mb-3">
                <label class="form-label" style="font-weight: 500;">Name</label>
                <input type="text" name="qname" class="form-control shadow-none" required>
              </div>
              <div class="mb-3">
                <label class="form-label" style="font-weight: 500;">Email</label>
                <input type="email" name="qmail" class="form-control shadow-none" required>
              </div>
              <div class="mb-3">
                <label class="form-label" style="font-weight: 500;">Mobile No</label>
                <input type="text" maxlength="10" name="qmob" class="form-control shadow-none" required pattern="[7-9][0-9]{9}" required>
              </div>
              <div class="mb-3">
                <label class="form-label" style="font-weight: 500;">Subject</label>
                <input type="text" name="qsub" class="form-control shadow-none" required>
                <div class="mb-3 mt-3">
                  <label class="form-label" style="font-weight: 500;">Query</label>
                  <textarea name="query" rows="4" style="resize: none;" class="form-control shadow-none" required></textarea>
                </div>
                <button type="submit" name="send" class="btn custom-bg shadow-none text-white">SEND</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
  
</body>
</html>
<?php require('studfooter.php'); ?>