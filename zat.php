<?
if ($_GET['nr'] != '')
{
	$zc = "UPDATE `ludzie` SET `praca` = 'lab' WHERE `id` = '".$_GET['nr']."' AND `ukogo` = '".$login."' AND `s` = '".$swiat."'";
	//echo $zc;
	$k = mysql_query($zc);
}
include('lab.php');
?>