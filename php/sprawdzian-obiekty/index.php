<?php

//Zadanie 1
echo "<h2>Zadanie 1</h2>";

function czywiekszeodzera($liczba){
    if($liczba>0){
        return "wieksza";
    }else{
        return "mniejsza";
    }
}

echo czywiekszeodzera(2);


//Zadanie 2
echo "<h2>Zadanie 2</h2>";

function czywzakresie1020($liczba){
    if($liczba>=10 && $liczba<=20){
        return "Liczba jest w zakresie pomiedzy 10 a 20";
    }else{
        return "Liczba nie znajduje sie w zakresie";
    }
}

echo czywzakresie1020(22);


//Zadanie 3
echo "<h2>Zadanie 3</h2>";

function checkcokolwiek($tekst){
    if(empty($tekst)){
        return "uzytkownik nic nie wpisal";
    }else{
        return "uzytkownik cos wpisal";
    }
}

echo checkcokolwiek("12");


//Zadanie 4
echo "<h2>Zadanie 4</h2>";

class Auta{
    public $marka;
    public $pojemnosc;
    public $cena;

    function __construct($marka, $pojemnosc, $cena){
        $this->marka=$marka;
        $this->pojemnosc=$pojemnosc;
        $this->cena=$cena;
    }
}

$samochod=new Auta("Opel", 1.6, 2999);

$sw=get_object_vars($samochod);

echo "Marka: ".$sw['marka']."<br>";
echo "Pojemnosc: ".$sw['pojemnosc']."<br>";
echo "Cena: ".$sw['cena']."<br>";



//Zadanie 5
echo "<h2>Zadanie 5</h2>";

if(class_exists("Auta")){
    echo "Klasa istnieje";
}else{
    echo "Klasa NIE istnieje";
}


//Zadanie 6
echo "<h2>Zadanie 6</h2>";

$samochod->marka="Ford";

echo "Nowa marka: ". $samochod->marka;


//Zadanie 7
echo "<h2>Zadanie 7</h2>";


class Zwierze{
    public $skrzydla;
    public $dziob;

    function __construct($skrzydla, $dziob){
        $this->skrzydla=$skrzydla;
        $this->dziob=$dziob;
    }

    function spiew(){
        echo "Kra kra";
    }

}

$ptak=new Zwierze(2,1);

$pw=get_object_vars($ptak);

echo "Skrzydla: ".$pw["skrzydla"]."<br>";
echo "Dziob: ".$pw["dziob"]."<Br>";
echo $ptak->spiew();



//Zadanie 8
echo "<h2>Zadanie 8</h2>";

$ptak->kolor="szary";

echo "Kolor ptaka: ".$ptak->kolor;



?>