<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'acatism');
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Start a PHP session
session_start();

// Include site constants


// Create a database object
try {
    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $db = new PDO($dsn, DB_USER, DB_PASS);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}
if(isset($_GET['action']) && $_GET['action'] == 'logout'){
    session_destroy();
    header('Location: ../views/index.php' , true);
}
?>