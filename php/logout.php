<?php
session_start();
        $cname = "sesja";
        //$cvalue = ""; 
        setcookie($cname, '', time() - 3600, "/");
        unset($_SESSION['cookievalue']);
        session_unset();
        session_destroy();

        header('Location: ../index.php');

        ?>