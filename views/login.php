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
    <script src="../javascript/login_validation.js"></script>
</head>
<?php
function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])){
// session_destroy();
Redirect('../views/view-profs.php', false);
}
?>
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
                        <?php if(isset($_GET['status']) && $_GET['status'] == 'wrong'  ){
                            echo "<p>User sau pass gresite</p>";
                        }
                        if (isset($_GET['status']) && $_GET['status'] == 'confirm') {
                             echo "<p>Trebuie sa confirmati emailul</p>";
                            }  ?>


                        <label for="email">Username</label>
                        <?php if(isset($_COOKIE['username'])) {
                            $cook = $_COOKIE['username'];
                            echo "<input type=\"user\" name=\"username\" id=\"username\" value=\"$cook\" required>";
                        }else{
                            echo "<input type=\"user\" name=\"username\" id=\"username\" value=\"\" required>";
                        }
                            ?>

                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" tabindex="0" placeholder="e.g., ••••••••••••" required>
                        <input id="signup" tabindex="0" type="submit" class="button button-green" value="Sign In">
                        <label style="float: right;width:50%;">Remember me</label>
                        <?php if(isset($_COOKIE['username'])) {

                            echo "<input type=\"checkbox\" id=\"remember\" name=\"remember\" checked style=\"float: right;margin-top: 7px;margin-right: 7px;\">";
                        }else{
                            echo "<input type=\"checkbox\" id=\"remember\" name=\"remember\"  style=\"float: right;margin-top: 7px;margin-right: 7px;\">";
                        }
                        ?>


                        <label>Click <a href="#">here</a> to recover password</label>
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