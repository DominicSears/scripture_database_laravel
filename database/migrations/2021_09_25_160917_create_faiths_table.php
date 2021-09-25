<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaithsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faiths', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('religion_id');
            $table->unsignedBigInteger('denomination_id')->nullable()->default(null);
            $table->date('start_of_faith');
            $table->date('end_of_faith');
            $table->unsignedBigInteger('user_id');
            $table->string('note')->nullable()->default(null);
            $table->string('reason_left')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faiths');
    }
}
