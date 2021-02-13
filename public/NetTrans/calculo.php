<html>
<head>
<title> NetTrans </title>
<link href="./css/estilos.css" rel="stylesheet" type="text/css"> 

<script language="javascript">
function gerarRelatorio(tipo)
{

		switch (tipo){
		case 'vel': acao="jpgraph/src/Examples/lineiconex1.php?gf=vel"; break;
		case 'pres': acao="jpgraph/src/Examples/lineiconex1.php?gf=pres"; break;
		
		case 'tauValue': acao="jpgraph/src/Examples/lineiconex1.php?gf=tauValue"; break;
	
		case 'velT_no1': acao="jpgraph/src/Examples/lineiconex1.php?gf=velT_no1"; break;
		case 'presT_no1': acao="jpgraph/src/Examples/lineiconex1.php?gf=presT_no1"; break;
		case 'tenR_no1': acao="jpgraph/src/Examples/lineiconex1.php?gf=tenR_no1"; break;
		case 'defR_no1': acao="jpgraph/src/Examples/lineiconex1.php?gf=defR_no1"; break;
		case 'tenA_no1': acao="jpgraph/src/Examples/lineiconex1.php?gf=tenA_no1"; break;
		case 'defA_no1': acao="jpgraph/src/Examples/lineiconex1.php?gf=defA_no1"; break;

		case 'velT_no2': acao="jpgraph/src/Examples/lineiconex1.php?gf=velT_no2"; break;
		case 'presT_no2': acao="jpgraph/src/Examples/lineiconex1.php?gf=presT_no2"; break;
		case 'tenR_no2': acao="jpgraph/src/Examples/lineiconex1.php?gf=tenR_no2"; break;
		case 'defR_no2': acao="jpgraph/src/Examples/lineiconex1.php?gf=defR_no2"; break;
		case 'tenA_no2': acao="jpgraph/src/Examples/lineiconex1.php?gf=tenA_no2"; break;
		case 'defA_no2': acao="jpgraph/src/Examples/lineiconex1.php?gf=defA_no2"; break;

		case 'velT_no3': acao="jpgraph/src/Examples/lineiconex1.php?gf=velT_no3"; break;
		case 'presT_no3': acao="jpgraph/src/Examples/lineiconex1.php?gf=presT_no3"; break;
		case 'tenR_no3': acao="jpgraph/src/Examples/lineiconex1.php?gf=tenR_no3"; break;
		case 'defR_no3': acao="jpgraph/src/Examples/lineiconex1.php?gf=defR_no3"; break;
		case 'tenA_no3': acao="jpgraph/src/Examples/lineiconex1.php?gf=tenA_no3"; break;
		case 'defA_no3': acao="jpgraph/src/Examples/lineiconex1.php?gf=defA_no3"; break;


		case 'excelT': acao="planilha.php?pl=excelT"; break;
		case 'excel': acao="planilha.php?pl=excel"; break;

		case 'htmlT': acao="planilha_html.php?pl=htmlT"; break;
		case 'html': acao="planilha_html.php?pl=html"; break;

	}
	document.getElementById("form1").action=acao;
	document.getElementById("form1").submit();

}
</script>

</head>
<body>
<table align="center">
	<tr>
	<td><img src="imagens/topo.jpg" /></td>
	</tr>
</table>
<?
//Inclui as funções
include("funcoes.php");

// Variáveis que representam os Parâmetros Gerais
$coefPerdaSing     = $_POST["coefPerdaSing"];         //coef. perda singular
$massaEspecifica   = $_POST["massaEspecifica"];      //massa específica do fluido
$pressAtmosferica  = $_POST["pressAtmosferica"];    //PressaoAtmosférica
$acelGravidade     = $_POST["acelGravidade"];      //Aceleração da Gravidade
$tempoDeAnalise    = $_POST["tempoDeAnalise"];       //tempo de análise do fenômeno

