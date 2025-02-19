 <!--Navbar start-->
 <nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-3 py-lg-0 shadow sticky-top">
   <div class="container-fluid">
     <!-- <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">SuVi</a> -->
     <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="studindex.php"><img src="../Images/suvititle1.png" class="title" style="height: 40px;"></a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
           <a class="nav-link me-2" aria-current="page" href="studindex.php">Home</a>
         </li>
         <li class="nav-item">
           <a class="nav-link me-2" href="studcompany.php">Company Profile</a>
         </li>
         <li class="nav-item">
           <a class="nav-link me-2" href="studwshop.php">Workshops</a>
         </li>
         <li class="nav-item">
           <a class="nav-link me-2" href="studcourse.php">Courses</a>
         </li>
         <li class="nav-item">
           <a class="nav-link me-2" href="studvlab.php">Virtual Lab</a>
         </li>
         <li class="nav-item">
         <a class="nav-link me-2" href="studcontact.php">Contact Us</a>
         </li>
       </ul>
       <div class="d-flex" role="search">
       <!-- <li class="nav-item"> -->
         <a class="nav-link mx-2" href="studprofile.php" onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">My Profile</a>
         <a class="nav-link mx-2" href="#" onclick="logout()">Logout</a>
       </div>
     </div>
   </div>
 </nav>

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
<script>
    function logout() {
        swal({
                title: "Are you sure?",
                text: "You will be logged out.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willLogout) => {
                if (willLogout) {
                    swal({
                        title: "Logout Successful!",
                        icon: "success",
                        button: "OK",
                    }).then(function() {
                        sessionStorage.setItem('loggedin', false);
                        sessionStorage.removeItem('email');
                        window.location.href = "../student.php";
                    });
                }
            });
    }
</script>
<script type="text/javascript">
        window.history.forward();

        function noBack() {
            window.history.forward();
        }
    </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">