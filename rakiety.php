
<html><head>
<title><? echo $_GET['id']; ?></title>
</head><body style="back-ground-color: #0D3966">
<div style="position: absolute; left:10px; top: 50px;"><img src="rakiety/<? echo $_GET['id']; ?>/mini.png" width="800" height="600"></div>
<div style="position: absolute; left:10px; top: 50px;"><img id="o" src="rakiety/<? echo $_GET['id']; ?>/0030.jpg" width="800" height="600"></div>
<?
$i = 1;
while ($i <= 150)
{
	if ($i < 10)
	{
		$o = '000'.$i;
	}
	else if ($i < 100)
	{
		$o = '00'.$i;
	}
	else if ($i < 150)
	{
		$o = '0'.$i;
	}
	echo '<a href=""><img src="red.GIF" width="5" height="40" onmouseover="o.src =';
	echo "'";
	echo 'rakiety/'.$_GET['id'].'/'.$o.'.jpg';
	echo "'";
	echo '" border="0"></a>';
	$i++;
}
?>
</body></html>
