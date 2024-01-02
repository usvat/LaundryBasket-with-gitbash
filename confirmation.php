<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #666;
        }

        ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        li {
            margin-bottom: 10px;
        }
div.container {
 
  justify-content: center;
  align-items: center;
}
    </style>
</head>
<body>
<body>
<a href="home.php" ><button class="btn"style="padding:20px 30px; margin: 20px 20px;font-size:40px;"><i class="fa fa-home"></i></button></a>

    <div class="container" style="position:relative;margin:20px 20px;padding:20px 20px;top:200px;left:400px;top:50px;align-items: center;">
        <h1>Order Confirmation</h1>
        <p><img src="img/order.png" alt="unable to load" width="350" height="300" style="float:right;position:relative;top:-80px;left:-50px;"></p>
        <?php
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "laundrybasket";

        // Create a database connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to retrieve the latest order details (assuming order_id is auto-incremented)
        $sql = "SELECT user_name, total_amount, service_name, quantity, laundry_name,pid FROM placeorder ORDER BY pid DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Display order details
            echo "<p>Thank you for placing your order, " . $row['user_name'] . "!</p>";
            echo "<p>Details of your order:</p>";
            echo "<ul>";
            echo "<b><li>Order Id:" . $row['pid'] . "</li></b>";
            echo "<li>Total Amount: Rs." . $row['total_amount'] . "</li>";
            echo "<li>Selected Services: " . $row['service_name'] . "</li>";
            echo "<li>Quantity: " . $row['quantity'] . "</li>";
            echo "<li>Laundry Name: " . $row['laundry_name'] . "</li>";
            // Add more details as needed
            echo "</ul>";
        } else {
            echo "No orders found in the database.";
        }
       
        // Close the database connection
        $conn->close();
        ?>
</body>
</html>
