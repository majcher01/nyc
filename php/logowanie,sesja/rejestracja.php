<?php

if(isset($_GET['blad'])){
    echo "<script>alert('".$_GET['blad']."')</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .lele{
            display: flex;
            justify-content: center;
            padding-top: 200px;
        }
        </style>
</head>
<body>
    <div class="lele">
<form action="php/rejestracjaprocess.php" method="post"><br>
    imie:<input type="text" name="imie"><br>
    nazwisko:<input type="text" name="nazwisko"><br>
    email:<input type="text" name="email"><br>
    haslo:<input type="password" name="password">
    <br><br>
    <input type="submit" value='potwierdz'>
    </form>
</div>
</body>
</html>