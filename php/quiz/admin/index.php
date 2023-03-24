<?php
session_start();
$cookie_name = "sesja";
if(!isset($_COOKIE[$cookie_name])){
header('Location: ../php/expired.php');
}

require_once "../php/connect.php";


$email=$_SESSION['login'];

$connection = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!$connection){
die('Błąd bazy danych');
}
$query = mysqli_query($connection, "SELECT * FROM `uzytkownicy` WHERE email='$email' ;");
//$result = $query->fetch_assoc();
$result=mysqli_fetch_array($query);

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
    <title>quiz</title>
    <style>

  body{
    margin-bottom:200px;
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
</style>
</head>
<body>
    <div style='margin-bottom:20px; border-bottom:2px solid black; height:30px;'>
    <span style='float:left;'><a href='../app' style='text-decoration:none;'>Quiz</a></span>
    <span style='float:right;'><a href='../php/logout.php' style='text-decoration:none;'>Wyloguj</a></span>
    
    </div>
<div>
Witaj <?php echo $result['imie']. " " . $result['nazwisko']."!";?>
<br>
Twoje poprzednie wyniki:
<br><br>
</div>



</body>
</html>
<?php
$connection->close();
?>