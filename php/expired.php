<?php
session_start();
unset($_SESSION['cookievalue']);
setcookie('sesja', '', time() - 3600, "/");
header('Location: ../login.php?expired=true');

?>