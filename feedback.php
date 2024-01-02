<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "laundrybasket";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start(); // Start the session

$user_name = $_SESSION['user_name']; // Get the username from the session

$sql = "SELECT pid FROM `placeorder` WHERE user_name = '$user_name' ORDER BY `pid`";
$all_categories = mysqli_query($conn, $sql);

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
<style>
/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  padding:5px 5px;
  top:0px;
  font-family: Arial;
width:180px;
}

.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  
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
	
<a href="home.php" ><button class="btn"style="padding:20px 20px; margin: 20px 20px;"><i class="fa fa-home"></i></button></a>
        <div class="container-login" style="background-image: url('images/bg-01.jpg');position:absolute; top:0px;left:500px;margin:30px 60px;">
			
		<div class="wrap-login100 p-l-55 p-r-55  p-b-54">
				
<center><br><br><img src="img\feedbacklogo.jpg"  alt="feedback" width="80" height="80"></center>

				<form class="login100-form validate-form" action="feedback.php"  method="post">
					
					<span class="login100-form-title p-b-49">
						Feedback
					</span>

          <div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
    <span class="label-input100">Username</span>
    <input class="input100" type="text" name="user_name" id="user_name" readonly>
    <span class="focus-input100" data-symbol="&#xf206;"></span>
</div>

<script>
// Fetch username from session and set it to the input field
document.getElementById('user_name').value = '<?php echo $_SESSION['user_name']; ?>';
</script>


        <!-- Add an empty div to display the laundry name -->
<div id="laundry_name_container"></div>

<!-- Modify the Select Box to include an event listener -->
<span class="label-input100">Select Order Id</span>	
<select name="pid" id="pid">
    <option></option>
    <?php
    while ($pid = mysqli_fetch_array($all_categories, MYSQLI_ASSOC)):
        echo "<option value='{$pid["pid"]}'>{$pid["pid"]}</option>";
    endwhile;
    ?>
</select>

<!-- Remove the input field for laundry_name -->
<!-- Add an input field for laundry_name with a readonly attribute -->
<div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
    <span class="label-input100">Laundry Name</span>
    <input class="input100" type="text" name="laundry_name" id="laundry_name" readonly>
    <span class="focus-input100" data-symbol="&#xf206;"></span>
</div>




        <div class="wrap-input100 validate-input " >
						<br><span class="label-input100">Rating<font color="red">*</font></span>
            <select name="ratings" style="margin:2px 2px;padding:2px 2px;">
    <option value="Positive">Positive</option>
    <option value="Negative">Negative</option>
</select>
                    
                         </select><br> <br>
					
					<div class="wrap-input100 "><br>
						<span class="label-input100">Comment</span>
						<textarea id="comment" name="comment" rows="4" cols="50">
						</textarea>
					</div>
					
					
					<br>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit" id="submit">
								Submit
							</button>
						</div>
					</div>

					
				</form>
			</div>
		
	</div>
	

	<div id="dropDownSelect1"></div>
	
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
  <script>
document.getElementById('pid').addEventListener('change', function() {
    var pid = this.value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('laundry_name').value = this.responseText;
        }
    };
    xhttp.open('GET', 'get_laundry_name.php?pid=' + pid, true);
    xhttp.send();
});





var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>

  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>


</body>
</html>


<?php


if(isset($_POST['submit'])) {
  $user_name=$_SESSION['user_name'];
$pid=$_POST['pid'];
$laundry_name = $_POST['laundry_name'];
$ratings = $_POST['ratings'];
$comment=$_POST['comment'];

$sql = "INSERT INTO customerfeedback (user_name, pid,laundry_name, ratings, comment) VALUES ('$user_name', '$pid', '$laundry_name', '$ratings', '$comment')";

if ($conn->query($sql) === TRUE) {

echo '<script>
              alert("Feedback added Sucessfully");
          </script>';
}
else
{

echo '<script>
              alert("Try Again");
          </script>';
}
}

mysqli_close($conn);
?>