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

.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.collapsible:after {
  content: '\002B';
  color: white;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.content {
  padding-top:18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
  width:736px;
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
<?php
$uid=$result['id'];
$r2=mysqli_query($connection, " SELECT * FROM wyniki WHERE userid='$uid' ");
echo "
<span class='tb'>Data</span>
<span class='tb'>Czas rozpoczęcia</span>
<span class='tb'>Czas zakończenia</span>
<span class='tb'>Czas trwania</span>
<span class='tx'>Wynik</span>
<span class='tx'></span>
<br><br>";
while($row=mysqli_fetch_array($r2)){
  /*
echo"<tr>";
echo "<td>".$row['data']."</td>";
echo "<td>".$row['czas-rozpoczecia']."</td>";
echo "<td>".$row['czas-zakonczenia']."</td>";
echo "<td>".$row['czas-trwania']." minuty</td>";
echo "<td>".$row['wynik']."/5</td>";
echo"</tr>";
*/
echo "<span class='collapsible'>";
echo "<span class='tb'>".$row['data']."</span>";
echo "<span class='tb'>".$row['czas-rozpoczecia']."</span>";
echo "<span class='tb'>".$row['czas-zakonczenia']."</span>";
echo "<span class='tb'>".$row['czas-trwania']." minuty</span>";
echo "<span class='tx'>".$row['wynik']."/5</span>";
echo "<span class='tx'>"."Rozwiń"."</span>";
echo"
</span>
<div class='content'>
Błędne odpowiedzi:


</div>
";
}

?>
</div>



<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}

</script>
</body>
</html>
<?php
$connection->close();
?>