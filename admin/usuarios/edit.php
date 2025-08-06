<?php
include '../../conecta/conecta.php';
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    $id = htmlspecialchars($_GET["id"]);
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $pass = $_POST["senha"];
    $active = $_POST["ativa"];

    if(empty($nome) || empty($login))
    {
        echo "Campos vazios";
    }
    else
    {
        if (empty($pass)) {
            //query string inserting student
            $SQL = 	"UPDATE usuario SET nome = '$nome', login = '$login', ativo = '$active' WHERE ID = '$id'";

            //execute query
            $cat = $mysqli->query($SQL);

            //success or failure?
            if ($mysqli->affected_rows > 0) {
                header("Refresh: 0; url=usuario.php");
            } else {
                if( $mysqli->errno == 1062 ) {
                    //header("Refresh: 0; url=erroDuplicado.html");
                echo 'Login já existente';
                } else {
                    //header("Refresh: 0; url=erro.html");
                    echo "Erro: " . $mysqli->error;
                }
            }
        } else {
            function randomString()
            {
                $charRand = "";
                $char = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
                for ($i = 0; $i < 22; $i++) {
                    $charRand .= $char[array_rand($char)];
                }
                return $charRand;
            }
            $saltPass = randomString();
            $passToSave = hash('sha256', $pass . $saltPass);

            //query string inserting student
            $SQL = 	"UPDATE usuario SET nome = '$nome', login = '$login', senha = '$passToSave', salt = '$saltPass', ativo = '$active' WHERE ID = '$id'";

            //execute query
            $cat = $mysqli->query($SQL);

            //success or failure?
            if ($mysqli->affected_rows > 0) {
                header("Refresh: 0; url=usuario.php");
            } else {
                if( $mysqli->errno == 1062 ) {
                    //header("Refresh: 0; url=erroDuplicado.html");
                echo 'Login já existente';
                } else {
                    //header("Refresh: 0; url=erro.html");
                    echo "Erro: " . $mysqli->error;
                }
            }
        }

    
    }
?>