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
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone_no = $_POST['phone_no'];
$sql = "INSERT INTO admin_registration (user_name,email,password,phone_no)
VALUES ('$user_name','$email','$password','$phone_no')";


if ($conn->query($sql) === TRUE) {
header('location:adminlogin.html?message:Admin registered Successfully!!!!');
}
else
{
header('location:adminsignup.html?message:Fails Please try again!!!!');
}
}
$conn->close();
?>