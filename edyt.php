<?php
session_start();
include('config.php');
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
    echo"<script>
    console.log('$tresc');
    </script>";
}

if(isset($_POST['zdj_naglowek'])){
    $zdjnagl=$_POST['zdj_naglowek'];
    echo"<script>
    console.log('$zdjnagl');
    </script>";
}
if(isset($_POST['galer'])){
    $zdjdogal=$_POST['galer'];
    echo "<script>
   console.log('$zdjdogal');
    </script>";
}


$idart=$_SESSION['idartykulu'];

$date ="Zaktualizowano".date('d-m-y h:i:s');


    echo "<script>console.log('w ifie')</script>";
$query="UPDATE glowna SET glowna.nagl_gl='$tytul',glowna.datart='$date', glowna.tresc_gl='$tresc',glowna.zdjnagl_gl='$zdjnagl' WHERE glowna.id='$idart';";
//echo "<script>console.log('$query')</script>";

$result = mysqli_query($link, $query);  



header("Location: zarzadzanie.php");
exit();

?>