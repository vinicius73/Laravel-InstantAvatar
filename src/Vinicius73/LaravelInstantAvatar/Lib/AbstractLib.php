<?php namespace Vinicius73\LaravelInstantAvatar\Lib;

abstract class AbstractLib
{

   protected $fontFace, $fontSize;
   protected            $width, $height, $chars;
   protected            $avatar = null, $overlay = null;
   protected            $numBackgroundStyles;
   protected            $colorSchemes;


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

   abstract function generate($name, $colorScheme, $backgroundStyle);

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
    * display image
    */
   public function display()
   {
      header("Content-type: image/png");
      imagepng($this->avatar);
      imagedestroy($this->avatar);
   }
}