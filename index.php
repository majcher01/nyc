<?php
if(isset($_COOKIE['sesja'])){
    header('Location: app');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bg.css" type="text/css">
    <title>Quiz Jakub Majcherski</title>
    <style>
        .srodek{
            display: flex;
            justify-content: center;
            margin-top:150px;
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
        </style>
</head>
<body>

<div class='srodek'>
    <div style='text-align: center;'>
    <div>
    Quiz PHP Jakub Majcherski
    </div>
    <div style='margin-top:40px;'>
        <a href='login.php'><button class='przycisk'>Logowanie</button></a>
        <br><br>
        <a href='register.php'><button class='przycisk'>Rejestracja</button></a>
    </div>
</div>

</div>
    
</body>
</html>