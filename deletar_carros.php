<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<?php
error_reporting(0);
ini_set(“display_errors”, 0 );           
?>

<?php
require_once('conexao.php');
if(isset($_GET["id_carros"]))
{
	
  
	
  $id_carros=$_GET["id_carros"];
  //$query="DELETE FROM tb_carros WHERE id_carros={$_GET['id_carros']}";
  $query="DELETE FROM tb_carros WHERE id_carros=$id_carros";
  $sql=mysql_query($query);
  
  if($sql)
  {
	  header("Location:carros.php");
  }
  else
  {
	echo"<script type=\"text/javascript\">alert('FALHA AO DELETAR, ENTRE EM CONTATO COM O ADMINISTRADOR DO SITE');</script>";    
	exit;
  }
}



?>