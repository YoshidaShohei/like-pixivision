<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TagBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tag_title')->nullable(); // ニュースのタイトルを保存するカラム
            $table->string('tag_tag')->nullable();  // ニュースの本文を保存するカラム
            $table->string('tag_image_path')->nullable();  // 画像のパスを保存するカラム
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
        Schema::dropIfExists('tag_blogs');
    }
}
