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
    <h1>Odhlásit se</h1>
    <?php
        session_start();
       if(isset($_SESSION['nick'])){
            

            unset($_SESSION['nick']);

            echo "Byli jste odhlášeni. <a href='index.php'>Přihlásit se znovu</a>";
        } else{
            echo "Nejsi přihlášený. <a href='index.php'>Přihlaš se!</a>";
        }


    ?>

</body>
</html>