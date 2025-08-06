<?php
include '../../conecta/conecta.php';
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $pass = $_POST["senha"];
    $active = $_POST["ativa"];
    //are the required field empty?
    if(empty($pass))
    {
        echo 'Campos vazios';
    }
    else
    {
        function randomString(){
            $charRand = "";
            $char = array_merge(range('A','Z'),range('a','z'),range(0,9));
            for($i = 0; $i < 22; $i++){
                $charRand .= $char[array_rand($char)];
            }
            return $charRand;
        }
        $saltPass = randomString();
        $passToSave = hash('sha256',$pass . $saltPass);
        //query string inserting student
        $SQL = 	"INSERT INTO usuario (nome, login, senha, salt, ativo)
                 VALUES ('$nome', '$login', '$passToSave', '$saltPass', '$active')";
        $qry = $mysqli->query($SQL);
        //success or failure?
        if($mysqli->affected_rows > 0){
            header("Refresh: 0; url=usuario.php");
            //echo 'deu';
        }
        else
            if( $mysqli->errno == 1062 ) {
                //header("Refresh: 0; url=erroDuplicado.html");
            echo 'duplicou';
            } else {
                //header("Refresh: 0; url=erro.html");
                echo "Erro: " . $mysqli->error;
            }
        
    }
?>