<?php
header('Content-Type: image/png'); 
$cap           = imagecreatetruecolor(500, 500);
imagecolorallocatealpha(127, 127, 127, 127)
imageline($cap, 2, 2, 77, 54, imagecolorallocate($cap, 205, 205, 205));
imagepng($cap);
?>