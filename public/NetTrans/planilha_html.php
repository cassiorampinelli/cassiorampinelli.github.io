<html>
<head>
<link href="./css/estilos.css" rel="stylesheet" type="text/css"> 

<title>Planilha_html</title>
</head>
<body>
<p align="center"> 
    <input type=button name=home value=" Voltar " onClick="window.location='javascript:history.go(-1)'" class="botao1">&nbsp;
    <input type=button name=home2 value="Imprimir " onClick="window.location='javascript:self.print()'" class="botao1">
</p>

<?
include("funcoes.php");
if($_GET["pl"]=="htmlT")
{	
	$count = $_POST["count"];
	
	$velocidadeNo1 = explode(",",$_POST["velocidadeNo1"]);
	$pressaoNo1    = explode(",",$_POST["pressaoNo1"]);
	$velocidadeNo2 = explode(",",$_POST["velocidadeNo2"]);
	$pressaoNo2    = explode(",",$_POST["pressaoNo2"]);
	$velocidadeNo3 = explode(",",$_POST["velocidadeNo3"]);
	$pressaoNo3    = explode(",",$_POST["pressaoNo3"]);
	$tempo  	   = explode(",",$_POST["tempo"]);
	$tauValue	   = explode(",",$_POST["tauValue"]);

	imprime_reg_transiente_html($tauValue,$tempo,$count,$pressaoNo1,$velocidadeNo1,$pressaoNo2,$velocidadeNo2,$pressaoNo3,$velocidadeNo3);   
}
if($_GET["pl"]=="html")
{
	$nS = $_POST["nS"];
	
	$velocidadeInstante0= explode(",", $velocidadeInstante0);
	$pressaoInstante0 	= explode(",", $pressaoInstante0);

	imprime_reg_permanente_html($nS,$velocidadeInstante0,$pressaoInstante0);
}

?>
<p align="center"> 
    <input type=button name=home value=" Voltar " onClick="window.location='javascript:history.go(-1)'" class="botao1">&nbsp;
    <input type=button name=home2 value="Imprimir " onClick="window.location='javascript:self.print()'" class="botao1">
</p> <br>


</body>
</html>
