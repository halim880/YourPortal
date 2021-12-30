<?php

if(!function_exists("makeAvatar")){
    function makeAvatar($fontPath, $dest, $char){
        $path = public_path($dest);
        $image = imagecreate(200, 200);
        $red = rand(0, 255);
        $green = rand(0, 255);
        $blue = rand(0, 255);
        imagecolorallocate($image, $red, $green, $blue);
        $textColor = imagecolorallocate($image, 255, 255, 255);
        imagettftext($image, 100, 0, 50, 150, $textColor, $fontPath, $char);
        imagepng($image, $path);
        imagedestroy($image);

        return $dest;
    }
}

if (!function_exists("makeSlug")) {
    function makeSlug(string $str) : string{
        $str = strtolower(trim($str));
        return preg_replace('#[ -]+#', '-', $str);
    }
}