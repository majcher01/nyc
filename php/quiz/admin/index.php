<?php
session_start();
$cookie_name = "sesja";
if(!isset($_COOKIE[$cookie_name])){
header('Location: ../php/expired.php');
}

require_once "../php/connect.php";


$email=$_SESSION['login'];
$data=date("Y-m-d");

$connection = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!$connection){
die('Błąd bazy danych');
}
$query = mysqli_query($connection, "SELECT * FROM `uzytkownicy` WHERE email='$email' ;");
$uzytkownicyq = mysqli_query($connection, "SELECT * FROM `uzytkownicy`  ;");
$pytaniaq = mysqli_query($connection, "SELECT * FROM pytania ;");
$gryq = mysqli_query($connection, "SELECT * FROM wyniki WHERE data='$data' ;");
$pytania=mysqli_num_rows($pytaniaq);
//$result = $query->fetch_assoc();
$result=mysqli_fetch_array($query);
$uzytkownicy=mysqli_num_rows($uzytkownicyq);
$gry=mysqli_num_rows($gryq);

if($result['typ']!="admin"){
  $connection->close();
  die("
  <div style='margin-top:100px; text-align:center;'>
  <h1>Nie posiadasz uprawnień do tej strony!</h1>
  <br><br>
  <a href='../profile'>
  <button style='width: 150px;height: 50px;font-size: 20px;background-color: transparent;border: 1px solid black;border-radius: 15px;'>
  Powrót
  </button>
  </a>
  </div>
  
  ");
}








?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

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
            th, td {
  border: 0px solid black;
  padding-right:20px;
  text-align:left;
}
table {
  border-spacing: 0px;
}

.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  /*width: 100%;*/
  width:700px;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.collapsible:after {
  color: white;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.content {
  padding-top:0px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
  /*width:736px;*/
}
.tb{
  display: inline-block;
  width: 140px;
}
.tx{
  display: inline-block;
  width: 70px;
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
.master{
  padding-left:15px;
}
.header{
  padding-left: 15px;
  font-size: 20px;

}
</style>
</head>
<body>
  <?php include('../php/anav.php'); ?>
<div class="master">
<p class="header">Panel administracyjny aplikacji</p>

<div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class=" fa fa-question w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3> <?php echo $pytania ?> </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Pytania w bazie</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-gamepad w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3> <?php echo $gry ?> </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Liczba dzisiejszych gier</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $uzytkownicy ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Użytkownicy</h4>
      </div>
    </div>
  </div>







</div>



</body>
</html>
<?php
$connection->close();
?>