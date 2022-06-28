<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Update nuggetables to be different types to different models
        Schema::table('nuggetables', function (Blueprint $table) {
            $table->id()->first();
            $table->timestamp('created_at', 0)->nullable()->after('id');
            $table->timestamp('updated_at', 0)->nullable()->after('created_at');
            $table->softDeletes();
            $table->unsignedBigInteger('nugget_type_id');
        });

        // Remove nugget type from the nugget itself
        Schema::table('nuggets', function (Blueprint $table) {
            $table->dropColumn(['agree', 'disagree', 'nugget_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nuggetables', function (Blueprint $table) {
            $table->dropColumn([
                'id',
                'nugget_type_id',
                'deleted_at',
                'created_at',
                'updated_at',
            ]);
        });

        Schema::table('nuggets', function (Blueprint $table) {
            $table->unsignedBigInteger('nugget_type_id');
            $table->bigInteger('agree')->default(0);
            $table->bigInteger('disagree')->default(0);
        });
    }
};
