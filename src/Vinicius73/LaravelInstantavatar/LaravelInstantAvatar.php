<?php namespace Vinicius73\LaravelInstantAvatar;

class LaravelInstantAvatar
{

    /**
     * @var \Vinicius73\LaravelInstantAvatar\Avatar
     */
    private $avatar;

    public function __construct(array $options)
    {
        Avatar::setupOptions($options);
        Avatar::setupAssetsDir(dirname(__FILE__) . '/../../assets/');

        $this->avatar = new Avatar();
    }


    /**
     * @param string $string
     *
     * @return \Vinicius73\LaravelInstantAvatar\Avatar
     */
    public function random($string)
    {
        return $this->avatar->generateRandom($string);
    }

    /**
     * @param string $name
     * @param string $colorScheme
     * @param string $backgroundStyle
     *
     * @return \Vinicius73\LaravelInstantAvatar\Avatar
     */
    public function create($name, $colorScheme, $backgroundStyle)
    {
        return $this->avatar->generate($name, $colorScheme, $backgroundStyle);
    }

}