<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laundrybasket";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit']))
{
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];

  $sql ="SELECT * FROM customer_registration WHERE user_name='$user_name' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    if ($row['user_name'] == $user_name && $row['password'] == $password) {
      // Set session variable
      $_SESSION['user_name'] = $row['user_name'];
      header("Location: home.php?message=Login Successfully!!");
      exit(); // Ensure no code gets executed after redirection
    }
  }
  else {
    header("location:login.html?message=Login Fails!!");
    exit(); // Ensure no code gets executed after redirection
}
}

mysqli_close($conn);
?>
