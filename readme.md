[![Build Status](https://travis-ci.org/mwazovzky/adjustable.svg?branch=master)](https://travis-ci.org/mwazovzky/adjustable)
[![Coverage Status](https://coveralls.io/repos/github/mwazovzky/adjustable/badge.svg?branch=master)](https://coveralls.io/github/mwazovzky/adjustable?branch=master)

<h2 align="center">
	<img src="https://laravel.com/assets/img/components/logo-laravel.svg">
</h2>

### Project:
mwazovzky\adjustable
### Description
Laravel package that tracks adjustments made to Eloquent Model(s).
Before and after update values for the fields that have been changed
as well as currently authenticated User
are saved for every database operation with the Model.
#### Version: 0.0.10
#### Change log:
0.0.10 project official name and documentation
0.0.1  initial project scaffolding
#### Documentation
See PHPDoc blocks in the code
#### Installation.
Pull the package into Laravel project through composer
```
$ composer require mwazovzky/adjustable
```
Publish and run package migrations
```
$ php artisan vendor:publish --tag=migrations --force
$ php artisan migrate
```
Use trait Adjustable for every Model that needs to track its adjustments.
```
<?php
namespace App;

use MWazovzky\Adjustable\Adjustable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Adjustable;
    ...
}
```





