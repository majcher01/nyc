<?php
// var_dump() - zwraca typ zmiennej
$x = 2;
var_dump($x);
echo "<bR>";

//tablice
$samochody = array("Volvo", "BMW", "Opel", "Toyota");
var_dump($samochody);
echo $samochody."<br>";

for ($i=0;$i<count($samochody);$i++){
    echo $samochody[$i]." ";
}

//tu masz linka do funkcji zwiazanych z tablicami
//https://www.w3schools.com/php/php_ref_array.asp
//przeciez nie bede tego przepisywal wszystkiego

//petle

// In PHP, we have the following loop types:
// 
// while - loops through a block of code as long as the specified condition is true
// do...while - loops through a block of code once, and then repeats the loop as long as the specified condition is true
// for - loops through a block of code a specified number of times
// foreach - loops through a block of code for each element in an array

echo "<br>";

$g=1;

while($g<10){
    echo $g.'<br>';
    $g++;
}

// do while to to samo tylko sprawdza warunek na koncu
//https://www.w3schools.com/php/php_looping.asp

//fora tez nie bede pisal bo to proste jak nie powiem co bo to publiczne repo

// o foreach jest fajny, wykonuje sie dla kazdego elementu w tablicy

echo "<br>";

foreach($samochody as $samochod){
    echo $samochod." ";

}

//tabele te drugie asocjacyjne chyba

$ludki = array("Maciek"=>34, "Ania"=>12, "Krzysiu"=>18, "Stasiek"=>47);

echo "<br>";

foreach ($ludki as $ludek => $wiek){
    echo $ludek." ma ".$wiek." lat.<br>";
}

// no i break/continue -> break wywala cala petle, continue wywala jeden obrot


//mozna jeszcze zrobic wielowymiarowe tablice ale to juz chyba trzeba sie niezle nudzic bo polapac sie w tym gownie latwo nie jest
//prawie bym zapomnial - sortowanie, klasyczek
// sort() - sort arrays in ascending order
// rsort() - sort arrays in descending order
// asort() - sort associative arrays in ascending order, according to the value
// ksort() - sort associative arrays in ascending order, according to the key
// arsort() - sort associative arrays in descending order, according to the value
// krsort() - sort associative arrays in descending order, according to the key

//no to lecimy ludki od najmlodszego
echo "<br>";
asort($ludki);

foreach($ludki as $k=>$v){
    echo $v."<br>";
}







?>