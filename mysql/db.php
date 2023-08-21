<?php

include 'mysql/connection.php';

function Connection(){
    global $connection, $host, $user, $password, $db;

    $connection = mysqli_connect($host,$user,$password,$db);

    if(!$connection){

        die("neco se pokazilo");

    }
}

function CloseConnection(){
    global $connection;    

    mysqli_close($connection);

}

function InsertFun(){
    global $connection;
    $jmeno=$_POST['jmeno'];
    $prijmeni=$_POST['prijmeni'];
    $nick = $_POST['prezdivka'];
    $heslo = $_POST['heslo'];

    $jmeno=mysqli_real_escape_string($connection,$jmeno);
    $prijmeni=mysqli_real_escape_string($connection,$prijmeni);
    $nick=mysqli_real_escape_string($connection,$nick);
    $heslo=mysqli_real_escape_string($connection,$heslo);

    if($jmeno && $prijmeni && $nick && $heslo){

        $query = "INSERT INTO uzivatele(jmeno,prijmeni,nick,heslo)
                    VALUES('$jmeno','$prijmeni','$nick','$heslo')";

        $result = mysqli_query($connection,$query);

        echo "<br>";

        if(!$result){
            die("Dotaz do databaze selhal".mysqli_error());
        }else{
            echo "Úspěšně jste se registroval/a";
        }

    }else{

        echo "<br><br>";
        echo 'Vypln vsechny udaje...';
        echo "<br><br>";
        
    }
}

function LoginFun(){
    session_start();
    global $connection;

    if(!$connection){

        die("Chyba pri pripojovani k databazi: ".mysqli_error()."</head></body>");

    }

    if (empty($_POST['prezdivka']) || empty($_POST['heslo'])) {

        echo "Vyplňte přezdívku a heslo!";
        echo "<br><br>";

    }

    $nick=$_POST['prezdivka'];
    $heslo=$_POST['heslo'];

    $nick=mysqli_real_escape_string($connection,$nick);
    $heslo=mysqli_real_escape_string($connection,$heslo);

    $query="SELECT * FROM uzivatele WHERE nick='$nick' AND heslo='$heslo'";
    $result=mysqli_query($connection,$query);

    if(!$result){

        echo "Prihlášení se nezdařilo".mysqli_error();

    }else{
        $radek = mysqli_num_rows($result);
        if ($radek == 0) {

            echo "Uživatel neexistuje!!";

        } else {

            echo "Úspěšně jste se Prihlasil/a";
            $_SESSION['nick']=$nick;
            header("Location: registrovani.php");

        }
    }
}

?>