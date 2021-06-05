
<?php

//CONEXAO AO SERVIDOR
$conexao=mysql_connect("localhost","root","");
if($conexao != false)
{
 //echo "CONEXAO OK";
}
else
{
 echo "FALHA AO CONECTAR";
 exit; // TERMINA O PROGRAMA
}
 
$banco_de_dados=mysql_select_db("estacionamento");


//CONEXAO AO BANDO DE DADOS
if($banco_de_dados)
{
  //echo "CONECTADO AO BANCO DE DADOS";
}
else
{
  echo "FALHA AO CONECTAR AO BANCO DE DADOS";
  exit;
}
  
?>