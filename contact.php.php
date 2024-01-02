<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laundrybasket";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['submit']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$sql = "INSERT INTO contact (name,email,subject,message)
VALUES ('$name', '$email','$subject','$message')";


if ($conn->query($sql) === TRUE) {
header('location:index.html?message:query submitted Successfully!!!!');
}
else
{
header('location:contact.html?message:Fails Please try again!!!!');
}
}
$conn->close();
?>