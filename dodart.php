<?php
session_start();
include('config.php');
$dane_usera= $_SESSION['id_uzytkownika']." ".
$_SESSION['a_usrnm']." ".
$_SESSION['a_pswd']." ".
$_SESSION['imie_uzytkownika']." ".
$_SESSION['nazisko_uzytkownika']." ".
$_SESSION['uprawnienie1']." ".
$_SESSION['uprawnienie2']." ".
$_SESSION['uprawnienie3'];
echo "<script>console.log('$dane_usera')</script>";


if(isset($_POST['tyt']))
{
    $tytul=$_POST['tyt'];
    echo
    "<script>
    console.log('$tytul');
    </script>";
}
if(isset($_POST['trescart'])){
    $tresc=$_POST['trescart'];
    "<script>
    console.log('$tresc');
    </script>";
}

if(isset($_POST['zdj_naglowek'])){
    $zdjnagl=$_POST['zdj_naglowek'];
    "<script>
    console.log('$zdjnagl');
    </script>";
}
if(isset($_POST['galer'])){
    $zdjdogal=$_POST['galer'];
    "<script>
   console.log('$zdjdogal');
    </script>";
}


$tworca=$_SESSION['id_uzytkownika'];
$date = date('d-m-y h:i:s');

if(isset($_POST['tyt']) && isset($_POST['trescart']) && isset($_POST['zdj_naglowek']))
{
    echo "<script>console.log('w ifie')</script>";
//$query="INSERT INTO glowna (nagl_gl, tresc_gl zdjnagl_gl, datart,) VALUES ( '$tytul' , '$tresc'  , '$zdjnagl', '$date' )";

$query = "INSERT INTO glowna ( nagl_gl, tresc_gl, zdjnagl_gl, datart, zdjecie, tw_id) VALUES ('$tytul', '$tresc', '$zdjnagl', '$date','', '$tworca');";
echo "<script>console.log(`$query`)</script>";
$result = mysqli_query($link, $query);  

}else echo "<script>console.log('takichuj')</script>";

header("Location: zarzadzanie.php");
exit();

?>