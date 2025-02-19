 <!--Navbar start-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-lg-3 py-lg-0 shadow-sm sticky-top">
   <div class="container-fluid">
     <!-- <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">SuVi</a> -->
     <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php"><img src="Images/suvititle1.png" class="title" style="height: 40px;"></a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
           <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
         </li>
         <li class="nav-item">
           <a class="nav-link me-2" href="company.php">Company Profile</a>
         </li>
         <!-- <li class="nav-item">
           <a class="nav-link me-2" href="#">Courses</a>
         </li> -->
         <li class="nav-item">
           <a class="nav-link me-2" href="#">Workshops</a>
         </li>
         <li class="nav-item">
           <a class="nav-link me-2" href="#">Modules</a>
         </li>
         <!-- <li class="nav-item">
           <a class="nav-link me-2" href="#">Projects</a>
         </li> -->
         <li class="nav-item">
           <a class="nav-link me-2" href="#">Virtual Lab</a>
         </li>
         <!-- <li class="nav-item">
           <a class="nav-link me-2" href="#">RSC Center</a>
         </li>
         <li class="nav-item">
           <a class="nav-link me-2" href="#">STEM LAB</a>
         </li>
         <li class="nav-item"> -->
         <a class="nav-link me-2" href="contact.php">Contact Us</a>
         </li>
       </ul>
       <div class="d-flex" role="search">
         <!-- <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#LoginModal">
            Login
          </button>
          <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
            Register
          </button> -->
         <div class="dropdown">
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
          </button>
         <!-- <div class="dropdown1">
           <button type="button" class="dropbtn btn btn-primary shadow-none me-lg-3 me-2">
             Register
           </button>
           <div class="dropdown-content1 text-center">
             <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal2">Admin</a>
             <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal1">User</a>
           </div>
         </div> -->
       </div>
     </div>
   </div>
 </nav>
 <!--navbar end-->

 <!--login start-->
 <div class="modal fade" id="LoginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <form>
         <div class="modal-header">
           <h5 class="modal-title d-flex align-items-center">
             <i class="bi bi-people-fill fs-3 me-2"></i>Student Login
           </h5>
           <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
           <div class="mb-3">
             <label class="form-label">Email address</label>
             <input type="email" class="form-control shadow-none">
           </div>
           <div class="mb-4">
             <label class="form-label">Password</label>
             <input type="password" class="form-control shadow-none">
           </div>
           <div class="d-flex align-items-center justify-content-between mb-2">
             <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
             <a href="javascript: void(0)" class="text-decoration-none">New Student?Register Here</a>
           </div>
         </div>
       </form>
     </div>
   </div>
 </div>
 <!--login end-->


 <!--register start-->
 <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <form method="POST">
         <div class="modal-header">
           <h5 class="modal-title d-flex align-items-center">
             <i class="bi bi-person-lines-fill fs-3 me-2"></i>Student Registration
           </h5>
           <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
           <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lb-base">
           Note: All the details in the form are mandatory.
           </span>
           <div class="container-fluid">
             <div class="row">
               <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">First Name</label>
                 <input type="text" class="form-control shadow-none"  name="fname" required>
               </div>
               <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">Middle Name</label>
                 <input type="text" class="form-control shadow-none"  name="mname" required>
               </div>
               <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">Last Name</label>
                 <input type="text" class="form-control shadow-none"  name="lname" required>
               </div>
               <div class="col-md-6 p-0">
                 <label class="form-label">Education</label>
                 <input type="text" class="form-control shadow-none"  name="educ" required>
               </div>
               <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">Email</label>
                 <input type="email" class="form-control shadow-none"  name="mail" required>
               </div>
               <div class="col-md-6 p-0">
                 <label class="form-label">Password</label>
                 <input type="password" class="form-control shadow-none"  name="pass" required>
               </div>
               <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">Mobile Number</label>
                 <input type="text" class="form-control shadow-none" name="mobno" required>
               </div>
               <div class="col-md-12 ps-0 mb-3">
                 <label class="form-label">Address</label>
                 <textarea class="form-control" rows="1" name="addr" required></textarea>
               </div>
             </div>
             <div class="text-center my-1">
               <button type="submit" class="btn btn-dark shadow-none" name="register">REGISTER</button>
             </div>
           </div>
         </div>
       </form>
     </div>
   </div>
 </div>
 <?php
include('studreg.php');
 ?>
 <!--register end-->
 <!--admin register start-->
 <!-- <div class="modal fade" id="registerModal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <form action="admin/regad.php" method="post">
         <div class="modal-header">
           <h5 class="modal-title d-flex align-items-center">
             <i class="bi bi-person-lines-fill fs-3 me-2"></i>Admin Registration
           </h5>
           <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
           <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lb-base">
           Note: All the details in the form are mandatory.
           </span>
           <div class="container-fluid">
             <div class="row">
               <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">First Name</label>
                 <input type="text" class="form-control shadow-none" name="afname" required>
               </div>
               <div class="col-md-6 p-0 mb-3">
                 <label class="form-label">Last Name</label>
                 <input type="text" class="form-control shadow-none" name="alname" required>
               </div>
               <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">Email</label>
                 <input type="email" class="form-control shadow-none" name="aemail" required>
               </div>
               <div class="col-md-6 p-0">
                 <label class="form-label">Password</label>
                 <input type="password" class="form-control shadow-none" name="apass" required>
               </div>
               <div class="col-md-6 ps-0 mb-3">
                 <label class="form-label">Mobile Number</label>
                 <input type="text" class="form-control shadow-none" name="amob" required>
               </div>
             </div>
             <div class="text-center my-1">
               <button type="submit" class="btn btn-dark shadow-none">REGISTER</button>
             </div>
           </div>
         </div>
       </form>
     </div>
   </div>
 </div> -->
 <!--admin register end-->