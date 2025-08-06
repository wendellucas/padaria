<?php
include '../../conecta/conecta.php';
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    $id = htmlspecialchars($_GET["id"]);
    $img = htmlspecialchars($_GET["img"]);
    //    echo $id;
    //query string inserting student
    $SQL = 	"DELETE FROM categorias WHERE id = " . $id;

    //execute query
    $cat = $mysqli->query($SQL);

    //success or failure?
    if ($mysqli->affected_rows > 0) {
        if ($img) {
            unlink("$img");
            header("Refresh: 0; url=categorias.php");
        } else {
            header("Refresh: 0; url=categorias.php");
        }
    } else {
        $bug = $mysqli->error;
        echo 'Errormessage: %s\n', $bug;
    }
?>