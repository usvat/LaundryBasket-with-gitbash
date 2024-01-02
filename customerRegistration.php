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
$user_id = $user_name."@";
$user_id .=$phone_no;
$street = $_POST['street'];
$landmark = $_POST['landmark'];
$city = $_POST['city'];
$state = $_POST['state'];
$sql = "INSERT INTO customer_registration (user_id,user_name,email,password,phone_no,street,landmark,city,state)
VALUES ('$user_id', '$user_name', '$email','$password','$phone_no','$street','$landmark','$city','$state')";


if ($conn->query($sql) === TRUE) {
header('location:login.html?message:Customer registered Successfully!!!!');
}
else
{
header('location:signup.html?message:Fails Please try again!!!!');
}
}
$conn->close();
?>