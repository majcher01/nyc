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
            width: 100%;

        }
        .pasek-user{
            height: 60px;
                display: flex;
    justify-content: flex-end;
    align-items: center;
    padding-right: 50px;
        }
        table{
            border-collapse: collapse;
        }
        .towaryczycos{
            display:flex;
            justify-content: center;
        }
        th, td {
  padding: 15px;
}
        </style>
</head>
<body>
   <div class="content">
        <div class="pasek-user">
        <?php
if(!isset($_COOKIE['zalogowany'])){
    header("Location: index.php?blad=Zaloguj sie!");
}else{

$emailzsesji=$_SESSION['email'];
$userquery=mysqli_query($connection, "SELECT * FROM uzytkownicy WHERE email='$emailzsesji'");
$user=mysqli_fetch_array($userquery);




echo "

<a href='php/usun.php' style='margin-left: 20px;'><button>Usun konto</button></a>


";
echo "

<a href='php/wyloguj.php' style='margin-left: 20px;'><button>wyloguj</button></a>


";




}
?>
        </div>
        <div class="towaryczycos">
        <?php
echo "Witaj ". $user['imie']." !";
echo "
<br>
Twoje dane:
<br>
Nazwisko: ".$user['nazwisko']."
<br>
Email: ".$user['email'];








$connection->close();
        ?>
        </div>
   </div>
</body>
</html>