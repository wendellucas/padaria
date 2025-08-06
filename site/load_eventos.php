<?php
include '../conecta/conecta.php';
function load_cat_menu(){
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    //query string loading category
    $SQL = 	"SELECT * FROM categorias ORDER BY nome";

    //execute query
    $cat = $mysqli->query($SQL) or die($mysqli->error);
    $div ="<div class='dropdown-menu' aria-labelledby='navbarDropdown'>";
    while ($row = mysqli_fetch_row($cat)) {
        $div .=" <a class='dropdown-item' href='itens.php?id=$row[0]'>$row[1]</a>";
    }
    $div .= "</div>";
    $mysqli->close();
    return $div;
}
function load_eventos(){
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    //query string loading category
    $SQL = 	"SELECT * FROM eventos ORDER BY ID DESC";

    //execute query
    $cat = $mysqli->query($SQL) or die($mysqli->error);
    $contador = 0;
    $div ="";
    while ($row = mysqli_fetch_row($cat)) {
        $date = implode('/', array_reverse(explode('-', $row[3])));
        $div .= "<div class='row'>
        <div class='col-sm-6'>
            <img src='../admin/eventos/$row[4]' width='100%' />
        </div>
        <div class='col-sm-6'>
        <p>$row[1]</p>
        <p>$date</p>
        <p>$row[2]</p>
        </div>
    </div><br/>";
    }
    $mysqli->close();
    return $div;
}
?>