// Variáveis que representam os Parâmetros da Tubulação
$compTubo				= $_POST["compTubo"];       //comprimento do tubo
$fatorAtrTubo			= $_POST["fatorAtrTubo"];	//fator de atrito para perda distribuída
$velSomTubo				= $_POST["velSomTubo"]; 	//velocidade de propagação da onda (som)
$diamTubo				= $_POST["diamTubo"];      //diâmetro do tubo
$espChapa				= $_POST["espChapa"]; 	//espessura da chapa
$moduloElasticidade	    = $_POST["moduloElasticidade"]; 	//módulo de elasticidade
$coefPoisson			= $_POST["coefPoisson"]; 		// coeficiente de poisson
$inclinacao				= $_POST["inclinacao"]; 		// inclinação do eixo do conduto
$nS						= $_POST["nS"];       //número de seções do tubo
$pontoDeAnalise1		= $_POST["pontoDeAnalise1"];		// primeiro nó de análise
$pontoDeAnalise2        = $_POST["pontoDeAnalise2"]; 		//segundo nó de análise
$pontoDeAnalise3 		= $_POST["pontoDeAnalise3"];		// terceiro nó de análise

if(!empty($_POST["hAgua1"])){
$hAgua                  = $_POST["hAgua1"];
}
if(!empty($_POST["hAgua2"])){
$hAgua                  = $_POST["hAgua2"];
}
if(!empty($_POST["hAgua3"])){
$hAgua                  = $_POST["hAgua3"];
}



if(!empty($_POST["velocidade_permanente"])){
$velPermanente                  = $_POST["velocidade_permanente"];
}
if(!empty($_POST["velocidade_permanente2"])){
$velPermanente                  = $_POST["velocidade_permanente2"];
}




if($_POST["ccm"] == "rnf")
{
	$ccm = 1;
	if($_POST["cconhecidasNAFixo"] == "pis")
	{
		$cconhecidasNAFixo = 1;
		$hAgua                  = $_POST["hAgua1"];//******************ACRESCENTADO****************************
	}
	else
	{
		$cconhecidasNAFixo = 2;
		$hAgua                  = $_POST["hAgua2"];//******************ACRESCENTADO****************************
	}

}
if($_POST["ccm"] == "rnv")
{
	$ccm = 2;
	$cconhecidasNAFixo = 1;
	$hAgua                  = $_POST["hAgua3"];//******************ACRESCENTADO****************************

}

if($_POST["ccj"] == "fv")
{
	$ccj = 1;
}
if($_POST["ccj"] == "ef")
{
	$ccj = 2;
}



// 1,2,1

//$ccm = 2;
//$cconhecidasNAFixo = 1;
//$ccj = 2;


if ($ccm == 1)
{
	if ($cconhecidasNAFixo == 1)
	{
		$v0            = $velPermanente;
	}
	if ($cconhecidasNAFixo == 2)
	{
		$presJus = $_POST["pressao_jusante"];
		
		if($coefPerdaSing == 0 && $fatorAtrTubo == 0)
		{
			$v0 = velPermanente2($acelGravidade,$hAgua,$presJus,$coefPerdaSing,$fatorAtrTubo,$compTubo,$diamTubo);

		}
		else
		{
			$v0 = velPermanente($acelGravidade,$hAgua,$presJus,$coefPerdaSing,$fatorAtrTubo,$compTubo,$diamTubo);
		}		

	
	
	}

}

if ($ccm == 2)
{
	
    $v0            = $velPermanente;
	$amplPress		= $_POST["amplPress"];
    $omega			= $_POST["omega"];

}
//****************************************************************
if ($ccj == 1)
{
	$expCurValv     = $_POST["expCurValv"];  // expoente da curva de fechamento da válvula
    $tempFechaValv  = $_POST["tempFechaValv"];	 //tempo de fechamento da vávlula

}
if ($ccj == 2)
{


}
//*******************************************************************************************************************************
//**************************************************REGIME PERMANENTE************************************************************
//*******************************************************************************************************************************


$velocidadeInstante0 = array();
$pressaoInstante0	 = array();

