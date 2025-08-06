<?php
include '../../conecta/conecta.php';
function editByID(){
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));
    $id = htmlspecialchars($_GET["id"]);
    //query string inserting student
    $SQL = 	"SELECT * FROM usuario WHERE id = '$id'";
    //execute query
    $cat = $mysqli->query($SQL);
    //success or failure?
    if (!$cat) {
        echo 'Could not run query: ' . $mysqli->error;
        // header("Refresh: 0; url=erro.html");
        exit;
    }
    $row = mysqli_fetch_row($cat);
    $fm = "<form method='POST' action='edit.php?id=$id'>
                            <div class='form-group'>
                                <label>Insira o novo nome do usuário</label>
                                  <input class='form-control' type='text' id='nome' name='nome' value='$row[1]' />
                                <label>Login</label>
                                <input class='form-control' type='text' id='login' name='login' value='$row[2]' />
                                <label>Senha</label>
                                <input class='form-control' type='password' id='senha' name='senha' />
                                <label>Ativo</label>
                                <select name='ativa' id='ativa' class='form-control'>";
    if ($row[5] == 1) {
        $fm .= "<option value='1' selected>Ativo</option>
                                    <option value='0'>Inativo</option>
                                </select>";
    } else {
        $fm .= "<option value='1'>Ativo</option>
                                    <option value='0' selected>Inativo</option>
                                </select>";
    }
    $fm .= "</div>
                                <div class=''>
                                  <button class='btn btn-primary' type='submit' name='btnSubmit' id='btnSubmit' value='Salvar'>Salvar</button>
                                  <a href='usuario.php' class='btn btn-danger'>Cancelar</a>  
                            </div>
                          </form>";
    return $fm;
}

function deleteByID(){
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));
    $id = htmlspecialchars($_GET["id"]);
    //query string inserting student
    $SQL = 	"SELECT * FROM usuario WHERE id = '$id'";
    //execute query
    $cat = $mysqli->query($SQL);
    //success or failure?
    if (!$cat) {
        echo 'Could not run query: ' . $mysqli->error;
        // header("Refresh: 0; url=erro.html");
        exit;
    }
    $row = mysqli_fetch_row($cat);
    $fm = "<form method='POST' action='delete.php?id=$id'>
                            <div class='form-group'>
                                <label>Deseja excluir este usuário?</label>
                                <br />
                                <label>Nome</label>
                                  <p class='form-control'>$row[1]</p>
                                  <label>Login</label>
                                  <p class='form-control'>$row[2]</p>";
    if ($row[5] == 1) {
        $fm .= "<p class='form-control'>Ativa</p><br />";
    } else {
        $fm .= "<p class='form-control'>Finalizada</p><br />";
    }
    $fm .= "</div>
                                <div class=''>
                                  <button class='btn btn-primary' type='submit' name='btnSubmit' id='btnSubmit' value='Excluir'>Excluir</button>
                                  <a href='usuario.php' class='btn btn-danger'>Cancelar</a>  
                            </div>
                          </form>";
    return $fm;
}