
<section id="description">
    <div class="containerdescription">
        <div class="container">
            <div class="container">
                <div class="username">
                    <?php
                    echo "<h1>" . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . "</h1>";
                    echo "<p>" . $_SESSION['email'] . "</p>"
                    ?>

                </div>
                <button class="edit_profile" onclick="location.href='../classes/Database.php?action=logout'">
                    <p style="margin:10px;">Logout</p>
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <nav>
            <ul>

                <?php
                if ($_SESSION['userType'] == 'student') {
                    if (basename($_SERVER['PHP_SELF']) == 'user.php') {
                        echo "<li  style=\"background:white;\"><a href=\"user.php\">Newsfeed</a></li>
                              <li><a href=\"specifications.php\">Thesis Specifications</a></li>";
                    } else {
                        if (basename($_SERVER['PHP_SELF']) == 'specifications.php') {
                            echo "<li><a href=\"user.php\">Newsfeed</a></li>
                              <li  style=\"background:white;\"><a href=\"specifications.php\">Thesis Specifications</a></li>";
                        }
                    }

                } else {
                    if (basename($_SERVER['PHP_SELF']) == 'user.php') {
                        echo "    <li  style=\"background:white;\"><a href=\"user.php\">Newsfeed</a></li>
                                      <li><a href=\"cards.php\">Students</a></li>           
                                      <li><a href=\"requests.php\">Requests</a></li>
                                      <li><a href=\"add-theme.php\">Add Theme</a></li>";
                    } else if (basename($_SERVER['PHP_SELF']) == 'cards.php') {
                        echo "  <li  ><a href=\"user.php\">Newsfeed</a></li>
                                        <li style=\"background:white;\"><a href=\"cards.php\">Students</a></li>
                                        <li><a href=\"requests.php\">Requests</a></li>
                                        <li><a href=\"add-theme.php\">Add Theme</a></li>";
                    } else if (basename($_SERVER['PHP_SELF']) == 'add-theme.php') {
                        echo "<li  ><a href=\"user.php\">Newsfeed</a></li>
                                            <li ><a href=\"cards.php\">Students</a></li>                                          
                                            <li><a href=\"requests.php\">Requests</a></li>
                                            <li style=\"background:white;\"><a href=\"add-theme.php\"><a href=\"add-theme.php\">Add Theme</a></li>";
                    } else if (basename($_SERVER['PHP_SELF']) == 'requests.php') {
                        echo "<li><a href=\"user.php\">Newsfeed</a></li>
                                  <li ><a href=\"cards.php\">Students</a></li>
                                  <li style=\"background:white;\"><a href=\"requests.php\">Requests</a></li>
                                  <li><a href=\"add-theme.php\"><a href=\"add-theme.php\">Add Theme</a></li>";
                    }
                }
                    ?>
                </ul>
            </nav>
        </div>
    </section>