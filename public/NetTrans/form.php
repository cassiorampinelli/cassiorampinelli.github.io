<html>
<head>
<title>NetTrans</title>
<link href="./css/estilos.css" rel="stylesheet" type="text/css"> 

<script language="javascript">

function abrir(div)
{
	document.getElementById(div).style.display='';
}
function fechar(div)
{
	document.getElementById(div).style.display='none';
}
function abre_fecha(div)
{
	if(document.getElementById(div).style.display=='')
	{
		fechar(div);
	}
	else
	{
		abrir(div);
	}
}
function decide(val)
{

	if(val=='rnf')
	{
		abre_fecha('rnf');
		fechar('rnv');
		fechar('pis');
		fechar('pfs');

	}
	if(val=='rnv')
	{
		abre_fecha('rnv');
		fechar('rnf');
		fechar('pis');
		fechar('pfs');
	}
	
	
	if(val=='pis')
	{
		abre_fecha('pis');
		fechar('pfs');
	}
	if(val=='pfs')
	{
		abre_fecha('pfs');
		fechar('pis');
	}


	if(val=='fv')
	{
		abre_fecha('fv');
		fechar('ef');

	}
	if(val=='ef')
	{
		abre_fecha('ef');
		fechar('fv');
	}


}
</script>
</head>
<body>
<table class="borda-1-EC" align="center">
	<tr>
	<td  class="borda-1-BD" ><img src="imagens/topo.jpg" /></td>
	</tr>
</table>



<table class="borda-1-EC" align="center" border="1">
<tr>
<td  class="borda-1-BD" >

<table border="1" align="center" width="100%" cellspacing="0" cellpadding="0" class="borda-1-EC">
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



<h1  align="center" style="color:#000066">Parâmetros Gerais </h1>

<form action="calculo.php" method="post">
<table class="borda-1-EC" border=1 >
<tr>
  <td  class="borda-1-BD" >Massa Específica (kg/m³)  </td>
  <td  class="borda-1-BD" > <input type="text" name="massaEspecifica" value="1000"> </td> 
  <td  class="borda-1-BD" > Pressão Atmosférica (Pa) </td>
  <td  class="borda-1-BD" ><input type="text" name="pressAtmosferica" value="100000">  </td> 
</tr>

<tr>
  <td  class="borda-1-BD" > Coeficiente de Perda Singular  </td>
  <td  class="borda-1-BD" > <input type="text" name="coefPerdaSing" value="0"> </td> 
  <td  class="borda-1-BD" > Aceleração da Gravidade (m/s²) </td>
  <td  class="borda-1-BD" ><input type="text" name="acelGravidade" value="9.81">  </td> 
</tr>
<tr>
  <td  class="borda-1-BD"  >Tempo Total de Análise (s)  </td>
  <td  class="borda-1-BD"  > <input type="text" name="tempoDeAnalise" value="0.1"> </td> 
</tr>
</table>

<br>
<h1 align="center" style="color:#000066">Parâmetros Do Conduto </h1>
<table class="borda-1-EC" border="1" >
<tr>
  <td  class="borda-1-BD" >Comprimento do Tubo(m)  </td>
  <td  class="borda-1-BD" > <input type="text" name="compTubo" value="10"> </td> 
  <td  class="borda-1-BD" > Diâmetro do Tubo (m) </td>
  <td  class="borda-1-BD" ><input type="text" name="diamTubo" value="0.05">  </td> 
</tr>
<tr>
  <td  class="borda-1-BD" > Fator de Atrito </td>
  <td  class="borda-1-BD" ><input type="text" name="fatorAtrTubo" value="0.019">  </td>
  <td  class="borda-1-BD" > Velocidade do Som (m/s)</td>
  <td  class="borda-1-BD" ><input type="text" name="velSomTubo" value="1500">  </td> 
 </tr>
<tr>
  <td  class="borda-1-BD" > Espesura da Chapa (m) </td>
  <td  class="borda-1-BD" ><input type="text" name="espChapa" value="0.002">  </td>
  <td  class="borda-1-BD" > Módulo de Elasticidade (MPa)</td>
  <td  class="borda-1-BD" ><input type="text" name="moduloElasticidade" value="205000">  </td> 
</tr>
<tr>
  <td  class="borda-1-BD" > Coeficiente de Poisson </td>
  <td  class="borda-1-BD" ><input type="text" name="coefPoisson" value="0.3">  </td>
  <td  class="borda-1-BD" > Número de sessões</td>
  <td  class="borda-1-BD" ><input type="text" name="nS" value="50">  </td> 
</tr>
<tr>
  <td  class="borda-1-BD" > Inclinação do Eixo do Conduto (°)</td>
  <td  class="borda-1-BD" ><input type="text" name="inclinacao" value="0">  </td>
  <td class="borda-1-BD" rowspan="4" colspan="2"><img src="imagens/modelo_barragem.jpg" /> </td>
</tr>
<tr>
  <td  class="borda-1-BD" > Nó de Análise 1</td>
  <td  class="borda-1-BD" ><input type="text" name="pontoDeAnalise1" value="0">  </td> 
