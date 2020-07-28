<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (Schema::hasTable('posts')) {
            Schema::drop('posts');
        }
        Schema::create('posts', function($table){
            $table->increments('id');
            $table->string('title')->unique();
            $table->text('body');
            $table->string('img');
            $table->string('tags');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
