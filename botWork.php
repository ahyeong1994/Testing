<?php
// Include the database configuration file
include("config.php");

$getOrdersql= $con->prepare("SELECT * FROM `orderlist` WHERE soft_delete='' AND status='0' ORDER BY isVIP DESC,created_at LIMIT 1");
$getOrdersql->execute();

if($getOrdersql->rowCount() > 0){
	$getResult=$getOrdersql->fetch(PDO::FETCH_ASSOC);
	$getID=$getResult["orderID"];

	$update= $con->prepare("UPDATE `orderlist` SET status='1',updated_at='$today' WHERE orderID='$getID' ");
	if($update->execute()) {
		echo "<script>window.location.replace('index.php');</script>";
	}
}

