<?php
include '../../conecta/conecta.php';
// include 'itensDLL.php';

function editByID()
{
    // //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));
    $id = htmlspecialchars($_GET["id"]);
    //query string inserting student
    $SQL = 	"SELECT * FROM eventos WHERE id = '$id'";
    //execute query
    $cat = $mysqli->query($SQL);
    //success or failure?
    if (!$cat) {
        echo 'Could not run query: ' . $mysqli->error;
        // header("Refresh: 0; url=erro.html");
        exit;
    } else {
        // SQL
        $sqledit = "SELECT * FROM itens ORDER BY nome";
                
        //executa query e guarda resultados
        $result = $mysqli->query($sqledit);
        //success or failure?
        if (!$result) {
            echo 'Could not run query: ' . $mysqli->error;
            // header("Refresh: 0; url=erro.html");
            exit;
        } else {
            $row = mysqli_fetch_row($cat);
            echo "<form method='POST' action='edit.php?id=$id&img=$row[4]' enctype='multipart/form-data'>
                                <div class='form-group'>
                                    <label>Insira as novas informações do evento</label>
                                    <br />
                                    <label>Nome</label>
                                    <input class='form-control' type='text' id='txtNome' name='txtNome' value='$row[1]' />
                                    <br />
                                    <label>Preço</label>
                                    <textarea id='txtDesc' name='txtDesc' class='form-control'>$row[2]</textarea>
                                    <br />
                                    <label>Data</label>
                                    <input id='data' name='data' type='date' class='form-control' value='$row[3]'>
                                    <br />
                                    <label>Imagem</label>
                                    <img src='$row[4]' class='form-control' />
                                    <br />
                                    <label>Trocar imagem</label>
                                    <input id='fileToUpload' name='fileToUpload' type='file' class='form-control btn btn-success'>
                                    </div>
                                    <div class=''>
                                      <button class='btn btn-primary' type='submit' name='btnSubmit' id='btnSubmit' value='Salvar'>Salvar</button>
                                      <a href='eventos.php' class='btn btn-danger'>Cancelar</a>                                
                                </div>
                              </form>";
        }
        
    }
}

function deleteByID()
{
    // //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));
    $id = htmlspecialchars($_GET["id"]);
    //query string inserting student
    $SQL = 	"SELECT * FROM eventos WHERE ID = '$id'";


    //execute query
    $cat = $mysqli->query($SQL);
    
    //success or failure?
    if (!$cat) {
        echo 'Could not run query: ' . $mysqli->error;
        // header("Refresh: 0; url=erro.html");
        exit;
    } else {

        //success or failure?
        
        $row = mysqli_fetch_row($cat);
        $date = implode('/', array_reverse(explode('-', $row[3])));
        $fm = "<form method='POST' action='delete.php?id=$id&img=$row[4]'>
                            <div class='form-group'>
                                <label>Deseja excluir este item?</label>
                                <div class='form-group'>
                                <label>Nome</label>
                                <h4 class='form-control'>$row[1]</h4>
                                <br />
                                <label>Desrição</lavel>
                                <p class='form-control'>$row[2]</p>
                                <br />
                                <label>Data</label>
                                <p class='form-control'>$date</p>
                                <br />
                                <label>Imagem</label>
                                <img src='$row[4]' class='form-control' />
                                </div>
                            </div>
                                <div class=''>
                                  <button class='btn btn-primary' type='submit' name='btnSubmit' id='btnSubmit' value='Excluir'>Excluir</button>
                                  <a href='eventos.php' class='btn btn-danger'>Cancelar</a>  
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
    $SQL = 	"SELECT * FROM eventos WHERE ID = '$id'";
    //execute query
    $cat = $mysqli->query($SQL);
    
    //success or failure?
    if (!$cat) {
        echo 'Could not run query: ' . $mysqli->error;
        // header("Refresh: 0; url=erro.html");
        exit;
    } else {
                //success or failure?
        $row = mysqli_fetch_row($cat);
        $date = implode('/', array_reverse(explode('-', $row[3])));
        $fm = "<div'>
                            <div class='form-group'>
                                <label>Nome</label>
                                <h4 class='form-control'>$row[1]</h4>
                                <br />
                                <label>Desrição</lavel>
                                <p class='form-control'>$row[2]</p>
                                <br />
                                <label>Data</label>
                                <p class='form-control'>$date</p>
                                <br />
                                <label>Imagem</label>
                                <img src='$row[4]' class='form-control' />
                                </div>
                                <div class=''>
                                <a href='editar.php?id=$row[0]' class='btn btn-primary'>Editar</a>
                                <a href='excluir.php?id=$row[0]' class='btn btn-danger'>Excluir</a> 
                                <a href='eventos.php' class='btn btn-danger'>Cancelar</a>
                            </div>
                          </div>";
        return $fm;
    }
    
}