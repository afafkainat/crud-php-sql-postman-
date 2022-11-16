<?php
header('Access-Control-Allow-Methods: POST');
header("Content-Type:application/json");
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Access-Control-Allow-Methods, Authorization');


$insert =json_decode(file_get_contents("php://input"), true);

$id=$insert['id'];
$fullname =$insert['fullname'];
$quantity=$insert['quantity'];
$price=$insert['price'];
$category=$insert['category'];

include "db.php";

$sql = "INSERT INTO inventory_data (id, fullname, quantity, price, category)
        VALUES ('{$id}','{$fullname}', '{$quantity}','{$price}','{$category}')";
if (mysqli_query($conn, $sql)) {
          echo json_encode("New record created successfully");
        } else {
          echo json_encode("Error: " . $sql . "<br>" . mysqli_error($conn));
        }
?>