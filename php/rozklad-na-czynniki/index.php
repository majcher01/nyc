<?php
if(isset($_GET['liczba'])){
    $liczba=$_GET['liczba'];

    $dzielnik=2;
    $t1=0;
    $wynik=[];
                while(true){
                    $t1=$liczba%$dzielnik;
                    if($t1==0){
                        $liczba=$liczba/$dzielnik;
                        array_push($wynik, $dzielnik);
                        if($liczba==1){
                            break;
                        }
                    }else if($t1!=0){
                        $dzielnik=$dzielnik+1;
                    }
                }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="." method="get">
        Liczba:<input type="number" name="liczba">
        <br>
        <input type="submit">
    </form>
    <br><br>

    <?php
    echo "Wynik: ";
if(isset($wynik)){
    foreach($wynik as $w){
        echo $w." ";
    }
}
    ?>
</body>
</html>