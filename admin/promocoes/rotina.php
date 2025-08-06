<?php

include '../../conecta/conecta.php';
//connect to mysql db
$mysqli = conecta() or die(mysqli_error($mysqli));

$SQL = "UPDATE `promocoes`SET active = 0 WHERE datafinal < now()";

//execute query
$qry = $mysqli->query($SQL);

//success or failure?
if (!$mysqli->error) {
    echo "Alterou";
} else {
    echo 'SEM ALTERAÇÃO NA TABELA PROMOÇOES ';
    $bug = $mysqli->error;
    echo 'Errormessage: ', $bug;
}

//close connection
$mysqli->close();
?>