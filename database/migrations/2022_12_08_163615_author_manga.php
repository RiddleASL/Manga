<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_manga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('manga_id');

            $table->foreign('author_id')->references('id')->on('authors')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('manga_id')->references('id')->on('mangas')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::table('author_manga', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
            $table->dropForeign(['manga_id']);
            $table->dropColumn('publisher_id');
            $table->dropColumn('manga_id');
        });
    }
};
