<?





/*
if($_GET['s'] != '')
{
$img = imagecreatefrompng($_GET['z']);
//$im = imagecreatetruecolor($_GET['s'], imagesy($img))
$im = imagecreatetruecolor(300, 200)
imagecopyresized($im,    // uchwyt obrazka wynikowego
$img,                      // uchwyt obrazka ¼ród³owego 
0,                         // wspó³rzêdna x punktu od którego zaczynamy nanoszenie
0,                         // wspó³rzêdna y punktu od którego zaczynamy nanoszenie
0,                         // wspó³rzêdna x punktu od którego zaczynamy kopiowanie
0,                         // wspó³rzêdna y punktu od którego zaczynamy kopiowanie
$_GET['s'],                    // szeroko¶æ skopiowanego obrazka na obrazku wynikowym
imagesy($img),                   // wysoko¶æ skopiowanego obrazka na obrazku wynikowym
imagesx($img),             // szeroko¶æ obszaru kopiowanego z obrazka ¼ród³owego
imagesy($img));            // wysoko¶æ obszaru kopiowanego z obrazka ¼ród³owego

}
else
{

}*/
$im = imagecreatefrompng($_GET['z']);
if($_GET['typ'] == 'jpg')
{
	header('Content-Type: image/jpeg');
	imagejpeg($im, NULL, $_GET['q']);
}
else
{header('Content-Type: image/png');
	imagesavealpha($im, true);
	imagepng($im);
}






?>