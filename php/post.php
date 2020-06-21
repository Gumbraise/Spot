<?php
$bdd = new PDO('mysql:host=localhost;dbname=spot', 'root', ''); 

if(isset($_POST['upload'])) {
    if(!empty($_POST['text'])) {
        $requser = $bdd->prepare("INSERT INTO spot(text, ip, date, rate) VALUES(?, ?, UNIX_TIMESTAMP(), ?)");
        $requser->execute(array($_POST['text'], $_SERVER['REMOTE_ADDR'], $_POST['rate']));
        echo "ok";
    }
    else {
        echo "erreur";
    }
}
else {
    echo "erreur";
}