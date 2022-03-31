<!DOCTYPE html>
<html lang="en">
<?php

session_start();
include('config.php');
$username=$_SESSION["a_usrnm"];
$password=$_SESSION["a_pswd"];
$dane=$_SESSION['a_usrnm']." ".
$_SESSION['a_pswd']." ".
$_SESSION['imie_uzytkownika']." ".
$_SESSION['nazisko_uzytkownika']." ".
$_SESSION['uprawnienie1']." ".
$_SESSION['uprawnienie2']." ".
$_SESSION['uprawnienie3'];
echo "<script>console.log('$dane')</script>";
if(!($_SESSION['loggedin'])){
    header("location: mainlogon.php");
    exit;
}else if(!($_SESSION['uprawnienie3'])){
    header("location: zarzadzanie.php");
    exit;
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarządzanie użytkownikami</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="top_bar">
    <ul>
       
    <li class="animacja btn topbar"><a href="index.php"> Strona Główna </a>  </li>
    <li class="animacja btn topbar"><a href="galeria.php">Galeria</a></li>
    <li class="animacja btn topbar " id="zarz"><a href="zarzadzanie.php">Zarzadzaj</a></li>
    <li class="animacja btn topbar" id="wyl"><a href="logout.php">Wyloguj</a></li>
</ul> 
</div>
<hr>
<div class="empty_div"></div>
    <form method="post" action="admin.php">
    <?php
 
 echo "
 <div class='abcd'>
 <h3>Dodaj użytkownikał</h3>
 
 Dodaj Nagłówek</br>
 <input type='text' class='btn animacja fcs '  id='u3_1_input' name='nazwausera' placeholder='username' ></br>
 <input type='text' class='btn animacja fcs '  id='u3_2_input' name='haslo' placeholder='haslo'></br>
 <input type='text' class='btn animacja fcs '  id='u3_3_input' name='u_imie' placeholder='imie'></br>
 <input type='text' class='btn animacja fcs '  id='u3_4_input' name='u_nazwisko' placeholder='nazwisko'></br>
 ROLE</br></br>
<input type='checkbox' name='uprawnienia1' value='true'>fotograf</br> 
<input type='checkbox' name='uprawnienia2' value='true'>redaktor</br>
<input type='checkbox' name='uprawnienia3' value='true'>administrator</br>
 ";



?>
<input type="submit" >
</form>
</body>
</html>