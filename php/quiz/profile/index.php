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
            th, td {
  border: 0px solid black;
  padding-right:20px;
  text-align:left;
}
table {
  border-spacing: 0px;
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
<table>
<?php
$uid=$result['id'];
$r2=mysqli_query($connection, " SELECT * FROM wyniki WHERE userid='$uid' ");
echo "<tr><th>Data</th><th>Czas</th><th>Wynik</th></td>";
while($row=mysqli_fetch_array($r2)){
echo"<tr>";
echo "<td>".$row['data']."</td>";
echo "<td>".$row['czas']."</td>";
echo "<td>".$row['wynik']."/5</td>";
echo"</tr>";
}

?>
</table>
</div>
</body>
</html>
<?php
$connection->close();
?>