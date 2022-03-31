<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="top_bar">
    <ul>
       
    <li class="animacja btn topbar"><a href="index.php"> Strona Główna </a>  </li>
    <li class="animacja btn topbar"><a href="galeria.php">Galeria</a></li>
    <li class="animacja btn topbar" id="zarz"><a href="zarzadzanie.php">Zarzadzaj</a></li>
    <li class="animacja btn topbar" id="wyl"><a href="logout.php">Wyloguj</a></li>
</ul> 
<?php
session_start();
if( isset($_SESSION['loggedin']) &&   ( $_SESSION['loggedin'])){
     echo " <script> console.log('zalogowano'); </script>";
  }else{
     
      echo " <script>
      
    document.getElementById('wyl').style.display = 'none';  
    document.getElementById('zarz').style.display = 'none';
    </script>";
  }
?>
</div>
<hr>
<div id="empty_div"></div>
<div id="div_log">

<p id="logowanie">
<form action="logowanie.php" method="post" id="form_log">
  <ul>
    <li class="tekst logow">Logowanie do zarządzania </li></br>
    <li class="logow"><input class="animacja fcs a" type="text" id="username" placeholder="Nazwa Użytkownika" name="username"></li>
    <li class="logow"><input class="animacja fcs a" type="password" id="password" placeholder="Hasło" name="password"></li>
    <li class="logow"><input class="animacja a" type="submit" value="ZALOGUJ WARIACIE" ></li>
  </ul>
</form>
</p>
</div>

      


</body>
</html>
