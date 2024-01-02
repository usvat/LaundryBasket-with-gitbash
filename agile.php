<?php 
$conn = new mysqli("localhost","root","","");
if($conn->connect_error){
    die('Connect Error: ' . $conn->connect_error);
}
if(issest($_POST['submit'])){
    $laundry_name = $_POST['laundry_name'];
    $mob = $_POST['mpb'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $sql="INSERT INTO practice (laundry_name,mob,address,email) VALUES ('$laundry_name','$mob','$address','$email');

    
}
?>

<html>
<head>

</head>
<body>
<form action ="" method = "POST">
<lable>Laundry Name</lable>
<input type ="text" name = "laundry_name" id = "laundry_name" placeholder ="Enter laundry Name"><br>
<lable>Contact No.</lable>
<input type ="text" name = "mob" id = "mob" placeholder ="Enter laundry Contact No."><br>
<lable>Address</lable>
<input type ="text" name = "address" id = "adress" placeholder ="Enter laundry adress"><br>
<lable>email</lable>
<input type ="email" name = "email" id = "email" placeholder ="Enter laundry email"><br>
<lable>password</lable>
<input type ="password" name = "password" id = "password" placeholder ="Enter laundry password"><br>

<button name= "submit" value = "Submit">Submit</button><br></br>
</form>
</body>
</html>