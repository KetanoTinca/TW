<nav id="header">
               <a class="header-logo" onclick="location.href='./view-profs.php'"  aria-label="AcaTisM Home">AcaTisM</a>
                <div class="header-back-button">
                    <a class="header-btn" href="./view-profs.php" aria-label="Back to home">
                        <img class="header-btn-icon" src="../img/home.png" alt="H">
                    </a>
                </div>
                <div class="header-boards-button">
                    <a class="header-btn header-boards" href="./progress.php" aria-label="Boards">
    
                        <img class="header-btn-icon" src="../img/progres.png" alt="P">
    
                        <span class="header-btn-text">Board</span>
    
                    </a>
                </div>


                <div class="header-user">
                    <a class="header-btn" href="./progress.php " title="Create a project">
                        <img class="header-btn-icon" src="../img/plus.png" alt="+">
                    </a>
                    
                  
                    <a class="header-btn header-avatar js-open-header-member-menu" href="./user.php" aria-label="Open Member Menu">
    
                        <span class="member-initials" ><?php echo substr($_SESSION['firstName'],0,1) . substr($_SESSION['lastName'],0,1);?></span>
                    </a>
                </div>
            </nav>