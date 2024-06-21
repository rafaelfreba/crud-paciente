<?php

if (!function_exists('getFoto')) {
    function getFoto($foto = null)
    {
        $url = $foto ? (public_path('storage') . '/' . $foto) : (public_path('images') . '/' . mt_rand(1,9) . '.png'); 
        return base64_encode(file_get_contents($url));
    }
}