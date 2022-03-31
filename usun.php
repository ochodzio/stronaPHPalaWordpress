<?php 
    session_start();
    include("config.php");
    $co=$_GET['q'];
   echo "<script>console.log(`$co`)  </script>";
    $usun="DELETE FROM glowna WHERE glowna.id= '$co'";
    echo "<script>console.log(`$usun`)  </script>";
    mysqli_query($link,$usun);

    
       header("Location: up2_zarzart.php" );
    exit();

   

    



    ?>