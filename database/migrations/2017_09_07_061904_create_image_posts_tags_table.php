<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagePostsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_posts_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('image_post_id');
            $table->unsignedInteger('tag_id');
            $table->foreign('image_post_id')->references('id')->on('image_posts');
            $table->foreign('tag_id')->references('id')->on('tags');
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
        Schema::dropIfExists('image_posts_tags');
    }
}
