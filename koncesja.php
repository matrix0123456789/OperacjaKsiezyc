<?
if($lang == 'pl')
echo '<h2>Postanowienie</h2>
Zgodnie z art. 1 prawa kosmicznego:<br>
Kazde przeworzenie ludzi i zwierz±t w przestrzeñ kosmiczn± (tj. powyrzej 100km nad powierzchni± ziemi) wymaga wydania specialnego pozwolenia.<br><br>
Aby przywie¼æ na ksiêrzyc ludzi nalerzy posiadaæ koncesjê.<br><br>';
else
echo '<h2>Postanowienie</h2>
Zgodnie z art. 1 prawa kosmicznego:<br>
Kazde przeworzenie ludzi i zwierz±t w przestrzeñ kosmiczn± (tj. powyrzej 100km nad powierzchni± ziemi) wymaga wydania specialnego pozwolenia.<br><br>
Aby przywie¼æ na ksiêrzyc ludzi nalerzy posiadaæ koncesjê.<br><br>';
$a = "SELECT `osl`, `kol`, `x`, `y`, `dom`, `nazwa` FROM `wioski` WHERE `login` = '".$login."' and `s` = '".$swiat."'";
$b = mysql_query($a);
while ($c = mysql_fetch_row($b))
{
	echo '<h2>'.$c[5].' ('.$c[2].'|'.$c[3].')</h2>';
	echo 'Os³ona na poziomie 1 ';
	if ($c[0] == 0)
	{
		echo 'nie';
	}
	else
	{
		echo 'tak';
		$z1 = 'tak';
	}
	if($lang == 'pl')
	echo '<br>
	Domy na poziomie 1';
	else
	echo '<br>
	House level 1';
	if ($c[4] == 0)
	{
	
	if($lang == 'pl')
		echo 'nie';
		else echo 'no';
	}
	else
	{
			if($lang == 'pl')
		echo 'tak';
		else echo 'yes';
		$z2 = 'tak';
	}
	if($lang == 'pl')
	echo '<br>
	Stacja kolejowa na poziomie 1';
	else
	echo '<br>
	Train station level 1';
	if ($c[1] == 0)
	{
	
	if($lang == 'pl')
		echo 'nie';
		else
		echo 'no';
	}
	else
	{
	
	if($lang == 'pl')
		echo 'tak';
		else echo 'yes';
		$z3 = 'tak';
	}
	echo '<br><br>
	';
	if ($z1 == 'tak' && $z2 == 'tak' && $z3 == 'tak')
	{
		echo 'Koncesja przyznana!';
		$ga = "UPDATE `itechnolog_ok`.`wioski` SET `kon` = '1' WHERE `x`='".$c[2]."' AND `y`='".$c[3]."' AND `login`='".$login."'";
		if(mysql_query($ga)){
   //tu ewentualny komunikat typu "zmiany zapisano" etc.
}else{
   echo mysql_error();
   exit();
   //koñczysz dzia³anie skryptu lub wy¶wietlasz b³±d
}
	}
}
?>