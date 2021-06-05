<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

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
<style type="text/css">
.listarbig 
	   {
		width:788px;
		height:200px;
		overflow: auto;

		}
#celula1 {
  width: 100px;
  padding:10px;
 
	}
</style>
</head>

<body>
<ul>
	<li><a href="inserir_carros.php">Cadastro de Carros</a></li>
</ul>

<font style="background-color: #668B8B;font-size: 14px  ">
&nbsp;&nbsp;&nbsp;&nbsp; 
PLACA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
MARCA &nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
COR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  
MONTADORA&nbsp;&nbsp;  
&nbsp;&nbsp;
COMBUSTÍVEL 
ANO&nbsp;
COR&nbsp;&nbsp;&nbsp;
NOME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
AÇÕES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</font>
<div class="listarbig">

<table width="770" border="1" cellspacing="0" cellpadding="0">

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
</div>
</table>



</body>
</html>
