<?php
session_start();
$cookie_name = "sesja";
if(!isset($_COOKIE[$cookie_name])){
header('Location: ../php/expired.php');
}

require_once "connect.php";

$uid=$_POST['uid'];
$aimie=$_POST['aimie'];
$anazwisko=$_POST['anazwisko'];
$aemail=$_POST['aemail'];
$ahaslo=$_POST['ahaslo'];
$atyp=$_POST['atyp'];


$connection = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!$connection){
die('Błąd bazy danych');
}
$query = mysqli_query($connection, " UPDATE `uzytkownicy` SET `imie` = '$aimie', `nazwisko` = '$anazwisko', `email` = '$aemail', `typ` = '$atyp' WHERE `uzytkownicy`.`id` = $uid; ");

if(!empty($ahaslo)){
    $shapass=sha1($ahaslo);
    mysqli_query($connection, " UPDATE `uzytkownicy` SET `haslo` = '$shapass' WHERE `uzytkownicy`.`id` = $uid");
}


//$result = $query->fetch_assoc();
//$user=mysqli_fetch_array($query);
$connection->close();

header('Location: ../admin/uzytkownicy');



?>