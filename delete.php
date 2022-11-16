<?php
header('Access-Control-Allow-Methods:   DELETE');
header("Content-Type:application/json");
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Access-Control-Allow-Methods, Authorization');


$delete =json_decode(file_get_contents("php://input"), true);

$id=$delete['id'];


include "db.php";
$sql = "DELETE FROM inventory_data WHERE id={$id}";


if (mysqli_query($conn, $sql)) {
    echo json_encode("Record deleted successfully");

} else {
   echo json_encode('Error deleted record: ' . mysqli_error($conn));

}
?>