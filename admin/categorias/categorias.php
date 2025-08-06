<?php
include '../login/checklogin.php';

$ua = session_checker();
if ($ua == 1) {
    include 'load.php';




    $doc = "<!DOCTYPE html>
<html lang='pt-BR'>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>Recanto Doce Admin</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto|Varela+Round'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link href='../css/style.css' rel='stylesheet'>
    <!-- Bootstrap core CSS -->
    <link href='../css/bootstrap.min.css' rel='stylesheet'>
</head>

<body>
    <!-- nav-bar -->
    <nav class='navbar navbar-expand-md navbar-dark bg-dark fixed-top'>
        <a class='navbar-brand' href='../index.php'>Recanto Doce</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExampleDefault'
            aria-controls='navbarsExampleDefault' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>

        <div class='collapse navbar-collapse' id='navbarsExampleDefault'>
            <ul class='navbar-nav mr-auto'>
                <li class='nav-item'>
                    <a class='nav-link' href='../index.php'>Home</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='../cardapio/cardapio.php'>Cardápio</a>
                </li>
                <li class='nav-item active'>
                    <a class='nav-link' href='categorias.php'>Categorias</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='../subcategorias/subcategorias.php'>Subcategorias</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='../promocoes/promocoes.php'>Promoções</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='../eventos/eventos.php'>Eventos</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='../usuarios/usuario.php'>Usuários</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- CORPO -->
    <main role='main' class='container'>
        <div class='table-wrapper'>
            <div class='table-title'>
                <div class='row'>
                    <div class='col-sm-5'>
                        <h2>Gerenciar Categorias</h2>
                    </div>
                    <div class='col-sm-4'>
                        <a href='#addItemModal' class='btn btn-success' data-toggle='modal'>Nova Categoria</a>
                        
                    </div>
                    <!-- <form class='form-inline my-2 my-lg-0'>
                        <input class='form-control mr-sm-2' type='text' placeholder='Buscar' aria-label='Buscar'>
                        <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Buscar</button>
                      </form> -->
                </div>
            </div>
            <table class='table'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Imagem</th>
                        <th>Opções</th>
                    </tr>
                </thead>";

    $doc .= load();


    $doc .= "</table>
        </div>
        </div>
        <!-- Add Modal HTML -->
        <div id='addItemModal' class='modal fade'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <form id='insert 'method='POST' action='insert.php' enctype='multipart/form-data'>
                        <div class='modal-header'>
                            <h4 class='modal-title'>Adicionar Categoria</h4>
                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                        </div>
                        <div class='modal-body'>
                            <div class='form-group'>
                                <label>Nome</label>
                                <input id='nome' name='nome' type='text' class='form-control' required>
                                <label>Descrição</label>
                                <input type='text' name='desc' id='desc' class='form-control'>
                                <label>Imagem</label>
                                <input id='fileToUpload' name='fileToUpload' type='file' class='form-control btn btn-success'>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <input type='button' class='btn btn-default' data-dismiss='modal' value='Cancelar'>
                            <input type='submit' name='btnSubmit' id='btnSubmit' class='btn btn-success' value='Salvar'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

    </main>
</body>

<!-- Scripts -->
<script src='../js/jquery-3.4.1.min.js'></script>
<script src='../js/bootstrap.js'></script>
</html>";

    echo $doc;
}
?>