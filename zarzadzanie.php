<!DOCTYPE html>
<?php
session_start();
include('config.php');  
$username=$_SESSION["a_usrnm"];
$password=$_SESSION["a_pswd"];
if(!($_SESSION['loggedin'])){
    header("location: mainlogon.php");
    exit;
}
$dane_usera=$_SESSION['id_uzytkownika']." ".
$_SESSION['a_usrnm']." ".
$_SESSION['a_pswd']." ".
$_SESSION['imie_uzytkownika']." ".
$_SESSION['nazisko_uzytkownika']." ".
$_SESSION['uprawnienie1']." ".
$_SESSION['uprawnienie2']." ".
$_SESSION['uprawnienie3'];
echo "<script>console.log('$dane_usera')</script>";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarządzanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div id="top_bar">
    <ul>
       
    <li class="animacja btn topbar"><a href="index.php"> Strona Główna </a>  </li>
    <li class="animacja btn topbar"><a href="galeria.php">Galeria</a></li>
    
    <li class="animacja btn topbar" id="wyl"><a href="logout.php">Wyloguj</a></li>
</ul> 
</div>
<hr>
<div class="empty_div"></div>

<ul class="sr zciemnionetlo">

<li class="animacja bbtn" id="fotu1"><a href="fotograf.php">PRZEJDZ DO BAZY ZDJĘĆ</a></li>
<li class="animacja bbtn dd" id="fotu2_1"><a href="up2_dodart.php" >Dodaj artykuł</a></li>
<li class="animacja bbtn dd" id="fotu2_2"><a href="up2_zarzart.php">Zarządzaj artykułami</a></li>
<li class="animacja bbtn dd" id="fotu3"><a href="up3.php">Dodaj użytkowników</a></li>


</ul>
</body>
<?php
if($_SESSION['uprawnienie2']){
    echo " <script>
      
    document.getElementById('fotu2_1').style.display = 'block';  
    document.getElementById('fotu2_2').style.display = 'block';
    </script>";
}
if($_SESSION['uprawnienie3']){
    echo " <script>
      
    document.getElementById('fotu3').style.display = 'block';  
    
    </script>";
}

?>
</html>