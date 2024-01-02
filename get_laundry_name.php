<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "laundrybasket";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $sql = "SELECT laundry_name FROM placeorder WHERE pid = '$pid'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['laundry_name'];
    } else {
        echo "No laundry name found for this PID.";
    }
}

mysqli_close($conn);
?>
