<?
// echo $bsb;

if ($logp == 'ok')
{
	if($lang == 'pl')
	echo 'Zalogowany jako:'.$login.' <a href="?id=logout">Wyloguj</a> ';
	else
	echo 'Login at:'.$login.' <a href="?id=logout">logout</a> ';
		$a = '';
		$p = '';
		$z = '';
		echo '<span id="gpasid">';
		$zaz = "SELECT  `e-mail`, `gg`, `kd` FROM `user` WHERE `login` = '".$login."'";
		//echo $zaz;
		$zaza = mysql_query($zaz);
		while ($zazaza  = mysql_fetch_row($zaza))
		{
			$uac = "SELECT  `X`, `Y`, `fabrbud`, `kd`, `ele`, `kopalnia` FROM `wioski` WHERE `login` = '".$login."' AND `s` = '".$swiat."'";
			$uacc = mysql_query($uac);
			while ($wierszb2 = mysql_fetch_row($uacc))
			{
				$a = $a.'('.$wierszb2[0].'|'.$wierszb2[1].')<br>';
				$pw = 0;
				$i = 0;
				while ($i <= $wierszb2[2])
				{	
					$i++;
					$pw = $pw + $i;
				}
				$i = 0;
				while ($i <= $wierszb2[3])
				{	
					$i++;
					$pw = $pw + $i;
				}
				$i = 0;
				while ($i <= $wierszb2[4])
				{	
					$i++;
					$pw = $pw + $i;
				}
				$i = 0;
				while ($i <= $wierszb2[5])
				{	
					$i++;
					$pw = $pw + $i;
				}
				//echo '1';
			$p = $pw + $p;
			$a = $a.$pw;
			$sasa = "UPDATE `wioski` SET `p` = '".$pw."' WHERE `x`='".$wierszb2[0]."' AND `y`='".$wierszb2[1]."' AND `login`='".$login."' AND `s` = '".$swiat."'";
			//echo $zapytanie;
			$idzapytaniac = mysql_query($sasa);
			}
		}
		$zapytanied = "UPDATE `users` SET `p` = '".$p."' WHERE `login`='".$login."' AND `s` = '".$swiat."'";
		$idzapytaniad = mysql_query($zapytanied);
		echo $p.'p';
	if ($_GET['x'] != '')
	{
	//echo '2';
		$zapytanie9 = "SELECT `zelazo`, `caz`, `kopalnia`, `kopalniaroz`, `typ`, `bud`, `budr`, `pol`, `caj`, `mag`, `jedzenie` FROM `wioski` WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `s` = '".$swiat."' AND `login`='".$login."'";
		$idzapytania9 = mysql_query($zapytanie9);
		while ($wierszreguu = mysql_fetch_row($idzapytania9)) 
		{
		//echo '3';
			if ($_GET['id'] != 'lot')
			{
				$caz = $wierszreguu[1];
				$zelazo = $wierszreguu[0];
				$kopalnia = $wierszreguu[2];
				$caj = $wierszreguu[8];
				$pole = $wierszreguu[7];
				$magazyn = $wierszreguu[9];
				$jedzenie = $wierszreguu[10];
				if ($caz == '0')
				{
					$zapytanie = "UPDATE `wioski` SET `caz` = '".time()."', `zelazo` = '0' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
					$idzapytania = mysql_query($zapytanie);
				}
				else
				{
				//echo '2b';
					if ($wierszregi[3] == '')
					{
					//echo '3';
						$z = 1;
						$godz = 30;
						while ($z < $kopalnia)
						{
							$z++;
							$godz = $godz * 1.3;
						}
						$sek = $godz / 3600;
						$zelazo1 = time() - $caz;
						$zelazo2 = $zelazo1 * $sek;
						$ile = $zelazo2 + $zelazo;
						$i = 0;
						$zelazo = $ile;
						$zilu = 1000;
						while($i < $magazyn)
						{
							$i++;
							$zilu = 1000 * $magazyn + $zilu;
						}
						if ($ile > $zilu)
						{
							$ile = $zilu;
						}
						$procent = $ile / $zilu;
						$procent = $procent * 100;
						$odprocent = 100 - $procent;
						$waw = "UPDATE `wioski` SET `caz` = '".time()."', `zelazo` = '".$ile."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
						
						$wawa = mysql_query($waw);
						if($lang == 'pl')
						echo 'Żelazo:  ';
						else
						echo 'Iron: ';
						if($gpastyp == 'img')
						echo '<img src="l1.png" height="10" width="'.$procent.'px" alt="'. ceil($ile) .'/" title="'. ceil($ile) .'/'. ceil($zilu) .' t ('. ceil($procent) .'%)"/><img src="l2.png" height="10" width="'.$odprocent.'px" alt="'. ceil($zilu) .'t" title="'.ceil($ile).'/'.ceil($zilu).' t ('.ceil($procent).'%)"/>';
						else
						echo '<span title="'.ceil($ile).'/'.ceil($zilu).' t ('.ceil($procent).'%)">'. ceil($ile) .'/'. ceil($zilu) .'t</span>';
						$z = 1;
						$godz = 30;
						while ($z < $pole)
						{
							$z++;
							$godz = $godz * 1.3;
						}
						while ($z < $las)
						{
							$z++;
							$godz = $godz * 1.3;
						}
						$sek = $godz / 3600;
						$jedzenie1 = time() - $caj;
						$jedzenie2 = $jedzenie1 * $sek;
						$ile = $jedzenie2 + $jedzenie;
						$i = 0;
						$jedzenie = $ile;
						$zilu = 1000;
						while($i < $magazyn)
						{
							$i++;
							$zilu = 1000 * $magazyn + $zilu;
						}
						if ($ile > $zilu)
						{
							$ile = $zilu;
						}
						$procent = $ile / $zilu;
						$procent = $procent * 100;
						$odprocent = 100 - $procent;
						$waw = "UPDATE `wioski` SET `caj` = '".time()."', `jedzenie` = '".$ile."' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
						
						$wawa = mysql_query($waw);
						
						if($lang == 'pl')
						echo ' Żywność: ';
						else
						echo ' Food:';
						if($gpastyp == 'img')
						echo '<img src="l1.png" height="10" width="'.$procent.'px" alt="'.ceil($ile).'/" title="'.ceil($ile).'/'.ceil($zilu).' t ('.ceil($procent).'%)"><img src="l2.png" height="10" width="'.$odprocent.'px" alt="'.ceil($zilu).'" title="'.ceil($ile).'/'.ceil($zilu).' t ('.ceil($procent).'%)">';
						else
						echo '<span title="'.ceil($ile).'/'.ceil($zilu).' t ('.ceil($procent).'%)">'.ceil($ile).'/'.ceil($zilu).'t';
						echo '</span> prąd:';
							$aa = "SELECT `bud`, `buduz`, `fabrbud`, `budrc`, `budr`, `ele`, `kopalnia` FROM `wioski` WHERE `login` = '".$login."' AND `x` = '".$_GET['x']."' AND `y` = '".$_GET['y']."' AND `s` = '".$swiat."'";
							$ab = mysql_query($aa);
							while ($ac = mysql_fetch_row($ab))
							{
								$fabryka = $ac[2];
								$kopalnia = $ac[6];
								
								$ele1a = $ac[1] * 500;
								if ($ele1a < 1000)
								{ $ele1b = $ele1a.'kW'; }
								else if  ($ele1a < 1000000)
								{ $ele1b = ($ele1a / 1000) .'MW'; }
								else 
								{ $ele1b = ($ele1a / 1000000) .'GW'; }
								$z = $z.'<h2>Elektrownia</h2>
								Elektrownia dostarcza ci prądu.<br><br>
								Budowniczy  ('.$ac[1].'/'.$ac[0].') '.$ele1b.'<br>';
								
								$ele2a = 60;
								$y = 1;
								while ($y < $fabryka)
								{
									$y++;
									$ele2a = $ele2a * 1.5;
								}
								if ($ele2a < 1000)
								{
									$ele2b = $ele2a.'MW';
									$ele2c = $ele2a * 1000;
								}
								else
								{
									$ele2b = $ele2a / 1000 .'GW';
								}
								if ($ac[3] > time())
								{
									
									if($lang == 'pl')
									$z = $z.'Fabryka Budowniczych ('.$fabryka.') '.$ele2b.'<br>';
									else
									$z = $z.'Factory of builder ('.$fabryka.') '.$ele2b.'<br>';
									
								}
								else
								{
									$bud = $wierszreguu[5] + $wierszreguu[6];
									$zapytanie = "UPDATE `wioski` SET `bud` = '".$bud."', `budr` = '0', `budrc` = '0' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
									if($lang == 'pl')
									$z = $z.'Fabryka Budowniczych ('.$fabryka.') 0kW<br>';
									else
									$z = $z.'Factory of builders ('.$fabryka.') 0kW<br>';
									$ele2a = 0;
									$ele2c = 0;
									$idzapytania = mysql_query($zapytanie);
								}								
								$ele3a = 60;
								$y = 1;
								while ($y < $kopalnia)
								{
									$y++;
									$ele3a = $ele3a * 1.5;
								}
								if ($ele3a < 1000)
								{
									$ele3b = $ele3a.'MW';
								}
								else
								{
									$ele3b = $ele3a / 1000 .'GW';
								}
								$ele3c = $ele3a * 1000;
								$pr = $ele1a + $ele2c + $ele3c;
								if($pr<1000)
								$pr=$pr.'kW';
								else if($pr<1000000)
								$pr=($pr/1000 ).'MW';
								else
								$pr=($pr/1000000).'GW';
								if($lang == 'pl')
								$z = $z.'Kopalnia ('.$kopalnia.') '.$ele3b.'<br><br><br>Razem: '.$pr.'';
								else
								$z = $z.'Mine ('.$kopalnia.') '.$ele3b.'<br><br><br>Summary: '.$pr.'';
								$iii = 0;
								$azzz = 100000;
								while ($ac[5] > $iii)
								{
									$iii++;
									$azzz = $azzz * 1.5;
								}
								if($aaaz<1000)
								$aaaz=$aaaz.'kW';
								else if($aaaz<1000000)
								$aaaz=($aaaz/1000 ).'MW';
								else
								$aaaz=($aaaz/1000000).'GW';
								$procent = $pr / $azzz;
								$procent = $procent * 100;
								$odprocent = 100 - $procent;
								if($gpastyp == 'img')
								echo '<img src="l1.png" height="10" width="'.$procent.'px" alt="'.$pr.'/'.$azzz.' ('.$procent.'%)" title="'.$pr.'/'.$azzz.' ('.$procent.'%)"/><img src="l2.png" height="10" width="'.$odprocent.'px" alt="" title="'.$pr.'/'.$azzz.' ('.$procent.'%)"/>';
								else
								echo '<span title="'.$pr.'/'.$azzz.' kW ('.$procent.'%)">'.$pr.'/'.$azzz.' kW</span>';
								$popr = $azzz - $pr;
							}
						//echo ' usu: '.$zapytanie;
						//echo '5';
					}
				}
			}
		}
	}
	echo '</span>';
}
else
{
	echo '<form method="POST" action="/">Login:<input name="login"> Hasԯ:<input type="password" name="haslo"><input type="submit" value="ok"> <a href="?id=register">Zarejestruj si꼯a>';
}

