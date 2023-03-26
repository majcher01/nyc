<?php
session_start();
$cookie_name = "sesja";
if(!isset($_COOKIE[$cookie_name])){
header('Location: ../php/expired.php');
}

require_once "../../php/connect.php";


$email=$_SESSION['login'];
$data=date("Y-m-d");

$connection = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!$connection){
die('Błąd bazy danych');
}
$query = mysqli_query($connection, "SELECT * FROM `uzytkownicy` WHERE email='$email' ;");
$uzytkownicyq = mysqli_query($connection, "SELECT * FROM `uzytkownicy`  ;");
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../../assets/bg.css" type="text/css">
    <link rel="stylesheet" href="modal.css">
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
.przycisk2{width: 150px;
height: 30px;
width: 70px;
font-size: 18px;
background-color: transparent;
border: 1px solid black;
border-radius: 15px;}
            .przycisk2:hover{
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
  font-size: 24px;
  font-weight: 400;

}
tr:nth-child(even) {background-color: #ffffff;}
.utb{
  font-size:20px;
  background-color: #bfbfbf;
}
</style>
</head>
  <?php 
  if(isset($_GET['change'])){
    echo "<body onload='openmodal()'>";
  }else{
    echo"<body>";
  }
  
  include('../../php/anav.php'); ?>
<div class="master">
<p class="header">Użytkownicy:</p>

<div style="padding-left:15px;">
  <table class="utb">
    <tr>
      <th>Imię</th>
      <th>Nazwisko</th>
      <th>E-mail</th>
      <th>Typ</th>
      <th></th>
    </tr>
    <?php
      while($row=mysqli_fetch_array($uzytkownicyq)){
        echo"<tr>";
        echo "<td>".$row['imie']."</td>";
        echo "<td>".$row['nazwisko']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['typ']."</td>";
        echo "<td><a href='.?change=true&uid=".$row['id']."'><button class='przycisk2'>Edytuj</button></a></td>";
        echo"</tr>";
        
      }
    ?>
  </table>
</div>






</div>



<!--MODAL-->

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Edycja użytkownika</h2>
    </div>
    <div class="modal-body">
      <?php include('modal.php'); ?>
    </div>
  </div>

</div>


<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function openmodal() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
  </script>
</body>
</html>
<?php
$connection->close();
?>