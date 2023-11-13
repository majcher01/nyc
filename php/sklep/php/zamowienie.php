<?php

require_once "../connect.php";
session_start();


if(!isset($_COOKIE['zalogowany'])){
    header("Location: ../profil.php?blad=Zaloguj sie aby dodac zamowienie!");
}else{




$email=$_SESSION['email'];
$connection=mysqli_connect($host, $dbuser, $dbpass, $dbname);

if(!$connection){

die('Couldnt connect to database');

}

$userquery=mysqli_query($connection,"SELECT * FROM uzytkownicy WHERE email='$email'");
$user=mysqli_fetch_array($userquery);
$uid=$user['id'];
$ukoszyk=$user['koszyk'];
$data=date('Y-m-d');

if($_GET['action']=="nowe"){

    $koszykexplode=explode(";", $ukoszyk);
    $wartosc=0;
    foreach ($koszykexplode as $k){
        $nk=mysqli_query($connection, "SELECT cena FROM towary WHERE id='$k'");
        $nkx=mysqli_fetch_array($nk);
        $wartosc=$wartosc+$nkx['cena'];
    }

mysqli_query($connection, "INSERT INTO `zamowienia` (`id`, `klient-id`, `towary`, `status`, `data-zlozenia`, `wartosc`) VALUES (NULL, '$uid', '$ukoszyk', 'w przygotowaniu', '$data', '$wartosc')");

mysqli_query($connection, "UPDATE `uzytkownicy` SET `koszyk` = '' WHERE `uzytkownicy`.`id` = '$uid';");

$connection->close();

header("Location: ../profil.php?page=zlozone&wartosc=".$wartosc);
}else if($_GET['action']=="anuluj" && isset($_GET['zid'])){

    $zid=$_GET['zid'];
    mysqli_query($connection, "DELETE FROM zamowienia WHERE `zamowienia`.`id` = '$zid'");

    $connection->close();

header("Location: ../profil.php?page=zamowienia");
    


}else{
    echo "cos poszlo nie tak";
}

}



?>