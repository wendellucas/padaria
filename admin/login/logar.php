<?php
include '../../conecta/conecta.php';
	//makes data connection
	$mysqli = conecta() or die(mysqli_error($mysqli));
	//gets input from the user -real_escape is for making the data safe 
	$loginuser 	= strtolower($mysqli->real_escape_string($_POST["login"]));
	$loginpass 	= $mysqli->real_escape_string($_POST["senha"]);
//    $remember = $_POST["remember"];

    // $refresh = true;
	//initialize the session
	session_start();
	//database script
	$userSQL = "SELECT * FROM usuario WHERE login = '$loginuser'";
		//running  database
    $result = $mysqli->query($userSQL);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        //loop in the database
        while ($row = mysqli_fetch_assoc($result)) {
            //store the id,username and password of current user
            $login = $row["login"];
            $password = $row["senha"];
            $salt = $row["salt"];
            $id = $row["ID"];
            $nome = $row["nome"];
            $passToLog = hash('sha256', $loginpass . $salt);
            //match the input with the users registered?
            if ($loginuser == $login && $passToLog == $password) {
                if ($row["ativo"] == 1) {
                    //create session for restricted pages
                    $_SESSION['recantodoceadminid'] = $id;
                    $_SESSION['recantodoceadminlogin'] = $login;
                    $_SESSION['recantodoceadminnome'] = $nome;
                    header("Refresh: 0;url=../index.php");
                } else {
                    header("Refresh: 0;url=../inativa.php");
                }
            } else {
                header("Refresh: 0;url=../senha.php");
            }
        }
    } else {
        header("Refresh: 0;url=../user.php");
    }
?>