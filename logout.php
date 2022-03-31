<?php
session_start();
$_SESSION['loggedin']=false;
$_SESSION['a_usrnm']="";
$_SESSION['a_pswd']="";

header("Location: index.php");

exit();















?>