for($j=0;$j<=$nS;$j++)
{
	$velocidadeInstante0[$j]= $v0;							// inicializa a linha 0 da matriz velocidadeInstante0
          
	$dL					    = $j*($compTubo/$nS);			//segmento do conduto em análise
           
	$pressaoInstante0[$j]   = presPermanente($dL,$v0,$acelGravidade,$massaEspecifica,$fatorAtrTubo,
										$compTubo,$diamTubo,$hAgua,$coefPerdaSing);
           


}





//*******************************************************************************************************************************
//**************************************************REGIME TRANSIENTE************************************************************
//*******************************************************************************************************************************


$dT= $compTubo / ($velSomTubo*$nS);
$teta = $dT/($compTubo/$nS); 

$C2 = 1/($massaEspecifica * $velSomTubo);
$FF = $fatorAtrTubo * $dT / (2*$diamTubo);

$p = array();
$v = array();

$pressaoNo1		= array();
$velocidadeNo1  = array();

$pressaoNo2		= array();
$velocidadeNo2  = array();

$pressaoNo3		= array();
$velocidadeNo3  = array();

$velocidadeT	= array();
$pressaoT		= array();

$tensaoRadNo1		= array();
$tensaoAxNo1		= array();

$tensaoRadNo2		= array();
$tensaoAxNo2		= array();

$tensaoRadNo3		= array();
$tensaoAxNo3		= array();

$enlongRadNo1	    =  array();
$enlongAxNo1	    =  array();

$enlongRadNo2	    =  array();
$enlongAxNo2	    =  array();

$enlongRadNo3	    =  array();
$enlongAxNo3	    =  array();

$tempo				= array();


$tauValue = array();

$count = 0;
$aux = 0;

for($j=0;$j<=$nS;$j++)
{
		$v[$j] = $velocidadeInstante0[$j];
		$p[$j] = $pressaoInstante0[$j];
}




