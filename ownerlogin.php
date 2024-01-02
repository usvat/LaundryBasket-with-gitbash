<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laundrybasket";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])) {
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];

  $sql ="SELECT * FROM owner_registration WHERE user_name='$user_name' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    if ($row['user_name'] == $user_name && $row['password'] == $password) {
      $_SESSION['laundry_name'] = $row['laundry_name'];
      header("Location: ownerhome.php?message=Login Successfully!!");
      exit();
    }
  } else {
    header("location:ownerlogin.html?message=Login Fails!!");
    exit();
  }
}

mysqli_close($conn);
?>
