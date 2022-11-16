<?php
header('Access-Control-Allow-Methods: PUT');
header("Content-Type:application/json");
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Access-Control-Allow-Methods, Authorization');


$update =json_decode(file_get_contents("php://input"), true);

$id=$update['id'];
$fullname =$update['fullname'];
$quantity=$update['quantity'];
$price=$update['price'];
$category=$update['category'];

include "db.php";

$sql = "UPDATE `inventory_data` SET `id`='{$id}',`fullname`='{$fullname}',`quantity`='{$quantity}',`price`='{$price}',`category`='{$category}' WHERE id=4";


if (mysqli_query($conn, $sql)) {
    echo json_encode("Record updated successfully");

} else {
   echo json_encode('Error updating record: ' . mysqli_error($conn));

}
?>