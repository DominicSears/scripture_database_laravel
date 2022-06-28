<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedBigInteger('created_by');
            $table->string('title')->nullable()->default(null);
            $table->longText('explanation');
            $table->string('scriptures')->nullable()->default(null);
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
