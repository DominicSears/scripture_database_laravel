<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNuggetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nuggets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('title')->nullable()->default(null);
            $table->longText('explanation');
            $table->string('scripture_start');
            $table->string('scripture_end')->nullable()->default(null);
            $table->unsignedBigInteger('nugget_type_id');
            $table->bigInteger('agree')->default(0);
            $table->bigInteger('disagree')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nuggets');
    }
}