for($t=0;$t<$tempoDeAnalise;$t=$t+$dT)
{
            
	$tempo[$count]         = $t;
	
	$pressaoNo1[$count]    = ($p[$pontoDeAnalise1])/1000;
	$velocidadeNo1[$count] = $v[$pontoDeAnalise1];
                
	$pressaoNo2[$count]    = ($p[$pontoDeAnalise2])/1000;
	$velocidadeNo2[$count] = $v[$pontoDeAnalise2];
                
	$pressaoNo3[$count]    = ($p[$pontoDeAnalise3])/1000;
	$velocidadeNo3[$count] = $v[$pontoDeAnalise3];
  
//***************************************CÁLCULO DE TENSÃO E DEFORMAÇÃO NO TUBO**************************************************
$tensaoRadNo1[$count]	= (($pressaoNo1[$count] * $diamTubo*1000)/(2*$espChapa))/1000000;        // Em MPa  ***Alterado***
$tensaoAxNo1[$count]    = (($pressaoNo1[$count] * $diamTubo*1000)/(4*$espChapa))/1000000;        // Em MPa  ***Alterado***

$tensaoRadNo2[$count]   = (($pressaoNo2[$count] * $diamTubo*1000)/(2*$espChapa))/1000000;         // Em MPa   ***Alterado***
$tensaoAxNo2[$count]    = (($pressaoNo2[$count] * $diamTubo*1000)/(4*$espChapa))/1000000;          // Em MPa   ***Alterado***

$tensaoRadNo3[$count]   = (($pressaoNo3[$count] * $diamTubo*1000)/(2*$espChapa))/1000000;           // Em MPa   ***Alterado***
$tensaoAxNo3[$count]    = (($pressaoNo3[$count] * $diamTubo*1000)/(4*$espChapa))/1000000;           // Em MPa   ***Alterado***

$enlongRadNo1[$count]	= (($pressaoNo1[$count] * pow($diamTubo,2)*1000)/(2*$moduloElasticidade*1000000*$espChapa)*(0.5-
			 			   $coefPoisson*0.25))*1000;// Em mm  ***Alterado***
$enlongAxNo1[$count]    = (($compTubo * $pressaoNo1[$count] * $diamTubo*1000)/($moduloElasticidade*1000000*$espChapa)*(0.25-
						   $coefPoisson*0.5))*1000; // Em mm  ***Alterado***

$enlongRadNo2[$count]   = (($pressaoNo2[$count] * pow($diamTubo,2)*1000)/(2*$moduloElasticidade*1000000*$espChapa)*(0.5-
 						   $coefPoisson*0.25))*1000; // Em mm  ***Alterado***
$enlongAxNo2[$count]    = (($compTubo * $pressaoNo2[$count] * $diamTubo*1000)/($moduloElasticidade*1000000*$espChapa)*(0.25-
 						   $coefPoisson*0.5))*1000; // Em mm  ***Alterado***

$enlongRadNo3[$count]	= (($pressaoNo3[$count] * pow($diamTubo,2)*1000)/(2*$moduloElasticidade*1000000*$espChapa)*(0.5-
 						   $coefPoisson*0.25))*1000; // Em mm  ***Alterado***
$enlongAxNo3[$count]	= (($compTubo * $pressaoNo3[$count] * $diamTubo*1000)/($moduloElasticidade*1000000*$espChapa)*(0.25-
 						   $coefPoisson*0.5))*1000; // Em mm  ***Alterado***

$count = $count+1;

//inicia iteraçãoo para calculo de velocidade e pressao-NÓS INTERNOS
//para cada secao do conduto-> i=secao do conduto
		for($i=1;$i<$nS;$i++)
        {
		    $vr = 0;
			$pr = 0;
			$vs = 0;
			$ps = 0;
			
			$vr = $v[$i]-$teta*$velSomTubo*($v[$i]-$v[$i-1]);
		    $pr = $p[$i]-$teta*$velSomTubo*($p[$i]-$p[$i-1]);

            $vs = $v[$i]-$teta*$velSomTubo*($v[$i]-$v[$i+1]);
		    $ps = $p[$i]-$teta*$velSomTubo*($p[$i]-$p[$i+1]);
                    
            $velocidadeT[$i]=0.5*($vr+$vs+$C2*($pr-$ps)-2*$dT*$acelGravidade*sin((3.14159/180)*$inclinacao)-$FF*($vr*abs($vr)+$vs*abs($vs)));
                   $pressaoT[$i]=0.5*($pr+$ps+(1/$C2)*($vr-$vs)-(1/$C2)*$FF*($vr*abs($vr)-$vs*abs($vs)));    
                         
         }


//inicia iteração para calculo de velocidade e pressao-NÓS EXTREMOS
//para as secoess extremas do conduto (CONTORNOS) 
            
          if($ccm==1)
          {
			  $vs=0;
           	  $ps=0;
               
           	  $pressaoT[0]=$p[0];
                
              $vs=$v[0]-$teta*$velSomTubo*($v[0]-$v[1]);
			  $ps=$p[0]-$teta*$velSomTubo*($p[0]-$p[1]);
                
              $velocidadeT[0]=$vs+$C2*($pressaoT[0]-$ps)-$dT*$acelGravidade*sin(3.14159/180*$inclinacao)
			  -$FF*$vs*abs($vs);
               
           }
            
           if($ccm==2)
		   {         
              $vs=0;
              $ps=0;
               
              $pressaoT[0]=$p[0]+$amplPress*$acelGravidade*$massaEspecifica*sin($omega*$t);
                
                
              $vs=$v[0]-$teta*$velSomTubo*($v[0]-$v[1]);
			  $ps=$p[0]-$teta*$velSomTubo*($p[0]-$p[1]);
                
              $velocidadeT[0]=$vs+$C2*($pressaoT[0]-$ps)-$dT*$acelGravidade*sin(3.14159/180*
			  $inclinacao)-$FF*$vs*abs($vs);
                
                
			}

//Válvula a Jusante-"Fechamento de válvula"
            if($ccj==1)
            {
                
                $vr=0;
                $pr=0;
                                           
                $vr=$v[$nS]-$teta*$velSomTubo*($v[$nS]-$v[$nS-1]);
                $pr=$p[$nS]-$teta*$velSomTubo*($p[$nS]-$p[$nS-1]);
                
                $tau=CurvaFechaValvula($t, $tempFechaValv,$expCurValv );
				
				if($tempFechaValv==0)
                {
                    if ($aux==0)
                    {
						$tauValue[$aux]=1;
					}
                    else
                    {
						$tauValue[$aux]=0;
					}
                }
                
                else
                {
                	$tauValue[$aux]=$tau;
                }
                
                
				$aux=$aux+1;
                
                $C5= (pow($tau,2)*pow($v0,2))/($pressaoInstante0[$nS]*$C2);
                
                $C3= $vr+$C2*$pr-$acelGravidade*$dT*sin(3.14159/180*$inclinacao)-$FF*$vr*abs($vr);
                
                
                if($C5>0)
                {
					$C=1+4*($C3/$C5);
                 	$velocidadeT[$nS]=($C5/2)*(-1+sqrt($C));
                	
                }
                else
                {
                	 $velocidadeT[$nS]=0;
                  
                }
                
                $pressaoT[$nS]=(($vr+$C2*$pr-$FF*$vr*abs($vr))-$velocidadeT[$nS])/($C2);
                
            }


			if($ccj==2)
            {
            	$vr=0;
                $pr=0;
                    
                $vr=$v[$nS]-$teta*$velSomTubo*($v[$nS]-$v[$nS-1]);
                $pr=$p[$nS]-$teta*$velSomTubo*($p[$nS]-$p[$nS-1]);
                
				$velocidadeT[$nS]=0;
                $pressaoT[$nS]=(($vr+$C2*($pr)-$FF*$vr*abs($vr)))/($C2);
                
            }
            
            
            for($i=0;$i<=$nS;$i++)
            {
                $p[$i]=$pressaoT[$i];
                $v[$i]=$velocidadeT[$i];
            	
			}





}






