<?php
	session_start();
	if(isset($_SESSION['usuario']) == false){
		header("Location: frmLogin.php");
	}