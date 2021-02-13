<?
function velPermanente($g,$H,$pJus,$K,$f,$L,$D)
{
          $vPerm= sqrt((2*$g*($H-$pJus))/($K+($f*$L)/$D));
           
          return $vPerm;
}
    
function velPermanente2($g,$H,$pJus,$K,$f,$L,$D)
{
           $vPerm= sqrt((2*$g*($H-$pJus))/(1+$K+($f*$L)/$D));
           
          return $vPerm;
}

function presPermanente($dL,$v0,$g,$mEsp,$f,$L,$D,$H,$K)
{
        
	$p=($H-((pow($v0,2))/(2*$g)*($K+$f*$dL/$D) ))*$mEsp*$g;
    return $p;
}

/*
function imprime_reg_transiente_old($count,$pressaoNo1,$velocidadeNo1,$pressaoNo2,$velocidadeNo2,$pressaoNo3,$velocidadeNo3)
{
				
	for($j=0;$j<=$count;$j++)
	{
		echo "pressaoNo1___[".$j."] = ".$pressaoNo1[$j]."<br>";
	}
	for($j=0;$j<=$count;$j++)
	{
		echo "velocidadeNo1[".$j."] = ".$velocidadeNo1[$j]."<br>";	
	}

	for($j=0;$j<=$count;$j++)
	{
		echo "pressaoNo2___[".$j."] = ".$pressaoNo2[$j]."<br>";

	}
	for($j=0;$j<=$count;$j++)
	{
		echo "velocidadeNo2[".$j."] = ".$velocidadeNo2[$j]."<br>";
	}

	for($j=0;$j<=$count;$j++)
	{
		echo "pressaoNo3___[".$j."] = ".$pressaoNo3[$j]."<br>";

	}
	for($j=0;$j<=$count;$j++)
	{
		echo "velocidadeNo3[".$j."] = ".$velocidadeNo3[$j]."<br>";
	}

}
*/

function imprime_reg_permanente_html($nS,$velocidadeInstante0,$pressaoInstante0)
{
				
	?>
	<h1 style="color:#000099"; align="center">Regime Permanente</h1>
	<table   align="center" border="0" cellpadding="0" cellspacing="0" class="borda-1-EC">
	
	
	<tr height="30">
		<td  bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos3">&nbsp; N° &nbsp;</span></td>
		<td  bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos3">&nbsp; Velocidade &nbsp;</span></td>
		<td  bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos3">&nbsp; Press&atilde;o &nbsp;</span></td>
	</tr>

	<?
	for($j=0;$j<=$nS;$j++)
	{
				if($j%2==0)
		{
		$bgcolor = "#F4FFFF";
		}
		else	
		{
		$bgcolor = "#FFFFFF";
		}

		
		
		?>
		<tr bgcolor="<? echo $bgcolor;?>" height="24" >
			<td class="borda-1-BD"><?= $j;?></td>
			<td class="borda-1-BD"><?= $velocidadeInstante0[$j];?></td>
			<td class="borda-1-BD"><?= $pressaoInstante0[$j];?></td>
		</tr>
		<?
	}

	?>
	</table>
	<?
}


function imprime_reg_permanente($nS,$velocidadeInstante0,$pressaoInstante0)
{
				
	?>
	<h1 style="color:#000099"; align="center">Regime Permanente</h1>
	<table border="1" align="center" bgcolor="#F7F7F7">
	<tr bgcolor="#CCCCCC">
		<td>N°</td>
		<td>Velocidade</td><td>Press&atilde;o </td>
	</tr>
	<?
	for($j=0;$j<=$nS;$j++)
	{
				if($j%2==0)
		{
		$bgcolor = "#F4FFFF";
		}
		else	
		{
		$bgcolor = "#FFFFFF";
		}

		
		
		?>
		<tr bgcolor="<? echo $bgcolor;?>" height="24" >
		<td><?= $j;?></td>
		<td><?= $velocidadeInstante0[$j];?></td>
		<td><?= $pressaoInstante0[$j];?></td>
		</tr>
		<?
	}

	?>
	</table>
	<?
}

