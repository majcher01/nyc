<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css" type="text/css">
</head>
<body>
    <div class="naglowek">Forum milosnikow psow</div>
    <div class="content">
    <!-- style="float: left; width:40%; height:100%; background-color: aquamarine; -->
        <div class="spanlewy2" >
           <span> 
                <img src="Avatar.png" alt='uzytkownik forum'>
           </span>
           <span style="display: block; margin-top:20px;">
            <?php



            
require_once "connect.php";

$connection=mysqli_connect($host, $dbuser, $dbpass, $dbname);

if(!$connection){

die('Couldnt connect to database');

}

if(isset($_POST['textarea1'])&& !empty($_POST['textarea1'])){
    $value=$_POST['textarea1'];
    mysqli_query($connection,"INSERT INTO `odpowiedzi` (`id`, `Pytania_id`, `konta_id`, `odpowiedz`) VALUES (null, '1', '5', '$value')");
    header('location:'.$_SERVER['PHP_SELF']);
      die(); 
}
$result = mysqli_query($connection, "SELECT konta.nick, konta.postow, pytania.pytanie FROM konta JOIN pytania ON konta.id=pytania.konta_id WHERE pytania.id=1");



$row=mysqli_fetch_array($result);
echo "Użytkownik ".$row['nick'];
echo "<br><br>".$row['postow']. " postow na forum";
echo "<br><br>".$row['pytanie'];
?>
           </span>
        <span style="display: block; margin-top:20px">
   <video  autoplay="" loop="" controls >
                        <source src="video.mp4" type="video/mp4">
                      Twoja przeglądarka nie obsługuje wideo.
                      </video> 
    </span>
</div> 
        <div class="spanprawy2" style="float: right; width:58%;">
            <span style='display: block'>
        <form action="index.php" method='post'>
            <textarea name='textarea1'></textarea>
            <br>
            <input id="button" type="submit" value='dodaj odpowiedz'>
        </form>
        </span>

        <span style='display: block; margin-top:20px;'>
        <h2>Odpowiedzi na pytanie</h2>
        <?php
        $result2 = mysqli_query($connection, "SELECT odpowiedzi.id, odpowiedzi.odpowiedz, konta.nick FROM odpowiedzi INNER JOIN konta ON odpowiedzi.konta_id=konta.id WHERE Pytania_id=1");


//==============================================
echo "<table>";
while($row = mysqli_fetch_array($result2)){
        echo"<tr>";
        echo "<td>" . $row['id'].".".$row['odpowiedz'] ."<i>  ".$row['nick']."</i></td>";
        echo"</tr>";
        echo"<tr><td><hr></td></tr>";
}

echo "</table>";
$connection->close();
        ?>

        </span>
</div>
    </div>
    <!-- style='display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start; -->
    <footer class="stopka">
        Autor: numer zdajacego <a href='http://mojestrony.pl' target='_blank'>http://mojestrony.pl</a>
    </footer>
</body>
</html>