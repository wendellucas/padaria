<?php
include '../../conecta/conecta.php';
function load()
{
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    //query string loading category
    $SQL = 	"SELECT * FROM usuario";

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

            <td>{$row[1]}</td>
            <td>$row[2]</td>";
            if($row[5] == 1){
                $tb .= '<td>Ativo</td>';
            }
            else{
                $tb .= '<td>Inativo</td>';
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
