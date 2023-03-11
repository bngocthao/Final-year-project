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
        Schema::create('major_subject', function (Blueprint $table) {

                $table->id();
                $table->unsignedBigInteger('subject_id');
                $table->foreign('subject_id')->references('id')->on('subjects');

                $table->unsignedBigInteger('major_id');
                $table->foreign('major_id')->references('id')->on('majors');
                $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('major_subject', function (Blueprint $table) {
            //
        });
    }
};
