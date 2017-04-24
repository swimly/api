<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Article extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',16)->nullable();
            $table->string('author',16)->nullable();
            $table->string('cover',40)->nullable();
            $table->string('tag',50)->nullable();
            $table->string('catory',16)->nullable();
            $table->longText('content')->nullable();
            $table->string('md')->nullable();
            $table->integer('views')->nullable();
            $table->dateTime('time')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('articles');
    }
}
