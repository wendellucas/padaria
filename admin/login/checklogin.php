<?php
//if the session doesn't exist logout
	function session_checker(){
        session_start();
        if (!isset($_SESSION['recantodoceadminid']) || !isset($_SESSION['recantodoceadminlogin'])) {
            header("Refresh: 0;url=../login.php");
            // $ua = 1;
            // return $ua;
            // echo 'primeiro if';
            
        } else {
            // echo 'segundo if';
            // $ua = 1;
            // return $ua;
            // header("Refresh: 0;url=../index.php");
            //header("Location:index.html");
            // header("Refresh: 0;url=../index.php");
            //header("Location:index.html");
            return 1;
        }
    }
?>