</tr>
<tr>
  <td  class="borda-1-BD" > Nó de Análise 2</td>
  <td  class="borda-1-BD" ><input type="text" name="pontoDeAnalise2" value="25">  </td> 
</tr>
<tr>
  <td  class="borda-1-BD" > Nó de Análise 3</td>
  <td  class="borda-1-BD" ><input type="text" name="pontoDeAnalise3" value="50">  </td> 
</tr>
</table>
<br>
<!-- 
######################################################################################################################
##################################################Contorno Montante###################################################
###################################################################################################################### 
-->
<div align="center">

<h1  style="color:#000066">Contorno Montante </h1>


<select name="ccm" onChange="decide(this.value);">
  <option value=""></option>
  <option value="rnf">Reservatório de Nível Fixo</option>
  <option value="rnv">Reservatório de Nível Variável</option>
</select>

<table class="borda-1-EC" border="1" id="rnv" style="display:none">
<tr>
  <td  class="borda-1-BD" >Pressão Inicial (m.c.a)</td>
  <td  class="borda-1-BD" ><input type="text" name="hAgua3" value="10">  </td>
  <td class="borda-1-BD" rowspan="4"><img src="imagens/iconeNaVariavel.jpg" /></td>
</tr>
<tr>
  <td  class="borda-1-BD" >Amplitude de Pressao (m.c.a)</td>
  <td  class="borda-1-BD" ><input type="text" name="amplPress" value="5">  </td> 
</tr>
<tr>
  <td  class="borda-1-BD" > Frequência Angular (rad/s)</td>
  <td  class="borda-1-BD" ><input type="text" name="omega" value="235.5">  </td> 
</tr>
<tr>
  <td  class="borda-1-BD" > Velocidade em Regime Permanente (m/s)</td>
  <td  class="borda-1-BD" ><input type="text" name="velocidade_permanente" value="0.5">  </td> 
</tr>

<tr align="center">
  <td class="borda-1-BD" colspan="4"><b>P(t)=Pi + P0 sen(wt)</b></td>
</tr>

</table>
<br>


<table class="borda-1-EC" style="display:none" id="rnf">
<tr>

<td class="borda-1-BD">
<select name="cconhecidasNAFixo" onChange="decide(this.value);" >
  <option value=""></option>
  <option value="pis">Pressão no Início do Sistema e Velocidade em Regime Permanente</option>
  <option value="pfs">Pressão no Início e no Final do Sistema</option>
</select>





<br><br>
<table class="borda-1-EC" border="1" id="pis" style="display:none">
<tr>
  <td  class="borda-1-BD" >Altura da Coluna de Água no Reservatório (m)</td>
  <td  class="borda-1-BD" ><input type="text" name="hAgua1" value="10">  </td>
</tr>
<tr>
  <td  class="borda-1-BD" >Velocidade em Regime Permanente (m/s)</td>
  <td  class="borda-1-BD" ><input type="text" name="velocidade_permanente2" value="2.5">  </td> 
</tr>
<tr>
</table>



<table class="borda-1-EC" border="1" id="pfs" style="display:none">
<tr>
  <td  class="borda-1-BD" >Altura da Coluna de Água no Reservatório (m)</td>
  <td  class="borda-1-BD" ><input type="text" name="hAgua2" value="5">  </td>
</tr>
<tr>
  <td  class="borda-1-BD" >Pressão na Extremidade De Jusante (m.c.a)</td>
  <td  class="borda-1-BD" ><input type="text" name="pressao_jusante" value="2">  </td> 
</tr>
<tr>
</table>







</td>
<td class="borda-1-BD"><img src="imagens/iconeNaFixo.jpg" /></td>

</tr>
</table>



<!-- 
######################################################################################################################
##################################################Contorno Jusante###################################################
###################################################################################################################### 
-->
<h1 style="color:#000066">Contorno Jusante </h1>
<table>
<tr>
<td>
<select name="ccj" onChange="decide(this.value);" >
  <option value=""></option>
  <option value="fv">Fechamento de Válvula</option>
  <option value="ef">Extremidade Fechada</option>
</select>
</td>
<td>

	<table id="ef" style="display:none"><tr><td<img src="imagens/iconeTuboFechado.jpg" /></td></tr></table>

</td>

</tr>
</table>



<table class="borda-1-EC" border="1" id="fv" style="display:none">
<tr>
  <td  class="borda-1-BD" >Tempo de Fechamento da Válvula (s)</td>
  <td  class="borda-1-BD" ><input type="text" name="tempFechaValv" value="0.01">  </td>
  <td rowspan="2" class="borda-1-BD"><img src="imagens/iconeValvula.jpg" /></td>
</tr>
<tr>
  <td  class="borda-1-BD" >Expoente da Curva de Fechamento</td>
  <td  class="borda-1-BD" ><input type="text" name="expCurValv" value="1">  </td> 
</tr>
<tr>
</table>
</tr>


</td>
</tr>
<tr>
	<td  class="borda-1-BD"  align="center"><input class="botao1" type="submit" value="           Ok           " />
</td>
</tr>
</table>
</form>
</div>
<br><br><br><br>
</body>
</html>