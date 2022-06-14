<?php

function isValidHexCode($hex_color)
{
    $regex = "/^#([A-Fa-f0-9]{6})$/i";
    return preg_match($regex, $hex_color);
}

$hex_code = "#000f00";
echo "Is ( $hex_code ) valid hex code  : " . (isValidHexCode($hex_code) ? "YES" : "No");
