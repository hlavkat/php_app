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
    <?php 
        include 'menu.php';
        menu();
    ?>
    <div class="row">
        <div class="col">
            <h1>Registrace</h1>
            <form action="index.php" method="post">
                <input type="text" name="jmeno" placeholder="Jméno">
                <input type="text" name="prijmeni" placeholder="Příjmení">
                <input type="text" name="prezdivka" placeholder="Přezdívka">
                <input type="password" name="heslo" placeholder="Heslo">
                <input type="submit" name="submit" value="Registruj se">
            </form>
        <?php
            include 'mysql/db.php';

            if(isset($_POST['submit'])){
                
                Connection();
                InsertFun();
                LoginFun();
                CloseConnection();

            }

        ?>    
        </div>
    

        <div class="col">
            <h1>Přihlášení</h1>
            <form action="index.php" method="post">
                <input type="text" name="prezdivka" placeholder="Přihlašovací jméno">
                <input type="password" name="heslo" placeholder="Heslo">
                <input type="submit" name="submit1" value="Přihlásit">
            </form>
            <br><br>        
        <?php

            if(isset($_POST['submit1'])){

                Connection();
                LoginFun();
                CloseConnection();

            }
        ?>
        </div>

    </div>
</body>
</html>