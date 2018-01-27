<?
echo time()."<br>".microtime();
?>
Auto
<p id="wynik">6</p>
<SCRIPT>
var od_ilu=<? echo time() ?>;
var co_ile=1000;
slidemessage();
function slidemessage(){
od_ilu = od_ilu + 1;
document.getElementById('wynik').innerHTML = od_ilu;
setTimeout("slidemessage()",co_ile)
}
</SCRIPT>
<?
echo MD5('mateusz');
echo date('j-n-Y G:i', time());
echo '<br><br>';
echo GD_VERSION;
echo '<br><br>';
echo '<pre>';
var_dump(gd_info());


   $str = 'VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw=='; 
   echo base64_decode($str);  
   echo base64_encode(sha1(base64_encode('www')).md5(sha1(base64_encode('www'))).md5(sha1(base64_encode('www'))));

?>