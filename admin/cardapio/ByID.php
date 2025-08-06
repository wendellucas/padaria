<?php
include '../../conecta/conecta.php';
include 'categoriaDLL.php';
function editByID()
{
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));
    $id = htmlspecialchars($_GET["id"]);
    //query string inserting student
    $SQL = 	"SELECT * FROM itens WHERE id = '$id'";
    //execute query
    $cat = $mysqli->query($SQL);
    //success or failure?
    if (!$cat) {
        echo 'Could not run query: ' . $mysqli->error;
        // header("Refresh: 0; url=erro.html");
        exit;
    }
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
                                <label>Preço</label>
                                <input id='txtPreco' name='txtPreco' type='text' class='form-control' value='$row[3]'>
                                <br />
                                <label>Subcategoria</label>";
                                 categoriaDLL("$row[4]");
                                echo "<br /><label>Imagem</label>
                                <img src='$row[5]' class='form-control' />
                                <br />
                                <label>Trocar imagem</label>
                                <input id='fileToUpload' name='fileToUpload' type='file' class='form-control btn btn-success'>
                            </div>
                                <div class=''>
                                  <button class='btn btn-primary' type='submit' name='btnSubmit' id='btnSubmit' value='Salvar'>Salvar</button>
                                  <a href='cardapio.php' class='btn btn-danger'>Cancelar</a>                                
                            </div>
                          </form>";
    // return $fm;
}

function deleteByID()
{
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));
    $id = htmlspecialchars($_GET["id"]);
    //query string inserting student
    $SQL = 	"SELECT itens.ID, itens.nome, itens.descricao, itens.preco, subcategorias.nome, itens.img FROM itens JOIN subcategorias ON itens.categoria=subcategorias.id WHERE itens.ID = '$id'";
    //execute query
    $cat = $mysqli->query($SQL);
    //success or failure?
    if (!$cat) {
        echo 'Could not run query: ' . $mysqli->error;
        // header("Refresh: 0; url=erro.html");
        exit;
    }
    $row = mysqli_fetch_row($cat);
    $fm = "<form method='POST' action='delete.php?id=$id&img=$row[5]'>
                            <div class='form-group'>
                                <label>Deseja excluir este item?</label>
                                <div class='form-group'>
                                <label>Nome</label>
                                <h4 class='form-control'>$row[1]</h4>
                                <label>Desrição</lavel>
                                <p class='form-control' required>$row[2]</p>
                                <label>Preço</label>
                                <p class='form-control'>$row[3]</p>
                                <label>Subcategoria</label>
                                <p class='form-control'>$row[4]</p>
                                <label>Imagem</label>
                                <img src='$row[5]' class='form-control' />
                            </div>
                            </div>
                                <div class=''>
                                  <button class='btn btn-primary' type='submit' name='btnSubmit' id='btnSubmit' value='Excluir'>Excluir</button>
                                  <a href='cardapio.php' class='btn btn-danger'>Cancelar</a>  
                            </div>
                          </form>";
    return $fm;
}

function loadByID()
{
    $mysqli = conecta() or die(mysqli_error($mysqli));
    $id = htmlspecialchars($_GET["id"]);
    //query string inserting student
    $SQL = 	"SELECT itens.ID, itens.nome, itens.descricao, itens.preco, subcategorias.nome, itens.img FROM itens JOIN subcategorias ON itens.categoria=subcategorias.id WHERE itens.ID = '$id'";
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
                                <label>Desrição</lavel>
                                <p class='form-control' required>$row[2]</p>
                                <label>Preço</label>
                                <p class='form-control'>$row[3]</p>
                                <label>Subategoria</label>
                                <p class='form-control'>$row[4]</p>
                                <label>Imagem</label>
                                <img src='$row[5]' class='form-control' />
                            </div>
                                <div class=''>
                                <a href='editar.php?id=$row[0]' class='btn btn-primary'>Editar</a>
                                <a href='excluir.php?id=$row[0]' class='btn btn-danger'>Excluir</a> 
                                <a href='cardapio.php' class='btn btn-danger'>Cancelar</a>
                            </div>
                          </div>";
    return $fm;
}