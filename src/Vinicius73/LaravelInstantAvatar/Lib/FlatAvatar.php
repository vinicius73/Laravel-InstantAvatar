<?php namespace Vinicius73\LaravelInstantAvatar\Lib;

// FlatAvatar v0.2
// (c) 2014 - Vinicius Reis

class FlatAvatar extends AbstractLib
{
   protected $colorSchemes = array(
      0xff4040,
      0x7f2020,
      0xcc5c33,
      0x734939,
      0xbf9c8f,
      0x995200,
      0x4c2900,
      0xf2a200,
      0xffd580,
      0x332b1a,
      0x4c3d00,
      0xffee00,
      0xb0b386,
      0x64664d,
      0x6c8020,
      0xc3d96c,
      0x143300,
      0x19bf00,
      0x53a669,
      0xbfffd9,
      0x40ffbf,
      0x1a332e,
      0x00b3a7,
      0x165955,
      0x00b8e6,
      0x69818c,
      0x005ce6,
      0x6086bf,
      0x000e66,
      0x202440,
      0x393973,
      0x4700b3,
      0x2b0d33,
      0xaa86b3,
      0xee00ff,
      0xbf60b9,
      0x4d3949,
      0xff00aa,
      0x7f0044,
      0xf20061,
      0x330007,
      0xd96c7b
   );

   /**
    * @param string $name
    * @param int    $colorScheme
    * @param int    $backgroundStyle
    *
    * @return $this
    */
   public function generate($name, $colorScheme, $backgroundStyle = null)
   {
      $name = strtoupper(substr($name, 0, $this->chars));
      $bgColor = $this->colorSchemes[$colorScheme];

      $this->avatar = imageCreateTrueColor($this->width, $this->height);
      imageFill($this->avatar, 0, 0, $bgColor);

      $this->drawString($name, 0xFFFFFF);

      return $this;
   }
}