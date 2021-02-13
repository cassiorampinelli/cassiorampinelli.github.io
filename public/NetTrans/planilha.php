<? 
include("funcoes.php");

header("Content-Type: application/x-msexcel; name=\"planilha.xls\"");
header("Content-Disposition: inline; filename=\"planilha.xls\"");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

if($_GET["pl"]=="excelT")
{
	$count = $_POST["count"];
	
	$velocidadeNo1 = explode(",",$_POST["velocidadeNo1"]);
	$pressaoNo1    = explode(",",$_POST["pressaoNo1"]);
	$velocidadeNo2 = explode(",",$_POST["velocidadeNo2"]);
	$pressaoNo2    = explode(",",$_POST["pressaoNo2"]);
	$velocidadeNo3 = explode(",",$_POST["velocidadeNo3"]);
	$pressaoNo3    = explode(",",$_POST["pressaoNo3"]);
	$tempo         = explode(",",$_POST["tempo"]);				
	$tauValue	   = explode(",",$_POST["tauValue"]);
	imprime_reg_transiente($tauValue,$tempo,$count,$pressaoNo1,$velocidadeNo1,$pressaoNo2,$velocidadeNo2,$pressaoNo3,$velocidadeNo3);
}
if($_GET["pl"]=="excel")
{
	$nS = $_POST["nS"];
	
	$velocidadeInstante0= explode(",", $velocidadeInstante0);
	$pressaoInstante0 	= explode(",", $pressaoInstante0);
	imprime_reg_permanente($nS,$velocidadeInstante0,$pressaoInstante0);
}



?>


