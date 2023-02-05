<?php
//zadanie 1
echo"Kasprzak<br>";


//zadanie 2
$imie = "Jakub";
$nazwisko = 'Majcherski';

echo "Nazywasz sie: ".$imie." ".$nazwisko;

echo "<br>";

//zadanie 3

$zmienna = 25;

if( ($zmienna%5)==0 ){
    echo $zmienna." jest podzielna przez 5";
}else{
    
    echo $zmienna." NIE jest podzielna przez 5";
}


echo "<br>";

//zadanie 4

$maniek='Maniek';

if($maniek=="Maniek"){
    echo "OK, Maniek!";
}

echo "<br>";

//zadanie 5


define('PI', 3.14);

$promien=10;


$pole=PI*($promien**2);

echo $pole;


echo '<br>';


//zadanie 6


$ocena = 5;

if($ocena>3){
    echo"dobra ocena";
}else{
    echo "stac cie na wiecej";
}

echo "<br>";

//zadanie 8

$kierowca='Verstappen';


switch($kierowca){

    case "Hamilton":
        echo "ok, to kierowca f1";
    break;

    case "Norris":
        echo "ok, to kierowca f1";
    break;

    case "Verstappen":
        echo "ok, to kierowca f1";
    break;

    case "SUPER MAX":
        echo "ok, to najlepszy kierowca f1 w sezonach 2021 i 2022";
    break;

    default:
        echo "Nie znamy tych ludzi";
    break;
    }


echo "<br>";


//zadanie 7

$kierowca2='xd';


if($kierowca2=='Norris'){
    echo "ok, to kierowca f1";

}else if($kierowca2=='Hamilton'){
    echo"ok, to kierowca f1";
}else if($kierowca2=="Verstappen"){
    echo "ok, to kierowca f1";
}else{
    echo "nie znam kierowcy";
}




?>