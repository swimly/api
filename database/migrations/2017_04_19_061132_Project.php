<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Project extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('catory');
            $table->string('title');
            $table->string('author');
            $table->string('cover');
            $table->string('github');
            $table->string('preview');
            $table->integer('views');
            $table->longText('content');
            $table->dateTime('time');
            $table->string('tag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
