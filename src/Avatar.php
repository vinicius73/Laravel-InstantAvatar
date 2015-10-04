<?php namespace Vinicius73\IAvatar;

use Vinicius73\IAvatar\Lib\FlatAvatar;
use Vinicius73\IAvatar\Lib\InstantAvatar;
use Str;

class Avatar
{

    /**
     * @var Lib\InstantAvatar
     */
    private static $instantAvatar;

    /**
     * @var string
     */
    private static $assetsDir;

    /**
     * @var string
     */
    private $string;
    /**
     * @var array
     */
    private static $options = array(
        'width'    => 100,
        'heigth'   => 100,
        'fontsize' => 50,
        'chars'    => 2,
        'font'     => array('InstantAvatar::Comfortaa-Regular.ttf'),
        'overlay'  => 'InstantAvatar::glass.png',
        'flat'     => false
    );

    /**
     * @param null $string
     * @param array $options
     */
    public function __construct($string = null, array $options = array())
    {
        $this->string = $string;

        $options = array_merge(self::$options, $options);

        $font     = self::getFont();
        $fontSize = array_get($options, 'fontsize');
        $width    = array_get($options, 'width');
        $heigth   = array_get($options, 'heigth');
        $overlay  = self::get_path(array_get($options, 'overlay'));
        $chars    = array_get($options, 'chars');
        $flat     = array_get($options, 'flat', false);

        if($flat):
           self::$instantAvatar = new FlatAvatar($font, $fontSize, $width, $heigth, $chars, $overlay);
        else:
           self::$instantAvatar = new InstantAvatar($font, $fontSize, $width, $heigth, $chars, $overlay);
        endif;
    }

    /**
     * @param string $name
     * @param int $colorScheme
     * @param int $backgroundStyle
     *
     * @return Avatar
     */
    public function generate($name, $colorScheme, $backgroundStyle)
    {
        $name = (empty($name)) ? $this->string : $name;

        self::$instantAvatar->generate($name, $colorScheme, $backgroundStyle);

        return $this;
    }

    /**
     * @param string $name
     *
     * @return Avatar
     */
    public function generateRandom($name = null)
    {
        $name = (empty($name)) ? $this->string : $name;

        self::$instantAvatar->generateRandom($name);

        return $this;
    }

    /**
     * @param string $path
     *
     * @return Avatar
     */
    public function save($path)
    {
        $path = self::get_path($path);

        self::$instantAvatar->writePNG($path);

        return $this;
    }

    /**
     * print image
     *
     * @return void
     */
    public function display($exit = true)
    {
        if (php_sapi_name() !== 'cli'):
            self::$instantAvatar->display();
            if ($exit) exit;
        endif;
    }

    /**
     * @param array $options
     *
     * @return void
     */
    public static function setupOptions(array $options)
    {
        self::$options = array_merge(self::$options, $options);
    }

    /**
     * @param string $dir
     *
     * @return void
     */
    public static function setupAssetsDir($dir)
    {
        self::$assetsDir = $dir;
    }

    /**
     * @param $path
     *
     * @return string
     */
    private static function get_path($path)
    {
        if (Str::startsWith($path, 'InstantAvatar::')):
            $path = str_replace('InstantAvatar::', '', $path);
            $path = self::$assetsDir . DIRECTORY_SEPARATOR . $path;
        elseif (Str::startsWith($path, 'public::')):
            $path = str_replace('public::', '', $path);
            $path = public_path($path);
        endif;

        return $path;
    }

    /**
     * @return string
     */
    private static function getFont()
    {
        $fonts = array_get(self::$options, 'font');
        $font  = array_rand($fonts);

        return self::get_path($fonts[$font]);
    }
}