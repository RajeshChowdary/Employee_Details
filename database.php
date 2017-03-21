<?php
// connecting  database
$host = "localhost";
$db_name = "employee";
$username = "root";
$password = "kumar";
 
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    //echo "database connected successfully!";
}
 
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>