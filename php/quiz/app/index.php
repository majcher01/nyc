<?php
session_start();
$cookie_name = "sesja";
if(!isset($_COOKIE[$cookie_name])){
header('Location: ../php/expired.php');
}

require_once "../php/connect.php";

function UniqueRandomNumbers($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}


$connection = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!$connection){
die('Błąd bazy danych');
}
$query = mysqli_query($connection, "SELECT * FROM `pytania` ;");
//$result = $query->fetch_assoc();
$rekordy=mysqli_num_rows($query);


$pytania=UniqueRandomNumbers(1, $rekordy, 5);

$_SESSION['wybrane']=$pytania;






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quiz</title>
    <style>
.przycisk{width: 150px;
height: 50px;
font-size: 20px;
background-color: transparent;
border: 1px solid black;
border-radius: 15px;}
            .przycisk:hover{
                background-color: black;
                color:white;
                transition-duration: 0.4s;
            }

</style>
</head>
<body>
    <div style='margin-bottom:20px; border-bottom:2px solid black; height:30px;'>
    <span style='float:left;'><a href='../profile' style='text-decoration:none;'>Profil</a></span>
    <span style='float:right;'><a href='../php/logout.php' style='text-decoration:none;'>Wyloguj</a></span>
    
    </div>
<div>
<form action='../php/quizcheck.php' method='post'>

<?php

foreach ($pytania as $pytanie){
    $zapytanie = mysqli_query($connection, " SELECT * FROM pytania WHERE id='$pytanie' ");
    $row=mysqli_fetch_array($zapytanie);
    echo "
    <p><b>".$row['tresc']."</b></p>";
    echo "
    
    <input type='radio' id='1-".$pytanie."' name='".$pytanie."' value='a' checked>
    <label for='1-".$pytanie."'>".$row['odpa']."</label><br>
    <input type='radio' id='2-".$pytanie."' name='".$pytanie."' value='b'>
    <label for='2-".$pytanie."'>".$row['odpb']."</label><br>
    <input type='radio' id='3-".$pytanie."' name='".$pytanie."' value='c'>
    <label for='3-".$pytanie."'>".$row['odpc']."</label><br>
    <input type='radio' id='4-".$pytanie."' name='".$pytanie."' value='d'>
    <label for='4-".$pytanie."'>".$row['odpd']."</label><br>
    <br><br><br>
    ";
}

?>

<input type='submit' value='Potwierdz' class='przycisk'>
</form>
</div>
</body>
</html>
<?php
$connection->close();
?>