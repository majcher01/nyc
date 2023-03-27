<?php

require_once "connect.php";


$imie=$_POST['imie'];
$nazwisko=$_POST['nazwisko'];
$email=$_POST['email'];
$haslo=$_POST['haslo'];
$shapass=sha1($haslo);


$connection = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!$connection){
die('Błąd bazy danych');
}
$query = mysqli_query($connection, "SELECT * FROM `uzytkownicy` WHERE email='$email';");
//$result = $query->fetch_assoc();
$rekordy=mysqli_num_rows($query);

if($rekordy==0){



mysqli_query($connection, "INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `email`, `haslo`, `typ`, `aktywny`) VALUES (NULL, '$imie', '$nazwisko', '$email', '$shapass', 'user', 1);");
//$result = $query->fetch_assoc();
$connection->close();



header('Location: ../login.php?registered=true');
}else{
    $connection->close();
    header('Location: ../register.php?wrongemail=true');
}




?>
