<!DOCTYPE html>
<html lang="en-US">
<?php

include_once "../classes/Database.php";
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ACATISM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    
</head>

<body class="page-signup">

    <section>
        <div class="section-wrapper layout-grid-frame">
            <div id="signup-form" class="layout-twothirds-center">
            <div id="result"></div>
                <div id="signup-password" class="quick-switch">
                    <div class="info-message hidden"></div>
                    <h1>Sign In</h1>
                    <div class="sign-up-container">
                    <form method = "post" action = "../controller/login.php">
                        <label for="email">Username</label>
                        <input type="user" name="username" id="username" value="">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" tabindex="0" placeholder="e.g., ••••••••••••">
                        <input id="signup" tabindex="0" type="submit" class="button button-green" value="Sign In">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>

        <ul>
            <li  onclick="location.href='./index.html'">About</li>
            <li onclick="window.location.href='http://www.info.uaic.ro/bin/Main/'">University Website</li>
            <li onclick="window.location.href='https://profs.info.uaic.ro/~orar/'">Classes</li>
            <li onclick="location.href='./index.html'">Contact</li>
        </ul>
        <p>ACATISM - Supporting you in taking your degree.</p>
    </footer>

</body>

</html>