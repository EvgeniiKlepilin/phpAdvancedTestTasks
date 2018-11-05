<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of captchaClass
 *
 * @author eugene
 * 
 * Class to create Captcha Image.
 * Constructor Params: none;
 */
class CaptchaClass
{

    const STD_WIDTH = 120;
    const STD_HEIGHT = 30;

    //captcha value
    private $captchaString;

    public function __construct()
    {
        
    }

    //return captcha value
    public function getCaptchaString()
    {
        return $this->captchaString;
    }

    //pass captchaObject in SESSION
    public function setupSession()
    {
        $_SESSION['captchaObject'] = $this;
    }

    //generate captcha image with given width and height
    public function generateCaptcha($width = STD_WIDTH, $height = STD_HEIGHT)
    {
        //instantiate image
        $image = imagecreatetruecolor($width, $height) or
            die("Cannot Initialize new GD image stream");

        //create background color for the image
        $background = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
        imagefill($image, 0, 0, $background);
        //create color for random lines
        $linecolor = imagecolorallocate($image, 0xCC, 0xCC, 0xCC);
        //create color for captcha text
        $textcolor = imagecolorallocate($image, 0x33, 0x33, 0x33);

        //generate random lines with given color
        for ($i = 0; $i < 6; $i++) {
            imagesetthickness($image, rand(1, 3));
            imageline($image, 0, rand(0, 30), 120, rand(0, 30), $linecolor);
        }

        //generate random captcha value
        $digit = '';
        for ($x = 15; $x <= 95; $x += 20) {
            $digit .= ($num = rand(0, 9));
            imagechar($image, rand(3, 5), $x, rand(2, 14), $num, $textcolor);
        }

        //store captcha value
        $this->captchaString = $digit;

        //setup proper headers
        header('Content-type: image/png');
        //create image
        imagepng($image);
        //destroy image
        imagedestroy($image);
    }
}