//imprime_reg_transiente_html($count,$pressaoNo1,$velocidadeNo1,$pressaoNo2,$velocidadeNo2,$pressaoNo3,$velocidadeNo3);   



/*
echo "<br>ok<br>";
echo "dT = ".$dT."<br>";
echo "seno =".sin((3.14159/180)*$inclinacao)."<br>";
echo "Teta = ".$teta."<br>";
echo "C2 = ".$C2."<br>";
echo "FF = ".$FF."<br>";
echo "grafico_teste = ".$tensaoRadNo2;
*/
?>
<form name="form1" id="form1" method="post" action="">





<table border="1" align="center" width="800" cellspacing="0" cellpadding="0" class="borda-1-EC">
	<tr height="30" align="center" bgcolor="#999999" class="fonte-resultado">
		<td colspan="6" bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos4">----NetTrans-Beta----</span></td>
	</tr>
	
	<tr height="30" align="center"  class="fonte-resultado">
		<td colspan="2"  class="borda-1-BD"><span class="fonte-titulos3">Universidade de Brasília-FT-Departamento de Engenharia Civil e Ambiental</span></td>
	</tr>
		<tr height="30" align="center"  class="fonte-resultado">
		<td colspan="2"  class="borda-1-BD"><span class="fonte-titulos3">Autor: Cássio Guilherme Rampinelli</span></td>
	</tr>
	<tr height="30" align="center"  class="fonte-resultado">
		<td colspan="2"  class="borda-1-BD"><span class="fonte-titulos3">Orientador: Lineu José Pedroso</span></td>
	</tr>
	<tr height="30" align="center"  class="fonte-resultado">
		<td colspan="2"  class="borda-1-BD"><span class="fonte-titulos3">Contato: cassiorampinelli@yahoo.com.br / lineu@unb.br</span></td>
	</tr>
</table>

<br>



