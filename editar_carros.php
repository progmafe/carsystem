<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

<?php
error_reporting(0);
ini_set(“display_errors”, 0 );           
?>

<?php
require_once('conexao.php');
$totplaca=0;
$PLA=0;
 

if(isset($_GET["id_carros"])) 
{
	$id_carros=$_GET["id_carros"];
}
elseif(isset($_POST["id_carros"]))
{
	$id_carros=$_POST["id_carros"];
}	
else
echo "ERRO";


    $query_select_carros1="SELECT * FROM tb_carros";
    $sql_select_carros1=mysql_query($query_select_carros1);

	$query_select_carros_id="SELECT * FROM tb_carros WHERE id_carros=$id_carros";
	$sql_select_carros_id=mysql_query($query_select_carros_id);
  
	if($sql_select_carros_id == false)
	{
		
		echo "FALHA AO CONSULTAR CONTATO, FAVOR ENTRAR EM CONTATO COM O ADMINISTRADOR";
		exit;
	}
	
	while($array_select_carros_id=mysql_fetch_array($sql_select_carros_id))
	{
		$id_carros=$array_select_carros_id["id_carros"];
		$placa=$array_select_carros_id["placa"];
		$PLACA_V=$placa;
		$cor=$array_select_carros_id["cor"];
		$marca= $array_select_carros_id["marca"] ;
		$montadora=$array_select_carros_id['montadora'];
		$combustivel=$array_select_carros_id["combustivel"];
		$ano=$array_select_carros_id["ano"];
		$id_contatos=$array_select_carros_id["id_contatos"];		
	}
	if(isset($_POST['submit_editar']))
	{
	     $id_carros=$_POST['id_carros'];
	     $placa=$_POST['placa'];
	     $cor=$_POST['cor'];
	     $marca=strtoupper($_POST['marca']);	
         $montadora=$_POST['montadora'];		 
		 $combustivel=$_POST['combustivel'];
		 $ano=$_POST['ano'];
		 $id_contatos=$_POST['id_contato'];
		 
		 if(mysql_num_rows($sql_select_carros1) > 0)
     {
		while($array_select_carros=mysql_fetch_array($sql_select_carros1))
			{
				$placa1=$array_select_carros["placa"];
					if ($placa1==$placa)
					 $totplaca=$totplaca+1; 
			}
if($placa!=$PLACA_V)
{
	if ($totplaca>=1) 
	
	{
	   echo"<script type=\"text/javascript\">alert('PLACA JÁ CADASTRADA');</script>";    
	   $PLA=1;
		
    }  
}
		 IF ($PLA==0)
			{
		       $query_update="UPDATE tb_carros SET placa='$placa',cor='$cor',marca='$marca',montadora='$montadora',combustivel='$combustivel',ano='$ano',id_contatos='$id_contatos' WHERE id_carros=$id_carros";
		 
		        $sql_update=mysql_query($query_update);
		 if($sql_update == true)
				 {
				   echo"<script type=\"text/javascript\">alert('DADOS EDITADOS COM SUCESSO');</script>";
				 header("Location:carros.php");
		 
				 }
		 else
                 echo"<script type=\"text/javascript\">alert('FALHA AO EDITAR, ENTRE EM CONTATO COM O ADMINISTRADOR DO SITE');</script>";	 		 		 
	     }
		 
	}	 
}	 
if(isset($_POST['submit_deletar']))
	{
  $id_contato=$_GET["id_carros"];
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edição de cadastro de carros</title>

<style type="text/css">
   .txtarea {
	background-color: #FFFFFF;
    height: 30px;
    width: 250px;	
	border-radius: 10px;
	font-size:18px;
}
   .selecionar {
   background-color: #FFFFFF;
    height: 30px;
    width: 160px;	
	border-radius: 10px;
	font-size: 18px;
}
</style>

</head>
<body>
<h3 style="margin-left:500">EDITAR CARRO<br />
  <br/>
</h3>
  <a href="carros.php" style="color:#FFFFFF; margin-left:500" onclick="return confirm('Deseja listar carros?');">Mostrar Carros Cadastrados</a></li> 
 <br/><br/>
 
<form id="form_carros" name="form_carros" method="post" action="" style="margin-left:500">
  <p>
    <input type="hidden" name="id_carros"   value="<?php echo $id_carros;?>"/>
    <label for="placa">Placa</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 
    <input type="text" name="placa" id="placa" CLASS="txtarea" onblur=validaPlaca(this.value) value="<?php echo $placa;?>"/>
    <br />
	<label for="cor">Cor</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  	<input type="text" name="cor" id="cor" required="required"  pattern="[A-Z\s]+$" CLASS="txtarea" value="<?php echo $cor;?>"/>
    <br />  
    <label for="marca">Marca</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="marca" id="marca" required="required" CLASS="txtarea" value="<?php echo $marca;?>"/>
    <br /> 
	<label for="montadora">Montadora</label>&nbsp;&nbsp;&nbsp; 
    <input type="text" name="montadora" id="montadora" required="required"  pattern="[A-Z\s]+$" CLASS="txtarea" value="<?php echo $montadora;?>"/>
    <br />
	
    <label for="combustivel">Combustível</label>
	<font style="background-color: #212529; font-size: 18px  ">
	 <?php echo $combustivel;?>  </font> &nbsp;&nbsp;&nbsp;
	<select name="combustivel" id="combustivel" CLASS="selecionar">
	         <option value="Gasolina">Gasolina</option>
			 <option value="Alcool">Alcool</option>
			 <option value="Diesel">Diesel</option>
	</select>
	
      
    <br /> 
	<label for="ano">Ano</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" name="ano" id="ano" CLASS="txtarea"  value="<?php echo $ano;?>"/>
    <br />
	
    <p style="color: #00FF00; font-size: 18px"></p>
	<label for=""></p> Nome:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<font style="background-color: #212529; font-size: 18px">
	<?php
      
		$query_select_achacontato="SELECT id_contato,nome FROM tb_contatos where id_contato=$id_contatos";
		$sql_select_achacontato=mysql_query($query_select_achacontato);
		while($array_select_achacontato=mysql_fetch_array($sql_select_achacontato))
			  
			  { 
					$mostranome	=$array_select_achacontato["nome"];
					echo $mostranome;
				}
			   
	  ?>
	 
	 </font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<select name="id_contato" id="id_contato" class="selecionar">
	
<?php
        
		$query_select_contatos="SELECT id_contato,nome FROM tb_contatos";
		$sql_select_contatos=mysql_query($query_select_contatos);
		
		if(mysql_num_rows($sql_select_contatos) > 0)
			{
			   while($array_select_contatos=mysql_fetch_array($sql_select_contatos))
			  
			  { 
					$id_contato=$array_select_contatos["id_contato"];
					$nome=$array_select_contatos["nome"];
					echo '<option value="'; echo  $array_select_contatos["id_contato"]; 
					echo '">'; echo $array_select_contatos["nome"];
                    echo '</option>';
				}
			   
			}
      echo '</select> '; echo '<br>'; ?>

    <br/>
	
    <input type="submit" style="border-radius:10px" name="submit_editar" id="editar" value="Gravar"  style="background-color:#FFFFFF" onclick="return confirm('Deseja gravar carros?');"/>
    <input type="submit" style="border-radius:10px" name="submit_deletar" id="deletar" value="Deletar"  style="background-color:#FFFFFF"/>
<br/>
  </p>
</form>

<style>
body 
{
	background-color:#212529;
	color:#FFFFFF;
}
</style>

</body>
</html>
