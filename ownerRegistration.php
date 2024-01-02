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
$laundry_name = $_POST['laundry_name'];
$laundry_id = $laundry_name."@";
$location = $_POST['location'];
$phone_no = $_POST['phone_no'];
$laundry_id .= $phone_no;
$sql = "INSERT INTO owner_registration (user_name,email,password,laundry_name,laundry_id,location,phone_no)
VALUES ('$user_name','$email','$password','$laundry_name','$laundry_id','$location','$phone_no')";


if ($conn->query($sql) === TRUE) {
header('location:ownerlogin.html?message:Laundry Owner registered Successfully!!!!');
}
else
{
header('location:ownersignup.html?message:Fails Please try again!!!!');
}
}
$conn->close();
?>