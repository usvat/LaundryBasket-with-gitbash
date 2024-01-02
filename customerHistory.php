<!-- PHP code to establish connection with the localserver -->
<?php
session_start();


if (!isset($_SESSION['user_name'])) {
    header("Location: login.html");
    exit();
}
$user_name = $_SESSION['user_name'];

?>
<?php

// Username is root
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'laundrybasket';

// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}


?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Location</title>
	<!-- CSS FOR STYLING THE PAGE -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
	</script>
	
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
.button {
  background-color: dodgerblue; /* Green */
  border: none;
  color: white;
  padding: 5px 22px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}

		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid BLUE;
		}

		h1 {
			text-align: center;
			color: Dodgerblue;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: AliceBlue;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid BLUE;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}

* {
  box-sizing: border-box;
}
</style>
</head>

<body><button type="submit" onclick="history.back()">
        <img src="img/back.jpeg" alt="buttonpng" border="0" style="width:50px;height:50px;"/>
      </button>
	<section>
		 
		<h1>Order History</h1>
        <center><input id="gfg" type="text" style="margin:10px 10px;padding:10px 10px;" placeholder="Search here"></center>
</form>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
                <th > Order Id</th>
                <th >Service Name</th>
                <th>Quantity</th>
                <th>Laundry Name</th>
                <th>User Name</th>
                <th>Date In</th>
                <th>Date Out</th>
                <th>Location</th>
                <th>Phone No.</th>
                <th>Total amount</th>

            </tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
                $q = "SELECT * FROM `placeorder` WHERE `serviceStatus` = 'F' AND `user_name` = '$user_name' ORDER BY `pid`";
                $result=$mysqli->query($q);
  					if(!$result){
  						echo "Select failed. Error: ".$mysqli->error ;
  						// break;
  					}
  				 while($row=$result->fetch_array()){ ?>
             <?php
              $dashDateOut="";
              if ($row['dateOut']=="0000-00-00") {
                $dashDateOut="-";
              }
              else {
                $dashDateOut=$row['dateOut'];
              }
            
			?> <tbody id="geeks">
				<tr>
					<td><?=$row['pid']?></td>
					<td><?=$row['service_name']?></td>
					<td><?=$row['quantity']?></td>
					<td><?=$row['laundry_name']?></td>
					<td><?=$row['user_name']?></td>
					<td><?=$row['datein']?></td>
					<td><?=$dashDateOut?></td>
					<td><?=$row['location']?></td>
					<td><?=$row['phone_no']?></td>
					<td>Finished</td>		
			</tr>
			</tbody>
			<?php } ?>

		</table>
	</section>
<script>
            $(document).ready(function() {
                $("#gfg").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#geeks tr").filter(function() {
                        $(this).toggle($(this).text()
                        .toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
</body>

</html>
