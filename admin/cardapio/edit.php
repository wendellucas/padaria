<?php
include '../../conecta/conecta.php';
    //connect to mysql db
    $mysqli = conecta() or die(mysqli_error($mysqli));

    $id = htmlspecialchars($_GET["id"]);
    $img = htmlspecialchars($_GET["img"]);
    $nome = $_POST["txtNome"];
    $desc = $_POST["txtDesc"];
    $preco = $_POST["txtPreco"];
    $cat = $_POST["categoria"];

    if ($_FILES["fileToUpload"]['size'] <= 0 ){
        //query string inserting student
        $SQL = 	"UPDATE itens SET nome = '$nome', descricao = '$desc', preco = '$preco', categoria = '$cat' WHERE id = '$id'";

        //execute query
        $qry = $mysqli->query($SQL);

        //success or failure?
        if ($mysqli->affected_rows > 0) {
            header("Refresh: 0; url=cardapio.php");
        } else {
            $bug = $mysqli->error;
            echo 'Errormessage: ', $bug;
        }
    }
    else{
        if (empty($nome)) {
            echo "Campos vazios";
        } else {
            unlink($img);
            date_default_timezone_set('America/Sao_Paulo');
            $imgNewName = date('dmYHis');
            $extensao = $_FILES["fileToUpload"]["type"];
            $target_dir = "../img/cardapio/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $newFile = $target_dir . $imgNewName . '.' . $imageFileType;
            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo "Arquivo é uma imagem - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "Arquivo não é uma imagem.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Imagem já existe, troque o nome.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 5000000) {
                echo "Arquivo muito grnade.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
                echo "São suportados apenas imgens no formato JPG, JPEG, PNG e GIF.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sua imagem não foi carregada.";
                echo $file;
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newFile)) {
                    // echo "A imagem ". basename($_FILES["fileToUpload"]["name"]). " foi carregada em $newFile.";

                    //query string inserting student
                    $SQL = 	"UPDATE itens SET nome = '$nome', descricao = '$desc', preco = '$preco', categoria = '$cat', img ='$newFile' WHERE id = '$id'";

                    //execute query
                    $qry = $mysqli->query($SQL);

                    //success or failure?
                    if ($mysqli->affected_rows > 0) {
                        header("Refresh: 0; url=cardapio.php");
                    } else {
                        $bug = $mysqli->error;
                        echo 'Errormessage: ', $bug;
                    }
                } else {
                    echo "Erro carregando a imgem.";
                }
            }
        }
    }