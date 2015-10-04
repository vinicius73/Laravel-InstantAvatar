Laravel - Instant Avatar
========================

Create a very pretty random avatars with ease.

## installation

Add the new required package in your composer.json

```
"vinicius73/laravel-instantavatar": "dev-master"
```

Run `composer update` or `php composer.phar update`.

After composer command, add new service provider in `app/config/app.php` :

```php
'Vinicius73\InstantAvatar\InstantAvatarServiceProvider',
```

Now, add new aliases in `app/config/app.php`.

```php
'IAvatar' => 'Vinicius73\InstantAvatar\Facade\IAvatarFacade',
```

Finally publish the configuration file of the package `php artisan config:publish vinicius73/laravel-instantavatar`

## Usage

```php
/**
 * Creates the image. Only the first letter will be passed to the image.
 * Ex.:
 * 'My String' -> output My
 * You can change this in the settings
 */
$avatar = IAvatar::random('My String');

/**
 * Save imagem in path
 * You can use `public::` Omit the full address /public
 */
$avatar->save('public::path/to/file.png');

/**
 * Output image in browser
 */
$avatar->display();
```
```php
IAvatar::random('Vinicius')->save('public::avatars/vinicius.png')->display();
```

## Configuration

```php
return array(
    'width'    => 150,
    'heigth'   => 150,
    'fontsize' => 80, // in px
    'chars'    => 2, // Character limit for every image
    'font' => array( // You can register or remove more sources with ease.
        'InstantAvatar::Comfortaa-Regular.ttf',
        'InstantAvatar::Roboto-Regular.ttf',
        'InstantAvatar::Ubuntu-Regular.ttf',
        'InstantAvatar::DroidSans.ttf'
    ),
    'overlay'  => 'InstantAvatar::glass.png', // A watermark that overlays the image
    'flat'     => false // Enables the flat mode
);
```
## Demo
### Default
![Instant Avatar](http://i.imgur.com/UZBqmXG.png)

### Flat 
Color based in [avatarly](https://github.com/lucek/avatarly)

![Instant Avatar Flat](http://i.imgur.com/sBk5GHZ.png)