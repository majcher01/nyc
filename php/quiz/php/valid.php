<?php

require_once "connect.php";

$email=$_POST['email'];
$haslo=$_POST['haslo'];
$shapass=sha1($haslo);


$connection = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!$connection){
die('Błąd bazy danych');
}
$query = mysqli_query($connection, "SELECT * FROM `uzytkownicy` WHERE email='$email' AND haslo='$shapass';");
//$result = $query->fetch_assoc();
$rekordy=mysqli_num_rows($query);
$connection->close();


if($rekordy==1){
session_start();
//generacja ranom stringa do value cookiesa
$_SESSION['login']=$email;
$str=rand();
$result = md5($str);
$cookievalue=$result;

$_SESSION['cookievalue']=$cookievalue;

$cookie_n_sesja = "sesja";                                                                                                                   $cookie_v_sesja = $cookievalue;
                                setcookie($cookie_n_sesja, $cookie_v_sesja, time() + 3600, "/");   //COOKIE SESJI
                                $_SESSION['start'] = time(); // Taking now logged in time.
                // Ending a session in given period of time from the starting time.
                $_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
                                header('Location: ../app');
}else{
    header('Location: ../login.php?niepoprawne=true');
}







?>