<table align="center" width="800" height="40" border="1" cellpadding="0" cellspacing="0" class="borda-1-EC">
	<tr height="30" align="center" bgcolor="#999999" class="fonte-resultado">
		<td colspan="6" bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos4">Par&acirc;metros Auxiliares </span></td>
	</tr>
	<tr height="30" align="center"  class="fonte-resultado">
		<td colspan="2"  class="borda-1-BD"><span class="fonte-titulos3">Passo de Tempo</span></td>
		<td width="386" colspan="4"  class="borda-1-BD"><span class="fonte-titulos3"><?= $dT;?> s</span></td>
	</tr>
	<tr height="30" align="center"  class="fonte-resultado">
		<td colspan="2"  class="borda-1-BD"><span class="fonte-titulos3">N&uacute;mero de Passos de Tempo</span></td>
		<td colspan="4"  class="borda-1-BD"><span class="fonte-titulos3"><?= $tempoDeAnalise / $dT;?></span></td>
	</tr>
		<tr height="30" align="center"  class="fonte-resultado">
		<td colspan="2"  class="borda-1-BD"><span class="fonte-titulos3">Comprimento da se&ccedil;&atilde;o</span></td>
		<td colspan="4"  class="borda-1-BD"><span class="fonte-titulos3"><?= $compTubo/$nS;?> m (<?= ($compTubo/$nS)*100 ?> cm)</span></td>
	</tr>

