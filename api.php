<?php
header("Content-Type:application/json");
if (isset($_GET['id']) && $_GET['id']!="") {
	include('db.php');
	$id = $_GET['id'];
	$result = mysqli_query(
	$con,
	"SELECT * FROM `inventory_data` WHERE id=$id");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	$fullname = $row['fullname'];
	$quantity = $row['quantity'];
	$price = $row['price'];
    $category = $row['category'];
	response($id, $fullname, $quantity,$price,$category);
	mysqli_close($con);
	}else{
		response(NULL,'abc', 2,2000,'female');
		}
}else{
	response(NULL,'xyz', 1,1000,'male');
	}

function response($id, $fullname, $quantity,$price,$category){
	$response['id'] = $id;
	$response['fullname'] = $fullname;
	$response['quantity'] = $quantity;
	$response['price'] = $price;
    $response['category'] =  $category;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>