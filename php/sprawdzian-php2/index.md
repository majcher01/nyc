### Napisz polecenie za pomoca ktorego zalogujesz sie do zdalnego serwera.

```php
<?php
$servername = "http://x.pl";
$username = "dbuser";
$password = "dbpass";
$dbname = "dbname";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>

```
