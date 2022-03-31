<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szukaj w artykułach</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="top_bar">
    <ul>
      
    <li class="animacja btn topbar"><a href="index.php"> Strona Główna </a>  </li>
    <li class="animacja btn topbar"><a href="galeria.php">Galeria</a></li>
    <li class="animacja btn topbar " id="zarz"><a href="zarzadzanie.php">Zarzadzaj</a></li>
    <li class="animacja btn topbar " id="wyl"><a href="logout.php">Wyloguj</a></li>

 <form id="search_form" method="get" action="bigreaktor.php?q=wart">
    <section id="szukanie">
    <li class="topbar"> <input type="search" name='wart' class="fcs animacja" id="search_input" ></li>
    <li class="topbar"><input type="submit"  class="lupa animacja" value="&#x1F50D;" ></li>
    </section>
    </form>
       
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
    
</ul> 
</div>
<hr>
<div class="empty_div"></div>
    <?php
include("config.php");    
$zmienna=$_GET['wart'];
$czyjest=false;
echo "<script>console.log('$zmienna')</script>";
if(isset($zmienna)){
    $zmienna = stripcslashes($zmienna);
    $zmienna = mysqli_real_escape_string($link, $zmienna);      
    $czyjest=true;

}

if($czyjest){
    $query2="SELECT glowna.id, glowna.nagl_gl, glowna.tresc_gl, galeria.images 
    FROM glowna JOIN galeria on zdjnagl_gl=galeria.id 
    WHERE glowna.nagl_gl LIKE '%$zmienna%'";

    $result2 = mysqli_query($link, $query2);  
    
    while($data = mysqli_fetch_array ($result2) )
    { 
        if( isset($_SESSION['loggedin']) &&   ( $_SESSION['loggedin'])){
            echo " <script> console.log('zalogowano'); </script>";
         }else{
            
             echo " <script>
             
           document.getElementById('wyl').style.display = 'none'</script>";}

            
      $naglowek=$data['nagl_gl'];
      //echo "<script>console.log('$naglowek')  </>";
      $tresc=$data['tresc_gl'];
      //echo "<script>console.log('$tresc')  </script>";
      $kajzdj=$data['images'];
      //echo "<script>console.log('$kajzdj')  </script>";
        echo "<div class='artyk'><a href=artykul.php?q=".$data['id']." >
        <h1>".$naglowek."</h1>
        
        <img class='imgarty' src=".$kajzdj."></br><hr></br></a>
        </div>";
    
    }
}else{
    echo "<div><p>Brak takiego artykułu</p></div>";
}



    ?>



</body>
</html>