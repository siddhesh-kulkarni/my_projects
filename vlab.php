<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SuVi-Company</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <?php require('inc/links.php');
  require('inc/header copy.php');
  ?>
</head>
<body style="background-color:#F3F3F3;">
<div class="container">
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-md-6 mb-4 rm3 order-lg-1 order-3">
                    <h1 class="title">Join SuVi vLab</h1>
                    <div id="typewriter-text"></div>
                </div>
                <div class="col-md-6 col-lg-6 mt-5 order-1">
                    <img src="Virtual/lab.jpg" class="w-100 h-100">
                </div>
            </div>
            <div class="container">
                <button class="btn btn-success"><a href="https://play.google.com/store/apps/details?id=com.vertextechnosys.suviinnovative " class="text-white text-decoration-none">Download Here</a></button>
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
</html>
<?php require('inc/footer.php'); ?>