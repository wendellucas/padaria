<?php
include '../../conecta/conecta.php';
function load()
{
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    //query string loading category
    $SQL = 	"SELECT * FROM eventos";

    //execute query
    $qry = $mysqli->query($SQL);

    //success or failure?
    if (!$qry) {
        echo 'Could not run query: ' . $mysqli->error;
        exit;
    }
    $variavel = 0;
    $tb = "<tbody>";
    while ($row = mysqli_fetch_row($qry)) {
        $date = implode('/', array_reverse(explode('-', $row[3])));
        $tb .= "<tr>

            <td><a href='view.php?id=$row[0]'>{$row[1]}</a></td>
            <td>";
            if (strlen($row[2]) > 55){
                $corteTexto = substr($row[2],0,55);
                $texto= substr($corteTexto, 0, strrpos($corteTexto, ' ')).'...';
                $tb .= $texto;
            }
            else{
                $tb .= $row[2];
            }
            $tb .= "</td>
            <td>{$date}</td>";
        if ($row[4] == null) {
            $tb .= "<td><img src='../img/itens/cross.png' width='15px'/></td>";
            $isnull = 1;
            echo "<script>console.log('$isnull' );</script>";
        } else {
            $tb .= "<td><img src='../img/itens/tick.png' width='15px'/></td>";
            $isnull = 2;
            echo "<script>console.log('$isnull' );</script>";
        }
        $tb .= "<td>
                <a href='editar.php?id=$row[0]' class='edit'><i class='material-icons'
                        data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                <a href='excluir.php?id=$row[0]' class='delete'><i class='material-icons'
                        data-toggle='tooltip' title='Deletar'>&#xE872;</i></a>
            </td>
        </tr>";
        $variavel++;
    }
            
    $tb .= "</tbody>";


    $mysqli->close();
    return $tb;
}
