<?php
session_start();
require_once "connect.php";

$selected=$_SESSION['wybrane'];
$email=$_SESSION['login'];
$poprawne=0;

$connection = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!$connection){
die('Błąd bazy danych');
}
//$query = mysqli_query($connection, "SELECT * FROM `uzytkownicy` WHERE email='$email' AND haslo='$shapass';");
//$result = $query->fetch_assoc();
//$rekordy=mysqli_num_rows($query);

foreach ($selected as $pyt){
    
$query = mysqli_query($connection, "SELECT * FROM `pytania` WHERE id='$pyt';");
$q2=mysqli_query($connection, " SELECT id FROM uzytkownicy WHERE email='$email'");
$rq2=mysqli_fetch_array($q2);
$userid=$rq2['id'];
$row=mysqli_fetch_array($query);
$poprawnaodp=$row['odppoprawna'];
$odpowiedzusera=$_POST[$pyt];
/*
echo "user: ". $odpowiedzusera;
echo "<bR>" . "poprawna: ".$poprawnaodp."<br><br>";
*/

if($odpowiedzusera==$poprawnaodp){
    $poprawne++;
}



}

$data=date("Y-m-d");
$czas=date("H:i:s");

mysqli_query($connection, " INSERT INTO `wyniki` (`id`, `userid`, `data`, `czas`, `wynik`) VALUES (NULL, '$userid', '$data', '$czas', '$poprawne');  ");

echo "Liczba poprawnych: ". $poprawne;


$connection->close();




?>