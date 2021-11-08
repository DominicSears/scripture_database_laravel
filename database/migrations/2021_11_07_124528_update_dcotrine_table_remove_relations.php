<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDcotrineTableRemoveRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctrines', function (Blueprint $table) {
            $table->dropColumn(['religion_id', 'denomination_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctrine', function (Blueprint $table) {
            $table->unsignedBigInteger('religion_id');
            $table->unsignedBigInteger('denomination_id');
        });
    }
}
