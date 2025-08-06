<?php
include '../../conecta/conecta.php';
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    $id = htmlspecialchars($_GET["id"]);
    //    echo $id;
    //query string inserting student
    $SQL = 	"DELETE FROM usuario WHERE id = " . $id;

    //execute query
    $cat = $mysqli->query($SQL);

    //success or failure?
    if ($mysqli->affected_rows > 0) {
        header("Refresh: 0; url=usuario.php");
    } else {
        $bug = $mysqli->error;
        echo 'Errormessage: %s\n', $bug;
    }
?>