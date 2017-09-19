<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "php_test";

// Create connection
$db = new PDO("mysql:host=".$servername.";dbname=".$database,$username,$password);
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$db) {
    die("Connection failed: " . $db->errorInfo());
}
// echo "Connected successfully <br>";

?>
