<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"), true);

$fullname = $data['fullname'];
$phone=$data['phone'];
$addresh = $data['addresh'];
$date= $data['date'];
$image = $data['image'];
$message= $data['message'];


include "config.php";

$image_name = round(microtime(true) * 1000).".png";
 //Giving new name to image.


$image_upload_dir =$_SERVER['DOCUMENT_ROOT'].'/house/housedetail/images/'.$image_name; //Set the path where we need to upload the image.
$checkUser ="SELECT *from furnituretable WHERE phone ='$phone'";
$checkQuery = mysqli_query($conn,$checkUser);

if(mysqli_num_rows($checkQuery)>0){
	 echo json_encode(array('message' => 'House already exist', 'status' => 409));
	

} else {
	$insertQuery = "INSERT INTO furnituretable(fullname,phone,addresh,date,image,message) VALUES ('{$fullname}','{$phone}','{$addresh}', '{$date}','{$image_name}','{$message}')";
$result = mysqli_query($conn, $insertQuery);


if($result){


    $flag = file_put_contents($image_upload_dir, base64_decode($image));
	
	echo json_encode(array('message' => 'Register Sucess', 'status' => 200));

}else{

 echo json_encode(array('message' => 'Register Failed', 'status' => 406));

}
}
?>
