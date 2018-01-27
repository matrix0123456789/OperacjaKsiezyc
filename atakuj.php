<?
		$zapytanieb = "SELECT  `X`, `Y`, `nazwa` FROM `wioski` WHERE `login` = '".$login."' AND `s` = '".$swiat."'";
		$idzapytaniab = mysql_query($zapytanieb);
		while ($wierszb2 = mysql_fetch_row($idzapytaniab))
		{
			echo '<form method="POST" action="?id=atakuj2&amp;x='.$wierszb2[0].'&amp;y='.$wierszb2[1].'">Atakuj z '.$wierszb2[2].' ('.$wierszb2[0].'|'.$wierszb2[1].')<br>
			(<input name="x" id="x" VALUE="'.$_GET['ax'].'">|<input name="y" id="y" VALUE="'.$_GET['ay'].'">) <br>';
			
				$zapytaniepo = "SELECT `id2` FROM `machzb` WHERE `x`='".$wierszb2[0]."' AND `y`='".$wierszb2[1]."' AND `login`='".$login."' AND `s` = '".$swiat."' ORDER BY `id2` ASC";
				$idzapytaniapo = mysql_query($zapytaniepo);
				while ($wierszregpo = mysql_fetch_row($idzapytaniapo)) 
				{
				if($wierszregpo[0] == $id2t)
				{
				$izi++;
				}
				else
				{
				$izi++;
				$ft = "SELECT `nazwa` FROM `mach` WHERE `id`='".$id2t."' AND `login`='".$login."' AND `s` = '".$swiat."'";
				$ftg = mysql_query($ft);
				while ($ftr = mysql_fetch_row($ftg)) 
				{
				echo '<input name="ilowoj'.$id2t.'"> '.$ftr[0].' ('.$izi.')<br>';
				}
				$izi=0;
				}
				$id2t = $wierszregpo[0];
				}
				$ft = "SELECT `nazwa` FROM `mach` WHERE `id`='".$id2t."' AND `login`='".$login."' AND `s` = '".$swiat."'";
				$ftg = mysql_query($ft);
				while ($ftr = mysql_fetch_row($ftg)) 
				{
				echo '<input name="ilowoj'.$id2t.'"> '.$ftr[0].' ('.$izi.')<br>';
				}
				$izi=0;
			
			echo '<input value="Atakuj" type="submit"></form>';
		}
?>