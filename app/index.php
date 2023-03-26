<?php
session_start();
$cookie_name = "sesja";
if(!isset($_COOKIE[$cookie_name])){
header('Location: ../php/expired.php');
}


$mode=$_GET['mode'];

if($mode=='play'){




require_once "../php/connect.php";

function UniqueRandomNumbers($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

$czasrozpoczecia=date("H:i:s");

$_SESSION['czasrozpoczecia']=$czasrozpoczecia;


$connection = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!$connection){
die('Błąd bazy danych');
}
$query = mysqli_query($connection, "SELECT * FROM `pytania` ;");
//$result = $query->fetch_assoc();
$rekordy=mysqli_num_rows($query);


$pytania=UniqueRandomNumbers(1, $rekordy, 5);

$_SESSION['wybrane']=$pytania;





}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bg.css" type="text/css">
    <title>quiz</title>
    <style>
        body{
            margin: 0px 0px 200px 0px;
        }
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
            .srodek{
            display: flex;
            justify-content: center;
            margin-top:150px;
        }

        .pytanie{
            border: 1px solid black;
    height: auto;
    width: auto;
    padding-bottom: 10px;
    padding-top: 10px;
    padding-left: 5px;
    padding-right: 5px;
    text-align: center;
    border-radius: 15px;
        }

        .labelka{
            border: 1px solid black;
            padding: 10px 10px 10px 10px;
    display: flex;
    border-radius: 10px;
        }

        .labelka:hover{
            background-color: #4f4e4e;
            border-color: white;
            color:white;
            scale:1.05;
            transition-duration: 0.5s;
        }
        .navel{
  font-size:24px;
  padding: 5px 5px 5px 5px;
  text-align: center;
}
.navel:hover{
  background-color: #4f4e4e;
  color: white;
  transition-duration: 0.3s;
  border-radius: 10px;
}
a{
  text-decoration: none;
  color: black;
}
a:hover{
  color: white;
  transition-duration: 0.3s;
}

input[type='radio']{
    margin-right: 10px;
}


</style>
</head>
<body>

<?php if ($mode=='play'){?>
    <div style='margin-bottom:20px; border-bottom:2px solid black; height:40px; padding: 5px 5px 5px 5px; font-family:Verdana, sans-serif;'>
    <span style='float:left;' class="navel"><a href='/profile' style='text-decoration:none;'>Profil</a></span>
    <span style='float:right;' class="navel"><a href='/php/logout.php' style='text-decoration:none;'>Wyloguj</a></span>
    
    </div>
<div style="display: flex; justify-content: center;"> 
<form action='../php/quizcheck.php' method='post' style="width: 800px; padding: 0px 100px 0px 100px;" class="klasa">

<?php

foreach ($pytania as $pytanie){
    $zapytanie = mysqli_query($connection, " SELECT * FROM pytania WHERE id='$pytanie' ");
    $row=mysqli_fetch_array($zapytanie);
    echo "
    <p class='pytanie'><b>".$row['tresc']."</b></p>";
    echo "
    
    
    <label for='1-".$pytanie."' class='labelka'>
    <input type='radio' id='1-".$pytanie."' name='".$pytanie."' value='a' checked>
    ".$row['odpa']."
    </label><br>
    
    <label for='2-".$pytanie."' class='labelka'>
    <input type='radio' id='2-".$pytanie."' name='".$pytanie."' value='b'>
    ".$row['odpb']."
    </label><br>
    
    <label for='3-".$pytanie."' class='labelka'>
    <input type='radio' id='3-".$pytanie."' name='".$pytanie."' value='c'>
    ".$row['odpc']."
    </label><br>
    
    <label for='4-".$pytanie."' class='labelka'>
    <input type='radio' id='4-".$pytanie."' name='".$pytanie."' value='d'>
    ".$row['odpd']."
    </label><br>
    <br><br><br>
    ";
}

echo "
<div style='text-align:center;'>
<input type='submit' value='Zakończ' class='przycisk'>
</div>
</form>
</div>";

}else{
?>

<div class='srodek'>
    <div style='text-align: center;'>
    <div>
    Rozpocznij quiz
    </div>
    <div style='margin-top:40px;'>
        <a href='.?mode=play'><button class='przycisk'>Start</button></a>
    </div>
</div>

</div>


<?php } ?>
</body>
</html>
<?php
$connection->close();
?>
