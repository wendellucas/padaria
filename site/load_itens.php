<?php
include '../conecta/conecta.php';
function load_title(){
    $id = htmlspecialchars($_GET["id"]);
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    //query string loading category
    $SQL = 	"SELECT * FROM categorias WHERE ID = $id";

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
    $SQL = 	"SELECT * FROM subcategorias WHERE categoria = $id ORDER BY nome";

    //execute query
    $cat = $mysqli->query($SQL) or die($mysqli->error);
    $div ="";
    while ($row = mysqli_fetch_row($cat)) {
        $text = $row[1];
        $text = preg_replace("/[^\w\s]/", "", iconv("UTF-8", "ASCII//TRANSLIT", $text));
        $text = str_replace(" ", "", $text);
        $text = strtolower($text);
        $div .= "<div class='col-md-4 col-sm-6 portfolio-item'>
	<a class='portfolio-link' data-toggle='modal' data-target='#$text'>
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

function load_sub(){

    $id = htmlspecialchars($_GET["id"]);
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    //query string loading category
    $SQL = 	"SELECT * FROM subcategorias WHERE categoria = $id ORDER BY nome";

    //execute query
    $cat = $mysqli->query($SQL) or die($mysqli->error);
    $sub = "";
    while ($row = mysqli_fetch_row($cat)) {
        echo "<script>console.log('Debug Objects: " . $row[0] . "' );</script>";
        $text = $row[1];
        $text = preg_replace("/[^\w\s]/", "", iconv("UTF-8", "ASCII//TRANSLIT", $text));
        $text = str_replace(" ", "", $text);
        $text = strtolower($text);
        
        $sub .= "<div class='modal fade' id='$text' tabindex='-1' role='dialog' aria-labelledby='modalCenterTitle' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='modalLongTitle'>$row[1]</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>";
      $SQL2 = 	"SELECT * FROM itens WHERE categoria = $row[0] ORDER BY nome";
      $cat2 = $mysqli->query($SQL2) or die($mysqli->error);
      while ($row2 = mysqli_fetch_row($cat2)) {
          $sub .= "<p><b>$row2[1]</b> | $row2[2]</p>";
      }
        $sub .= "</div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-primary' data-dismiss='modal'>Fechar</button>
      </div>
    </div>
  </div>
</div>";
    }
$mysqli->close();
return $sub;
}
?>