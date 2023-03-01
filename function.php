<?php
if(isset($_SESSION['numBot'])){
  if($_SESSION['numBot']==1){
    $_SESSION['numBot']=1;
  }else{
    $_SESSION['numBot']=0;
  }
}else{
  $_SESSION['numBot']=0;
}

// ==========================================================================================================

// add bot
if(isset($_POST['add'])){
  $_SESSION['numBot']=1;

// decrease bot
}else if(isset($_POST['decrease'])){
  $_SESSION['numBot']=0;

// order
}else if(isset($_POST['order'])){
  $numbersql= $con->prepare("SELECT * FROM `orderlist` ");
  $numbersql->execute();
  $setNumber="order".($numbersql->rowCount()+1);
  $insert= $con->prepare("INSERT INTO `orderlist` (ordernumber,status,created_at) VALUES (?,?,?) ");
  $insert->execute([$setNumber,'0',$today]);
  header("Refresh:0");

// order VIP
}else if(isset($_POST['orderVIP'])){
  $numbersql= $con->prepare("SELECT * FROM `orderlist` ");
  $numbersql->execute();
  $setNumber="order".($numbersql->rowCount()+1);
  $insert= $con->prepare("INSERT INTO `orderlist` (ordernumber,status,isVIP,created_at) VALUES (?,?,?,?) ");
  $insert->execute([$setNumber,'0','1',$today]);
  header("Refresh:0");

}

?>