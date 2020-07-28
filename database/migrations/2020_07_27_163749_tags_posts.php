<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TagsPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (Schema::hasTable('tagsPosts')) {
            Schema::drop('tagsPosts');
        }
        Schema::create('tagsPosts', function($table){
            $table->increments('id');
            $table -> integer('posts_id') -> unsigned();
            $table -> foreign('posts_id')
            ->references('id')
            ->on('posts')
            ->onDelete('cascade');
            $table -> integer('tags_id') -> unsigned();
            $table -> foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
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
