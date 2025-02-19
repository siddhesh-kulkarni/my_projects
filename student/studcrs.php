<?php
include('headerstud.php');
include('studlinks.php');
include('../admin/inc/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
    <style>
        .work {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 40px;
            color: rgb(102, 116, 204);
            font-weight: bold;
        }

        .wk1 {
            font-weight: 100;
            font-family: 'poppins';
        }

        .learnworlds-button-solid-brand,
        .learnworlds-input-solid-brand {
            background-color: #6674CC;
            border-color: transparent;
            color: white;
        }

        .learnworlds-button-normal {
            font-family: "Inter";
            font-weight: bold;
            font-size: 1.40rem;
            padding-top: 10px;
            padding-right: 20px;
            padding-bottom: 10px;
            padding-left: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body style="background-color:#F3F3F3;">
    <?php
    if (isset($_GET['detailid'])) {
        $id = $_GET['detailid'];
        // echo "Course ID:" . $id;
        // $i = 1;
        // $conn = mysqli_connect("localhost", "root", "", "suvi");

        $query = "SELECT * FROM courses WHERE cid='$id'";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
            $row = mysqli_fetch_assoc($query_run);
            $id = $row['cid'];
            $name = $row['cname'];
            $detail = $row['cdetails'];
            $fees = $row['cfees'];
            $start = $row['cstart'];
            $end = $row['cend'];
    ?>
           <div class="container bg-dark text-white px-5 py-3 mt-5">
                <!-- <div class="container-fluid"> -->
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 col-md-6 mb-4 rm3 order-lg-1 order-3">
                        <h2 class="work"><?php echo $name; ?></h2>
                        <div>
                            <h3 class="mb-3 mt-3 wk1">Fee Structure: <?php echo $fees; ?></h3>
                        </div>
                        <div>
                            <h3 class="mb-3 mt-3 wk1">Start Date: <?php echo $start; ?></h3>
                        </div>
                        <div>
                            <h3 class="mb-3 mt-3 wk1">End End: <?php echo $end; ?></h3>
                        </div>
                        <div>
                            <h3 class="mb-3 mt-3 wk1" align="justify"><?php echo $detail; ?></h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 mt-5 order-1">
                        <img src="<?php echo '../admin/course/images/' . $row['cimage']; ?>" height="350px" width="400px" class="shadow" alt="images">
                    </div>
                </div>
                <button class="learnworlds-button learnworlds-button-solid-brand learnworlds-button-normal learnworlds-element cursor-pointer mb-2">
                    <a href="crsenroll.php?crsid=<?php echo $id; ?>" class="text-decoration-none text-white">Pay Here</a>
                </button>
                <button class="learnworlds-button learnworlds-button-solid-brand learnworlds-button-normal learnworlds-element cursor-pointer mb-2 mx-2">
                <a href="studcourse.php" class="text-decoration-none text-white">Cancel</a> 
                </button>
            </div>
    <?php
        }
    } else {
        echo "no records";
    }
    ?>
</body>
</html>
<script src="../inc/script.js"></script>