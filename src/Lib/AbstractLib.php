<?php namespace Vinicius73\IAvatar\Lib;

abstract class AbstractLib
{

   protected $fontFace;
   protected $fontSize;
   protected $width;
   protected $height;
   protected $chars;
   protected $avatar;
   protected $overlay;

   protected $numBackgroundStyles;
   protected $colorSchemes;


   public function __construct(
      $fontFace,
      $fontSize = 18,
      $width = 40,
      $height = 40,
      $chars = 2,
      $overlayPNG = null
   ) {
      $this->width = $width;
      $this->height = $height;
      $this->fontFace = $fontFace;
      $this->fontSize = $fontSize;
      $this->chars = $chars;

      if ($overlayPNG) {
         $this->overlay = imageCreateFromPNG($overlayPNG);
      }
   }

   /**
    * @param string $name
    * @param int    $colorScheme
    * @param int    $backgroundStyle
    *
    * @return $this
    */
   abstract function generate($name, $colorScheme, $backgroundStyle);

   /**
    * @param $string
    * @param $stringColor
    */
   protected function drawString($string, $stringColor)
   {
      $string = substr($string, 0, $this->chars);

      // Draw the first few chars of the name
      imageTTFText(
         $this->avatar,
         $this->fontSize,
         0,
         4,
         $this->height - $this->fontSize / 2,
         $stringColor,
         $this->fontFace,
         $string
      );
   }

   /**
    * Copy the overlay on top
    */
   protected function  copyOverlay()
   {
      if ($this->overlay) {
         imageCopy(
            $this->avatar,
            $this->overlay,
            0,
            0,
            0,
            0,
            imageSX($this->overlay),
            imageSY($this->overlay)
         );
      }
   }

   /**
    * @param string $name
    */
   public function generateRandom($name)
   {
      $this->generate(
         $name,
         rand(0, count($this->colorSchemes) - 1),
         rand(0, $this->numBackgroundStyles - 1)
      );
   }

   /**
    * @return null
    */
   public function getAvatar()
   {
      return $this->avatar;
   }


   /**
    * @param string $path
    *
    * @return bool
    */
   public function writePNG($path)
   {
      if ($this->avatar) {
         imagePNG($this->avatar, $path);

         return true;
      }

      return false;
   }

   /**
    * @return bool
    */
   public function passThru()
   {
      if ($this->avatar) {
         imagePNG($this->avatar);

         return true;
      }

      return false;
   }


   /**
    * Display image
    */
   public function display()
   {
      header("Content-type: image/png");
      imagepng($this->avatar);
      imagedestroy($this->avatar);
   }

   /**
    * Destroy image
    */
   public function __destruct()
   {
      if ($this->avatar) {
         @imageDestroy($this->avatar);
      }
      if ($this->overlay) {
         @imageDestroy($this->overlay);
      }
   }
}