<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjustablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjustables', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->index();

            $table->integer('adjustable_id')->unsigned()->index();
            $table->string('adjustable_type');
            
            $table->text('before');
            $table->text('after');
            
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adjustables');
    }
}