function imprime_reg_transiente_html($tauValue,$tempo,$count,$pressaoNo1,$velocidadeNo1,$pressaoNo2,$velocidadeNo2,$pressaoNo3,$velocidadeNo3)
{

	?>
	<h1 style="color:#000099"; align="center">Regime Transiente</h1>
	<table  width="800" align="center" border="0" cellpadding="0" cellspacing="0" class="borda-1-EC">
	<tr height="30">
		<td   bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos3">N°</span></td>
		<td   bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos3">Tempo</span></td>
		<td   bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos3">TAU</span></td>
		<td   bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos3">Velocidade N&oacute; 1</span></td>
		<td   bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos3">Press&atilde;o N&oacute; 1</span></td>
		<td   bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos3">Velocidade N&oacute; 2</span></td>
		<td   bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos3">Press&atilde;o N&oacute; 2</span></td>
		<td   bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos3">Velocidade N&oacute; 3</span></td>
		<td   bgcolor="#DFDFDF" class="borda-1-BD"><span class="fonte-titulos3">Press&atilde;o N&oacute; 3</span></td>
	</tr>
	
	<?
	for($j=0;$j<$count;$j++)
	{
		if($j%2==0)
		{
		$bgcolor = "#F4FFFF";
		}
		else	
		{
		$bgcolor = "#FFFFFF";
		}

		
		
		?>
		<tr bgcolor="<? echo $bgcolor;?>" height="24" >
		<td class="borda-1-BD"><?= $j;?></td>
		<td class="borda-1-BD">&nbsp;<?= number_format($tempo[$j], 4, ',', '.');?></td>
		<td class="borda-1-BD">&nbsp;<?= number_format($tauValue[$j], 4, ',', '.');?></td>
		<td class="borda-1-BD">&nbsp;<?= number_format($velocidadeNo1[$j], 4, ',', '.');?></td>
		<td class="borda-1-BD">&nbsp;<?= number_format($pressaoNo1[$j], 4, ',', '.');?></td>
		<td class="borda-1-BD">&nbsp;<?= number_format($velocidadeNo2[$j], 4, ',', '.');?></td>
		<td class="borda-1-BD">&nbsp;<?= number_format($pressaoNo2[$j], 4, ',', '.');?></td>
		<td class="borda-1-BD">&nbsp;<?= number_format($velocidadeNo3[$j], 4, ',', '.');?></td>
		<td class="borda-1-BD">&nbsp;<?= number_format($pressaoNo3[$j], 4, ',', '.');?></td>
		</tr>
		<?
	
	
	}
	?>
	</table>			
	<?
}



function imprime_reg_transiente($tauValue,$tempo,$count,$pressaoNo1,$velocidadeNo1,$pressaoNo2,$velocidadeNo2,$pressaoNo3,$velocidadeNo3)
{

	?>
	<h1 style="color:#000099"; align="center">Regime Transiente</h1>
	<table border="1" align="center" bgcolor="#F7F7F7">
	<tr bgcolor="#CCCCCC">
		<td>N°</td>
		<td>Tempo</td>
		<td>TAU</td>
		<td>Velocidade N&oacute; 1</td><td>Press&atilde;o N&oacute; 1</td>
		<td>Velocidade N&oacute; 2</td><td>Press&atilde;o N&oacute; 2</td>
		<td>Velocidade N&oacute; 3</td><td>Press&atilde;o N&oacute; 3</td>
	</tr>
	<?
	for($j=0;$j<$count;$j++)
	{
		
		if($j%2==0)
		{
		$bgcolor = "#F4FFFF";
		}
		else	
		{
		$bgcolor = "#FFFFFF";
		}

		
		
		?>
		<tr bgcolor="<? echo $bgcolor;?>" height="24" >
		<td><?= $j;?></td>	
		<td>&nbsp;<?= number_format($tempo[$j], 4, ',', '.');?></td>
		<td>&nbsp;<?= number_format($tauValue[$j], 4, ',', '.');?></td>
		<td>&nbsp;<?= number_format($velocidadeNo1[$j], 4, ',', '.');?></td>
		<td>&nbsp;<?= number_format($pressaoNo1[$j], 4, ',', '.');?></td>
		<td>&nbsp;<?= number_format($velocidadeNo2[$j], 4, ',', '.');?></td>
		<td>&nbsp;<?= number_format($pressaoNo2[$j], 4, ',', '.');?></td>
		<td>&nbsp;<?= number_format($velocidadeNo3[$j], 4, ',', '.');?></td>
		<td>&nbsp;<?= number_format($pressaoNo3[$j], 4, ',', '.');?></td>
		</tr>
		<?
	
	
	}
	?>
	</table>			
	<?
}





function CurvaFechaValvula($t,$tF,$ro)
{
    if($t<=$tF)
    {
     	return pow((1-($t/$tF)),$ro) ;
    }
    else
    {
		return 0;
	}
             
}



    
?>