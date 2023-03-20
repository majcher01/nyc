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






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quiz</title>
</head>
<body>
    <div style='text-align: right'>
    <a href='../php/logout.php'>wyloguj</a>
</div>
<div>


<?php

foreach ($pytania as $pytanie){
    $zapytanie = mysqli_query($connection, " SELECT * FROM pytania WHERE id='$pytanie' ");
    $row=mysqli_fetch_array($zapytanie);
    echo "
    <p>".$row['tresc']."</p>";
    echo "
    <form action='../php/quizcheck.php' method='post'>
    <input type='radio' id='1-".$pytanie."' name='".$pytanie."' value='a'>
    <label for='1-".$pytanie."'>".$row['odpa']."</label><br>
    <input type='radio' id='2-".$pytanie."' name='".$pytanie."' value='b'>
    <label for='2-".$pytanie."'>".$row['odpb']."</label><br>
    <input type='radio' id='3-".$pytanie."' name='".$pytanie."' value='c'>
    <label for='3-".$pytanie."'>".$row['odpc']."</label><br>
    <input type='radio' id='4-".$pytanie."' name='".$pytanie."' value='d'>
    <label for='4-".$pytanie."'>".$row['odpd']."</label><br>
    </form>
    ";
}

?>

</div>
</body>
</html>
<?php
$connection->close();
?>