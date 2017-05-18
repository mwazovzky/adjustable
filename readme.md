[![Build Status](https://travis-ci.org/mikewazovzky/favoritable.svg?branch=master)](https://travis-ci.org/mikewazovzky/favoritable)
[![Coverage Status](https://coveralls.io/repos/github/mikewazovzky/favoritable/badge.svg?branch=master&foo=bar)](https://coveralls.io/github/mikewazovzky/favoritable?branch=master)

<h2 align="center">
	<img src="https://laravel.com/assets/img/components/logo-laravel.svg">
</h2>

### Project: 
mikewazovzky\favoritable
### Description
Laravel Package allows app User to Favorite/Unfavorite model instance  
#### Version: 0.0.1
#### Change log:  
0.0.1 initial project scaffolding
#### Documentation
See PHPDoc blocks in the code
#### Installation. 
- pull the package into Laravel project,  
```
composer require mikewazovzky/favoritable
```
#### Testing package. 
Create test laravel project   
1. copy `./env` file from `/tests/config/`  
2. replace `/config/app.php` by `/tests/config/app.php` or add Packege Server Provider
 ```
\Mikewazovzky\Favoritable\FavoritableServiceProvider::class
```
3. update composer.json autoload section
```
"psr-4": {
    "App\\": "app/",  
    "Mikewazovzky\\Favoritable\\": "packages/Mikewazovzky/Favoritable/src/"
}
```
Run PHPUnit from package folder
```
../../../laravel/5.4.x/vendor/bin/phpunit
```



