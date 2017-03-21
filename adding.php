<?php
$servername = "localhost";
$username = "root";
$password = "kumar";
$dbname = "employee";


$number = $_POST['id'];
$firstname = $_POST['name'];
$mail = $_POST['email'];
$phone = $_POST['phno'];
$desig = $_POST['role'];

echo $number;
echo "<br>";
echo $firstname;
echo "<br>";
echo $mail;
echo "<br>";
echo $phone;
echo "<br>";
echo $desig;
echo "<br>";




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

// attempt insert query execution
$sql = "INSERT INTO emp (id, name, email, phno, role) VALUES ('$number', '$firstname', '$mail', '$phone', '$desig')";
if($conn->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$conn->close();


?>