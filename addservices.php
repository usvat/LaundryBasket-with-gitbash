<?php
session_start();

if (!isset($_SESSION['laundry_name'])) {
    header("Location: ownerlogin.html");
    exit();
}

$laundry_name = $_SESSION['laundry_name'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "laundrybasket";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $selectedServices = isset($_POST['service_id']) ? $_POST['service_id'] : [];
    $cost_per_unit = $_POST['cost_per_unit'];

    $checkStmt = $conn->prepare("SELECT COUNT(*) FROM `provided_by` WHERE `service_id` = ? AND `laundry_name` = ?");
    $checkStmt->bind_param("is", $service_id, $laundry_name);

    foreach ($selectedServices as $service_id) {
        $checkStmt->bind_param("is", $service_id, $laundry_name);
        $checkStmt->execute();
        $checkStmt->store_result(); // Store the result

        $checkStmt->bind_result($count);
        $checkStmt->fetch();

        if ($count > 0) {
          echo '<script>
          alert("Service with is already exist ' . $laundry_name . '");
      </script>';
        } else {
            $stmt = $conn->prepare("INSERT INTO `provided_by`(`service_id`, `laundry_name`, `cost_per_unit`) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $service_id, $laundry_name, $cost_per_unit);

            if ($stmt->execute() !== TRUE) {
                echo "Error: " . $stmt->error;
            } else {
              echo '<script>
              alert("Service  is added Sucessfully");
          </script>';
            }

            $stmt->close();
        }

        $checkStmt->free_result(); // Free the result
    }

    $checkStmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>LAUNDRY BASKET</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-signin-client_id" content="930620040289-lvqt88knopiknrluen06quv5d4k51bmg.apps.googleusercontent.com">


    <!-- Favicon -->
   <link rel="icon" href="img/logo.png" type="image/png" sizes="128x128">
	
<!--===============================================================================================-->	
<link href="css/css1.css" rel="stylesheet">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places" async defer></script>

<style>

.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 15px 20px;
  font-size: 20px;
  cursor: pointer;
  
  position:relative;
  top:45px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
</style>
</head>
<body>	
<a href="ownerhome.php" ><button class="btn" style="position:relative;left:5px;top:0px;"><i class="fa fa-home"></i></button></a>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg'); ">
			<div class="">
				<form class="login100-form validate-form" action="addservices.php"  method="post">
					<span class="login100-form-title p-b-9">
						   Add Services
					</span>
					<div class="wrap-input100 validate-input">
    <br>
    <span class="label-input100">Laundry Name <font color="red">*</font></span>
    <input class="input100" type="text" name="laundry_name" id="laundry_name" readonly value="<?php echo $laundry_name; ?>">
    <span class="focus-input100"></span>
</div>
                    <div class="wrap-input100 validate-input " >
						<br><span class="label-input100">Select Services<font color="red">*</font></span>
                         <select name="service_id[]" style="margin:2px 2px;padding:2px 2px;">
                         <option name="service_id[]" value="1">Washing</option>
                    <option name="service_id[]" value="4">Drying</option>
                    <option name="service_id[]" value="2">Ironing</option>
                    <option name="service_id[]" value="3">Dying</option>
                    <option name="service_id[]" value="6">Stain Remove</option>
                    <option name="service_id[]" value="5">Lint Remove</option>
                         </select><br> <br>

					<div class="wrap-input100 validate-input " >
						<span class="label-input100">Cost Per Unit <font color="red">*</font></span>
						<input class="input100" type="tel" name="cost_per_unit" id="cost_per_unit" placeholder="Enter a cost_per_unit">
						<span class="focus-input100" ></span>
					</div>
					<br>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" id="submit" name="submit"  >
								Submit
							</button>
						</div>
					</div>
                                        

					
				</form>
			</div>
		</div>
	</div>
	


	<div id="dropDownSelect1"></div>
	<script>
  document.getElementById("todayDate").valueAsDate = new Date();
 </script>
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>
  <script>
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
</script>
  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>


</body>
</html>

