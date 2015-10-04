<?php namespace Vinicius73\IAvatar\Lib;

// InstantAvatar v1.0
// (c) 2008 - Dominic Szablewski - www.phoboslab.org
// (c) 2014 - Vinicius Reis

class InstantAvatar extends AbstractLib
{
   protected $numBackgroundStyles = 10;

   // One color scheme per row: bg1, bg2, text
   protected $colorSchemes = array(
      array(0xcff09e, 0xa8dba8, 0x3b8686),
      array(0x9e0838, 0xcc2227, 0xbad14f),
      array(0x314763, 0xb81f69, 0xe3d8b8),
      array(0x69d2e7, 0xa7dbd8, 0xf38630),
      array(0x8c2b56, 0xc33d3c, 0x97ad3e),
      array(0xc6cca5, 0x8ab8a8, 0x615145),
      array(0xab526b, 0xbca297, 0xf0e2a4),
      array(0x46294a, 0xad4c6b, 0xd4e067),
      array(0xb7915a, 0x9c7b3e, 0x6b051b),
      array(0x755f99, 0x7b77b4, 0xb8c6d8),
      array(0xedebe6, 0xd6e1c7, 0x403b33),
      array(0x3d3a3b, 0x2d2a2b, 0xf60069),
      array(0xcce6a5, 0xade0a6, 0x78b3a6),
      array(0x6a1864, 0x850b91, 0xda6dfe),
      array(0x18246a, 0x0b3491, 0x6db0fe),
      array(0x186a53, 0x0b9156, 0x6dfea7),
      array(0x236a18, 0x32910b, 0xaefe6d),
      array(0x566a18, 0x86910b, 0xfef26d),
      array(0x6a5c18, 0x91640b, 0xfeb56d),
      array(0x6a3818, 0x912a0b, 0xfe776d),
      array(0xF4FCE8, 0x550905, 0xc5160c),
      array(0x1462A0, 0x69D2E7, 0xE0E4CC),
      array(0xC8C8A9, 0xFC9D9A, 0xFE4365),
      array(0xF4FCE8, 0x83AF9B, 0x02779E),
      array(0x15557B, 0xA7DBD8, 0x012652),
      array(0xC9BFC0, 0x91A3A3, 0x3A111C),
      array(0x706060, 0x90779E, 0x261B2B),
      array(0xEFFAB4, 0xFF9F80, 0xA80303),
      array(0x352F3D, 0x242633, 0xB7D0A9),
      array(0xE8AF56, 0x261B2B, 0xF9DBB5),
      array(0xB7E4BB, 0xF7A28D, 0xDB4E57),
      array(0xC4CBB7, 0xEBEFC9, 0x014780),
      array(0xE6EFF7, 0xCC1E14, 0x1A1A21),
      array(0x9458D1, 0x0D0D0D, 0xEBEFC9),
      array(0xD4D4D4, 0xEBEFC9, 0x0D0D0D),
      array(0xAAB3AB, 0x607480, 0x7F5062),
   );

   /**
    * @param string $name
    * @param int    $colorScheme
    * @param int    $backgroundStyle
    *
    * @return $this
    */
   public function generate($name, $colorScheme, $backgroundStyle)
   {
      list($bgColor1, $bgColor2, $textColor) = $this->colorSchemes[$colorScheme];

      $this->avatar = imageCreateTrueColor($this->width, $this->height);

      imageFill($this->avatar, 0, 0, $bgColor1);

      $this->drawBG($bgColor2, $backgroundStyle);
      $this->drawString($name, $textColor);
      $this->copyOverlay();

      return $this;
   }

   /**
    * @param $backgroundStyle
    * @param $bgColor2
    */
   private function drawBG($backgroundStyle, $bgColor2)
   {
      // Draw some random chars into the background. Unlike the other GD drawing functions
      // (imageFilledArc, imageFilledPolygon etc.) imageTTFText is anti-aliased.
      $sizeFactor = $this->width / 40;
      switch ($backgroundStyle) {
         case 0:
            imageTTFText(
               $this->avatar,
               170 * $sizeFactor,
               10,
               0,
               35 * $sizeFactor,
               $bgColor2,
               $this->fontFace,
               'O'
            );
            break;
         case 1:
            imageTTFText(
               $this->avatar,
               90 * $sizeFactor,
               0,
               -30 * $sizeFactor,
               45 * $sizeFactor,
               $bgColor2,
               $this->fontFace,
               'o'
            );
            break;
         case 2:
            imageTTFText(
               $this->avatar,
               90 * $sizeFactor,
               0,
               -30 * $sizeFactor,
               30 * $sizeFactor,
               $bgColor2,
               $this->fontFace,
               '>'
            );
            break;
         case 3:
            imageTTFText(
               $this->avatar,
               90 * $sizeFactor,
               0,
               -30 * $sizeFactor,
               45 * $sizeFactor,
               $bgColor2,
               $this->fontFace,
               '//'
            );
            break;
         case 4:
            imageTTFText(
               $this->avatar,
               90 * $sizeFactor,
               -60,
               -30 * $sizeFactor,
               45 * $sizeFactor,
               $bgColor2,
               $this->fontFace,
               ')'
            );
            break;
         case 5:
            imageTTFText(
               $this->avatar,
               120 * $sizeFactor,
               -20,
               -30 * $sizeFactor,
               20 * $sizeFactor,
               $bgColor2,
               $this->fontFace,
               '='
            );
            break;
         case 6:
            imageTTFText(
               $this->avatar,
               120 * $sizeFactor,
               -20,
               -45 * $sizeFactor,
               25 * $sizeFactor,
               $bgColor2,
               $this->fontFace,
               '='
            );
            break;
         case 7:
            imageTTFText(
               $this->avatar,
               100 * $sizeFactor,
               -20,
               -45 * $sizeFactor,
               25 * $sizeFactor,
               $bgColor2,
               $this->fontFace,
               'Z'
            );
            break;
         case 8:
            imageTTFText(
               $this->avatar,
               140 * $sizeFactor,
               -20,
               -45 * $sizeFactor,
               25 * $sizeFactor,
               $bgColor2,
               $this->fontFace,
               '#'
            );
            break;
         case 9:
            imageTTFText(
               $this->avatar,
               90 * $sizeFactor,
               -25,
               -40 * $sizeFactor,
               25 * $sizeFactor,
               $bgColor2,
               $this->fontFace,
               '#'
            );
            break;
      }

   }
}