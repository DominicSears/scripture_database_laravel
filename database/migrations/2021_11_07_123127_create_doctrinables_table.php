<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctrinablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctrinables', function (Blueprint $table) {
            $table->unsignedBigInteger('doctrine_id');
            $table->unsignedBigInteger('doctrinable_id');
            $table->string('doctrinable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctrinables');
    }
}
