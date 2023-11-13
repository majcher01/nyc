<?php
require_once "connect.php";
session_start();


if(isset($_GET['blad'])){
    echo "<script>alert('".$_GET['blad']."')</script>";
}

$connection=mysqli_connect($host, $dbuser, $dbpass, $dbname);

if(!$connection){

die('Couldnt connect to database');

}

if(isset($_GET['kategoria'])){

    $wybor=$_GET['kategoria'];
    $towary = mysqli_query($connection, "SELECT * FROM `towary` WHERE kategoria='$wybor'");

}else{





$towary = mysqli_query($connection, "SELECT * FROM `towary` ");


}

$kategorie = mysqli_query($connection, "SELECT DISTINCT kategoria from towary;  ");



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
        </style>
</head>
<body>
   <div class="pasek">
        <table>
            <tr><td><a href="index.php"><button>Wszystkie towary</button></a></td></tr>
            <tr><td>Kategorie:</td></tr>
            <?php

while($row = mysqli_fetch_array($kategorie)){
        

          echo"  <tr><td><a href='index.php?kategoria=".$row['kategoria']."'><button>".$row['kategoria']."</button></a></td></tr>";
}

            ?>
        </table>
   </div>
   <div class="content">
        <div class="pasek-user">
        <?php
if(!isset($_COOKIE['zalogowany'])){
?>
<a href="zaloguj.php"><button>zaloguj</button></a>
<a href="rejestracja.php" style="margin-left: 20px;"><button>zarejestruj</button></a>
<?php
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
    
echo "

<a href='profil.php?page=koszyk' style='margin-left: 20px;'><button>zobacz koszyk</button></a>


";
}

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







$connection->close();
        ?>
        </div>
   </div>
</body>
</html>