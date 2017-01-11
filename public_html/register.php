<?php
$a0 = $_POST["rl"];
$a1 = $_POST["re"];
$a2 = $_POST["rp1"];
require "dblog.php"; //$db
//Chociaz w valreg.php sprawdzamy unikalnosc danych, na wypadek tutaj tez. 
$res = mysqli_query($db,"SELECT * FROM `Userzy` WHERE `Username` = '$a0' OR `Email` = '$a1'",MYSQLI_STORE_RESULT);
if(mysqli_num_rows($res)==0){
 $pas = md5($a2);
 $res = mysqli_query($db,"INSERT INTO `Userzy` (`Username`,`Email`,`Password`,`Permissions`) VALUES ('$a0','$a1','$pas',0)",MYSQLI_STORE_RESULT);
 if ($res){
  setcookie("Redir",4,time()+60);
  header('Location: ' . 'index.php', true, 301);
  exit();
 }
 else{
  setcookie("Redir",5,time()+60);
  header('Location: ' . 'index.php', true, 301);
  exit();
 }
}
else{
 setcookie("Redir",6,time()+60);
 header('Location: ' . 'index.php', true, 301);
 exit();
}
?>