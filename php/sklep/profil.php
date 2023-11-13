<?php
require_once "connect.php";
session_start();

$connection=mysqli_connect($host, $dbuser, $dbpass, $dbname);

if(!$connection){

die('Couldnt connect to database');

}














//==============================================

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sklep</title>
    <style>
        body{
            margin: 0px;
        }
        .pasek{
            float:left;
            width:20%;
            padding-top: 100px;
        }

        .content{
            float:right;
            width: 80%;

        }
        .pasek-user{
            height: 60px;
                display: flex;
    justify-content: flex-end;
    align-items: center;
    padding-right: 50px;
        }
        .towaryczycos{

        }
        table{
            border-collapse: collapse;
        }
        th, td {
  padding: 15px;
}
        </style>
</head>
<body>
   <div class="pasek">
        <table>
            <tr><td><a href="profil.php?page=koszyk"><button>Koszyk</button></a></td></tr>
            <tr><td><a href="profil.php?page=zamowienia"><button>Zamowienia</button></a></td></tr>
        </table>
   </div>
   <div class="content">
        <div class="pasek-user">
        <?php
if(!isset($_COOKIE['zalogowany'])){
    header("Location: index.php?blad=Zaloguj sie aby zobaczyc koszyk!");
}else{

$emailzsesji=$_SESSION['email'];
$userquery=mysqli_query($connection, "SELECT * FROM uzytkownicy WHERE email='$emailzsesji'");
$user=mysqli_fetch_array($userquery);

echo "Witaj ". $user['imie']." !";

if($user['koszyk']==""){
    echo " Twoj koszyk jest pusty";
}else{
    $koszyk=explode(";",$user['koszyk']);
    echo " W twoim koszyku znajduja sie: ".count($koszyk)." produkty!";
    
    
}

echo "

<a href='index.php' style='margin-left: 20px;'><button>Powrot</button></a>


";
echo "

<a href='php/wyloguj.php' style='margin-left: 20px;'><button>wyloguj</button></a>


";




?>





<?php
}
?>
        </div>
        <div class="towaryczycos">
        <?php

/*        
echo "<table>";
while($row = mysqli_fetch_array($towary)){
        echo"<tr>";
        echo "<td>" . $row['nazwa'] . "</td>";
        echo"<td><img src='" . $row['zdjecie'] . "' style='height:150px;'></td>";
        echo "<td>" . $row['cena'] . "</td>";
        if(isset($_COOKIE['zalogowany'])){
        echo "<td><a href='php/dodajdokoszyka.php?pid=".$row['id']."'><button>dodaj do koszyka</button></a></td>";
        }
        echo"</tr>";
}
echo "</table>";
*/



if($_GET['page']=="koszyk"){

?>

<p><b>Koszyk</b></p>
<hr>



<?php


$koszykarr=explode(";",$user['koszyk']);
echo "<table>";
foreach($koszykarr as $e){
    $towar=mysqli_query($connection, "SELECT * FROM towary WHERE id='$e'");
    
    while($tb=mysqli_fetch_array($towar)){

        echo"<tr>";
        echo "<td>" . $tb['nazwa'] . "</td>";
        echo"<td><img src='" . $tb['zdjecie'] . "' style='height:150px;'></td>";
        echo "<td>" . $tb['cena'] . "</td>";
        echo"</tr>";
    }
}
echo "</table>";
if($user['koszyk']!=""){
echo "<a href='php/wyczysckoszyk.php'><button>Wyczysc koszyk</button></a>";
echo "<a href='php/zamowienie.php?action=nowe'><button>zloz zamowienie</button></a>";

}else{
    echo"Koszyk jest pusty";
}
}else if($_GET['page']=="zamowienia"){


?>

<p><b>Zamowienia</b></p>
<hr>



<?php

$uid=$user['id'];
$zamowieniaquery=mysqli_query($connection, "SELECT * FROM zamowienia WHERE `klient-id`='$uid'");

if(mysqli_num_rows($zamowieniaquery)==0){
    echo "brak zamowien";
}

echo "<table>";
while($row = mysqli_fetch_array($zamowieniaquery)){
        
     echo"<tr style='border-bottom: 1px solid black;'><th>".$row['data-zlozenia']."</th></tr>";
        echo"<tr>";
        $lala=explode(";",$row['towary']);
        foreach($lala as $l){
            
    $towar2=mysqli_query($connection, "SELECT * FROM towary WHERE id='$l'");
    
    while($tx=mysqli_fetch_array($towar2)){

        echo "<td>" . $tx['nazwa'] . "</td>";
        echo"<td><img src='" . $tx['zdjecie'] . "' style='height:80px;'></td>";
        echo "<td>" . $tx['cena'] . "</td>";
        
    }
        }
        echo "<td><b>Status: </b>" . $row['status'] . "</td>";
        echo "<td><b>Wartosc: </b>" . $row['wartosc'] . "</td>";
        echo "<td><a href='php/zamowienie.php?action=anuluj&zid=".$row['id']."'><button>Anuluj</button></a></td>";
        echo"</tr>";
}
echo "</table>";



}else if($_GET['page'] =="zlozone"){

echo "Zamowienie zlozone!
<br>
do zaplaty: ".$_GET['wartosc']."<br>
numer konta na ktory nalezy zrobic przelew: 2137 2111 3434 3677 9999 3546
<br>
<a href='profil.php?page=zamowienia'><button>OK</button></a>

";

}else{
    echo "wybierz zakladke";
}






$connection->close();
        ?>
        </div>
   </div>
</body>
</html>