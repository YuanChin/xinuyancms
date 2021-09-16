<?php

namespace Xinyuan;

use Xinyuan\Http\Response;

class Captcha
{
    /**
     * 驗證碼圖片
     * 
     * @var mixed
     */
    protected $image;
    
    /**
     * 隨機字符
     * 
     * @var string
     */
    protected $charset = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';

    /**
     * 圖片寬度
     * 
     * @var int
     */
    protected $width;

    /**
     * 圖片高度
     * 
     * @var int
     */
    protected $height;

    /**
     * 儲存隨機碼
     * 
     * @var string
     */
    private $code;

    /**
     * 驗證碼字符數量
     * 
     * @var int
     */
    private $number;

    /**
     * 儲存字體檔案
     * 
     * @var mixed
     */
    private $fontFile;

    /**
     * 字體大小
     * 
     * @var int
     */
    private $fontsize;

    /**
     * 是否畫線?
     * 
     * @var bool
     */
    private $isDrawLine = true;

    /**
     * 是否加入雜點?
     * 
     * @var bool
     */
    private $isDrawNoise = true;

    public function __construct(array $config = [])
    {
        $this->initialize($config);
    }

    private function initialize(array $config = [])
    {
        $this->width = isset($config['width']) ? $config['width'] : 250;
        $this->height = isset($config['height']) ? $config['height'] : 65;
        $this->number = isset($config['number']) ? $config['number'] : 4;
        $this->fontsize = isset($config['fontsize']) ? $config['fontsize'] : 32;
        isset($config['line']) && $this->isDrawLine = boolval($config['line']);
        isset($config['noise']) && $this->isDrawNoise = boolval($config['noise']);
        $this->fontFile = __DIR__ . '/fonts/captcha.ttf';
    }

    public function create()
    {
        // build image resource
        $this->image = imagecreate($this->width, $this->height);
        // get background color
        $this->getBackgroundColor();
        // set code
        $this->setCode();
        // add interference line?
        if($this->isDrawLine) {
            for($i = 0; $i < 8; ++$i)
            {
                $this->drawLine();
            }
        }

        // add noise point?
        if($this->isDrawNoise) {
            $this->drawNoise();
        }

        // draw code on the image
        for($i = 0; $i < $this->number; ++$i)
        {
            imagettftext(
                $this->image,
                $this->fontsize,
                mt_rand(0, 20) - mt_rand(0, 25),
                32 + $i * 40,
                $this->fontsize * 1.2,
                $this->getFontColor(),
                $this->fontFile,
                $this->code[$i]
            );
        }
    }

    public function output()
    {
        ob_start();    // turn on output buffering
        imagepng($this->image);
        imagedestroy($this->image);
        $data = ob_get_contents();
        ob_end_clean();
        $header = ['Content-Type' => 'image/png'];
        throw new HttpException(new Response($data, 200, $header));   
    }

    /**
     * 設置隨機碼
     * 
     * @return string
     */
    private function setCode()
    {
        $this->code = '';
        $len = strlen($this->charset) - 1;
        for($i = 0; $i < $this->number; ++$i)
        {
            $this->code .= $this->charset[mt_rand(0, $len)];
        }
        return $this->code;
    }

    /**
     * 獲取隨機碼
     * 
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    private function drawLine()
    {
        $linecolor = imagecolorallocate(
            $this->image,
            mt_rand(0, 255),
            mt_rand(0, 255),
            mt_rand(0, 255)
        );

        if(mt_rand(0, 1)) {  // Horizontal
            $Xa   = mt_rand(0, $this->width/2);
            $Ya   = mt_rand(0, $this->height);
            $Xb   = mt_rand($this->width/2, $this->width);
            $Yb   = mt_rand(0, $this->height);
        } else {  // Vertical
            $Xa   = mt_rand(0, $this->width);
            $Ya   = mt_rand(0, $this->height/2);
            $Xb   = mt_rand(0, $this->width);
            $Yb   = mt_rand($this->height/2, $this->height);
        }

        imageline($this->image, $Xa, $Ya, $Xb, $Yb, $linecolor);
    }

    private function drawNoise()
    {
        for($i = 0; $i < 140; $i++)
        {
            imagesetpixel(
                $this->image,
                mt_rand(-10, $this->width),
                mt_rand(-10, $this->height),
                $this->getFontColor()
            );
        }
    }

    private function getFontColor()
    {
        list($red, $green, $blue) = $this->getDeepColor();
        return imagecolorallocate($this->image, $red, $green, $blue);
    }

    private function getBackgroundColor()
    {
        list($red, $green, $blue) = $this->getLightColor();
        return imagecolorallocate($this->image, $red, $green, $blue);
    }

    /**
     * 獲取隨機明亮顏色
     * 
     * @return array
     */
    private function getLightColor()
    {
        $red = mt_rand(210, 255);
        $green = mt_rand(210, 255);
        $blue = mt_rand(210, 255);

        return [$red, $green, $blue];
    }

    /**
     * 獲取隨機深色顏色
     * 
     * @return array
     */
    private function getDeepColor()
    {
        $red = mt_rand(1, 80);
        $green = mt_rand(1, 80);
        $blue= mt_rand(1, 80);

        return [$red, $green, $blue];
    }
}