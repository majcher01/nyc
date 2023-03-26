<?php
session_start();
$cookie_name = "sesja";
if(!isset($_COOKIE[$cookie_name])){
header('Location: /php/expired.php');
}

require_once "connect.php";


$connection = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!$connection){
die('Błąd bazy danych');
}
$query = mysqli_query($connection, " INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `email`, `haslo`, `typ`) VALUES (NULL, 'imie', 'nazwisko', 'email', 'haslo', 'user');   ");

$id1=mysqli_fetch_array(mysqli_query($connection, " SELECT * FROM `uzytkownicy` ORDER BY id desc LIMIT 1; "));

$newid=$id1['id'];

$url="Location: /admin/uzytkownicy?change=true&uid=".$newid;


//$result = $query->fetch_assoc();
//$user=mysqli_fetch_array($query);
$connection->close();

header($url);



?>
