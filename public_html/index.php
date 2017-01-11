<html lang="pl">
<script>
/*Pokaz/Schowaj Cien + Okienko.
State: 0: Schowaj, 1: Pokaz
Target: ID docelowego okienka. logwin dla logowania i regwin dla rejestracji */
function StorePopup(state,target){ 
 if (state){
  document.getElementById("shadow-off").id = "shadow-on";
  document.getElementById(target).className = "popup-on";
 } 
 else{
  document.getElementById("shadow-on").id = "shadow-off";
  document.getElementById(target).className = "popup-off";
 }
}
function SubmitReg(){ //Sprawdz czy wszystko wypelnione + Hasla sie zgadzaja
	var a0 = document.getElementById("form_regname").value;
	var a1 = document.getElementById("form_regmail").value;
	var a2 = document.getElementById("form_pass1").value;
	var a3 = document.getElementById("form_pass2").value;
	var d = document.getElementById("ErrorLog");
	var err = false;
	d.innerHTML = "";
	if (!a0){d.innerHTML += "Wprowadź nazwę użytkownika!<br>";err=true;} 
	if (!a1){d.innerHTML += "Wprowadź adres e-mail!<br>";err=true;} 
	if (!a2){d.innerHTML += "Wprowadź hasło!<br>";err=true;} 
	if (!a3){d.innerHTML += "Wprowadź ponownie hasło!<br>";err=true;} 
	if (a2!=a3){d.innerHTML += "Podane hasła się nie zgadzają!<br>";err=true;}
	if (err==false) {
	 if (window.XMLHttpRequest){
      // Dla IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
     } else {
      // Dla IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
     }
     xmlhttp.onreadystatechange = function(){
	  if (this.readyState==4 && this.status==200) {
	    var res = this.responseText;
		if (res=="0"){
		 d.innerHTML += "Ta nazwa użytkownika jest już zajęta!<br>";
		}
		else if (res=="1"){
		 d.innerHTML += "Inne konto korzysta już z tego maila!<br>";
		}
		else if (res=="2"){
		 document.getElementById("RegForm").submit(); //Jezeli nie ma bledu podejmij sie rejestracji
		}
		else{
		 d.innerHTML += "Wystąpił nieoczekiwany błąd podczas rejestracji!<br>"+res;
		}
	  }
	 }
	 xmlhttp.open("GET","valreg.php?u="+a0+"&e="+a1,true);
     xmlhttp.send();
}
}
</script>
<?php require 'dblog.php';?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bananek - Najlepszy Sklep Internetowy</title>
<!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- CSS -->
    <link rel="stylesheet" type="text/css" href="style.css" media="all">
<!-- FONTY-->
    <style>
      .center-block
      {
        float:none;
      }
    </style>
  </head>
 <!-- Ukryte okienka -->
<div id="shadow-off" style="background-color: #000000" ></div>
<div id="LogWin" class="popup-off"><center style="font-size: 32px;">Logowanie</center><br>
<form method="post" action="login.php">
          <label>Login / E-mail</label>
          <input name="l" type="text" id="form_logname">
		  <br>
          <label>Hasło</label>
          <input name ="p" type="password" id="form_logpass">
          <br>
		  <br>
          <button type="submit">Zaloguj się</button>
</form>
<br>
<a href="javascript:void(0)" onclick="StorePopup(0,'LogWin')">Zamknij</a>
</div>
<div id="RegWin" class="popup-off"><center style="font-size: 32px;">Rejestracja</center><br>
<form method="post" action="register.php" id="RegForm">
		<label>Nazwa użytkownika</label>
		<input name="rl" type="text" id="form_regname">
		<br>
		<label>Adres E-Mail</label>
		<input name="re" type="text" id="form_regmail">
		<br>
		<label>Hasło</label>
		<input name="rp1" type="password" id="form_pass1">
		<br>
		<label>Powtórz Hasło</label>
		<input name="rp2" type="password" id="form_pass2">
		<br>
		<br>
		<button type="button" onclick="SubmitReg()">Załóż konto</button>
		<div id = "ErrorLog" style="text-color: red;"></div>
</form>
<br>
<a href="javascript:void(0)" onclick="StorePopup(0,'RegWin')">Zamknij</a></div>
  <body ng-app="app">
<div ng-controller="navigation" style="z-index: 1;position: relative;">
<!--NAWIGACJA -->

<!--Kontener żeby menu nie było na całej stronie -->
<!--W kontenerze znajdują się wszystkie divy -->
<div class="container">
  <div class="row">
    <div class="col-sm-12">
<!-- ========================================= -->
          <nav class="navbar navbar">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#/home">Sklep</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li ng-class="{active: isActive('/products')}"><a href="#/products">Produkty</a></li>
                  <li ng-class="{active: isActive('/users')}"><a href="#/users">Użytkownicy</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
				  <?php
				  if (isset($_COOKIE['AuthID'])){
				   $res = mysqli_query($db, "SELECT * FROM Userzy WHERE `Session`='".$_COOKIE["AuthID"]."'",MYSQLI_STORE_RESULT);
				   if (mysqli_num_rows($res)==0){ //Niepoprawne / Nieaktualne ID
				    setcookie("AuthID","",time()-1);
					echo '<li id="LogWin"><a href="javascript:void(0)" onclick="StorePopup(1,\'LogWin\')">Logowanie</a></li><li id="RegWin"><a href="javascript:void(0)" onclick="StorePopup(1,"RegWin")">Rejestracja</a></li>';
				   }
				   else{ //Sprawdz dane uzytkownika
				    $row = mysqli_fetch_assoc($res);
					echo "<li>".$row["Username"]."</li>";
					if ($row["Permissions"]=="1"){
					echo "<li><a href='admin.php'>Panel Admina</a></li>";
					echo "<li><a href=''>Wyloguj</a></li>";
					}
				   }
				  } //Niezalogowany
				  else{
				   echo '<li id="LogWin"><a href="javascript:void(0)" onclick="StorePopup(1,\'LogWin\')">Logowanie</a></li><li id="RegWin"><a href="javascript:void(0)" onclick="StorePopup(1,\'RegWin\')">Rejestracja</a></li>';
				  }
				  ?>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        <!-- ======================================= -->
    </div>
  </div>
</div>
</div>
      <div ng-view></div>
<!-- KONIEC NAWIGACJI -->
    <!-- kontroler "test" (zadeklarowany w application.js) zadziała tylko w tym divie -->
 <!-- 
   <div ng-controller="test">
      {{ nazwa }}
      <br>
      <input type="text" ng-model="nazwa">
    </div>
-->
    <!-- ng-model czyli przypisuje model który obsługuje model scope (application.js) czyli model przechowuje jakieś dane i przypisuje tą nazwe do pola imput -->
    <!-- ===================== Java Script ================== -->
    <!-- Angular  -->
    <!-- Dzięki angularowi nie musimy przeładowywać strony żeby jakakolwiek akcja miała miejsc. Daje stałe dwukierunkowe połączenie widoku z modelem -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script> <!-- inicjalizowanie modułów angulara za pomocą zewnętrznych plików -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-route.min.js"></script>
 <!--   <script src="js/application.js"></script>
    <script src="js/controllers.js"></script> 
    <!--  jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--  Bootstrap  -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>