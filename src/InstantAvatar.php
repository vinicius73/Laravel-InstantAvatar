<?php namespace Vinicius73\IAvatar;

class InstantAvatar
{

    /**
     * @var \Vinicius73\IAvatar\Avatar
     */
    private $avatar;

    public function __construct(array $options)
    {
        Avatar::setupOptions($options);
        Avatar::setupAssetsDir(base_path('resources/assets/iavatar'));

        $this->avatar = new Avatar();
    }


    /**
     * @param string $string
     *
     * @return \Vinicius73\IAvatar\Avatar
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
     * @return \Vinicius73\IAvatar\Avatar
     */
    public function create($name, $colorScheme, $backgroundStyle)
    {
        return $this->avatar->generate($name, $colorScheme, $backgroundStyle);
    }

}