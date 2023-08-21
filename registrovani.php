<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP projekt</title>
</head>
<body>
    <?php include 'menu.php';
        menu();
    ?>
    <h1>Registrovaní</h1>
    <?php 
        if(!isset($_SESSION['nick'])){

            echo "<a href='index.php'>Musíš se přihlásit</a>";
            die("</body></html>");

        }else{

            echo "<h4>Jsi přihlášen</h4>";

        }
    ?>
    <h3>Ahoj <?php echo $_SESSION['nick']; ?>, vítej v sekci pro registrované.</h3>
    <img src="hura.jpg" alt="human_progress">
</body>
</html>