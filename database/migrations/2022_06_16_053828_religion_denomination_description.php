<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $addDescription = function (Blueprint $table) {
            $table->longText('description')->nullable()->default(null);
        };

        Schema::table('religions', $addDescription);
        Schema::table('denominations', $addDescription);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $dropColumn = function (Blueprint $table) {
            $table->dropColumn('description');
        };

        Schema::table('religions', $dropColumn);
        Schema::table('denominations', $dropColumn);
    }
};
