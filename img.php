<?





/*
if($_GET['s'] != '')
{
$img = imagecreatefrompng($_GET['z']);
//$im = imagecreatetruecolor($_GET['s'], imagesy($img))
$im = imagecreatetruecolor(300, 200)
imagecopyresized($im,    // uchwyt obrazka wynikowego
$img,                      // uchwyt obrazka �r�d�owego 
0,                         // wsp�rz�dna x punktu od kt�rego zaczynamy nanoszenie
0,                         // wsp�rz�dna y punktu od kt�rego zaczynamy nanoszenie
0,                         // wsp�rz�dna x punktu od kt�rego zaczynamy kopiowanie
0,                         // wsp�rz�dna y punktu od kt�rego zaczynamy kopiowanie
$_GET['s'],                    // szeroko�� skopiowanego obrazka na obrazku wynikowym
imagesy($img),                   // wysoko�� skopiowanego obrazka na obrazku wynikowym
imagesx($img),             // szeroko�� obszaru kopiowanego z obrazka �r�d�owego
imagesy($img));            // wysoko�� obszaru kopiowanego z obrazka �r�d�owego

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