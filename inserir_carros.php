<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


<?php
error_reporting(0);
ini_set(“display_errors”, 0 );           
?>

<?php
require_once('conexao.php');
$totplaca=0;
$PLA=0;

if(isset($_GET["inserir"])) 
 {
    $query_select_carros="SELECT * FROM tb_carros";
    $sql_select_carros=mysql_query($query_select_carros);
 
 
 
	$placa=strtoupper($_GET["placa"]);
	$cor=$_GET["cor"];
	$marca=strtoupper($_GET["marca"]);
	$montadora=$_GET["montadora"];
	$combustivel=$_GET["combustivel"];
	$ano=$_GET["ano"];
	$id_contato=$_GET["id_contato"];
	
		
	if(mysql_num_rows($sql_select_carros) > 0)
     {
		while($array_select_carros=mysql_fetch_array($sql_select_carros))
			{
				    $placa1=$array_select_carros["placa"];
					if ($placa1==$placa)
					 $totplaca=$totplaca+1;
			}
			
	 }	
	
	if ($totplaca>=1)
	
   {
	   echo"<script type=\"text/javascript\">alert('Atenção! Placa já cadastrada.');</script>";    
	   $PLA=1;
		
    }   
	
	 	
	 
	 
	IF ($PLA==0)
	{
	
	 $query_inserir_carros="INSERT INTO tb_carros (id_carros,placa,cor,marca,montadora,combustivel,ano,id_contatos) VALUES (NULL,'$placa','$cor','$marca','$montadora','$combustivel','$ano','$id_contato')";		
	 $sql_inserir_carros=mysql_query($query_inserir_carros); 
	 
	    if($sql_inserir_carros) 
				echo "CARRO CADASTRADO COM SUCESSO";
				else
				echo "FALHA AO CADASTRAR O CARRO";	
	}
 }

?>


<script language='JavaScript'>
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;    
	else  return false;
    }
}

function validaPlaca(placa)

{  

 placa = placa.toUpperCase(); 
 placaLen=placa.length;   
 letras="ABCDEFGHIJKLMNOPQRSTUWVXYZ";   
 numeros="1234567890"  
 for(i=0;i<=placaLen;i++)  
	 {	  
       if (i<=2)	 
		   {		
	         if(letras.indexOf(placa.charAt(i))==-1)	
				 {		
			        alert("Placa Inválida");
					document.formulario.placa.focus();	
					}	
			}	 

			else	
				{	
					if(numeros.indexOf(placa.charAt(i))==-1)	
						{			
							alert("Placa Inválida")	;
							document.formulario.placa.focus();		
						}	 
			   }  
		}
	}
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro de carros</title>
</head>

<body>
<h1>CADASTRAR CARRO</h1>
<ul>
	<li><a href="carros.php">Mostrar carros cadastrados</a></li>
</ul>


<form id="form_carro" name="form_carro" method="GET" action="">
  <p>
  
 
  
  
    <label for="placa">Placa:</label>
    <input type="text" name="placa" id="placa" onblur=validaPlaca(this.value) placeholder="Digite a placa" />
    <br />
	<label for="cor">Cor:</label>
  	<input type="text" name="cor" id="cor" placeholder="Digite a cor " pattern="[A-Z\s]+$"><br />
	 <label for="marca">Marca:</label>
    <input type="text" name="marca" id="marca"  placeholder="Digite a marca" required="required"   />
    <br />
    <label for="montadora">Montadora:</label>
    <input type="text" name="montadora" id="montadora"  placeholder="Digite a montadora" required="required"  pattern="[A-Z\s]+$" />
    <br />
    <label for="combustivel">Combustível</label>
	
	<select name="combustivel" id="combustivel">
	         <option value="Gasolina">Gasolina</option>
			 <option value="Alcool">Alcool</option>
			 <option value="Diesel">Diesel</option>
	</select>
	
	 <br />
   
    <label for="ano">Ano</label>
    <input type="text" name="ano" id="ano" onkeypress='return SomenteNumero(event)'placeholder="Digite o ano do carro"><br />
	<label for="id_contato">Código do Contato</label>
	
	
	<select name="id_contato" id="id_contato">
	
	
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

    <br />
    <input type="submit" name="inserir" id="inserir" value="Inserir" />
<br />
  </p>
</form>



</body>
</html>
