<?php

$today = (new DateTime('NOW', new DateTimeZone('Asia/Kuala_Lumpur')))->format('Y-m-d H:i:s');
$status = "local";

if($status == "live"){
//	$server_name="ftp.webtwinkles.com";

	$server_name="localhost";
	$server_username="";
	$server_password="";
	$server_database="";
	$server_path="/home/ /public_html//";
	$server_file="https://";

}else{
	$db_name = 'mysql:host=localhost;dbname=food_order';
   	$user_name = 'root';
   	$user_password = '';
	$server_path="C:/xampp/htdocs/food_order//";
	$server_file="http://localhost/food_order/";
}
	
$con = new PDO($db_name, $user_name, $user_password);

?>