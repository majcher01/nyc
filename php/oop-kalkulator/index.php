<?php

if( isset($_GET['dzialanie']) && isset($_GET['l1']) && isset($_GET['l2'])){
    $l1=$_GET['l1'];
    $l2=$_GET['l2'];
    $dzialanie=$_GET['dzialanie'];

    class calc {
       function dodaj($l1,$l2){
        return $l1+$l2;
       } 
       function odejmij($l1,$l2){
        return $l1-$l2;
       } 
       function pomnoz($l1,$l2){
        return $l1*$l2;
       } 
       function podziel($l1,$l2){
        return $l1/$l2;
       } 
    }

    $x=new calc();

    switch ($dzialanie) {
        case "dodaj":
            $wynik=$x->dodaj($l1,$l2);
        break;
        case "odejmij":
            $wynik=$x->odejmij($l1,$l2);
          break;
        case "podziel":
            $wynik=$x->podziel($l1,$l2);
          break;
        case "pomnoz":
            $wynik=$x->pomnoz($l1,$l2);
          break;
      } 

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action='index.php' method='get'>
    Liczba 1: <input type="number" name='l1'><br>
    Liczba 2: <input type="number" name='l2'><br>
    Dzialanie: <select name="dzialanie">
      <option value="dodaj">dodawanie</option>
      <option value="odejmij">odejmowanie</option>
      <option value="pomnoz">mnozenie</option>
      <option value="podziel">dzielenie</option>
     </select><bR>
     <input type='submit' value='policz'>


    </form>
    <br>
    Wynik = <span><?php  if(isset($wynik)){echo $wynik;}  ?></span>
</body>
</html>