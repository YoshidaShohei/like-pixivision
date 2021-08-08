<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArtistBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('artist_title')->nullable(); // ニュースのタイトルを保存するカラム
            $table->string('artist_tag')->nullable();  // ニュースの本文を保存するカラム
            $table->string('artist_image_path')->nullable();  // 画像のパスを保存するカラム
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
        Schema::dropIfExists('artist_blogs');
    }
}
