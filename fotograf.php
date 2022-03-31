<!DOCTYPE html>
<html>
<head>
  <title>Galeria Baza</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

include('config.php'); 
$db=$link;
if(isset($_POST["submit"]))
{
    $var1 = rand(1111,9999);  // generate random number in $var1 variable
   $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
   $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["image"]["name"];    // get the image name in $fnm variable
    $dst = "./all_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "all_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name
$dst= "./all_images/".$fnm;
$dst_db="all_images/".$fnm;

    move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
	
    $check = mysqli_query($db,"insert into galeria(fname,images) values('$_POST[fname]','$dst_db')");  // executing insert query
		
    if($check)
    {
    	echo '<script type="text/javascript"> alert("Dodawanie zdjecia zakończone powodzeniem!"); </script>';  // alert message
    }
    else
    {
    	echo '<script type="text/javascript"> alert("Nie udało sie dodać zdjęcia :c!"); </script>';  // when error occur
    }
}
?>

<div id="top_bar">
    <ul>
       
    <li class="animacja btn topbar"><a href="index.php"> Strona Główna </a>  </li>
    <li class="animacja btn topbar"><a href="galeria.php">Galeria</a></li>
    <li class="animacja btn topbar " id="zarz"><a href="zarzadzanie.php">Zarzadzaj</a></li>
    <li class="animacja btn topbar" id="wyl"><a href="logout.php">Wyloguj</a></li>
</ul> 
</div>
<hr>


<h2>Insert Data</h2>

<form method="post" enctype="multipart/form-data">
  <table border="2">
    <tr>
      <td>Nazwa w systemie</td>
      <td><input type="text" name="fname" placeholder="Enter Name" Required></td>
    </tr>
    <tr>
      <td>Wybierz obraz</td>
      <td><input type="file" name="image" Required></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" value="Wyślij na serwer"></td>			
    </tr>
  </table>
</form>

<hr/>

<h2>All Records</h2>

<table border="2">
  <tr>
    <td>Sr.No.</td>
    <td>Name</td>
    <td>Images</td>
    
  </tr>

<?php

$records = mysqli_query($db,"SELECT * from galeria"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
  $temp_id=$data['id'];
?>
  <tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['fname']; ?></td>
    <td><img src="<?php echo $data['images']; ?>" width="100" height="100"></td>
    
  </tr>	
<?php
}
?>

</table>

<?php mysqli_close($db);  // close connection ?>

</body>
</html>
