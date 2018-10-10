<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_post', function (Blueprint $table) {
            $table->unsignedInteger('kategori_id');
            $table->unsignedInteger('post_id');

            $table->foreign('post_id')
                ->references('id')->on('posts')
                ->onDelete('cascade');
            $table->foreign('kategori_id')
                ->references('id')->on('kategoris')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_post');
    }
}
