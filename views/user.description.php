<section id ="description">
            <div class="containerdescription" >
                <div class="container">
                    <button class="profile_shape" onclick="location.href='change_photo.php'">
                        <img  class="profile_pic" src="../img/profile.png"  alt="profile">
                        <p class="change_profile">Change</p>
                    </button>
                    <div class="container">
                        <div class="username">
                            <h1>NumeProfesorPrenumeProfesor</h1>
                            <p >nume.prenume@info.uaic.ro</p>
                        </div>
                        <button class="edit_profile" onclick="location.href='settings.php'">
                                <img  class="edit_img" src="../img/edit.png" alt="Edit" >
                                <p style="float:right;margin:5px 5px 0 0;">Edit profile</p>
                        </button>
                    </div>
                </div>
                </div>
            
            <div class="container">
                <nav>
                    <ul>
                        <?php
                            if (basename($_SERVER['PHP_SELF']) == 'user.php'){
                                echo "<li  style=\"background:white;\"><a href=\"user.php\">Your Projects</a></li>";
                                echo "<li><a href=\"cards.php\">View Students</a></li>
                                      <li><a href=\"settings.php\">Settings</a></li>";
                            }else{
                                if( basename($_SERVER['PHP_SELF'])== 'cards.php'){
                                    echo "<li  ><a href=\"user.php\">Your Projects</a></li>";
                                    echo "<li style=\"background:white;\"><a href=\"cards.php\">View Students</a></li>
                                          <li><a href=\"settings.php\">Settings</a></li>";
                                }else{
                                    if( basename($_SERVER['PHP_SELF'])=='settings.php'){
                                        echo "<li  ><a href=\"user.php\">Your Projects</a></li>";
                                        echo "<li ><a href=\"cards.php\">View Students</a></li>
                                              <li style=\"background:white;\"><a href=\"settings.php\">Settings</a></li>";
                                    }
                                }
                            }
                        ?>


                    </ul>
                </nav>
            </div>
        </section>