<?php

$x=strval($_SERVER['HTTP_USER_AGENT']);

if(strpos($x, "Chrome")){
    echo "strona nie dziala w chromie.<bR>bo tak.";
}else{

echo "<h3>Informacje o serwerze:</h3>";
echo "Nazwa serwera: ". $_SERVER['SERVER_NAME']."<br>";
echo "Adres IP: ". $_SERVER['SERVER_ADDR']."<br>";
echo "Port: ". $_SERVER['SERVER_PORT']."<br>";
echo "Nazwa skryptu: ". $_SERVER['PHP_SELF']."<br>";
echo "Sciezka do skryptu: ". $_SERVER['SCRIPT_FILENAME']."<br>";
echo "Mail do admina: ". $_SERVER['SERVER_ADMIN']."<br>";
echo "<br><br>";

echo "<h3>Zawartosc tablicy SERVER:</h3>";
echo "<br>";
echo join(", ", $_SERVER);
echo "<br><br><br>";





}

?>