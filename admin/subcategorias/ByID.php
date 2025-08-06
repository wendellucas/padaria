<?php
include '../../conecta/conecta.php';
include 'categoriaDLL.php';
function editByID()
{
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));
    $id = htmlspecialchars($_GET["id"]);
    //query string inserting student
    $SQL = 	"SELECT * FROM subcategorias WHERE id = '$id'";
    //execute query
    $cat = $mysqli->query($SQL);
    //success or failure?
    if (!$cat) {
        echo 'Could not run query: ' . $mysqli->error;
        // header("Refresh: 0; url=erro.html");
        exit;
    }
    $row = mysqli_fetch_row($cat);
    echo "<form method='POST' action='edit.php?id=$id' enctype='multipart/form-data'>
                            <div class='form-group'>
                                <label>Insira o novo nome da subcategoria</label>
                                  <input class='form-control' type='text' id='txtCat' name='txtCat' value='$row[1]' />
                                  <label>Insira a nova descrição da subcategoria</label>
                                  <input class='form-control' type='text' id='desc' name='desc' value='$row[2]' />
                                  
                                <label>Categoria</label>";
                                 categoriaDLL("$row[4]");
                                echo "<label>Imagem</label>
                                  <img src='$row[3]' class='form-control' />
                                  <br />
                                  <input id='fileToUpload' name='fileToUpload' type='file' class='form-control btn btn-success'>
                            </div>
                                <div class=''>
                                  <button class='btn btn-primary' type='submit' name='btnSubmit' id='btnSubmit' value='Salvar'>Salvar</button>
                                  <a href='subcategorias.php' class='btn btn-danger'>Cancelar</a>  
                            </div>
                          </form>";
}

function deleteByID()
{
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));
    
    $id = htmlspecialchars($_GET["id"]);
    //query string inserting student
    $SQL = 	"SELECT subcategorias.ID, subcategorias.nome, subcategorias.descricao, subcategorias.img, categorias.nome FROM subcategorias JOIN categorias ON subcategorias.categoria=categorias.id WHERE subcategorias.ID = '$id'";
    //execute query
    $cat = $mysqli->query($SQL);
    //success or failure?
    if (!$cat) {
        echo 'Could not run query: ' . $mysqli->error;
        // header("Refresh: 0; url=erro.html");
        exit;
    }
    $row = mysqli_fetch_row($cat);
    $fm = "<form method='POST' action='delete.php?id=$id&img=$row[3]'>
                            <div class='form-group'>
                                <label>Deseja excluir esta categoria?</label>
                                  <p class='form-control'>$row[1]</p>
                                  <p class='form-control'>$row[2]</p>
                                  <p class='form-control'>$row[4]</p>
                                  <img src='$row[3]' class='form-control' />

                            </div>
                                <div class=''>
                                  <button class='btn btn-primary' type='submit' name='btnSubmit' id='btnSubmit' value='Excluir'>Excluir</button>
                                  <a href='subcategorias.php' class='btn btn-danger'>Cancelar</a>  
                            </div>
                          </form>";
    return $fm;
}

function loadByID()
{
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));
    $id = htmlspecialchars($_GET["id"]);
    //query string inserting student
    $SQL = 	"SELECT subcategorias.ID, subcategorias.nome, subcategorias.descricao, subcategorias.img, categorias.nome FROM subcategorias JOIN categorias ON subcategorias.categoria=categorias.id WHERE subcategorias.ID = '$id'";
    //execute query
    $cat = $mysqli->query($SQL);
    //success or failure?
    if (!$cat) {
        echo 'Could not run query: ' . $mysqli->error;
        // header("Refresh: 0; url=erro.html");
        exit;
    }
    $row = mysqli_fetch_row($cat);
    $fm = "<div'>
                            <div class='form-group'>
                                <label>Nome</label>
                                <h4 class='form-control'>$row[1]</h4>
                                <label>Descrição</label>
                                <p class='form-control'>$row[2]</p>
                                <label>Categoria</label>
                                <p class='form-control'>$row[4]</p>
                                <label>Imagem</label>
                                <img src='$row[3]' class='form-control' />
                                
                            </div>
                                <div class=''>
                                <a href='editar.php?id=$row[0]' class='btn btn-primary'>Editar</a>
                                <a href='excluir.php?id=$row[0]' class='btn btn-danger'>Excluir</a> 
                                <a href='subcategorias.php' class='btn btn-danger'>Cancelar</a>
                            </div>
                          </div>";
    return $fm;
}
?>
