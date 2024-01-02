<?php
$conn = new mysqli("localhost","root","","practice");
if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}
$sql = "SELECT * from practice ";
$result=$conn->query($sql);
if($result->num_rows>0){
?>


<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        </head>
        <body>
            <form action = "retrive.php"method="post">
           <center>
            <input id="gfg" type="text" placeholder="Search here">
            <section>
            <table border = 1>
            <tr><th>name</th>
            <th>date</th>
            <th> lid</th>
            <th> click</th>
</tr>
              <tbody id = "geeks">
<?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['date'];?></td>
        <td><?php echo $row['lid'];?></td>
        <td><a href='retrive.php?lid=<?= $row['lid'] ?>'><img src=img/reject.jpg width="24" height="20"></a></td>
</tr>

    
                
            <?php } ?>
<?php }
?>
</tbody>
</table>
            
</form>
</section>

        
        </body>
        
        </html>
<?php
if (isset($_GET['lid'])) {
    $lid = $_GET['lid'];
    $stmt = $conn->prepare("UPDATE practice SET name=? WHERE lid=?");
    $stmt->bind_param("si", $name, $lid);

    $name = "HELLO Brother";

    if ($stmt->execute()) {
        header("Location: retrive.php");
        exit;
    } else {
        echo "Update failed: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>