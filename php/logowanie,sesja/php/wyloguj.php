<?php
session_unset();
session_destroy();
setcookie("zalogowany", "", time() - 3600, "/");
header("Location: ../");


?>