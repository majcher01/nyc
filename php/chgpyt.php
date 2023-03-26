<?php
session_start();
$cookie_name = "sesja";
if(!isset($_COOKIE[$cookie_name])){
header('Location: /php/expired.php');
}

require_once "connect.php";

$pid=$_POST['uid'];
$atresc=$_POST['atresc'];
$aodpa=$_POST['aodpa'];
$aodpb=$_POST['aodpb'];
$aodpc=$_POST['aodpc'];
$aodpd=$_POST['aodpd'];
$aodppoprawna=$_POST['aodppoprawna'];
$akategoria=$_POST['akategoria'];

$connection = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!$connection){
die('Błąd bazy danych');
}
$query = mysqli_query($connection, " UPDATE `pytania` SET `tresc`='$atresc',`odpa`='$aodpa',`odpb`='$aodpb',`odpc`='$aodpc',`odpd`='$aodpd',`odppoprawna`='$aodppoprawna',`kategoria`='$akategoria' WHERE id='$pid' ");



//$result = $query->fetch_assoc();
//$user=mysqli_fetch_array($query);
$connection->close();

header('Location: /admin/pytania');



?>