<?header('Content-Type: image/jpeg');
 
$img = imagecreatefromjpeg('kartka.jpg');
 
$width = 300;
$height = 225;
$mini = imagecreatetruecolor($width,$height);
 
imagecopyresized($mini,    // uchwyt obrazka wynikowego
$img,                      // uchwyt obrazka �r�d�owego 
0,                         // wsp�rz�dna x punktu od kt�rego zaczynamy nanoszenie
0,                         // wsp�rz�dna y punktu od kt�rego zaczynamy nanoszenie
0,                         // wsp�rz�dna x punktu od kt�rego zaczynamy kopiowanie
0,                         // wsp�rz�dna y punktu od kt�rego zaczynamy kopiowanie
$width,                    // szeroko�� skopiowanego obrazka na obrazku wynikowym
$height,                   // wysoko�� skopiowanego obrazka na obrazku wynikowym
imagesx($img),             // szeroko�� obszaru kopiowanego z obrazka �r�d�owego
imagesy($img));            // wysoko�� obszaru kopiowanego z obrazka �r�d�owego
 
imagejpeg($mini, null, 70);
?>