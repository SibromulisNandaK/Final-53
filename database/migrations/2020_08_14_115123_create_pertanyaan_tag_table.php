<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaan_tag', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pertanyaan_id');
            $table->bigInteger('tag_id');
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaan');
            $table->foreign('tag_id')->references('id')->on('tag');
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
        Schema::dropIfExists('pertanyaan_tag');
    }
}
