<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('postpone_applications', function (Blueprint $table) {
            $table->string('confirmation_id')->change();
        });

        // Schema::table('postpone_applications', function (Blueprint $table) {
        //     $table->renameColumn('confirmation_id', 'confirmation');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('postpone_app', function (Blueprint $table) {
            //
        });
    }
};
