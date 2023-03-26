<?php
session_start();

$current=$_SESSION['login'];

require_once "../../php/connect.php";

$uid=$_GET['uid'];

$connection = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!$connection){
die('Błąd bazy danych');
}
$query = mysqli_query($connection, "SELECT * FROM `pytania` WHERE id='$uid';");
//$result = $query->fetch_assoc();
$user=mysqli_fetch_array($query);
$connection->close();


?>
<head>
    <style>
        input[type='text']{
            width:800px;
            
        }
        .tarea1{
            width:700px;
            font-size:16px;
            height:200px;
            margin-left:10px;
            margin-bottom: 10px;
        }
        .tarea2{
            width:700px;
            font-size:16px;
            height:70px;
            margin-left:10px;
            margin-bottom: 10px;
        }
        .tarea3{
            width:100px;
            font-size:16px;
            height:30px;
            margin-left:10px;
            margin-bottom: 10px;
        }
        </style>
</head>
<div style="padding: 20px 20px 20px 20px; font-size:18px; text-align:left; height:640px; overflow:auto;">
<form method='post' action='/php/chgpyt.php'>
    <div style="display: flex; justify-content:left;">
        Treść: <textarea name='atresc' class="tarea1"><?php echo $user['tresc']; ?></textarea>
    </div>
    <div style="display: flex; justify-content:left;">
        Odp. A: <textarea name='aodpa' class="tarea2"><?php echo $user['odpa']; ?></textarea>
    </div>
    <div style="display: flex; justify-content:left;">
        Odp. B: <textarea name='aodpb' class="tarea2"><?php echo $user['odpb']; ?></textarea>
    </div>
    <div style="display: flex; justify-content:left;">
        Odp. C: <textarea name='aodpc' class="tarea2"><?php echo $user['odpc']; ?></textarea>
    </div>
    <div style="display: flex; justify-content:left;">
        Odp. D: <textarea name='aodpd' class="tarea2"><?php echo $user['odpd']; ?></textarea>
    </div>
    <div style="display: flex; justify-content:left;">
        Odp. poprawna: <textarea name='aodppoprawna' class="tarea3"><?php echo $user['odppoprawna']; ?></textarea>
    </div>
    <div style="display: flex; justify-content:left;">
        Kategoria: <textarea name='akategoria' class="tarea3"><?php echo $user['kategoria']; ?></textarea>
    </div>
    
    <div style="display:flex; justify-content:center; margin-top:40px;">
    <span>
        <a href='/admin/pytania'><button class='przycisk'>Anuluj</button></a>
    </span>
    <span style="margin-left:20px;">
    <input type="submit" value="Potwierdź" class="przycisk">
    <input type="hidden" value="<?php echo $uid; ?>" name='uid'>
    </span>
    
    </div>
</form>
</div>
