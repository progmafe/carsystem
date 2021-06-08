<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


<?php
error_reporting(0);
ini_set(“display_errors”, 0 );           
?>

<?php
require_once('conexao.php');
if(isset($_POST["inserir"])) 
{
	$nome=$_POST["nome"];
	$sobrenome=$_POST["sobrenome"];
	$email=$_POST["email"];
	$telefone=$_POST["telefone"];
	$celular=$_POST["celular"];
	
	$query_inserir_contato="INSERT INTO tb_contatos (id_contato,nome,sobrenome,email,tel,cel) VALUES (NULL,'$nome','$sobrenome','$email','$telefone','$celular')";
	
	$sql_inserir_contato=mysql_query($query_inserir_contato);
	
	if($sql_inserir_contato)
	echo "CONTATO CADASTRADO COM SUCESSO";
	else
	echo "FALHA AO CADASTRAR O CONTATO";	

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>
<h1>INSERIR CONTATO</h1>
<ul>
	<li><a href="contatos.php">Listar Contatos</a></li>
</ul>


<form id="form_agenda" name="form_agenda" method="post" action="">
  <p>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" />
    <br />
	<label for="sobrenome">Sobrenome:</label>
  	<input type="text" name="sobrenome" id="sobrenome" />
    <br />
    <label for="email">Email:</label>
    <input type="text" name="email" id="email" />
    <br />
    <label for="telefone">Telefone</label>
    <input type="text" name="telefone" id="telefone" />
    <label for="celular">Celular</label>
    <input type="text" name="celular" id="celular" />
    <br />
    <input type="submit" name="inserir" id="inserir" value="Inserir" />
<br/>
</p>
</form>



</body>
</html>
