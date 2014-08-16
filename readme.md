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
'Vinicius73\LaravelInstantAvatar\InstantAvatarServiceProvider',
```

Now, add new aliases in `app/config/app.php`.

```php
'IAvatar' => 'Vinicius73\LaravelInstantAvatar\Facade\InstantAvatarFacade',
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