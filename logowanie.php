<?php      
session_start();
$_SESSION['loggedin']=false;
    include('config.php');  
    $username = $_POST['username'];  
    $password = $_POST['password'];  
      
         
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($link, $username);  
        $password = mysqli_real_escape_string($link, $password);  
      
        $sql = "SELECT * FROM konta WHERE username = '$username' AND haslo = '$password'";  
        $result = mysqli_query($link, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            $_SESSION['loggedin']=true;
            header("Location: zarzadzanie.php"); 
            $_SESSION['a_usrnm']=$username;
            $_SESSION['a_pswd']=$password;
            $_SESSION['id_uzytkownika']=$row['id'];
           $_SESSION['imie_uzytkownika']=$row['imie'];
           $_SESSION['nazisko_uzytkownika']=$row['nazwisko'];
           $_SESSION['uprawnienie1']=$row['u1'];
           $_SESSION['uprawnienie2']=$row['u2'];
           $_SESSION['uprawnienie3']=$row['u3'];
            exit();
        }  
        else{  
            $_SESSION['loggedin']=false;
            header("Location: mainlogon.php"); 

            exit();
        }     
?>  