<?php
$a0 = $_GET["u"];
$a1 = $_GET["e"];
require "dblog.php"; //$db
$res = mysqli_query($db,"SELECT * FROM `Userzy` WHERE `Username` = '".$a0."'",MYSQLI_STORE_RESULT);
if(mysqli_num_rows($res)!=0){
 echo "0";
 exit();
}
else{
 $res = mysqli_query($db,"SELECT * FROM `Userzy` WHERE `Email` = '".$a1."'",MYSQLI_STORE_RESULT);
 if (mysqli_num_rows($res)!=0){
  echo "1";
  exit;
 }
 else echo "2";
}
?>