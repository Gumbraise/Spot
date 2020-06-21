<?php
$bdd = new PDO('mysql:host=localhost;dbname=spot', 'root', '');

$insertmbr = $bdd->prepare("SELECT * FROM spot WHERE rate = 0");
$insertmbr->execute(array());
$green = $insertmbr->rowCount();

$insertmbr = $bdd->prepare("SELECT * FROM spot WHERE rate = 1");
$insertmbr->execute(array());
$red = $insertmbr->rowCount();

$gr = ($green/($green + $red))*100;
$re = ($red/($green + $red))*100;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spot | Kellis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="fil">
        <div class="bar">
            <div class="green" style="width: <?php echo $gr; ?>%"></div>
            <div class="red" style="width: <?php echo $re; ?>%"></div>
        </div>
        <div class="form">
            <textarea class="text" placeholder="Qu'est ce que t'aimes bien chez moi ? (1 seul à la fois)"></textarea>
            <textarea class="text" placeholder="Qu'est-ce que tu n'aimes pas chez moi ? (1 seul à la fois)"></textarea>
        </div>
        <div id="button" class="submit">
            <p>ENVOYER</p>
        </div>
        <div class="post_php">

        </div>
    </div>
</body>
<script src="js/main.js"></script>
</html>