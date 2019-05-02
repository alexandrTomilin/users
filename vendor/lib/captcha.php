<?
session_start();

$letters = 'ABCDEFGHKIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxwz0123456789';

$caplen = 7;
$width = 240;
$height = 60;
$font = $_SERVER['DOCUMENT_ROOT'].'/public/fonts/cour.ttf';
$fontsize = 22;

header('Content-type: image/png');

$im = imagecreatetruecolor($width, $height);
imagesavealpha($im, true);
$bg = imagecolorallocatealpha($im, 255, 255, 255, 127);
imagefill($im, 0, 0, $bg);

putenv( 'GDFONTPATH=' . realpath('.') );

$captcha = '';
for ($i = 0; $i < $caplen; $i++)
{
    $captcha .= $letters[ rand(0, strlen($letters)-1) ];
    $x = ($width - 20) / $caplen * $i + 10;
    $x = rand($x, $x+4);
    $y = $height - ( ($height - $fontsize) / 2 );
    $curcolor = imagecolorallocate( $im, rand(0, 800), rand(0, 100), rand(0, 100) );
    $angle = rand(-25, 35);
    imagettftext($im, $fontsize, $angle, $x, $y, $curcolor, $font, $captcha[$i]);
}

$_SESSION['captcha'] = $captcha;

imagepng($im);
imagedestroy($im);