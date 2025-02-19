<?php
session_start();
require('headerstud.php');
require('studlinks.php');
include('../admin/inc/config.php');
// $con = mysqli_connect('localhost', 'root', '', 'suvi');
$id = $_SESSION['id'];
// $query = "SELECT * FROM `student` WHERE `semail`='$mail'";
$query = "SELECT sfname,smname,slname,sedu,semail,spass,smobile,sadd FROM student WHERE `sid`='$id'";
$query_run = mysqli_query($con, $query);
if (mysqli_num_rows($query_run) > 0) {
  foreach ($query_run as $row) {
    // $id = $row['sid'];
    $sf = $row['sfname'];
    $sm = $row['smname'];
    $sl = $row['slname'];
    $sedu = $row['sedu'];
    $semail = $row['semail'];
    $spaa = $row['spass'];
    $smobile = $row['smobile'];
    $sadd = $row['sadd'];
  }
}

if(isset($_POST['update'])){
  $sfname=$_POST['fname'];
  $smname=$_POST['mn'];
  $slname=$_POST['ln'];
  $se=$_POST['educ'];
  $smail=$_POST['mail'];
  $spss=$_POST['pass'];
  $smob=$_POST['mobno'];
  $sad=$_POST['addr'];

  $q="UPDATE `student` SET `sfname`='$sfname',`smname`='$smname',`slname`='$slname',`sedu`='$se',`semail`='$smail',`spass`='$spss',`smobile`='$smob',`sadd`='$sad' WHERE `sid`='$id'";
  $qr=mysqli_query($con,$q);
//   if($qr){
//     echo <<<JS
//             <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
//             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
//             <script>
//                 swal({
//                     title: "Profile Updated Successfully!",
//                     icon: "success",
//                     button: "OK",
//                 }).then(function() {
//                     window.location.href = 'studprofile.php';
//                 });
//             </script>
// JS;
//   }
if($qr){
  echo <<<JS
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
const swalWithBootstrapButtons = Swal.mixin({
customClass: {
  confirmButton: "btn btn-success",
  cancelButton: "btn btn-danger"
},
buttonsStyling: false
});
swalWithBootstrapButtons.fire({
title: "Are you sure?",
text: "You won't be able to revert this!",
icon: "warning",
showCancelButton: true,
confirmButtonText: "Yes, update it! ",
cancelButtonText: "No, cancel!",
reverseButtons: true
}).then((result) => {
if (result.isConfirmed) {
  swalWithBootstrapButtons.fire({
    title: "Updated!",
    text: "Your profile has been updated.",
    icon: "success"
  }).then(function() {
    window.location.href = 'studprofile.php';
  });
} else if (
  result.dismiss === Swal.DismissReason.cancel
) {
  swalWithBootstrapButtons.fire({
    title: "Cancelled",
    text: "Your profile remains unchanged.",
    icon: "error"
  });
}
});
</script>
JS;
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="shortcut icon" type="x-icon" href="../Images/favicon.ico">
  <title>MY PROFILE</title>
</head>

<body style="background-color:#F3F3F3;">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col=md-5">
        <div class="card my-3 shadow">
          <h2 class="text-center py-2"><?php echo "Welcome" . " " . $sf; ?></h2>
          <div class="card-body">
            <form method="POST">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control shadow-none" name="fname" value="<?php echo $sf; ?>" required>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Middle Name</label>
                    <input type="text" class="form-control shadow-none" name="mn" value="<?php echo $sm; ?>" required>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control shadow-none" name="ln" value="<?php echo $sl; ?>" required>
                  </div>
                  <div class="col-md-6 p-0">
                    <label class="form-label">Education</label>
                    <input type="text" class="form-control shadow-none" name="educ" value="<?php echo $sedu; ?>" required>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control shadow-none" name="mail" value="<?php echo $semail; ?>" required>
                  </div>
                  <div class="col-md-6 p-0">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control shadow-none" name="pass" value="<?php echo $spaa; ?>" id="password" required>
                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                      <i class="bi bi-eye"></i></button>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" maxlength="10" class="form-control shadow-none" name="mobno" required pattern="[7-9][0-9]{9}" value="<?php echo $smobile; ?>" required>
                  </div>
                  <div class="col-md-12 ps-0 mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" rows="1" name="addr" value="<?php echo $sadd; ?>" required>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <button type="submit" class="btn text-white custom-bg shadow-none" name='update'>UPDATE</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-7 col-md-7">
        <div class="card my-3 shadow">
          <div class="card-body">
            <h3>Enrolled Course</h3>
            <table class="table table-striped mt-3">
              <thead>
                <tr>
                  <th scope="col">Sr.No.</th>
                  <th scope="col">Course Name</th>
                  <th scope="col">Transcation ID</th>
                  <th scope="col">Payment Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                $cq = "SELECT * FROM crsenroll WHERE `sid`=$id";
                $re = mysqli_query($con, $cq);

                  if (mysqli_num_rows($re) > 0) {
                    foreach ($re as $row){
                    $cname = $row['cname'];
                    $td = $row['transaction_id'];
                    $pay = $row['payment'];

                    echo '
                         <tr>
                         <td>' . $i++ . '</td>
                         <td>' . $cname . '</td>
                         <td>' . $td . '</td>
                         <td>
                            <button class="btn btn-success tb8">' . $pay . '</button>
                         </td>
                         </tr>
                          ';
                    }
                  } else {
                    echo "Sorry You have Enrolled any Course";
                  }
                
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-lg-12 col-md-12">
          <div class="card my-3 shadow">
            <div class="card-body">
              <h3>Enrolled Workshop</h3>
              <table class="table table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">Sr.No.</th>
                    <th scope="col">Workshop Name</th>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Payment Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  $cq = "SELECT * FROM wkenroll WHERE `sid`=$id";
                  $re = mysqli_query($con, $cq);
                    if (mysqli_num_rows($re) > 0) {
                      foreach ($re as $row){
                      $wname = $row['wname'];
                      $td = $row['transaction_id'];
                      $pay = $row['payment'];

                      echo '
                         <tr>
                         <td>' . $i++ . '</td>
                         <td>' . $wname . '</td>
                         <td>' . $td . '</td>
                         <td>
                            <button class="btn btn-success tb8">' . $pay . '</button>
                         </td>
                         </tr>
                          ';
                      }
                    } else {
                      echo "Sorry You have Enrolled any Workshop";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>
<script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');
  togglePassword.addEventListener('click', () => {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // Toggle the eye icon
    togglePassword.querySelector('i').classList.toggle('bi-eye');
    togglePassword.querySelector('i').classList.toggle('bi-eye-slash');
  });
</script>