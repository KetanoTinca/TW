    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ACATISM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../CSS/signup.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">

    </head>

    <body class="page-signup">
        <section>
            <div class="section-wrapper layout-grid-frame">
                <div id="signup-form" class="layout-twothirds-center">

                    <div id="signup-password" class="quick-switch">
                        <div class="info-message hidden"></div>
                        <h1>Create an Account</h1> <span class="sign-in-account">or <a href="login.html">sign in to your
                                account</a></span>
                        <div class="sign-up-container">
                            <?php
                            if(isset($_GET['status']) && $_GET['status']=='wrong1'){
                                echo "<p>Smth went wrong motherfucker</p>";
                            }
                            ?>

                            <form method="post" action="../controller/signup.php">
                                <label for="firstName">First Name</label>
                                <input type="text" name="firstName" id="firstName" autofocus>
                                <label for="lastName">Last Name</label>
                                <input type="text" name="lastName" id="lastName">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email">
                                <label for="userName">Username</label>
                                <input type="text" name="userName" id="userName">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" tabindex="0" placeholder="e.g., ••••••••••••">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" name="confirmPassword" id="confirmPassword" tabindex="0" placeholder="e.g., ••••••••••••">
                                <label for="userType">User Type</label>
                                <select id="userType" name="userType">
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                </select>
                                <input id="signup" tabindex="0" type="submit" class="button button-green" value="Sign Up">

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