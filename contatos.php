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
 $query_select_contatos="SELECT * FROM tb_contatos";
 $sql_select_contatos=mysql_query($query_select_contatos);
 if($sql_select_contatos == false)
	{
	echo "FALHA AO CONSULTAR A TABELA";
	exit;
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Contatos</title>
 </head>
 <body>

 <table>
 <div class="container">
		<div class="row justify-content-center">
			<div class="col">
				<div class="d-grid gap-2">
					<button class="btn btn-primary" type="button" style="background-color:maroon; border-color:maroon" onclick="window.location='inserir_contato.php'"><strong>CADASTRAR CONTATO</strong></button>							
				</div>
				<table class="table table-dark table-hover">
                <tr style= "font-weight: bold">
                <td>NOME:</td>
                <td>SOBRENOME:</td>
                <td>EMAIL:</td>
                <td>TELEFONE FIXO:</td>
                <td>CELULAR:</td>
                <td colspan="2">AÇÕES</td>
                </tr>
			
<?php  
 if(mysql_num_rows($sql_select_contatos) > 0)
 {
   while($array_select_contatos=mysql_fetch_array($sql_select_contatos))
	{
		$id_contato=$array_select_contatos["id_contato"];
		$nome=$array_select_contatos["nome"];
		$sobrenome=utf8_encode($array_select_contatos["sobrenome"]);
		$email=$array_select_contatos["email"];
		$tel=$array_select_contatos["tel"];
		$cel=$array_select_contatos["cel"];		

 echo
 " <tr>
    <td>$nome</td>
    <td>$sobrenome</td>
    <td>$email</td>
    <td>$tel</td>
    <td>$cel</td>
	<td><a href=\"editar_contato.php?id_contato=$id_contato\">Editar</a></td>
	<td><a href=\"deletar_contato.php?id_contato=$id_contato\">Deletar</a></td>
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

