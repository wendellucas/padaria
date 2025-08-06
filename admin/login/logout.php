<?php	
	session_start();
	unset($_SESSION['recantodoceadminid']);
	unset($_SESSION['recantodoceadminlogin']);
	unset($_SESSION['recantodoceadminnome']);
	session_destroy();
	header('Location: ../index.php');	
?>