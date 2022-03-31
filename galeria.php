<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="top_bar">
    <ul>
      
    <li class="animacja btn topbar"><a href="index.php"> Strona Główna </a>  </li>
    <li class="animacja btn topbar"><a href="galeria.php">Galeria</a></li>
    <li class="animacja btn topbar " id="zarz"><a href="zarzadzanie.php">Zarzadzaj</a></li>
    <li class="animacja btn topbar " id="wyl"><a href="logout.php">Wyloguj</a></li>

 <form id="search_form">
    <section id="szukanie">
    <li class="topbar"> <input type="search" class="fcs animacja" id="search_input" ></li>
    <li class="topbar"><input type="submit" class="lupa animacja" value="&#x1F50D;"></li>
    </section>
    </form>
</div>
<hr>
<div class="empty_div"></div>
<div class="div_gal">
  <?php
  include "config.php";
  session_start();
  if( isset($_SESSION['loggedin']) &&   ( $_SESSION['loggedin'])){
      echo " <script> console.log('zalogowano'); </script>";
    }else{
      
        echo " <script>
        
      document.getElementById('wyl').style.display = 'none';  
      document.getElementById('zarz').style.display = 'none';
      </script>";
    }
  $records = mysqli_query($link,"SELECT * from galeria"); 

  while($data = mysqli_fetch_array($records))
  {

  ?>
    <div class="galerianka_li">
      <img width="400px" height="400px" src="<?php echo $data['images']; ?>">
    </div>  
  <?php
  }
  ?>

</div>





</body>
</html>