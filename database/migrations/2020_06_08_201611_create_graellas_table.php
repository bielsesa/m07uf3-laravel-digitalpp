<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraellasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graelles', function (Blueprint $table) {
            $table->id();
            $table->time('hora');
            $table->string('dia');
            $table->unsignedBigInteger('canal_id');
            $table->index('canal_id');
            $table->foreign('canal_id')->references('id')->on('canals')->onDelete('cascade');
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
        $table->dropForeign('lists_canal_id_foreign');
        $table->dropIndex('lists_canal_id_index');
        $table->dropColumn('canal_id');
        Schema::dropIfExists('graellas');
    }
}