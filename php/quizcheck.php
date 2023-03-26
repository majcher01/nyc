<?php
session_start();
require_once "connect.php";

$selected=$_SESSION['wybrane'];
$czasrozpoczecia=$_SESSION['czasrozpoczecia'];
$email=$_SESSION['login'];
$poprawne=0;

$connection = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!$connection){
die('Błąd bazy danych');
}
//$query = mysqli_query($connection, "SELECT * FROM `uzytkownicy` WHERE email='$email' AND haslo='$shapass';");
//$result = $query->fetch_assoc();
//$rekordy=mysqli_num_rows($query);


foreach ($selected as $pyt){
    
$query = mysqli_query($connection, "SELECT * FROM `pytania` WHERE id='$pyt';");
$q2=mysqli_query($connection, " SELECT id FROM uzytkownicy WHERE email='$email'");
$rq2=mysqli_fetch_array($q2);
$userid=$rq2['id'];
$row=mysqli_fetch_array($query);
$poprawnaodp=$row['odppoprawna'];
$odpowiedzusera=$_POST[$pyt];
/*
echo "user: ". $odpowiedzusera;
echo "<bR>" . "poprawna: ".$poprawnaodp."<br><br>";
*/



if($odpowiedzusera==$poprawnaodp){
    $poprawne++;
}



}

$data=date("Y-m-d");
$czaszakonczenia=date("H:i:s");

$from_time = strtotime($czasrozpoczecia); 
$to_time = strtotime($czaszakonczenia); 
$diff_minutes = round(abs($from_time - $to_time) / 60,2);


$o1=$selected[0];
$o2=$selected[1];
$o3=$selected[2];
$o4=$selected[3];
$o5=$selected[4];


mysqli_query($connection, " INSERT INTO `wyniki` (`id`, `userid`, `data`, `czas-rozpoczecia`, `czas-zakonczenia`, `czas-trwania`, `wynik`, `idp1`, `odp1`, `idp2`, `odp2`, `idp3`, `odp3`, `idp4`, `odp4`, `idp5`, `odp5`) VALUES (NULL, '$userid', '$data', '$czasrozpoczecia', '$czaszakonczenia', '$diff_minutes', '$poprawne', '$selected[0]', '$_POST[$o1]', '$selected[1]', '$_POST[$o2]', '$selected[2]', '$_POST[$o3]', '$selected[3]', '$_POST[$o4]', '$selected[4]', '$_POST[$o5]');  ");



$connection->close();




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyniki</title>
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
            .srodek{
            display: flex;
            justify-content: center;
            margin-top:150px;
        }

</style>
</head>
<body>
    <div class='srodek'>
    <div style='text-align: center;'>
    <div>
    Liczba poprawnych odpowiedzi: <?php echo $poprawne."/5";?>
    <br>
    Aby zobaczyć historię wyników przejdź do swojego profilu.
    </div>
    <div style='margin-top:40px;'>
        <a href='/profile'><button class='przycisk'>Profil</button></a>
        <br><br>
        <a href='/app'><button class='przycisk'>Quiz</button></a>
    </div>
</div>

</div>
</body>
</html>
