<?php
include '../conecta/conecta.php';
function load_title(){
    $id = htmlspecialchars($_GET["id"]);
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    //query string loading category
    $SQL = 	"SELECT * FROM itens WHERE ID = $id";

    //execute query
    $cat = $mysqli->query($SQL) or die($mysqli->error);
    while ($row = mysqli_fetch_row($cat)) {
        $produto = "<h2 class='section-heading text-uppercase'>$row[1]</h2><h3 class='section-subheading text-muted'>$row[2]</h3><h4 class='text-muted'>R\$ $row[3]</h4><img class='itemcardapio' src='../admin/cardapio/$row[5]' />";
    }
    $mysqli->close();
    return $produto;

}

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
?>