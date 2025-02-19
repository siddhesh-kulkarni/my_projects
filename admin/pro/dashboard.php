<?php
require('links.php');
require('scripts.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
        div.header {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 60px;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid bg-dark text-light p-2 d-flex align-items-center justify-content-between sticky-top">
        <h3 class="mb-0 h-font">SUVI INSTRUMENTS</h3>
        <form method="POST">
            <button name="logout" class="btn btn-light btn-sm mt-2">LOG OUT</button>
        </form>

    </div>
    <div class="col-lg-2 bg-dark border-top border-3 border-secondary h-100" id="dashboard-menu">
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
                            <a class="nav-link text-white"  href="course/index.php"><i class="bi bi-book mx-2"></i>COURSES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white"  href="#"><i class="bi bi-border-all mx-2"></i>WORKSHOPS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white"  href="#"><i class="bi bi-motherboard mx-2"></i>MODULES</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    

    <?php
    // session_regenerate_id(true);
    if (isset($_POST['logout'])) {
        session_destroy();
        header("location: admin/index.php");
    }
    ?>
</body>

</html>