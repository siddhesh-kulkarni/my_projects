 <!--Navbar start-->
 <nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-3 py-lg-0 shadow sticky-top">
   <div class="container-fluid">
     <!-- <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">SuVi</a> -->
     <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php"><img src="Images/suvititle1.png" class="title" style="height: 40px;"></a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
           <a class="nav-link  me-2" aria-current="page" href="index.php">Home</a>
         </li>
         <li class="nav-item">
           <a class="nav-link  me-2" href="company.php">Company Profile</a>
         </li>
         <li class="nav-item">
           <a class="nav-link  me-2" href="wshop.php">Workshops</a>
         </li>
         <li class="nav-item">
           <a class="nav-link  me-2" href="course.php">Courses</a>
         </li>
         <li class="nav-item">
           <a class="nav-link  me-2" href="vlab.php">Virtual Lab</a>
         </li>
         <li class="nav-item">
         <a class="nav-link  me-2" href="contact.php">Contact Us</a>
         </li>
       </ul>
       <div class="d-flex" role="search">
       <!-- <li class="nav-item"> -->
         <a class="nav-link  mx-2" href="student.php">Student</a>
         <a class="nav-link  mx-2" href="admin.php">Admin</a>
         <!-- </li> -->
         <!-- <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#LoginModal">
            Login
          </button>
          <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
            Register
          </button> -->
         <!-- <div class="dropdown">
           <button type="button" class="dropbtn btn btn-primary shadow-none me-lg-3 me-3">
             Login
           </button>
           <div class="dropdown-content text-center">
             <a href="admin/index.php">Admin</a>
             <a href="#" data-bs-toggle="modal" data-bs-target="#LoginModal">Student</a>
           </div>
         </div>
         <button type="button" class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
            Register
          </button> -->
       </div>
     </div>
   </div>
 </nav>
 <!--navbar end-->

 <!--login start-->
 <!--login end-->


 <!--register start-->
  <?php
// include('studreg.php');
 ?>
 <script>
  // Get the current URL
  var currentUrl = window.location.href;

  // Get all the navigation links
  var navLinks = document.querySelectorAll('.navbar-nav .nav-link');

  // Loop through each navigation link
  navLinks.forEach(function(navLink) {
    // Check if the link's href matches the current URL
    if (navLink.href === currentUrl) {
      // Add the 'active' class to the link
      navLink.classList.add('active');
    }
  });
</script>