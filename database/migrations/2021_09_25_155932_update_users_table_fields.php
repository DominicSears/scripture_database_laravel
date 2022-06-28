<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropcolumn('name');
            $table->softDeletes();
            $table->string('first_name');
            $table->string('last_name')->nullable()->default(null);
            $table->string('gender', 1);
            $table->string('username')->unique();
            $table->integer('country_iso_code')->default(840);
            $table->unsignedBigInteger('faith_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');

            $table->dropColumn([
                'first_name', 'last_name', 'gender', 'username',
                'country_iso_code', 'faith_id',
            ]);
        });
    }
}
