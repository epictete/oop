<?php

class Html
{
    public function head()
    {
        return '<!DOCTYPE html><html lang="en"><head>';
    }

    public function body()
    {
        return '</head><body>';
    }

    public function close()
    {
        return '</body></html>';
    }
   
    public function metaInit()
    {
        return '<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">';
    }
    
    public function metaDesc($desc)
    {
        return '<meta name="description" content="' . $desc . '">';
    }
    
    public function metaKey($key)
    {
        return '<meta name="keywords" content="' . $key . '">';
    }
    
    public function css($location)
    {
        return '<link rel="stylesheet" href="' . $location  . '.css">';
    }

    public function img($src, $alt="", $width="", $height="")
    {
        return '<img src="' . $src . '" alt="' . $alt . '" width="' . $width . '" height="' . $height . '">';
    }

    public function a($href, $text)
    {
        return '<a href="' . $href . '" target="_blank">' . $text . '</a>';
    }

    public function script($src)
    {
        return '<script src="' . $src . '.js"></script>';
    }
}

?>

