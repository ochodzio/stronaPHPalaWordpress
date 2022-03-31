    <!DOCTYPE html>
<html lang="en">
<head>
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
}else if(!($_SESSION['uprawnienie2'])){
    header("location: zarzadzanie.php");
    exit;
}
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie artykułu</title>
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
<form  method="post" action="edyt.php">
<?php
    $co=$_GET['q'];
    $_SESSION['idartykulu']=$co;
    $query="SELECT * FROM glowna WHERE id='$co'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $wartnaglowka=$row['nagl_gl'];
    $wartosctekstu=$row['tresc_gl'];
    $wartosczdjnagl_gl=$row['zdjnagl_gl'];
    
    echo "
    <div class='abcd'>
    <h3>Edytuj artykuł</h3>
    <input type='text' disabled name='idart' value='$co'>
    Edytuj Nagłówek</br>
    <input type='text' class='btn animacja fcs nagl'  id='u1_1_input' name='tyt' value='$wartnaglowka'></br>
    

    Dodaj treść</br>
    <textarea type='text' class='fcs animacja btn' id='u1_1_input' name='trescart' rows='10' cols='50' >$wartosctekstu</textarea></br>
    
    Dodaj zdjęcie nagłówka i zdjęcia do galerii artyułu</br>
    <table>
    <tr>
    <td>Nazwa</td>
    <td>Obraz</td>
    <td>Zdjęcie nagłowek</td>
    <td>Reszta zdjęć</td>
    </tr>
    ";
    //echo "<script>console.log('asdjsajidsajid')</script>";
    
    
    $records = mysqli_query($link,"SELECT * from galeria");
    
    while($data = mysqli_fetch_array($records))
    {
        
        echo "
          <tr>
            <td>".$data['fname']."</td>
            <td><img src='".$data['images']."' width='300px' height='300px'></td>
            <td><input type='radio' name='zdj_naglowek' value= '".$data['id']."' ></td>
            <td><input type='checkbox' name='galer'></td>
          </tr>";	
        
    }
    echo "</table></div>";
   

    
    





?>

<input type="submit" value="Edytuj">
</form>
</body>
</html>