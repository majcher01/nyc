<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    Logowanie
    </div>
    <div style='margin-top:40px;'>
    <form action='php/valid.php' method='post'>
            E-mail:
            <input type='email' placeholder='email' name='email'>
            <br><br>
            Haslo:
            <input type='password' placeholder='Haslo' name='haslo'>
            <br><br>
            <input type='submit' value='Potwierdz'>
        </form>
    </div>
    <?php
    if(isset($_GET['niepoprawne'])){
        echo"
        <div style='margin-top:30px; color: red; text-align:center;'>
        Niepoprawny login lub haslo!
        </div>

        ";
    }
    if(isset($_GET['expired'])){
        echo"
        <div style='margin-top:30px; color: red; text-align:center;'>
        Sesja wygasla, zaloguj sie ponownie.
        </div>

        ";
    }
    ?>
</div>

</div>
    
</body>
</html>