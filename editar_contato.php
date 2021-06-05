<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


<?php
error_reporting(0);
ini_set(“display_errors”, 0 );           
?>

<?php
require_once('conexao.php');


if(isset($_GET["id_contato"])) 
{
	$id_contato=$_GET["id_contato"];
}
elseif(isset($_POST["id_contato"]))
{
	$id_contato=$_POST["id_contato"];
}	
else
echo "ERRO";



	$query_select_contato_id="SELECT * FROM tb_contatos WHERE id_contato=$id_contato";
	$sql_select_contato_id=mysql_query($query_select_contato_id);

	if($sql_select_contato_id == false)
	{
		
		echo "FALHA AO CONSULTAR CONTATO, FAVOR ENTRAR EM CONTATO COM O ADMINISTRADOR";
		exit;
	}
	
	while($array_select_contato_id=mysql_fetch_array($sql_select_contato_id))
	{
		$id_contato=$array_select_contato_id["id_contato"];
		$nome=$array_select_contato_id["nome"];
		$sobrenome=$array_select_contato_id["sobrenome"];
		$email=$array_select_contato_id["email"];
		$tel=$array_select_contato_id["tel"];
		$cel=$array_select_contato_id["cel"];	
	}
	if(isset($_POST['submit_editar']))
	{
	     $id_contato=$_POST['id_contato'];
	     $nome=$_POST['nome'];
	     $sobrenome=$_POST['sobrenome'];
	     $email=$_POST['email'];	     
		 $tel=$_POST['tel'];
		 $cel=$_POST['cel'];		 
		 
		 $query_update="UPDATE tb_contatos SET nome='$nome',sobrenome='$sobrenome',email='$email',tel='$tel',cel='$cel' WHERE id_contato=$id_contato";
		 
		 $sql_update=mysql_query($query_update);
		 if($sql_update == true)
		 {
		   echo"<script type=\"text/javascript\">alert('DADOS EDITADOS COM SUCESSO');</script>";
		   header("Location:contatos.php");
 
		 }
		 else
         echo"<script type=\"text/javascript\">alert('FALHA AO EDITAR, ENTRE EM CONTATO COM O ADMINISTRADOR DO SITE');</script>";	 		 		 
	}
if(isset($_POST['submit_deletar']))
	{
	
  
	
  $id_contato=$_GET["id_contato"];

  //$query="DELETE FROM tb_contatos WHERE id_contato={$_GET['id_contato']}";

  $query="DELETE FROM tb_contatos WHERE id_contato=$id_contato";
  $sql=mysql_query($query);
  
  if($sql)
  {
	   header("Location:contatos.php");
  }
  else
  {
	echo"<script type=\"text/javascript\">alert('FALHA AO DELETAR, ENTRE EM CONTATO COM O ADMINISTRADOR DO SITE');</script>";    
	exit;
  }
}

	    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edição de Contatos</title>
</head>

<body>
<h1>INSERIR CONTATO<br />
  <br />
</h1>
<ul>
	<li><a href="contatos.php">Listar contatos</a></li>
</ul>


<form id="form_agenda" name="form_agenda" method="post" action="">
  <p>
    <input type="hidden" name="id_contato" value="<?php echo $id_contato;?>"/>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?php echo $nome;?>"/>
    <br />
	<label for="sobrenome">Sobrenome:</label>
  	<input type="text" name="sobrenome" id="sobrenome" value="<?php echo $sobrenome;?>"/>
    <br />
    <label for="email">Email:</label>
    <input type="text" name="email" id="email" value="<?php echo $email;?>"/>
    <br />
    <label for="telefone">Telefone</label>
    <input type="text" name="tel" id="telefone" value="<?php echo $tel;?>" />
    <label for="celular">Celular</label>
    <input type="text" name="cel" id="celular" value="<?php echo $cel;?>"/>
    <br />
    <input type="submit" name="submit_editar" id="editar" value="Gravar" />
     <input type="submit" name="submit_deletar" id="deletar" value="Deletar" />
<br />
  </p>
</form>



</body>
</html>
