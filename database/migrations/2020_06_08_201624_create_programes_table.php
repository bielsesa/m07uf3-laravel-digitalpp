<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_programa');
            $table->string('descripcio');
            $table->string('tipus');
            $table->string('classificacio');
            $table->unsignedBigInteger('graella_id');
            $table->index('graella_id');
            $table->foreign('graella_id')->references('id')->on('graelles')->onDelete('cascade');
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
        $table->dropForeign('lists_graella_id_foreign');
        $table->dropIndex('lists_graella_id_index');
        $table->dropColumn('graella_id');
        Schema::dropIfExists('programas');
    }
}