?> <a href="/?lang=pl"><img src="pl.png" alt="J뻹k polski"/></a><a href="/?lang=en"><img src="en.png" alt="J뻹k angielski"/></a><dl id="menu0"><dt><a href="?id=swiat"><?
if ($styl == 'mob')
echo 'Wybierz ׷iat';
else
echo 'Chose world';
?></a></dt><? 
		$uac = "SELECT `s` from `users` WHERE `login` = '".$login."'";
	$uacc = mysql_query($uac);
	while ($mys = mysql_fetch_row($uacc))
	{
$swiatytak[$mys[0] + 1] = 'tak';
	}$uac = "SELECT `nr`, `wer`, `jenzyk` from `swiaty` Order By `nr` ASC";
	$uacc = mysql_query($uac);
	while ($mys = mysql_fetch_row($uacc))
	{
		echo'
			<dd><a href="';
			if($mys[0] == '999')
			echo '/beta/';
			else
			echo '/';
			echo '?';
			if($swiatytak[$mys[0]] == 'tak')
			echo 'sf';
			else
			echo 'zaiszs';
			echo '='.$mys[0].'">
				Ƿiat ';
				if($mys[0] == '999')
				echo 'beta';
				else
				echo $mys[0];
				echo '('.$mys[2].')
				</a></dd>';
	}
	?></dl>
	<script type="text/javascript">
// <![CDATA[
new Menu('menu0', 'position: absolute; z-index:55; padding:0; margin: 0; display:inline;', true, false, -1, -1, -1, -1, true);
// ]]>
</script>
<? if($logp != 'ok') echo'</form>'; ?>