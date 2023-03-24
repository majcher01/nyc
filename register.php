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
    <div style='text-align: center; width:400px;'>
    <div>
    Rejestracja
    </div>
    <div style='margin-top:40px; display:flex; justify-content: center;'>
    <form action='php/rvalid.php' method='post' style='text-align:left;'>
            Imię:<br>
            <input type='text' placeholder='imie' name='imie'>
            <br><br>
            Nazwisko:<br>
            <input type='text' placeholder='nazwisko' name='nazwisko'>
            <br><br>
            E-mail:<br>
            <input type='email' placeholder='email' name='email'>
            <br><br>
            Hasło:<Br>
            <input type='password' placeholder='Haslo' name='haslo'>
            <br><br>
            <input type='submit' value='Potwierdz'>
        </form>
    </div>
    <?php
    if(isset($_GET['wrongemail'])){
        echo"
        <div style='margin-top:30px; color: red; text-align:center;'>
        Użytkownik o podanym adresie e-mail istnieje!
        </div>

        ";
    }
    ?>
</div>

</div>
    
</body>
</html>