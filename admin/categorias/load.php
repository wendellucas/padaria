<?php
include '../../conecta/conecta.php';
function load()
{
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    //query string loading category
    $SQL = 	"SELECT * FROM categorias";

    //execute query
    $cat = $mysqli->query($SQL);

    //success or failure?
    if (!$cat) {
        echo 'Could not run query: ' . $mysqli->error;
        exit;
    }
    $tb = "<tbody>";
    while ($row = mysqli_fetch_row($cat)) {
        $tb .= "<tr>

            <td><a href='view.php?id=$row[0]'>$row[1]</a></td><td>";
            if (strlen($row[2]) > 55){
                $corteTexto = substr($row[2],0,55);
                $texto= substr($corteTexto, 0, strrpos($corteTexto, ' ')).'...';
                $tb .= $texto;
            }
            else{
                $tb .= $row[2];
            }
            if ($row[3] == null) {
                $tb .= "</td><td><img src='../img/itens/cross.png' width='15px'/></td>";
            } else {
                $tb .= "</td><td><img src='../img/itens/tick.png' width='15px'/></td>";
            }
            
            $tb .= "<td>
                <a href='editar.php?id=$row[0]' class='edit'><i class='material-icons'
                        data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                <a href='excluir.php?id=$row[0]' class='delete'><i class='material-icons'
                        data-toggle='tooltip' title='Deletar'>&#xE872;</i></a>
            </td>
        </tr>";
    }
            
    $tb .= "</tbody>";
    $mysqli->close();
    return $tb;
}
