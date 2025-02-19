<?php
include('coursecode.php');
include('inc/config.php');
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE COURSE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/style.css">
    <script type="text/javascript">
        window.history.forward();

        function noBack() {
            window.history.forward();
        }
    </script>
</head>

<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
    <?php
    // $con = mysqli_connect("localhost", "root", "", "suvi");

    // $original_wname = "";
    // $original_wdetails = "";
    // $original_wfees = "";
    // $original_wstart = "";
    // $original_wend = "";
    // $original_wimage="";
    // Fetch original course data if updateid is provided
    if (isset($_GET['updateid'])) {
        $id = $_GET['updateid'];
        $sql = "SELECT * FROM courses WHERE cid='$id'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $original_wname = $row['cname'];
                $original_wdetails = $row['cdetails'];
                $original_wfees = $row['cfees'];
                $original_wstart = $row['cstart'];
                $original_wend = $row['cend'];
            } else {
                echo "No matching record found for course ID: $id";
            }

            mysqli_free_result($result);
        } else {
            echo "Error executing query: " . mysqli_error($con);
        }
    } else {
        echo "Course ID is not provided";
    }

    //update query
    if (isset($_POST['update'])) {
        $wname = $_POST['cname'];
        $wdetails = $_POST['cdetails'];
        $wfees = $_POST['cfees'];
        $wstart = $_POST['cstart'];
        $wend = $_POST['cend'];
        $wimage = $_FILES['cimage']['name'];
        // Construct the update query
        $query = "UPDATE courses SET cname='$wname', cdetails='$wdetails', cfees='$wfees', cstart='$wstart', cend='$wend', cimage='$wimage' WHERE cid='$id'";
        $query_run = mysqli_query($con, $query);
        if ($query_run) {
            $uploadDir = 'course/images/';
            $filename = $_FILES["cimage"]["name"];
            $destination = $uploadDir . $filename;
            move_uploaded_file($_FILES["cimage"]["tmp_name"], $destination);
            $_SESSION['status'] = "Image stored successfully";
            // header('location: workshop.php');
                echo <<<JS
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>

                // Additional SweetAlert code for updating payment status
                const swalWithBootstrapButtons2 = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
                });
                swalWithBootstrapButtons2.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Update Course",
                cancelButtonText: "No, cancel",
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons2.fire({
                    title: "Course Details Updated!",
                    text: "Course updated Successfully.",
                    icon: "success"
                    }).then(function() {
                    window.location.href = 'course.php'; // Redirect to desired page after updating payment status
                    });
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons2.fire({
                    title: "Cancelled",
                    text: "Course Details remains unchanged.",
                    icon: "error"
                    });
                }
                });
                </script>
                JS;

        } else {
            $_SESSION['status'] = "Image not stored successfully";
            header('location: course.php');
        }
    }
    ?>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">SuVi Instruments</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header ms-3">
                        Admin Panel
                    </li>
                    <li class="sidebar-item">
                        <a href="dashboardcopy.php" class="sidebar-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-ui-checks-grid ms-1" viewBox="0 0 16 16">
                                <path d="M2 10h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1m9-9h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1m0 9a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zm0-10a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM2 9a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2zm7 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-3a2 2 0 0 1-2-2zM0 2a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.354.854a.5.5 0 1 0-.708-.708L3 3.793l-.646-.647a.5.5 0 1 0-.708.708l1 1a.5.5 0 0 0 .708 0z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="workshop.php" class="sidebar-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-robot ms-1" viewBox="0 0 16 16">
                                <path d="M6 12.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5M3 8.062C3 6.76 4.235 5.765 5.53 5.886a26.6 26.6 0 0 0 4.94 0C11.765 5.765 13 6.76 13 8.062v1.157a.93.93 0 0 1-.765.935c-.845.147-2.34.346-4.235.346s-3.39-.2-4.235-.346A.93.93 0 0 1 3 9.219zm4.542-.827a.25.25 0 0 0-.217.068l-.92.9a25 25 0 0 1-1.871-.183.25.25 0 0 0-.068.495c.55.076 1.232.149 2.02.193a.25.25 0 0 0 .189-.071l.754-.736.847 1.71a.25.25 0 0 0 .404.062l.932-.97a25 25 0 0 0 1.922-.188.25.25 0 0 0-.068-.495c-.538.074-1.207.145-1.98.189a.25.25 0 0 0-.166.076l-.754.785-.842-1.7a.25.25 0 0 0-.182-.135" />
                                <path d="M8.5 1.866a1 1 0 1 0-1 0V3h-2A4.5 4.5 0 0 0 1 7.5V8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v1a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-1a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1v-.5A4.5 4.5 0 0 0 10.5 3h-2zM14 7.5V13a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.5A3.5 3.5 0 0 1 5.5 4h5A3.5 3.5 0 0 1 14 7.5" />
                            </svg>
                            Workshops
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="course.php" class="sidebar-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-book ms-1" viewBox="0 0 16 16">
                                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                            </svg>
                            Courses
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="stud.php" class="sidebar-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill ms-1" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                            Students
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="queries.php" class="sidebar-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-fill ms-1" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                            </svg>
                            Queries
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="crsenroll.php" class="sidebar-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
                                <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z" />
                            </svg>
                            Course Enrollment
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="wkenroll.php" class="sidebar-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
                                <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z" />
                            </svg>
                            Workshop Enrollment
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="inc/profile.jpg" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" name="logout" class="dropdown-item" onclick="logout()">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <h3 class="ms-5">Offline Course</h3>
                    <div class="card ms-5 col-lg-10 col-md-10">
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label>Workshop Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Workshop Name" autocomplete="off" name="cname" value="<?php echo $original_wname; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label>Workshop Details</label>
                                    <input type="text" class="form-control" placeholder="Enter Workshop Details" autocomplete="off" name="cdetails" value="<?php echo $original_wdetails; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label>Workshop Fees</label>
                                    <input type="text" class="form-control" placeholder="Enter Workshop Fees" autocomplete="off" name="cfees" value="<?php echo $original_wfees; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label>Start Date</label>
                                    <input type="date" class="form-control" autocomplete="off" name="cstart" value="<?php echo $original_wstart; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label>End Date</label>
                                    <input type="date" class="form-control" autocomplete="off" name="cend" value="<?php echo $original_wend; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label>Workshop Image</label>
                                    <input type="file" class="form-control" autocomplete="off" name="cimage" value="<?php echo $original_wimage; ?>" required>
                                    <img src="<?php echo 'course/images/' . $row['cimage']; ?>" width="150px" alt="images" class="mt-2">
                                </div>
                                <!-- <button type="submit" class="btn btn-primary" name="update"><a href="workshop.php" class=" text-white text-decoration-none">Update</button> -->
                                <button type="submit" class="btn btn-primary" name="update">Update</button>
                                <button type="submit" class="btn btn-secondary" name="submit"><a href="course.php" class=" text-white text-decoration-none">Cancel</a></button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <!-- <i class="fa-regular fa-moon"></i> -->
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>SuVi</strong>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
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
                        window.location.href = "../admin.php";
                    });
                }
            });
    }
</script>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="inc/script.js"></script>