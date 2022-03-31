<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona Główna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="top_bar">
    <ul>
      
    <li class="animacja btn topbar"><a href="index.php"> Strona Główna </a>  </li>
    <li class="animacja btn topbar"><a href="galeria.php">Galeria</a></li>
    <li class="animacja btn topbar " id="zarz"><a href="zarzadzanie.php">Zarzadzaj</a></li>
    <li class="animacja btn topbar " id="wyl"><a href="logout.php">Wyloguj</a></li>

 <form id="search_form" method="get" action="wyszukiwanie.php?q=wart">
    <section id="szukanie">
    <li class="topbar"> <input type="search" name='wart' class="fcs animacja" id="search_input" ></li>
    <li class="topbar"><input type="submit"  class="lupa animacja" value="&#x1F50D;" ></li>
    </section>
    </form>
       
    <?php
session_start();
include('config.php');
if( isset($_SESSION['loggedin']) &&   ( $_SESSION['loggedin'])){
     echo " <script> console.log('zalogowano'); </script>";
  }else{
     
      echo " <script>
      
    document.getElementById('wyl').style.display = 'none';  
    document.getElementById('zarz').style.display = 'none';
    </script>";
  }
?>
    
</ul> 
</div>
<hr>
<div class="empty_div"></div>

<div></div>
<?php

 
$query2="SELECT glowna.id, glowna.nagl_gl,  galeria.images FROM glowna JOIN galeria on glowna.zdjnagl_gl=galeria.id" ;

$result2 = mysqli_query($link, $query2);  
 
//$count = mysqli_num_rows($result2); 


while($data = mysqli_fetch_array ($result2) )
{ 
  
 
  $naglowek=$data['nagl_gl'];
  echo "<script>console.log('$naglowek')  </script>";
  
  $kajzdj=$data['images'];
  echo "<script>console.log('$kajzdj')  </script>";
    echo "<div class='artyk'><a href=artykul.php?q=".$data['id'].">
   
    <h1>".$naglowek."</h1>
    
    <img class='imgarty' src=".$kajzdj."></br></br>
    </a></div><hr>";

}
?>



</body>
</html>