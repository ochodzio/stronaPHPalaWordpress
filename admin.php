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


if(isset($_POST['nazwausera']))
{
    $username=$_POST['nazwausera'];
    echo
    "<script>
    console.log('$username');
    </script>";
}
if(isset($_POST['haslo']))
{
    $password=$_POST['haslo'];
    echo
    "<script>
    console.log('$password');
    </script>";
}
if(isset($_POST['u_imie']))
{
    $imie=$_POST['u_imie'];
    echo
    "<script>
    console.log('$imie');
    </script>";
}
if(isset($_POST['u_nazwisko']))
{
    $nazwisko=$_POST['u_nazwisko'];
    echo
    "<script>
    console.log('$nazwisko');
    </script>";
}
//uprawnienia
$uprawnienia1=false;
if(isset($_POST['uprawnienia1']))
{
    $uprawnienia1=1;
    echo
    "<script>
    console.log('$uprawnienia1');
    </script>";
}
$uprawnienia2=false;
if(isset($_POST['uprawnienia2']))
{
    $uprawnienia2=1;
    echo
    "<script>
    console.log('$uprawnienia2');
    </script>";
}
$uprawnienia3=false;
if(isset($_POST['uprawnienia3']))
{
    $uprawnienia3=1;
    echo
    "<script>
    console.log('$uprawnienia3');
    </script>";
}


$tworca=$_SESSION['id_uzytkownika'];
$date = date('d-m-y h:i:s');



$query = "INSERT INTO konta ( username, haslo, imie, nazwisko, u1, u2, u3) VALUES ('$username', '$password', '$imie', '$nazwisko','$uprawnienia1', '$uprawnienia2','$uprawnienia3');";
echo "<script>console.log(`$query`)</script>";
$result = mysqli_query($link, $query);  



header("Location: zarzadzanie.php");
exit();

?>