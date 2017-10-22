[![Build Status](https://travis-ci.org/mikewazovzky/adjustable.svg?branch=master)](https://travis-ci.org/mikewazovzky/adjustable)
[![Coverage Status](https://coveralls.io/repos/github/mikewazovzky/adjustable/badge.svg?branch=master)](https://coveralls.io/github/mikewazovzky/adjustable?branch=master)

<h2 align="center">
	<img src="https://laravel.com/assets/img/components/logo-laravel.svg">
</h2>

### Project:
mikewazovzky\adjustable
### Description
Laravel package that tracks adjustments made to Eloquent Model(s).
Before and after update values for the fields that have been changed
as well as currently authenticated User
are saved for every database operation with the Model.
#### Version: 0.0.1
#### Change log:
0.0.1 initial project scaffolding
#### Documentation
See PHPDoc blocks in the code
#### Installation.
Pull the package into Laravel project through  composer
```
$ composer require mikewazovzky/adjustable
```
#### Testing package.
1. create test laravel project
2. copy `.env` file from `/tests/config/`
3. for Laravel 5.4 or below register Package Server Provider class within `/config/app.php` file
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
$ ../../../laravel/5.4.x/vendor/bin/phpunit
```



