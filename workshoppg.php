<?php
include('inc/header copy.php');
include('inc/links.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #typewriter-text {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 30px;
            position: absolute;
        }

        .title {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 80px;
            color: rgb(102, 116, 204);
            font-weight: bold;
        }

        .wk {
            font-weight: 100;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-md-6 mb-4 rm3 order-lg-1 order-3">
                    <h1 class="title">Join SuVi Workshops</h1>
                    <div id="typewriter-text"></div>
                </div>
                <div class="col-md-6 col-lg-6 mt-5 order-1">
                    <img src="Images/wk.jpg" class="w-100 h-100">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <h4 class="mb-5 mt-5 ms-4 wk">Here are our Workshops...</h4>
                    <?php
                    $i = 1;
                    $conn = mysqli_connect("localhost", "root", "", "suvi");

                    $query = "SELECT * FROM workshop";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {
                            $id = $row['wid'];
                            $name = $row['wname'];
                            $detail = $row['wdetails'];
                            $fees = $row['wfees'];
                            $start = $row['wstart'];
                            $end = $row['wend'];
                    ?>
                            <div class="col-lg-4 col-md-4 my-3">
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
                                            <h6 class="mt-2" align="justify"><?php echo $detail; ?></h6>
                                        </div>
                                        <div class="d-flex justify-content-evenly mb-2">
                                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Enroll Now</a>
                                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">More Deatils</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "no records";
                    }
                    ?>
                </div>

            </div>
        </div>
        <div>
            <br>
        </div>
    </div>
    </div>
    </div>
    <script>
        // Array of texts to be typed
        var texts = [
            "Welcome to the SuVi Instruments.",
            "Learn and grow with us."
        ];

        // DOM element where the text will be typed
        var typewriterText = document.getElementById('typewriter-text');

        // Delay between each character (in milliseconds)
        var speed = 50;

        // Index to keep track of current text
        var currentIndex = 0;

        // Function to simulate typewriter effect
        function typeWriter() {
            // Get current text
            var text = texts[currentIndex];

            // Initialize counter
            var i = 0;

            // Interval function to add characters one by one
            var interval = setInterval(function() {
                // Append next character to the text
                typewriterText.textContent += text.charAt(i);

                // Increment counter
                i++;

                // Check if all characters are typed
                if (i >= text.length) {
                    // Clear interval if all characters are typed
                    clearInterval(interval);

                    // Wait for a brief moment before resetting
                    setTimeout(function() {
                        // Clear the text
                        typewriterText.textContent = '';

                        // Move to the next text (looping back to the start if necessary)
                        currentIndex = (currentIndex + 1) % texts.length;

                        // Start typing the next text
                        typeWriter();
                    }, 1000); // Change the delay as needed
                }
            }, speed);
        }

        // Start typewriter effect
        typeWriter();
    </script>
</body>
<?php require('inc/footer.php'); ?>
</html>