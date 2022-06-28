<?php

use App\Models\Scripture;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScripturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach (Scripture::BIBLE_VERSIONS as $version) {
            Schema::create('scriptures_'.$version, function (Blueprint $table) {
                $table->unsignedBigInteger('id');
                $table->unsignedBigInteger('book');
                $table->integer('chapter');
                $table->integer('verse');
                $table->longText('text');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach (Scripture::BIBLE_VERSIONS as $version) {
            Schema::dropIfExists('scriptures_'.$version);
        }
    }
}
