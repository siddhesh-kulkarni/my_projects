<?php
include('inc/header copy.php');
include('inc/links.php');
include('../project/admin/inc/config.php');
// $con = mysqli_connect("localhost", "root", "", "suvi");

// Function to check if email exists in the database
function emailExists($email, $con) {
    $query = "SELECT * FROM student WHERE semail = '$email'";
    $result = mysqli_query($con, $query);
    return mysqli_num_rows($result) > 0;
}

if (isset($_POST['register'])) {
    $Fname = $_POST['fname'];
    $Mname = $_POST['mname'];
    $Lname = $_POST['lname'];
    $Edu = $_POST['educ'];
    $Mail = $_POST['mail'];
    $Pass = $_POST['pass'];
    $Mobno = $_POST['mobno'];
    $Add = $_POST['addr'];

    // Check if email already exists
    if (emailExists($Mail, $con)) {
        echo <<<JS
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <script>
            swal({
                title: "Registration Failed!",
                text: "Email already exists",
                icon: "error",
                button: "OK",
            });
        </script>
JS;
    } else {
        $query = "INSERT INTO `student` (sfname, smname, slname, sedu, semail, spass, smobile, sadd) VALUES ('$Fname', '$Mname', '$Lname', '$Edu', '$Mail', '$Pass', '$Mobno', '$Add')";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            echo <<<JS
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
            <script>
                swal({
                    title: "Registered Successful!",
                    icon: "success",
                    button: "OK",
                }).then(function() {
                    window.location.href = 'student.php';
                });
            </script>
JS;
        } else {
            echo <<<JS
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
            <script>
                swal({
                    title: "Registration Failed!",
                    text: "An error occurred while registering",
                    icon: "error",
                    button: "OK",
                });
            </script>
JS;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="Images/favicon.ico">
    <title>Registration</title>
    <script>
    function validateInput(event) {
        const input = event.target.value;
        if (/\d/.test(input)) {
            event.target.value = '';
            alert("Please enter only letters.");
        }
    }

    function validatePhoneNumber(event) {
        const input = event.target.value;
        const regex = /^[7-9]\d{9}$/;
        if (!regex.test(input) || input.length !== 10 || input.startswith(7||8||9)==FALSE) {
            event.target.value = '';
            alert("Please enter a valid phone number starting with 7, 8, or 9 and of length exactly 10.");
        }
    }

    function validateEmail(event) {
        const email = event.target.value;
        const regex = /@(yahoo\.com|gmail\.com)$/i;
        if (!regex.test(email)) {
            alert("Please enter a valid Yahoo or Gmail email address.");
            event.target.value = '';
        }
    }
</script>
</head>

<body style="background-color: #F3F3F3;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card my-3 shadow">
                    <h2 class="text-center py-3 bg-dark text-white"><i class="bi bi-people-fill fs-3 me-2"></i>Student Registration</h2>
                    <div class="card-body">
                        <form method="POST">
                            <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lb-base">
                                Note: All the details in the form are mandatory.
                            </span>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 ps-0 mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control shadow-none" oninput="validateInput(event)" name="fname" required autofocus>
                                    </div>
                                    <div class="col-md-6 ps-0 mb-3">
                                        <label class="form-label">Middle Name</label>
                                        <input type="text" class="form-control shadow-none" oninput="validateInput(event)" name="mname" required>
                                    </div>
                                    <div class="col-md-6 ps-0 mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control shadow-none" oninput="validateInput(event)" name="lname" required>
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <label class="form-label">Education</label>
                                        <input type="text" class="form-control shadow-none" name="educ" required>
                                    </div>
                                    <div class="col-md-6 ps-0 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control shadow-none" onblur="validateEmail(event)" name="mail" required>
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control shadow-none" name="pass" required>
                                    </div>
                                    <div class="col-md-6 ps-0 mb-3">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" maxlength="10" class="form-control shadow-none" onblur="validatePhoneNumber(event)" required pattern="[7-9][0-9]{9}" name="mobno" required>
                                    </div>
                                    <div class="col-md-12 ps-0 mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" rows="1" name="addr" required></textarea>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <button type="submit" class="btn text-white custom-bg shadow-none" name='register'>REGISTER</button>
                                    <a href="student.php" class="text-decoration-none">Already have account? Login Here</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
include('inc/footer.php');
?>