</table>
<br>
<table align="center" width="800" height="40" border="1" cellpadding="0" cellspacing="0" class="borda-1-EC">
	<tr height="30" align="center" bgcolor="#999999" class="fonte-resultado">
		<td colspan="9" bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos4">Gr&aacute;ficos</span></td>
	</tr>
	<tr height="30" align="center" bgcolor="#999999" class="fonte-resultado">
		<td colspan="2" bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos3">Regime Permanente:</span></td>
		<td colspan="7" bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos3">Regime Transiente:</span></td>
	</tr>
	<tr>
		<td height="26" align="center" class="borda-1-BD"><b>Velocidade&nbsp;</b></td>
		<td height="26" align="center" class="borda-1-BD"><b>Press&atilde;o&nbsp;</b></td>
		<td height="26" align="center" class="borda-1-BD"><b>Velocidade</b></td>
		<td height="26" align="center" class="borda-1-BD"><b>Press&atilde;o </b></td>
		<td height="26" align="center" class="borda-1-BD"><b>Tensão&nbsp;Radial</b></td>
		<td height="26" align="center" class="borda-1-BD"><b>Deforma&ccedil;&atilde;o&nbsp;Radial</b></td>
		<td height="26" align="center" class="borda-1-BD"><b>Tensão&nbsp;Axial</b></td>
		<td height="26" align="center" class="borda-1-BD"><b>Deforma&ccedil;&atilde;o&nbsp;Axial </b></td>
		<td height="26" align="center" class="borda-1-BD"><b>TAU</b></td>

		

	</tr>
	<tr>
		<td height="26"  rowspan="3" align="center" class="borda-1-BD"><input name="vel" type="button" class="botao1" value="Vel. Perm."   onClick="gerarRelatorio('vel')"></td>
		<td height="26" rowspan="3" align="center" class="borda-1-BD"><input name="pres" type="button" class="botao1" value="Pres. Perm."    onClick="gerarRelatorio('pres')"></td>
		<td height="26" align="center" class="borda-1-BD"><input name="velT_no1" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise1;?>"  
		  onClick="gerarRelatorio('velT_no1')"></td>
		<td height="26" align="center" class="borda-1-BD"><input name="presT_no1" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise1;?>"  
		  onClick="gerarRelatorio('presT_no1')"></td>
		<td height="26" align="center" class="borda-1-BD"><input name="tenR_no1" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise1;?>"  
		  onClick="gerarRelatorio('tenR_no1')"></td>
		<td height="26" align="center" class="borda-1-BD"><input name="defR_no1" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise1;?>"  
		  onClick="gerarRelatorio('defR_no1')"></td>
		<td height="26" align="center" class="borda-1-BD"><input name="tenA_no1" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise1;?>"  
		  onClick="gerarRelatorio('tenA_no1')"></td>
		<td height="26" align="center" class="borda-1-BD"><input name="defA_no1" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise1;?>"  
		  onClick="gerarRelatorio('defA_no1')"></td>
		  
		  
		  		<td  rowspan="3" align="center" class="borda-1-BD"><input name="tauValue" type="button" class="botao1" value="TAU"  
		  onClick="gerarRelatorio('tauValue')">		  &nbsp;</td>



	</tr>
	<tr>

		<td height="26" align="center" class="borda-1-BD"><input name="velT_no2" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise2;?>"  
		  onClick="gerarRelatorio('velT_no2')">		  &nbsp;</td>
		
		<td height="26" align="center" class="borda-1-BD"><input name="presT_no2" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise2;?>"  
		  onClick="gerarRelatorio('presT_no2')">		  &nbsp;</td>
		<td height="26" align="center" class="borda-1-BD"><input name="tenR_no2" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise2;?>"  
		  onClick="gerarRelatorio('tenR_no2')">		  &nbsp;</td>
		<td height="26" align="center" class="borda-1-BD"><input name="defR_no2" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise2;?>"  
		  onClick="gerarRelatorio('defR_no2')">		  &nbsp;</td>
		<td height="26" align="center" class="borda-1-BD"><input name="tenA_no2" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise2;?>"  
		  onClick="gerarRelatorio('tenA_no2')">		  &nbsp;</td>
		<td height="26" align="center" class="borda-1-BD"><input name="defA_no2" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise2;?>"  
		  onClick="gerarRelatorio('defA_no2')">		  &nbsp;</td>
	</tr>
	<tr>

		<td height="26" align="center" class="borda-1-BD"><input name="velT_no3" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise3;?>"  
		  onClick="gerarRelatorio('velT_no3')">		  &nbsp;</td>
		
		<td height="26" align="center" class="borda-1-BD"><input name="presT_no3" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise3;?>"  
		  onClick="gerarRelatorio('presT_no3')">		  &nbsp;</td>
		<td height="26" align="center" class="borda-1-BD"><input name="tenR_no3" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise3;?>"  
		  onClick="gerarRelatorio('tenR_no3')">		  &nbsp;</td>
		<td height="26" align="center" class="borda-1-BD"><input name="defR_no3" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise3;?>"  
		  onClick="gerarRelatorio('defR_no3')">		  &nbsp;</td>
		<td height="26" align="center" class="borda-1-BD"><input name="tenA_no3" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise3;?>"  
		  onClick="gerarRelatorio('tenA_no3')">		  &nbsp;</td>
		<td height="26" align="center" class="borda-1-BD"><input name="defA_no3" type="button" class="botao1" value="N&oacute; <?= $pontoDeAnalise3;?>"  
		  onClick="gerarRelatorio('defA_no3')">		  &nbsp;</td>
	</tr>

	<tr>
	  <td height="26" colspan="2" align="center" class="borda-1-BD"><input name="html" type="button" class="botao2" value="Rel. HTML"  
		  onClick="gerarRelatorio('html')">		  &nbsp;
	    <input name="excel2" type="button" class="botao2" value="Rel. EXCEL"  
		  onClick="gerarRelatorio('excel')"></td>
	  <td colspan="7" height="26" align="center" class="borda-1-BD"><input name="htmlT" type="button" class="botao2" value="Rel. HTML(vel./pres.)"  
		  onClick="gerarRelatorio('htmlT')">		  &nbsp;
      <input name="excelT" type="button" class="botao2" value="Rel. EXCEL(vel./pres.)"  
		  onClick="gerarRelatorio('excelT')">
</table>
<br>	
<?
//Transforma um array em uma string dividida por virgulas 
$tempo			 	= implode(",", $tempo);
$tauValue           = implode(",", $tauValue);

$velocidadeInstante0= implode(",", $velocidadeInstante0);
$pressaoInstante0 	= implode(",", $pressaoInstante0);

