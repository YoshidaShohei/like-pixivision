<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('myblog', function (Blueprint $table) {
            //
            $table->string('palody_title')->nullable(); // ニュースのタイトルを保存するカラム
            $table->string('palody_tag')->nullable();  // ニュースの本文を保存するカラム
            $table->string('palody_image_path')->nullable();  // 画像のパスを保存するカラム
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('myblog', function (Blueprint $table) {
            //
        });
    }
}
