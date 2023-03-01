<?php
// Include the database configuration file
include("config.php");

$orderID=$_GET['orderID'];

$delete= $con->prepare("UPDATE `orderlist` SET soft_delete='$today' where orderID='$orderID' and soft_delete=''");
if($delete->execute()) {
	$statusMsg = "Delete successfully.";
}else{
	$statusMsg = "Something Wrong.";
}

echo "<script>alert('".$statusMsg."');</script>";
echo "<script>window.location.replace('index.php');</script>";
