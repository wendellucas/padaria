<?php
    //connect to mysql db
    // require "../connect/connect.php";
    //database information
    $server = 	"localhost";
    $user = 	"root";
    $pass = 	"";
    $database = "recanto_doce";
     
    //make a database connection object
    $mysqli = new mysqli($server, $user, $pass, $database);

    //test if there are database connection errors
    if ($mysqli->connect_error) {
        die("Connect Error " . $mysqli->connect_error);
    }

    $name = $_POST["nome"];
    if (empty($name)) {
        echo 'Campos vazios';
    } else {
        //query string inserting categoria
        $SQL = 	"INSERT INTO `categorias`(`nome`) VALUES ('$name')";

        //execute query
        $cat = $mysqli->query($SQL);

        //success or failure?
        if ($mysqli->affected_rows > 0) {
            echo $_POST['firstname'] . ' foi adicionado as categorias.';
        } else {
            $bug = $mysqli->error;
            echo 'Error message: %s\n', $bug;
        }
    }
?>