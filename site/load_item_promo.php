<?php
include '../conecta/conecta.php';
function load_title(){
    $id = htmlspecialchars($_GET["id"]);
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    //query string loading category
    $SQL = 	"SELECT * FROM promocoes WHERE ID = $id";
    $SQL2 = "SELECT linkpromo.ID_promo, itens.ID, itens.nome, itens.img FROM linkpromo JOIN itens ON linkpromo.ID_iten=itens.ID WHERE linkpromo.ID_promo = $id";
    //execute query
    $cat = $mysqli->query($SQL) or die($mysqli->error);
    while ($row = mysqli_fetch_row($cat)) {
        $date1 = implode('/', array_reverse(explode('-', $row[3])));
        $date2 = implode('/', array_reverse(explode('-', $row[4])));
        // <br /><br /><h3 class='text-muted'>Confira os itens desta promoção</h3>";
        $produto = "<h2 class='section-heading text-uppercase'>$row[1]</h2><h3 class='section-subheading text-muted'>";
        $produto .= nl2br($row[2]);
        $produto .= "</h3><h4 class='text-muted'>De $date1</h4><h4 class='text-muted'>A $date2</h4><img class='itemcardapio' src='../admin/cardapio/$row[5]' />";
    }
    // $cat2 = $mysqli->query($SQL2) or die($mysqli->error);
    // while ($row2 = mysqli_fetch_row($cat2)) {
    //     $produto .= "<a href='item.php?id=$row2[1]'><p class=''>$row2[2]</p><br /><br /><img width=400px; src='../admin/cardapio/$row2[3]'></a><br /><br />";
    // }
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