[![Build Status](https://travis-ci.org/mikewazovzky/adjustable.svg?branch=master)](https://travis-ci.org/mikewazovzky/adjustable)
[![Coverage Status](https://coveralls.io/repos/github/mikewazovzky/adjustable/badge.svg?branch=master)](https://coveralls.io/github/mikewazovzky/adjustable?branch=master)

<h2 align="center">
	<img src="https://laravel.com/assets/img/components/logo-laravel.svg">
</h2>

### Project:
mikewazovzky\adjustable
### Description
Laravel package tracks adjustment made to Eloquent Models. Before and after update field values as well as a User are saved for every database transaction.
#### Version: 0.0.1
#### Change log:
0.0.1 initial project scaffolding
#### Documentation
See PHPDoc blocks in the code
#### Installation.
Pull the package into Laravel project through  composer
```
composer require mikewazovzky/adjustable
```
#### Testing package.
1. create test laravel project
2. copy `.env` file from `/tests/config/`
3. include the Package Server Provider within your `/config/app.php` file
 ```
\Mikewazovzky\Adjustable\FavoritableServiceProvider::class
```
4. update composer.json autoload section
```
"psr-4": {
    "App\\": "app/",
    "Mikewazovzky\\Adjustable\\": "packages/Mikewazovzky/Adjustable/src/"
}
```
Run PHPUnit from package folder
```
../../../laravel/5.4.x/vendor/bin/phpunit
```



