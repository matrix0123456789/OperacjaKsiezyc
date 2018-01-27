<?
header('text/html; charset=iso-8859-2');
include('log.php');
echo $money.'|x/x|/x/x|';
$ilouu = "SELECT count(login) as ile FROM `user`";
$ilouz = mysql_query($ilouu);
$il = mysql_fetch_array($ilouz);
echo $il['ile'].'|x/x|/x/x|';
$czasprzedw = time() - 604800;
$ilouulw = "SELECT count(login) as ile FROM `user` WHERE `czas` >= '".$czasprzedw."'";
$ilouzlw = mysql_query($ilouulw);
$illw = mysql_fetch_array($ilouzlw);
echo $illw['ile'].'|x/x|/x/x|';
$czasprzed = time() - 100;
$ilouul = "SELECT count(login) as ile FROM `user` WHERE `czas` >= '".$czasprzed."'";
$ilouzl = mysql_query($ilouul);
$ill = mysql_fetch_array($ilouzl);
echo $ill['ile'].'|x/x|/x/x|'.time().'|x/x|/x/x| ';
if($_GET['id'] == 'temat')
{
	$zapytanie = "SELECT `data2`, `tresc`, `login`, `nr` FROM `post` WHERE `org` = '".$_GET['org']."' AND `temat` = '".$_GET['nr']."' AND `data` > '". $_GET['czas'] ."' ORDER BY `data` ASC ";
	$idzapytaniaw = mysql_query($zapytanie);
	//echo $zapytanie;
	while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
	{
		//echo $no;
		$tresc = $wiersz[1];
		include('bbcode.php');
		echo '<a href="?id=gracz&gracz='.$wiersz[2].'">'.$wiersz[2].'</a> '.$wiersz[0];
		if ($wiersz[2] == $login)
		{
			echo '<a href="?id=temat&org='.$_GET['org'].'&tem='.$_GET['tem'].'&nr='.$_GET['nr'].'&edytuj='.$wiersz[3].'">edytuj</a>';
			if ($wiersz[3] == $_GET['edytuj'])
			{
				echo '<form action="?id=editpost&org='.$_GET['org'].'&tem='.$_GET['tem'].'&nr='.$_GET['nr'].'&edytuj='.$wiersz[3].'" method="POST"><textarea name="tre" cols="50" rows="5">';
			}
		}
		echo '<br>'.$tresc.'<br><br>';
		
		if ($wiersz[2] == $login)
		{
			if ($wiersz[3] == $_GET['edytuj'])
			{
				echo '</textarea><input type="submit" value="Zatwierd¼"><br></form>';
			}
		}
	}
	$zapp = "INSERT INTO `zobtem` (`tem`, `czas`, `user`) VALUE ('".$_GET['nr']."', '".time()."', '".$login."')";
	$zappa = mysql_query($zapp);
}
else if($_GET['id'] == 'wiado')
{
$zapytanie = "SELECT `od`, `tytul`, `data`, `prz`, `nr`, `do` FROM `news` WHERE `od` = '".$login."' AND `typ` = '1' AND `nr` > '". $_GET['czas'] ."' or `do` = '".$login."' AND `typ` = '1' AND `nr` > '". $_GET['czas'] ."'";
$idzapytaniaw = mysql_query($zapytanie);
//echo $zapytanie;
$wiadjest = 0;
while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
{
	echo '<tr><td style="width: 150px;">';
	if ($wiersz[3] == 0)
	{
		echo '<b>';
	}
	if($wiersz[0] == $login)
	echo 'odbiorca <a href="?id=gracz&gracz='.$wiersz[5].'">'.$wiersz[5].'</a>';
	else
	echo 'Nadawca: <a href="?id=gracz&gracz='.$wiersz[0].'">'.$wiersz[0].'</a>';
	if ($wiersz[3] == 0)
	{
		echo '<b>';
	}
	echo '</td><td>';
	if ($wiersz[3] == 0)
	{
		echo '<b>';
	}
	echo '<a href="?id=wiado&nr='.$wiersz[4].'" onclick="getData(\'ajax.php?x='.$_GET['x'].'&y='.$_GET['y'].'&id='.$_GET['id'].'&nr='.$wiersz[4].'\', \''.$_GET['id'].'\'); return false;">'.$wiersz[1].'</a>';
	if ($wiersz[3] == 0)
	{
		echo '</b>';
	}
	echo '</td><td class="monk">';
	if ($wiersz[3] == 0)
	{
		echo '<b>';
	}
	echo $wiersz[2];
	if ($wiersz[3] == 0)
	{
		echo '</b>';
	}
	echo '</td><td><a href="?id=wiado&usun='.$wiersz[4].'">Usuñ</a> <a href="?id=wiadw&do='.$wiersz[0].'">Odpowiedz</a></td></tr>';
}
echo '|x/x|/x/x|';
$zapytanie = "SELECT `od`, `tytul`, `tresc` FROM `news` WHERE `do` = '".$login."' AND `nr` = '".$_GET['nr']."' or `od` = '".$login."' AND `nr` = '".$_GET['nr']."'";
	//echo $zapytanie;
	$idzapytaniaw = mysql_query($zapytanie);
	while ($wiersz = mysql_fetch_row($idzapytaniaw)) 
	{
		$tresc = $wiersz[2];
		include('bbcode.php');
		echo $wiersz[0].' '.$_GET['czas'].'<br>'.$tresc;
		$aa = "UPDATE `news` SET `prz` = '1' WHERE `od` = '".$wiersz[0]."' AND `do` = '".$login."' AND `tytul` = '".$wiersz[1]."' AND `tresc` = '".$wiersz[2]."'";
		$ab = mysql_query($aa);
		echo '<br><a href="?id=wiadw&do='.$wiersz[0].'">Odpowiedz</a>';
	}
}
/*if($_GET['x'] != '' && $_GET['y'] != '')
{
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
		$zapytanied = "UPDATE `user` SET `p` = '".$p."' WHERE `login`='".$lpgin."' AND `s` = '".$swiat."'";
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
						if($gpastyp == 'img')
						echo ' Zelazo:<img src="l1.png" height="10" width="'.$procent.'px" alt="'. ceil($ile) .'/" title="'. ceil($ile) .'/'. ceil($zilu) .' t ('. ceil($procent) .'%)"><img src="l2.png" height="10" width="'.$odprocent.'px" alt="'. ceil($zilu) .'t" title="'.ceil($ile).'/'.ceil($zilu).' t ('.ceil($procent).'%)">';
						else
						echo ' Zelazo:<span title="'.ceil($ile).'/'.ceil($zilu).' t ('.ceil($procent).'%)">'. ceil($ile) .'/'. ceil($zilu) .'t</span>';
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
						if($gpastyp == 'img')
						echo ' ¯ywno¶æ:<img src="l1.png" height="10" width="'.$procent.'px" alt="'.ceil($ile).'/" title="'.ceil($ile).'/'.ceil($zilu).' t ('.ceil($procent).'%)"><img src="l2.png" height="10" width="'.$odprocent.'px" alt="'.ceil($zilu).'" title="'.ceil($ile).'/'.ceil($zilu).' t ('.ceil($procent).'%)">';
						else
						echo ' ¯ywno¶æ:<span title="'.ceil($ile).'/'.ceil($zilu).' t ('.ceil($procent).'%)">'.ceil($ile).'/'.ceil($zilu).'t';
						echo '</span> pr±d:';
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
								{ $ele1b = $ele1a / 1000 .'MW'; }
								else 
								{ $ele1b = $ele1a / 1000000 .'GW'; }
								$z = $z.'<h2>Elektrownia</h2>
								Elektrownia dostarcza ci pr±du.<br><br>
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
									
									$z = $z.'Fabryka Budowniczych ('.$fabryka.') '.$ele2b.'<br>';
									
								}
								else
								{
									$bud = $wierszreguu[5] + $wierszreguu[6];
									$zapytanie = "UPDATE `wioski` SET `bud` = '".$bud."', `budr` = '0', `budrc` = '0' WHERE `x`='".$_GET['x']."' AND `y`='".$_GET['y']."' AND `login`='".$login."' AND `s` = '".$swiat."'";
									$z = $z.'Fabryka Budowniczych ('.$fabryka.') 0kW<br>';
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
								$z = $z.'Kopalnia ('.$kopalnia.') '.$ele3b.'<br>';
								$ele3c = $ele3a * 1000;
								$pr = $ele1a + $ele2c + $ele3c;
								$z = $z.'<br><br>Razem: '.$pr.'kW';
								$iii = 0;
								$azzz = 100000;
								while ($ac[5] > $iii)
								{
									$iii++;
									$azzz = $azzz * 1.5;
								}
								$procent = $pr / $azzz;
								$procent = $procent * 100;
								$odprocent = 100 - $procent;
								if($gpastyp == 'img')
								echo '<img src="l1.png" height="10" width="'.$procent.'px" alt="'.$pr.'/'.$azzz.' kW ('.$procent.'%)" title="'.$pr.'/'.$azzz.' kW ('.$procent.'%)"><img src="l2.png" height="10" width="'.$odprocent.'px" alt="" title="'.$pr.'/'.$azzz.' kW ('.$procent.'%)">';
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
}*/
?>