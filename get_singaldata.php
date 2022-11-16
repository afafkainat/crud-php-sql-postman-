<?php
header('Access-Control-Allow-Methods: GET');


$fetch =json_decode(file_get_contents("php://input"), true);
$id=$fetch['id'];
include "db.php";

$sql = "SELECT * FROM `inventory_data` WHERE id={$id}";
$result=mysqli_query($conn,$sql) or die("sql query failed");
if (mysqli_num_rows($result) > 0) {
            
                
                    $output= mysqli_fetch_all($result, MYSQLI_ASSOC);
                    echo  json_encode($output);   
                    
              } else {
                echo json_encode("0 results");
              }


?>