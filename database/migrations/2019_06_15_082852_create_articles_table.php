<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('article_title');
            $table->text('article_content');
            $table->integer('user_id')->unsigned()->default(0);
            $table->integer('magazine_id')->unsigned()->default(0);
            $table->integer('category_id')->unsigned();
            $table->text('article_cover');
            $table->integer('views')->default(0);
            $table->tinyInteger('is_active')->default(0);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
