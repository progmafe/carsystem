<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


<?php
	session_start();
	unset($_SESSION['usuario']);
	if(isset($_POST['txtNome'])){
		$nome = $_POST['txtNome'];
		$senha = $_POST['txtSenha'];
		if($nome == "visitante" && $senha == "123"){
			$usuario = array('nome' => $nome,
							 'registro' => date());
			$_SESSION['usuario'] = $usuario;
			
			header("Location: home.php");
		}else{
			header("Location: frmLogin.php");
		}
	}else{
		header("Location: frmLogin.php");
	}
?>