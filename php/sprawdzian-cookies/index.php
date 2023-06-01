<?php
session_start();

//zad1

$tekst="ala Ola Tola Ala Tola";



echo "pozycja slowa Ala: ".strpos($tekst, "Ala");

echo "<br><br>";

//zad2

$tekst2="długość łańcucha znaków";
echo "dlugosc stringa: ".strlen($tekst2);

echo "<br><br>";

//zad3

echo str_repeat("piątka",5);


echo "<br><br>";

//zad4

$tekst3="     Koń";

echo ltrim($tekst3);


echo "<br><br>";

//zad5

$tablica1=["Lis","Wilk","Sarna"];

$zwierzeta = join("",$tablica1);

echo $zwierzeta;


echo "<br><br>";

//zad6

$plik = fopen("pliktekstowy.txt", "a+") or die("nie ma pliku");
fwrite($plik, " d, e, f");
fclose($plik);

$plik2 = fopen("pliktekstowy.txt", "r") or die("nie ma pliku");
echo fread($plik2,filesize("pliktekstowy.txt"));
fclose($plik2);


echo "<br><br>";


//zad7
$plik3 = fopen("pliktekstowy.txt", "r") or die("nie ma pliku");
while(!feof($plik3)) {
  echo fgetc($plik3);
}
fclose($plik3);

echo "<br><br>";

//zad8

$_SESSION['imie']="Kuba";

echo "<a href='drugastrona.php'><button>Przejdz do drugiej strony</button></a>"



?>