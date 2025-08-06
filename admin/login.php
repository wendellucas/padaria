<!DOCTYPE html>
<html lang='pt-BR'>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>Recanto Doce Admin</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto|Varela+Round'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link href='css/style.css' rel='stylesheet'>
    <!-- Bootstrap core CSS -->
    <link href='css/bootstrap.min.css' rel='stylesheet'>
</head>

<body>
    <!-- nav-bar -->
    <nav class='navbar navbar-expand-md navbar-dark bg-dark fixed-top'>
        <a class='navbar-brand' href='index.php'>Recanto Doce</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExampleDefault'
            aria-controls='navbarsExampleDefault' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>

        <div class='collapse navbar-collapse' id='navbarsExampleDefault'>
            <ul class='navbar-nav mr-auto'>
                <li class='nav-item active'>
                    <a class='nav-link' href='index.php'>Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- CORPO -->
    <main role='main' class='container'>
        <div class='table-wrapper'>
            <div class='table-title'>
                <div class='row'>
                    <div class='col-sm'>
                    <form id='login' method='POST' action='login/logar.php'>
                        <div class='col-sm-4'>
                            <div class='form-group'>
                                <label>Login</label>
                                <input id='login' name='login' type='text' class='form-control' required>
                                <label>Senha</label>
                                <input id='senha' name='senha' type="password" class="form-control" required>
                            </div>
                        </div>
                        <div class='col-sm-4'>
                            <input type='button' class='btn btn-default' data-dismiss='modal' value='Cancelar'>
                            <input type='submit' name='btnSubmit' id='btnSubmit' class='btn btn-success' value='Login'>
                        </div>
                    </form>
                </div>
                    
                </div>
            </div>
        </div>
        </div>

    </main>
</body>

<!-- Scripts -->
<script src='js/jquery-3.4.1.min.js'></script>
<script src='js/bootstrap.js'></script>
</html>