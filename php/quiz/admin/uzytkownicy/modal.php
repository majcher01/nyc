<?php

require_once "../../php/connect.php";

$uid=$_GET['uid'];

$connection = new mysqli($host, $dbuser, $dbpass, $dbname);
if(!$connection){
die('Błąd bazy danych');
}
$query = mysqli_query($connection, "SELECT * FROM `uzytkownicy` WHERE id='$uid';");
//$result = $query->fetch_assoc();
$user=mysqli_fetch_array($query);
$connection->close();


?>
<div style="padding: 20px 20px 20px 20px; font-size:18px; text-align:left;">
<form method='post' action='../../php/chguser.php'>
    <div style="display: flex; justify-content:center;">
    <span style='float: left'>
Imie: <input type='text' name='aimie' placeholder="<?php echo $user['imie'] ?>">
</span>
    <span style='float: left; margin-left:20px;'>
Nazwisko: <input type='text' name='anazwisko' placeholder="<?php echo $user['nazwisko'] ?>">
</span>
    </div>
    <div style="display: flex; justify-content:center; margin-top:20px;">
    <span style='float: left'>
E-mail: <input type='email' name='aemail' placeholder="<?php echo $user['email'] ?>">
</span>
    <span style='float: left; margin-left:0px;'>
Hasło: <input type='password' name='ahaslo'>
</span>
    </div>
    <div>
        <p>Typ:</p>
    <input type='radio' name='atyp' value='user' id='1' <?php if($user['typ']=='user'){echo"checked";}  ?>>
    <label for='1'>Użytkownik</label>
    <input type='radio' name='atyp' value='admin' id='2' style="margin-left: 10px;" <?php if($user['typ']=='admin'){echo"checked";}  ?> >
    <label for='2'>Administrator</label>
    
    </div>
    <div style="display:flex; justify-content:center; margin-top:40px;">
    <input type="submit" value="Potwierdź" class="przycisk">
    </div>
</form>
</div>