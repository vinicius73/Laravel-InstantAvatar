<?php
return array(
   'width'    => 150,
   'heigth'   => 150,
   'fontsize' => 80,
   'chars'    => 2, // Character limit for every image
   'font'     => array( // You can register or remove more sources with ease.
      'InstantAvatar::Comfortaa-Regular.ttf',
      'InstantAvatar::Roboto-Regular.ttf',
      'InstantAvatar::Ubuntu-Regular.ttf',
      'InstantAvatar::DroidSans.ttf'
   ),
   'overlay'  => 'InstantAvatar::glass.png', // A watermark that overlays the image
   'flat'     => false // Enables the flat mode
);