<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark justify-content-between">
		<a class="navbar-brand"  href="home.php">Home</a>
		<ul class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link" href="sobre.php">Sobre </a>
			</li>
		</ul>

		<ul  class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link" href="carros.php">Carros</a>
			</li>
		</ul>
		<ul  class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link" href="contatos.php">Contatos</a>
			</li> 				
		</ul>			
		<ul  class="navbar-nav ">
			<li class="nav-item">
			<a class="nav-link" href="logout.php">Logout</a>
			</li>  
		</ul> 
	</nav> 
	
<?php
error_reporting(0);
ini_set(“display_errors”, 0 );           
?>

<?php
require_once('conexao.php');

$query_select_carros="SELECT tb_carros.id_carros,tb_carros.placa,tb_carros.cor,tb_carros.marca,tb_carros.montadora,tb_carros.combustivel,tb_carros.ano,tb_carros.id_contatos,tb_contatos.id_contato,tb_contatos.nome FROM tb_carros,tb_contatos where tb_contatos.id_contato=tb_carros.id_contatos";
$sql_select_carros=mysql_query($query_select_carros);

$sql_select_carros=mysql_query($query_select_carros);
if($sql_select_carros == false)
	{
	echo "FALHA AO CONSULTAR A TABELA";
	exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastrar Carros</title>
</head>
<body>
<table>
<br/>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col">
				<div class="d-grid gap-2">
					<button class="btn btn-primary" type="button" style="background-color:maroon; border-color:maroon" onclick="window.location='inserir_carros.php'"><strong>CADASTRAR CARRO</strong></button>							
				</div>
				<table class="table table-dark table-hover">
					<tr>		
						<th id="celula1">PLACA:</th>
						<th id="celula1">MODELO:</th>  
						<th id="celula1">COR:</th>
						<th id="celula1">MONTADORA:</th>						
						<th id="celula1">COMBUSTÍVEL:</th>  
						<th id="celula1">ANO:</th>  
						<th id="celula1">ID_CONTATO:</th>  
						<th id="celula1">NOME:</th>  
						<th id="celula1"colspan="2">AÇÕES</th>					 
						</tr>

						<?php  			  
						if(mysql_num_rows($sql_select_carros) > 0)
						{
						   while($array_select_carros=mysql_fetch_array($sql_select_carros))
							{
								$id_carros=$array_select_carros["id_carros"];
								$placa=$array_select_carros["placa"];
								$cor=$array_select_carros["cor"];
								$marca=$array_select_carros["marca"];
								$montadora=$array_select_carros["montadora"];
								$combustivel=$array_select_carros["combustivel"];
								$ano=$array_select_carros["ano"];
								$id_contatos=$array_select_carros["id_contatos"];										
								$nome=$array_select_carros["nome"]; 
								
						 echo
						 " <tr>
							<td>$placa</td>
							<td>$marca</td>
							<td>$cor</td>
							<td>$montadora</td>
							<td>&nbsp;&nbsp;&nbsp;";
							echo $combustivel."&nbsp;&nbsp;&nbsp;</td>"; 
							
							echo "<td>$ano</td>";
							echo "<td>&nbsp;&nbsp;&nbsp".$id_contatos."&nbsp;&nbsp;&nbsp</td>
							<td>$nome</td>
							<td><a href=\"editar_carros.php?id_carros=$id_carros\">Editar</a></td>
							<td><a href=\"deletar_carros.php?id_carros=$id_carros\">Deletar</a></td>
						  </tr>
						  ";
							}
						}

						?>

				</table>
			</div>
		</div>
	  </div>
	  <style>
body 
{
	background-color:#212529;
}
</style>
   </body>
</html>