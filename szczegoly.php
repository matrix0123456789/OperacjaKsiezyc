<?
echo '<img src="oba.png"><br>';
$sek = $wiers[0] * 60;
	$t = $wiersz[2] - $sek;
	$a = time() - $t;
	//echo $wiers[1];
	$b = $a / $sek;
	//echo $b;
	$c = $b * 232;
	$d = $c + 182;
	$f = $sek - $a;
	$e = $f / 60;
	$g = ceil($e);
	echo '<div style="position: relative; left:'.$d.'px; bottom: 177px;"><img src="rak.png"></div>
	<span style="position: relative; bottom: 5px;">Rakieta doleci za '.$g.'min.</span>';
?>