$velocidadeNo1 		= implode(",", $velocidadeNo1);
$pressaoNo1 		= implode(",", $pressaoNo1);
$velocidadeNo2		= implode(",", $velocidadeNo2);
$pressaoNo2			= implode(",", $pressaoNo2);
$velocidadeNo3		= implode(",", $velocidadeNo3);
$pressaoNo3 		= implode(",", $pressaoNo3);

$tensaoRadNo1		= implode(",", $tensaoRadNo1);
$tensaoAxNo1		= implode(",", $tensaoAxNo1);
$tensaoRadNo2		= implode(",", $tensaoRadNo2);
$tensaoAxNo2		= implode(",", $tensaoAxNo2);
$tensaoRadNo3		= implode(",", $tensaoRadNo3);
$tensaoAxNo3		= implode(",", $tensaoAxNo3);

$enlongRadNo1	    = implode(",", $enlongRadNo1);
$enlongAxNo1	    = implode(",", $enlongAxNo1);
$enlongRadNo2	    = implode(",", $enlongRadNo2);
$enlongAxNo2	    = implode(",", $enlongAxNo2);
$enlongRadNo3	    = implode(",", $enlongRadNo3);
$enlongAxNo3	    = implode(",", $enlongAxNo3);

?>

<input type="hidden" name="tempo"         		value="<?= $tempo;				  ?>" />

<input type="hidden" name="tauValue"         	value="<?= $tauValue;		 	  ?>" />
 
<input type="hidden" name="count"         		value="<?= $count;				  ?>" />
<input type="hidden" name="nS"         			value="<?= $nS;					  ?>" />


<input type="hidden" name="velocidadeInstante0" value="<?= $velocidadeInstante0;  ?>" />
<input type="hidden" name="pressaoInstante0"    value="<?= $pressaoInstante0;	  ?>" />

<input type="hidden" name="velocidadeNo1" 		value="<?= $velocidadeNo1;		  ?>" />
<input type="hidden" name="pressaoNo1"    		value="<?= $pressaoNo1;			  ?>" />
<input type="hidden" name="velocidadeNo2"		value="<?= $velocidadeNo2;		  ?>" />
<input type="hidden" name="pressaoNo2"    		value="<?= $pressaoNo2;			  ?>" />
<input type="hidden" name="velocidadeNo3"		value="<?= $velocidadeNo3;		  ?>" />
<input type="hidden" name="pressaoNo3"   		value="<?= $pressaoNo3;			  ?>" />

<input type="hidden" name="tensaoRadNo1"  		value="<?= $tensaoRadNo1;		  ?>" />
<input type="hidden" name="tensaoAxNo1"  		value="<?= $tensaoAxNo1;		  ?>" />
<input type="hidden" name="tensaoRadNo2"  		value="<?= $tensaoRadNo2;		  ?>" />
<input type="hidden" name="tensaoAxNo2"  		value="<?= $tensaoAxNo2;		  ?>" />
<input type="hidden" name="tensaoRadNo3"  		value="<?= $tensaoRadNo3;		  ?>" />
<input type="hidden" name="tensaoAxNo3"  		value="<?= $tensaoAxNo3;		  ?>" />

<input type="hidden" name="enlongRadNo1"  		value="<?= $enlongRadNo1;		  ?>" />
<input type="hidden" name="enlongAxNo1"  		value="<?= $enlongAxNo1;		  ?>" />
<input type="hidden" name="enlongRadNo2"  		value="<?= $enlongRadNo2;		  ?>" />
<input type="hidden" name="enlongAxNo2"  		value="<?= $enlongAxNo2;		  ?>" />
<input type="hidden" name="enlongRadNo3"  		value="<?= $enlongRadNo3;		  ?>" />
<input type="hidden" name="enlongAxNo3"  		value="<?= $enlongAxNo3;		  ?>" />

<p align="center">
<input type=button name=home value=" Voltar " onClick="window.location='javascript:history.go(-1)'" class="botao1">&nbsp;
<input type=button name=home2 value="Imprimir " onClick="window.location='javascript:self.print()'" class="botao1">
</p>
</form> 

</body>
</html>
