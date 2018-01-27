<?
//error_reporting(E_ALL); // poziom raportowania, http://pl.php.net/manual/pl/function.error-reporting.php
//ini_set('display_errors', 1);
function getmicrotime(){
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
    }

$time_start = getmicrotime();
include('log.php');
?><<? ?>!DOCTY<? ?>PE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<?
if($_GET['id'] == 'pp')
{
	 echo '<!-- XT:yRbmdLATsM42M1pHHJCLocqBHcM1F0Z0fHIv3f4nhJLDA5rVhEh4IUgpO9Lg0yzI -->';
}
else
{
	echo '<!-- XT:yRbmdLATsM42M1pHHJCLocqBHcM1F0Z0QjyzwR0UUInal89HdySenbfGiwhDuOxG -->';
}
?>
<head>
<title>Operacja księżyc - gra komputerowa przez przeglądarkę.</title>
<link rel="Bookmark" title="Mkik" href="http://mkik.yoyo.pl">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
<link rel="Shortcut icon" href="favicon.ico">
<link rel="alternate" type="application/rss+xml" title="Newsy" href="rss.php">
<link rel="alternate" type="application/rss+xml" title="Newsy i prywante wiadomości<? if ($logp == 'no') { echo '(nie jesteś zalogowany)'; } ?>" href="rss.php?prywatne=wiadomosci<? if ($logp != 'no') {echo '&login='.$login.'&haslo='.$haslo;} ?>">
<?
if ($_GET['id'] == 'lot')
{
	echo '<meta http-equiv="Refresh" content="60">';
}
?>
</head>
<body>
<?
include('gpasek.php');
$str = $_GET['id'].'.php';
if ($str == '.php')
{
	$str = 'menu.php';
}
if ($str == 'logout.php')
{
	$str = 'menu.php';
}
include($str);
?>
<?php

$GLOBALS['google']['ad_type']='text';
$GLOBALS['google']['channel']='2424207589+0823343252+5683021010';
$GLOBALS['google']['client']='pub-8638511152242156';
$GLOBALS['google']['color_border']='FFFFFF';
$GLOBALS['google']['color_bg']='FFFFFF';
$GLOBALS['google']['color_link']='6131BD';
$GLOBALS['google']['color_text']='000000';
$GLOBALS['google']['color_url']='008000';
$GLOBALS['google']['format']='mobile_single';
$GLOBALS['google']['https']=$_SERVER['HTTPS'];
$GLOBALS['google']['host']=$_SERVER['HTTP_HOST'];
$GLOBALS['google']['ip']=$_SERVER['REMOTE_ADDR'];
$GLOBALS['google']['markup']='xhtml';
$GLOBALS['google']['oe']='utf8';
$GLOBALS['google']['output']='xhtml';
$GLOBALS['google']['ref']=$_SERVER['HTTP_REFERER'];
$GLOBALS['google']['url']=$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$GLOBALS['google']['useragent']=$_SERVER['HTTP_USER_AGENT'];
$google_dt = time();
google_set_screen_res();
google_set_dcmguid();

function google_append_url(&$url, $param, $value) {
  $url .= '&' . $param . '=' . urlencode($value);
}

function google_append_globals(&$url, $param) {
  google_append_url($url, $param, $GLOBALS['google'][$param]);
}

function google_append_color(&$url, $param) {
  global $google_dt;
  $color_array = split(',', $GLOBALS['google'][$param]);
  google_append_url($url, $param,
                    $color_array[$google_dt % sizeof($color_array)]);
}

function google_set_screen_res() {
  $screen_res = $_SERVER['HTTP_UA_PIXELS'];
  $delimiter = 'x';
  if ($screen_res == '') {
    $screen_res = $_SERVER['HTTP_X_UP_DEVCAP_SCREENPIXELS'];
    $delimiter = ',';
  }
  $res_array = explode($delimiter, $screen_res);
  if (sizeof($res_array) == 2) {
    $GLOBALS['google']['u_w'] = $res_array[0];
    $GLOBALS['google']['u_h'] = $res_array[1];
  }
}

function google_set_dcmguid() {
  $dcmguid = $_SERVER['HTTP_X_DCMGUID'];
  if ($dcmguid != '') {
    $GLOBALS['google']['dcmguid'] = $dcmguid;
  }
}

function google_get_ad_url() {
  $google_ad_url = 'http://pagead2.googlesyndication.com/pagead/ads?';
  $google_scheme = ($GLOBALS['google']['https'] == 'on')
      ? 'https://' : 'http://';
  foreach ($GLOBALS['google'] as $param => $value) {
    if ($param == 'client') {
      google_append_url($google_ad_url, $param,
                        'ca-mb-' . $GLOBALS['google'][$param]);
    } else if (strpos($param, 'color_') === 0) {
      google_append_color($google_ad_url, $param);
    } else if ((strpos($param, 'host') === 0)
               || (strpos($param, 'url') === 0)) {
      google_append_url($google_ad_url, $param,
                        $google_scheme . $GLOBALS['google'][$param]);
    } else {
      google_append_globals($google_ad_url, $param);
    }
  }
  google_append_url($google_ad_url, 'dt',
   		    round(1000 * array_sum(explode(' ', microtime()))));
  return $google_ad_url;
}

$google_ad_handle = @fopen(google_get_ad_url(), 'r');
if ($google_ad_handle) {
  while (!feof($google_ad_handle)) {
    echo fread($google_ad_handle, 8192);
  }
  fclose($google_ad_handle);
}

?>
</body>