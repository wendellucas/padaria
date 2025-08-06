<?php
include '../conecta/conecta.php';
function load_title(){
    $id = htmlspecialchars($_GET["id"]);
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    //query string loading category
    $SQL = 	"SELECT * FROM subcategorias WHERE ID = $id";

    //execute query
    $cat = $mysqli->query($SQL) or die($mysqli->error);
    $row = mysqli_fetch_row($cat);
    $headers = "<h2 class='section-heading text-uppercase'>$row[1]</h2><h3 class='section-subheading text-muted'>$row[2]</h3>";
    
    $mysqli->close();
    return $headers;

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

function load()
{
    $id = htmlspecialchars($_GET["id"]);
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    //query string loading category
    $SQL = 	"SELECT * FROM itens WHERE categoria = $id ORDER BY nome";

    //execute query
    $cat = $mysqli->query($SQL) or die($mysqli->error);
    $div ="";
    while ($row = mysqli_fetch_row($cat)) {
        $div .= "<div class='col-md-4 col-sm-6 portfolio-item'>
	<a class='portfolio-link' href='item.php?id=$row[0]'>
	    <div class='portfolio-hover'>
		    <div class='portfolio-hover-content'>
			    <i class='fas fa-plus fa-3x'></i>
		    </div>
	    </div>
	    <img class='img-fluid' src='../admin/categorias/$row[5]' alt=''>
	</a>
	<div class='portfolio-caption'>
		<h4>$row[1]</h4>
        <p class='text-muted'>";
        if (strlen($row[2]) > 65) {
            $corteTexto = substr($row[2], 0, 65);
            $texto= substr($corteTexto, 0, strrpos($corteTexto, ' ')).'...';
            $div .= $texto;
        } else {
            $div .= $row[2];
        }
        $div .= "</p>
	</div>
</div>";
    }
    $mysqli->close();
    return $div;
}
?>