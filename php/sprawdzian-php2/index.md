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

mysqli_close($conn);
?>

```

### Napisz polecenie za pomoca ktorego zapiszesz haslo karramba do tabeli tajneDane

musi byc wczesniej connection, kolumna nazywa sie haslo

```php
// SQL INSERT statement
$sql = "INSERT INTO tajneDane (haslo) VALUES ('karramba')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
```

### Napisz kod za pomoca ktorego potwierdzisz poprawnosc zapisu do bazy wtedy gdy to nastapi

tutaj chyba chodzi o tego ifa ktory jest wyzej

### Napisz polecenia za pomoca ktorych wyswietlisz na stronie wszystkie dane z bazy php_nowa z tabeli tajneDane.

wczesniej musi byc connection

```php
// SQL query to fetch all rows from tajneDane table
$sql = "SELECT * FROM tajneDane";
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"] . " - Login: " . $row["login"] . " - Hasło: " . $row["haslo"] . "<br>";
    }
} else {
    echo "0 results";
}
```
