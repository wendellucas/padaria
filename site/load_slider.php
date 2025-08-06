<?php
include '../conecta/conecta.php';
function load_slider(){
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    //query string loading category
    $SQL = 	"SELECT * FROM promocoes ORDER BY ID DESC";

    //execute query
    $cat = $mysqli->query($SQL) or die($mysqli->error);
    $div ="";
    $contador = 0;
    while ($row = mysqli_fetch_row($cat)) {
        if ($row[6] == 1) {
            $div .= "<div class='carousel-item active'>
            <img class='d-block w-100' src='../admin/categorias/$row[5]' alt='First slide'>
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
    $mysqli->close();
    return $div;
}
?>