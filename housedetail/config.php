<?php 
$hostName = "localhost";
$userName="root";
$userPass="";
$dbName="furniture";
$conn = mysqli_connect($hostName,$userName,$userPass,$dbName) or die("Connection Failed");
  define("baseurl","http://192.168.1.177/house/");
//  define("baseurl","http://192.168.100.12/house/"); 

 ?>