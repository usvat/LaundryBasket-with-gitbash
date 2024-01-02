<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laundrybasket";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['submit']))
{
$email = $_POST['email'];
$alternate_email = $_POST['alternate_email'];
$phone_no = $_POST['phone_no'];
$street = $_POST['street'];
$landmark = $_POST['landmark'];
$city = $_POST['city'];
$state = $_POST['state'];
$sql ="UPDATE customer_registration SET email='$email',alternate_email='$alternate_email',phone_no='$phone_no'
,street='$street',landmark='$landmark',city='$city',state='$state' WHERE user_name='PrithaMishra'";
$result = mysqli_query($conn, $sql);

if ($conn->query($sql) === TRUE) {
                header("Location: home.html?message:Profile Updated  Successfully!!");

                          
}
else
{
header("location:editprofile.php?message: Fails!!");
}
}

mysqli_close($conn);
?>