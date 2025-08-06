<?php
include '../../conecta/conecta.php';
// include 'itensDLL.php';

function editByID()
{
    // //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));
    $id = htmlspecialchars($_GET["id"]);
    //query string inserting student
    $SQL = 	"SELECT * FROM promocoes WHERE id = '$id'";
    // $SQL2 = "SELECT ID_iten FROM linkpromo WHERE ID_promo = $id ORDER BY ID_promo";
    //execute query
    $cat = $mysqli->query($SQL);
    //success or failure?
    if (!$cat) {
        echo 'Could not run query: ' . $mysqli->error;
        // header("Refresh: 0; url=erro.html");
        exit;
    } else {
        $row = mysqli_fetch_row($cat);
            echo "<form method='POST' action='edit.php?id=$id&img=$row[5]' enctype='multipart/form-data'>
                                <div class='form-group'>
                                    <label>Insira as novas informações do item</label>
                                    <br />
                                    <label>Nome</label>
                                    <input class='form-control' type='text' id='txtNome' name='txtNome' value='$row[1]' />
                                    <br />
                                    <label>Descrição</label>
                                    <textarea id='txtDesc' name='txtDesc' class='form-control'>$row[2]</textarea>
                                    <br />
                                    <label>Data Inicial</label>
                                    <input id='dataInicial' name='dataInicial' type='date' class='form-control' value='$row[3]'>
                                    <br />
                                    <label>Data Final</label>
                                    <input id='dataFinal' name='dataFinal' type='date' class='form-control' value='$row[4]'>
                                    <br />
                                    <label>Imagem</label>
                                    <img src='$row[5]' class='form-control' />
                                    <br />
                                    <label>Trocar imagem</label>
                                    <input id='fileToUpload' name='fileToUpload' type='file' class='form-control btn btn-success'>
                                    <br />
                                    <br />
                                    <label>Situação</label>
                                    <select name='ativa' id='ativa' class='form-control'>";
            if ($row[6] == 1) {
                echo "<option value='1' selected>Ativa</option>
                                        <option value='0'>Finalizada</option>
                                    </select>";
            } else {
                echo "<option value='1'>Ativa</option>
                                        <option value='0' selected>Finalizada</option>
                                    </select>";
            }
            echo "</div>
                                    <div class=''>
                                      <button class='btn btn-primary' type='submit' name='btnSubmit' id='btnSubmit' value='Salvar'>Salvar</button>
                                      <a href='promocoes.php' class='btn btn-danger'>Cancelar</a>                                
                                </div>
                              </form>";
        
        
    }
    // return $fm;
}

function deleteByID()
{
    // //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));
    $id = htmlspecialchars($_GET["id"]);
    //query string inserting student
    $SQL = 	"SELECT * FROM promocoes WHERE ID = '$id'";
    // $SQL2 = "SELECT linkpromo.ID_promo, itens.nome FROM linkpromo JOIN itens ON linkpromo.ID_iten=itens.ID WHERE linkpromo.ID_promo = $id";
    // $SQL2 = "SELECT * FROM linkpromo WHERE ID_promo = '$id'";
    //execute query
    $cat = $mysqli->query($SQL);
    
    //success or failure?
    if (!$cat) {
        echo 'Could not run query: ' . $mysqli->error;
        // header("Refresh: 0; url=erro.html");
        exit;
    } else {
        $row = mysqli_fetch_row($cat);
        $date1 = implode('/', array_reverse(explode('-', $row[3])));
        $date2 = implode('/', array_reverse(explode('-', $row[3])));
        $fm = "<form method='POST' action='delete.php?id=$id&img=$row[5]'>
                            <div class='form-group'>
                                <label>Deseja excluir este item?</label>
                                <div class='form-group'>
                                <label>Nome</label>
                                <h4 class='form-control'>$row[1]</h4>
                                <br />
                                <label>Desrição</lavel>
                                <p class='form-control'>$row[2]</p>
                                <br />
                                <label>Data Inicial</label>
                                <p class='form-control'>$date1</p>
                                <br />
                                <label>Data Final</label>
                                <p class='form-control'>$date2</p>
                                <br />
                                <label>Imagem</label>
                                <img src='$row[5]' class='form-control' />
                                <br />
                                <label>Situação</label>";
        if ($row[6] == 1) {
            $fm .= "<p class='form-control'>Ativa</p>";
        } else {
            $fm .= "<p class='form-control'>Finalizada</p>";
        }
        $fm .= "</div>
                            </div>
                                <div class=''>
                                  <button class='btn btn-primary' type='submit' name='btnSubmit' id='btnSubmit' value='Excluir'>Excluir</button>
                                  <a href='promocoes.php' class='btn btn-danger'>Cancelar</a>  
                            </div>
                          </form>";
        return $fm;
    }
}

function loadByID()
{
    // //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));
    $id = htmlspecialchars($_GET["id"]);
    //query string inserting student
    $SQL = 	"SELECT * FROM promocoes WHERE ID = '$id'";
    // $SQL2 = "SELECT linkpromo.ID_promo, itens.nome FROM linkpromo JOIN itens ON linkpromo.ID_iten=itens.ID WHERE linkpromo.ID_promo = $id";
    // $SQL2 = "SELECT * FROM linkpromo WHERE ID_promo = '$id'";
    //execute query
    $cat = $mysqli->query($SQL);
    
    //success or failure?
    if (!$cat) {
        echo 'Could not run query: ' . $mysqli->error;
        // header("Refresh: 0; url=erro.html");
        exit;
    } else {
        $row = mysqli_fetch_row($cat);
        $date1 = implode('/', array_reverse(explode('-', $row[3])));
        $date2 = implode('/', array_reverse(explode('-', $row[3])));
        $fm = "<div'>
                            <div class='form-group'>
                                <label>Nome</label>
                                <h4 class='form-control'>$row[1]</h4>
                                <br />
                                <label>Desrição</lavel>
                                <p class='form-control'>$row[2]</p>
                                <br />
                                <label>Data Inicial</label>
                                <p class='form-control'>$date1</p>
                                <br />
                                <label>Data Final</label>
                                <p class='form-control'>$date2</p>
                                <br />
                                <label>Imagem</label>
                                <img src='$row[5]' class='form-control' />
                                <br />
                                <label>Situação</label>";
        if ($row[6] == 1) {
            $fm .= "<p class='form-control'>Ativa</p>";
        } else {
            $fm .= "<p class='form-control'>Finalizada</p>";
        }
        $fm .= "</div>
                                <div class=''>
                                <a href='editar.php?id=$row[0]' class='btn btn-primary'>Editar</a>
                                <a href='excluir.php?id=$row[0]' class='btn btn-danger'>Excluir</a> 
                                <a href='promocoes.php' class='btn btn-danger'>Cancelar</a>
                            </div>
                          </div>";
        return $fm;
    }
    
}