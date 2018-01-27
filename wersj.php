<?
$zmien = '<br>Zaktulizuj do <a href="http://www.mozilla-europe.org/pl/firefox/">Firefox  3.6.6</a>, <a href="http://www.microsoft.com/poland/windows/internet-explorer/default.aspx">Internet Explorer 8</a>, <a href="http://opera.com">Opera 10.60</a> lub <a href="http://www.google.com/chrome">Chrome 5.0</a>';
if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 1') !== false) {
   echo 'Urzywasz przeglądarki internetowej Internet Explorer 1 z 1995 roku!'.$zmien;
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 2') !== false) {
   echo 'Urzywasz Starej przeglądarki internetowej Internet Explorer 2!'.$zmien;
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 3') !== false) {
   echo 'Urzywasz starej przeglądarki internetowej Internet Explorer 3!'.$zmien;
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 4') !== false) {
   echo 'Urzywasz starej przeglądarki internetowej Internet Explorer 4!'.$zmien;
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 5') !== false) {
   echo 'Urzywasz przeglądarki internetowej Internet Explorer 5 lub 5.5 z 2000 roku!'.$zmien;
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6') !== false) {
   echo 'Urzywasz przeglądarki internetowej Internet Explorer 6 z 2001 roku!'.$zmien;
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7') !== false) {
   echo 'Urzywasz przeglądarki internetowej Internet Explorer w nieaktualnej wersji 7.'.$zmien;
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox/') !== false) {
   $firefox = substr($_SERVER['HTTP_USER_AGENT'], strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox/') +8, 3);
   if($firefox < 3.6)
   echo 'Urzywasz przeglądarki internetowej Firefox '.$firefox.$zmien;
}
/*else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox/1.5') !== false) {
   echo 'Urzywasz przeglądarki internetowej Firefox 1.5'.$zmien;
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox/2') !== false) {
   echo 'Urzywasz przeglądarki internetowej Firefox 2.0'.$zmien;
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox/3.0') !== false) {
   echo 'Urzywasz przeglądarki internetowej Firefox 3.0'.$zmien;
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox/3.5') !== false) {
   echo 'Urzywasz przeglądarki internetowej Firefox 3.5'.$zmien;
}*/
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera/9.80') !== false) {
   $opera = substr($_SERVER['HTTP_USER_AGENT'], strpos($_SERVER['HTTP_USER_AGENT'], 'Version/') +8, 5);
   if($opera < 10.60)
   echo 'Urzywasz przeglądarki internetowej Opera '.$opera.$zmien;
}
else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera/') !== false) {
   
   $opera = substr($_SERVER['HTTP_USER_AGENT'], 6, 4);
   echo 'Urzywasz przeglądarki internetowej Opera '.$opera.$zmien;
}
?>