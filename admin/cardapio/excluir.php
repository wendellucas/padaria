<?php
include '../login/checklogin.php';

$ua = session_checker();
if ($ua == 1) {
    include 'ByID.php';


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
                <li class='nav-item active'>
                    <a class='nav-link' href='cardapio.php'>Cardápio</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='../categorias/categorias.php'>Categorias</a>
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
        <div class='row'>
                <div class='panel'>
                <div class='form-group'>
                    <h3>Excluir item</h3>
                        <div class='form-group'>
                            <div class='form-group'>";
                                
    $doc .= deleteByID();
                                
    $doc .= "</div>
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