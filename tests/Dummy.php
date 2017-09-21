<?php

namespace Tests;

use Illuminate\Database\Eloquent\Model;

class Dummy extends Model
{
    use \Mikewazovzky\Adjustable\Adjustable;

    protected static $tableName = 'dummies';
    protected $guarded = [];

    public static function createTable()
    {
        if (\Schema::hasTable(self::$tableName)) {
            return;
        }

        \Schema::create(self::$tableName, function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public static function deleteTable()
    {
        \Schema::dropIfExists(self::$tableName);
    }
}
