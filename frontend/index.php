<!DOCTYPE html>
<html>

<head>
    <title>JD Mobile Spares</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #splash-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f1f1f1;
        }

        #logo {
            max-width: 300px;
            max-height: 300px;
        }
    </style>
</head>

<body>
    <div id="splash-screen">
        <img src="assets/images/logo/logo.png" alt="Logo" id="logo">
    </div>

    <!-- Your app content goes here -->
    <div id="app-content" style="display: none;">
        <!-- Your app content -->
    </div>

    <script>
        window.addEventListener('load', function() {
            // Hide the splash screen and redirect to the home page after a delay
            setTimeout(function() {
                var splashScreen = document.getElementById('splash-screen');
                var appContent = document.getElementById('app-content');

                splashScreen.style.display = 'none';
                appContent.style.display = 'block';

                // Redirect to the home page
                window.location.href = 'app/view/home/';
            }, 3000); // 3000 milliseconds (3 seconds) delay
        });
    </script>
</body>