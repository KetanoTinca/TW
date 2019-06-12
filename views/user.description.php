<section id ="description">
            <div class="containerdescription" >
                <div class="container">
                    <button class="profile_shape" onclick="location.href='change_photo.php'">
                        <img  class="profile_pic" src="../img/profile.png"  alt="profile">
                        <p class="change_profile">Change</p>
                    </button>
                    <div class="container">
                        <div class="username">
                            <?php
                            echo "<h1>" . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . "</h1>";
                            echo "<p>" . $_SESSION['email'] . "</p>"
                            ?>

                        </div>
                        <button class="edit_profile" onclick="location.href='../classes/Database.php?action=logout'">
                                <img  class="edit_img" src="../img/edit.png" alt="Edit" >
                                <p style="float:right;margin:5px 5px 0 0;">Logout</p>
                        </button>
                    </div>
                </div>
                </div>
            
            <div class="container">
                <nav>
                    <ul>

                        <?php
                        if($_SESSION['userType']=='student'){
                            if (basename($_SERVER['PHP_SELF']) == 'user.php'){
                                echo "    <li  style=\"background:white;\"><a href=\"user.php\">Newsfeed</a></li>
                                      <li><a href=\"settings.php\">Profile</a></li>";
                            }else{
                                if (basename($_SERVER['PHP_SELF']) == 'settings.php') {
                                    echo "<li  ><a href=\"user.php\">Newsfeed</a></li>                   
                                            <li style=\"background:white;\"><a href=\"settings.php\">Profile</a></li>";
                            }

                        }
                        }else{
                            if (basename($_SERVER['PHP_SELF']) == 'user.php'){
                                echo "    <li  style=\"background:white;\"><a href=\"user.php\">Newsfeed</a></li>
                                      <li><a href=\"cards.php\">Students</a></li>
                                      <li><a href=\"settings.php\">Profile</a></li>
                                      <li><a href=\"requests.php\">Requests</a></li>
                                      <li><a href=\"add-theme.php\">Add Theme</a></li>";
                            }else{
                                if( basename($_SERVER['PHP_SELF'])== 'cards.php'){
                                    echo "  <li  ><a href=\"user.php\">Newsfeed</a></li>
                                        <li style=\"background:white;\"><a href=\"cards.php\">Students</a></li>
                                        <li><a href=\"settings.php\">Profile</a></li>
                                        <li><a href=\"requests.php\">Requests</a></li>
                                        <li><a href=\"add-theme.php\">Add Theme</a></li>";
                                }else {
                                    if (basename($_SERVER['PHP_SELF']) == 'settings.php') {
                                        echo "<li  ><a href=\"user.php\">Newsfeed</a></li>
                                            <li ><a href=\"cards.php\">Students</a></li>
                                            <li style=\"background:white;\"><a href=\"settings.php\">Profile</a></li>
                                            <li><a href=\"requests.php\">Requests</a></li>
                                            <li><a href=\"add-theme.php\">Add Theme</a></li>";
                                    } else {
                                        if (basename($_SERVER['PHP_SELF']) == 'add-theme.php') {
                                            echo "<li  ><a href=\"user.php\">Newsfeed</a></li>
                                            <li ><a href=\"cards.php\">Students</a></li>
                                            <li><a href=\"settings.php\">Profile</a></li>
                                            <li><a href=\"requests.php\">Requests</a></li>
                                            <li style=\"background:white;\"><a href=\"add-theme.php\"><a href=\"add-theme.php\">Add Theme</a></li>";
                                        }
                                    }
                                }
                            }

                        }

                        ?>
                    </ul>
                </nav>
            </div>
        </section>