<?php
require_once "connect.php";
session_start();


if(isset($_GET['blad'])){
    echo "<script>alert('".$_GET['blad']."')</script>";
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
        </style>
</head>
<body>
   <div class="content">
        <?php
if(!isset($_COOKIE['zalogowany'])){
?>
<div style='display: flex; justify-content: center; margin-top:100px;'>
<a href="zaloguj.php"><button>zaloguj</button></a>
<a href="rejestracja.php" style="margin-left: 20px;"><button>zarejestruj</button></a>
</div>
<?php
}else{


header("Location: profil.php");




}
?>
   </div>
</body>
</html>