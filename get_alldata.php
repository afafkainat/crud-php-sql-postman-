<?php
header('Access-Control-Allow-Methods: GET');




include "db.php";

$sql = "SELECT * FROM `inventory_data`";
$result=mysqli_query($conn,$sql) or die("sql query failed");
if (mysqli_num_rows($result) > 0) {
            
                while($row = mysqli_fetch_assoc($result)) {
                    $output= mysqli_fetch_all($result, MYSQLI_ASSOC);
                    echo  json_encode($output);   
                    }
              } else {
                echo json_encode("0 results");
              }


?>