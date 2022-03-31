<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zarządzanie artykułami</title>
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
<table border="1px solid black">
    <tr>
        <td>Edytuj</td>
        <td>USUN</td>
        <td >Nagłowek</td>
        <td >Zdjęcie</td>
</tr>
    <?php
    include("config.php");
    session_start();
    $query2="SELECT glowna.id, glowna.nagl_gl,  galeria.images FROM glowna JOIN galeria on glowna.zdjnagl_gl=galeria.id" ;

$result2 = mysqli_query($link, $query2);  
 
//$count = mysqli_num_rows($result2); 


while($data = mysqli_fetch_array ($result2) )
{ 
      $idart=$data['id'];
      $naglowek=$data['nagl_gl'];
      //echo "<script>console.log('$naglowek')  </script>";
      $kajzdj=$data['images'];
      //echo "<script>console.log('$kajzdj')  </script>";
        echo "<tr>
        <td ><a href='usun.php?q=".$idart."'>USUN artykuł</a>  </td>  
        <td > <a  href='edytuj.php?q=".$idart."'>EDYTUJ artykuł    </td> 
        <td >".$naglowek."</td>
        <td ><img class='miniaturka' src=".$kajzdj."></td>
        
       </tr> ";
    
    }

    ?>
    </table>
</body>
</html>