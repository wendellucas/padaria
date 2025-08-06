<?php

include '../conecta/conecta.php';
function load()
{
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    //query string loading category
    $SQL = 	"SELECT * FROM categorias ORDER BY nome";

    //execute query
    $cat = $mysqli->query($SQL) or die($mysqli->error);
    $div ="";
    while ($row = mysqli_fetch_row($cat)) {
        $div .= "<div class='col-md-4 col-sm-6 portfolio-item'>
	<a class='portfolio-link' href='itens.php?id=$row[0]'>
	    <div class='portfolio-hover'>
		    <div class='portfolio-hover-content'>
			    <i class='fas fa-plus fa-3x'></i>
		    </div>
	    </div>
	    <img class='img-fluid' src='../admin/categorias/$row[3]' alt=''>
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

function load_promo()
{
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    //query string loading category
    $SQL = 	"SELECT * FROM promocoes ORDER BY ID DESC";

    //execute query
    $cat = $mysqli->query($SQL) or die($mysqli->error);
    $div ="";
    $contador = 0;
    while ($row = mysqli_fetch_row($cat)) {
        if ($contador < 3) {
            if ($row[6] == 1) {
                $div .= "<div class='col-md-4 col-sm-6 promocoes-item'>
	<a class='promocoes-link' href='item_promo.php?id=$row[0]'>
	    <div class='promocoes-hover'>
		    <div class='promocoes-hover-content'>
			    <i class='fas fa-plus fa-3x'></i>
		    </div>
	    </div>
	    <img class='img-fluid' src='../admin/categorias/$row[5]' alt=''>
	</a>
	<div class='promocoes-caption'>
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
                $contador++;
            }
            
        }
    }
    $mysqli->close();
    return $div;
}

function load_slider_indicator(){
    $div ="<li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
    <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
    <li data-target='#carouselExampleIndicators' data-slide-to='2'></li>";
}

function load_slider(){
    $div ="";

    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    //query string loading category
    $SQL = 	"SELECT * FROM promocoes WHERE active = 1 ORDER BY ID DESC";

    //execute query
    $cat = $mysqli->query($SQL) or die($mysqli->error);

    // contar linhas 
    $row_cnt = $cat->num_rows;

    if ($row_cnt > 0) {
        $div .= "<div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
        <ol class='carousel-indicators'>";

        for ($i = 0; $i < $row_cnt; $i++) {
            if ($i == 0) {
                $div .= "<li data-target='#carouselExampleIndicators' data-slide-to='$i' class='active'></li>";
            } else {
                $div .= "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
            }
        }
    
        $div .= "</ol><div class='carousel-inner'>";

    
        $contador = 0;
        while ($row = mysqli_fetch_row($cat)) {
            if ($contador == 0) {
                if ($row[6] == 1) {
                    $div .= "<div class='carousel-item active'>
                <a class='promocoes-link' href='item_promo.php?id=$row[0]'><img class='d-block w-100' src='../admin/categorias/$row[5]' alt='First slide'></a>
            <div class='carousel-caption d-none d-md-block'>
                <h5>$row[1]</h5>
                <p>";
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
                    $contador = 1;
                }
            } else {
                if ($row[6] == 1) {
                    $div .= "<div class='carousel-item'>
                <a class='promocoes-link' href='item_promo.php?id=$row[0]'><img class='d-block w-100' src='../admin/categorias/$row[5]' alt=''><a/>
            <div class='carousel-caption d-none d-md-block'>
                <h5>$row[1]</h5>
                <p>";
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
            }
        }
        $div .= "</div>
    <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='sr-only'>Previous</span>
    </a>
    <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='sr-only'>Next</span>
    </a>
</div>";
    }
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
        if ($contador < 3) {
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
    $contador++;
        }
    }
    $mysqli->close();
    return $div;
}

?>