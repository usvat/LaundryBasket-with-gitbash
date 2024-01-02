<?php
session_start();


if (!isset($_SESSION['laundry_name'])) {
    header("Location: ownerlogin.html");
    exit();
}
$laundry_name = $_SESSION['laundry_name'];

?>
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
$laundry_name = $_POST['laundry_name'];
$location = $_POST['location'];
$phone_no = $_POST['phone_no'];
$sql ="UPDATE owner_registration SET email='$email',alternate_email='$alternate_email',laundry_name='$laundry_name'
,location='$location',phone_no='$phone_no' WHERE laundry_name='$laundry_name'";
$result = mysqli_query($conn, $sql);

if ($conn->query($sql) === TRUE) {
                header("Location: ownerhome.html?message:Profile Updated  Successfully!!");

                          
}
else
{
header("location:editprofileowner.php?message: Fails!!");
}
}

mysqli_close($conn);
?>