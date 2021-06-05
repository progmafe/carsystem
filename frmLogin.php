<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<!DOCTYPE html="pt-br">
<?php session_start();?>
<html lang="pt-br">
<style>
body {
	background-image: url("imagem/fundo.gif");
	background-attachment: fixed ;
	background-size: 86% ;
	background-repeat: repeat ;		
		    
}
</style>
	<head>
		<meta charset="utf-8"/>
		<title>Login</title>
	</head>
	<body>	
		<form action="login.php" method="POST">
		
			<div class="container-md">
				<div class="row justify-content-center">
					<div class="col-4">
						<br />
						<div class="form-group text-center">
							<font color="white" size="5" >
								<label for="login"><b>Nome: </b></label>
									<input type="text" class="form-control" name="txtNome" id="txtNome"/>
								<label for="senha"><b>Senha:</b> </label>
									<input type="password" class="form-control" name="txtSenha" id="txtSenha" placeholder="Digite a senha: 123">
							</font>
						</div>
						
						<div class="form-group h1 text-center">
						<td><input type="submit" class="btn btn-light" value="Entrar" /></td>
						<td><input type="button" class="btn btn-light" value="Cancelar" onclick="window.location='frmlogin.php'" /></td>
						</div>
						
					</div>
				</div>
			</div>
			
		</form>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
	</body>
</html>