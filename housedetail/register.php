<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$fullname = $data['fullname'];
$phone = $data['phone'];
$password = $data['password'];

include "config.php";
$checkUser ="SELECT *from user WHERE phone ='$phone'";
$checkQuery = mysqli_query($conn,$checkUser);

if(mysqli_num_rows($checkQuery)>0){
	 echo json_encode(array('message' => 'User already exist', 'status' => 409));
	

} else {
	$insertQuery = "INSERT INTO user(fullname, phone,password) VALUES ('{$fullname}', '{$phone}','{$password}')";
$result = mysqli_query($conn, $insertQuery);


if($result){
	echo json_encode(array('message' => 'Register Sucess', 'status' => 200));

}else{

 echo json_encode(array('message' => 'Register Failed', 'status' => 406));

}
}
?>
