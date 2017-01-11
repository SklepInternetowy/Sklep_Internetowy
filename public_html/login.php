<?php
$a0 = $_POST["l"]; //Login
$a1 = $_POST["p"]; //Pass
require 'dblog.php';
$res = mysqli_query($db, "SELECT * FROM Userzy WHERE `Username` = '".$a0."' OR `Email` = '".$a1."'",MYSQLI_STORE_RESULT);
if ($res){
 if (mysqli_num_rows($res)==0){
  // Brak Konta
  setcookie("Redir",1,time()+60);
  header('Location: ' . 'index.php', true, 301);
  exit();
 }
 else{
  $_row = mysqli_fetch_assoc($res);
  $_uid = intval($_row['ID']);
  $_pw = $_row['Password'];
  $_se = $_row['Session'];
  if (md5($a1)==$_pw){
  //Poprawne haslo
   if (empty($_se)){
	 //Jezeli nie ma 
	 $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	 $charlen = strlen($chars);
     $ran = '';
     for ($i = 0; $i < 24; $i++) {
        $ran .= $chars[rand(0, $charlen - 1)];
    }
	setcookie("Debug",1,time()+60);
    mysqli_query($db,"UPDATE `Userzy` SET `Session` = '".$ran."' WHERE `Userzy`.`ID` = '".$_uid."'",MYSQLI_STORE_RESULT);
   }
   $res = mysqli_query($db,"SELECT `Session` FROM `Userzy` WHERE `Userzy`.`ID`= '".$_uid."'",MYSQLI_STORE_RESULT);
   $_row = mysqli_fetch_assoc($res);
   setcookie("AuthID",$_row["Session"],time()+2592000); //2592000 to 1 miesiąc (30*24*60*60)
   setcookie("Redir",3,time()+60);
   header('Location: ' . 'index.php', true, 301);
   exit();
  }
  else{
   //Zle haslo
   setcookie("Redir",2,time()+60);
   header('Location: ' . 'index.php', true, 301);
   exit();
  }
 }
}
?>