<?
//include('log.php');
$az = mysql_query("SELECT `haslo`, login FROM `user`");
while($klk = mysql_fetch_row($az))
{
$hasloz = base64_encode(sha1(base64_encode($klk[0])).md5(sha1(base64_encode($klk[0]))).md5(sha1(base64_encode($klk[1]))));
if(mysql_query("UPDATE `user` SET `haslo` = '".$hasloz."' WHERE `login` = '".$klk[1]."'"))
echo $klk[1];
else
echo 'er.';
}
echo '21';
?>