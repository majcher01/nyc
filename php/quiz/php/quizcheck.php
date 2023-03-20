<?php
session_start();
require_once "connect.php";

$selected=$_SESSION['wybrane'];
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

echo "Liczba poprawnych: ". $poprawne;


$connection->close();




?>