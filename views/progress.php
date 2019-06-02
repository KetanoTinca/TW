

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../CSS/progress.css">
</head>
<body>
        <div class="ui">
        <?php include 'navbar.php';?>

                <nav class="navbar board">Arduino -  Vîrlan Cosmin</nav>
                <div class="lists">
                    <div class="list">
                        <header>To Do</header>
                        <ul>
                        <?php
if( isset($_GET['submit']) )
{
    if(isset($_GET['todo']) && $_GET['todo'] != ''){
    $val1 = htmlentities($_GET['todo']);
    include_once "../classes/board.php";
    include_once "../classes/Database.php";
      $board = new Board($db);
      $board->postToDo($val1); 
    }
    if(isset($_GET['inprogress']) && $_GET['inprogress'] != ''){
        $val1 = htmlentities($_GET['inprogress']);
        include_once "../classes/board.php";
        include_once "../classes/Database.php";
          $board = new Board($db);
          $board->postInProgress($val1); 
        }
        if(isset($_GET['feedback']) && $_GET['feedback'] != ''){
            $val1 = htmlentities($_GET['feedback']);
            include_once "../classes/board.php";
            include_once "../classes/Database.php";
              $board = new Board($db);
              $board->postFeedBack($val1); 
            }

            if(isset($_GET['done']) && $_GET['done'] != ''){
                $val1 = htmlentities($_GET['done']);
                include_once "../classes/board.php";
                include_once "../classes/Database.php";
                  $board = new Board($db);
                  $board->postDone($val1); 
                }
       header("Location: progress.php", true, 301);

}
?>
                      <?php  include_once "../classes/board.php";
                      include_once "../classes/Database.php";
                        $board = new Board($db);
                     echo $board->getToDo();
                        ?>
                        </ul>
                        <footer>
                            <form action="" method="get">
                            <input type="text" class="progress-input" name='todo' id="todo" placeholder="Add a card...">
                            <input type="submit" name="submit" class="progress-add">
                            </form>
                        </footer>
                    </div>
                    <div class="list">
                        <header>In Progress</header>
                        <ul>
                        <?php  include_once "../classes/board.php";
                      include_once "../classes/Database.php";
                        $board = new Board($db);
                     echo $board->getInProgress();
                        ?>
                        </ul>
                        <footer>

                        <form action="" method="get">
                            <input type="text" class="progress-input" name='inprogress' id="inprogress" placeholder="Add a card...">
                            <input type="submit" name="submit" value="ADD" class="progress-add">
                            </form>
                        </footer>
                    </div>
                    <div class="list">
                        <header>FeedBack</header>
                        <ul>
                        <?php  include_once "../classes/board.php";
                      include_once "../classes/Database.php";
                        $board = new Board($db);
                     echo $board->getFeedback();
                        ?>
                        </ul>
                        <footer>
                        <form action="" method="get">
                            <input type="text" class="progress-input" name='feedback' id="feedback" placeholder="Add a card...">
                            <input type="submit" name="submit" value="Add" class="progress-add">
                            </form>
                        </footer>
                        </footer>
                    </div>
                    <div class="list">
                        <header>Done</header>
                        <ul>
                        <?php  include_once "../classes/board.php";
                         include_once "../classes/Database.php";
                        $board = new Board($db);
                        echo $board->getDone();
                        ?>
                        </ul>
                        <footer>
                        <form action="" method="get">
                            <input type="text" class="progress-input" name='done' id="done" placeholder="Add a card...">
                            <input type="submit" name="submit" value="ADD" class="progress-add">
                            </form>
                        </footer>
                        </footer>
                    </div>
                    
                </div>
            </div>
    
</body>
</html>