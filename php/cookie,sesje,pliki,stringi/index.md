# Cookiesy

#### Tworzenie cookiesa

```php
setcookie(name, value, expire, path, domain, secure, httponly);
```

name jest required, reszta optional

#### Cookies z wygasaniem

```php
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
```

tu jest miesiac (86400 sekund = 1 dzien)

#### Sprawdzenie czy cookie istnieje

```php
<?php
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}
?>
```

#### Modyfikacja wartosci

uzyj jeszcze raz setcookie();

#### Usuwanie cookiesa

setcookie(); z data wygasniecia z przeszlosci np:

```php
// set the expiration date to one hour ago
setcookie("user", "", time() - 3600);
```

#### Sprawdzenie czy cookiesy sa wlaczone

ustawiam jakiegos losowego cookiesa i sprawdzam czy sie zapisal

```php
<?php
setcookie("test_cookie", "test", time() + 3600, '/');

if(count($_COOKIE) > 0) {
  echo "Cookies are enabled.";
} else {
  echo "Cookies are disabled.";
}
?>
```

# Sesja

#### Start i zmienne sesji

`session_start()`
`$_SESSION[];`

zeby odczytac zmienne sesji na innej stronie to musza byc session_start(); no i trzeba przeczytac odpowiednia zmienna np. `$_SESSION['test'];`

#### Wyswietlenie wszystkich dostepnych zmiennych sesji

mozna uzyc `print_r($_SESSION);`

#### Zmiana wartosci zmiennej

tak jak ze zwykla zmienna, trzeba ja nadpisac

```php
$_SESSION['test']='xd';
```

#### Konczenie sesji

`session_unset();` - usuwa wszystkie zmienne sesji
`session_destroy();` - usuwa sesje

# Operacje na plikach

#### Wyswietlenie zawartosci pliku sposob 1

mozna uzyc funkcji `readfile();` - dziala ale ta funkcja jest dosyc ograniczona\

przyklad

```php
<?php
echo readfile('plik.txt');
?>
```

#### Otwieranie pliku - `fopen()`

ma 2 parametry - pierwszy to nazwa pliku, drugi to tryb w jakim otwieramy\









