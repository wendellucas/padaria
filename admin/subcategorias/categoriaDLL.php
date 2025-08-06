<?php
include '../../conecta/conDDL.php';
function categoriaDLL($selected)
{
    //conecta ao BD
    $mysqli = conectaDDL() or die(mysqli_error($mysqli));
    
    // SQL
    $sql = "SELECT * FROM categorias ORDER BY nome";
            
    //executa query e guarda resultados
    $result = $mysqli->query($sql);

    $catDLL = "<select name='categoria' id='categoria' class='form-control' required><option value=''>Escolha a categoria</option>";

    //loop atraves da query para criar uma dropdown
    while ($row = $result->fetch_array()) {
        $id 	= (int)$row[0];
        $nome	= $row[1];
        if ($id == $selected) {
            $catDLL .= "<option value='$id' selected>$nome</option>";
        } else {
            $catDLL .= "<option value='$id'>$nome</option>";
        }
    }

    //fecha a tag
    $catDLL .= "</select>";

    //termina conexão com o banco
    $mysqli->close();
    
    echo $catDLL;
}
