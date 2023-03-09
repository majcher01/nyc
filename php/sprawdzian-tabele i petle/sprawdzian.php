<?php

echo "Zadanie 1<br>";

$i=0;

while($i<5){
    echo "Jakub Majcherski<br>";
    $i++;
}

echo "<br>Zadanie 2 <br>";

$a=20;

do{
    echo $a." ";
    $a=$a+2;

}while($a<51);

echo "<br><br>Zadanie 3<br>";

for ($c=0, $d=10000;$c<5;$c++,$d=$d/10){
    for($v=0;$v<$c;$v++){
        echo "0";
    }
    echo $d;
    echo "<br>";
}


echo "<br><br>Zadanie 4<br>";

for($i=1;$i<6;$i++){
    for($j=1;$j<=$i;$j++){
        echo $i;
    }
    echo "<br>";
}


echo "<br><br>Zadanie 5<br>";

$liczby=[2, 5, 3, 6, 14, 1];

rsort($liczby);

for($i=0; $i<count($liczby);$i++){
    echo $liczby[$i]. " ";

}

echo "<br><br>Zadanie 6<br>";

$miasta = array("Krakow"=>1, "Warszawa"=>2, "Poznan"=>3);

krsort($miasta);

foreach($miasta as $m=>$v){
    echo $m." ".$v."<br>";
}

echo "<br><br>Zadnanie 7";

$samochody=array("Ford"=>2011, "Fiat"=>2009, "Mazda"=>2000, "Opel"=>2007);

$zabytki=array();
$prawie_nowe=array();

foreach($samochody as $sm=>$prod){
    if($prod<2010){
        array_push($zabytki, $sm);
    }else{
        array_push($prawie_nowe, $sm);
    }
}

echo "<br><br>Zabytki:<br>";

for($i=0; $i<count($zabytki);$i++){
    echo $zabytki[$i]. " ";

}

echo "<br><br>Prawie nowe:<br>";

for($i=0; $i<count($prawie_nowe);$i++){
    echo $prawie_nowe[$i]. " ";

}


echo "<br><br>Zadanie 8<br><br>";

ksort($samochody);

foreach($samochody as $sm=>$pr){
    echo $sm." ".$pr."<br>";
}



?>
