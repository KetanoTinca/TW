
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
    <?php include 'navbar.php'; ?>
    <?php
    if (isset($_GET['board'])){
        
    }
    else
     header("Location: progress.php?board=1", true, 301);
     // change board id

   
?>

    <nav class="navbar board">
      <?php include_once "../classes/board.php";
          include_once "../classes/Database.php";
          if (isset($_GET['board'])) {
            $board = new Board($db);
            echo $board->getTheme($_GET['board']);
            }
          ?></nav>
    <div class="lists">
      <div class="list">
        <header>To Do</header>
        <ul>
          <?php
          if (isset($_GET['plus'])) {

            include_once "../classes/board.php";
            include_once "../classes/Database.php";
            $board = new Board($db);
            $board->updateTaks($_GET['plus']);
            header("Location: progress.php", true, 301);
          }
          ?>

          <?php include_once "../classes/board.php";
          include_once "../classes/Database.php";
          if (isset($_GET['board'])) {
          $board = new Board($db);
          echo $board->getToDo($_GET['board']);
          }
          ?>
        </ul>
        <footer>
          <form action="./add-task.php" method="get">
            <button name="status" value="0" type="submit">Add</button>
          </form>
        </footer>
      </div>
      <div class="list">
        <header>In Progress</header>
        <ul>
          <?php include_once "../classes/board.php";
          include_once "../classes/Database.php";
          if (isset($_GET['board'])) {
            $board = new Board($db);
            echo $board->getInProgress($_GET['board']);
            }
          ?>
        </ul>
        <footer>

          <form action="./add-task.php" method="get">
            <button name="status" value="10" type="submit">Add</button>
          </form>
        </footer>
      </div>
      <div class="list">
        <header>FeedBack</header>
        <ul>
          <?php include_once "../classes/board.php";
          include_once "../classes/Database.php";
          if (isset($_GET['board'])) {
            $board = new Board($db);
            echo $board->getFeedback($_GET['board']);
            }
          ?>
        </ul>
        <footer>
          <form action="./add-task.php" method="get">
            <button name="status" value="2" type="submit">Add</button>
          </form>
        </footer>
        </footer>
      </div>
      <div class="list">
        <header>Done</header>
        <ul>
          <?php include_once "../classes/board.php";
          include_once "../classes/Database.php";
          if (isset($_GET['board'])) {
            $board = new Board($db);
            echo $board->getDone($_GET['board']);
            }
          ?>
        </ul>
        <footer>
          <form action="./add-task.php" method="get">
            <button name="status" value="3" type="submit">Add</button>
          </form>
        </footer>
        </footer>
      </div>

    </div>
    <nav class="navbar board">
    <?php
      foreach ($_SESSION as $i)
      echo $i;
    ?>
    </nav>
  </div>

</body>

</html>