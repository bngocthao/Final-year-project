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
        // Schema::table('units', function (Blueprint $table) 
        // {
        //     $table->foreign('don_vi_cha')->references('id')->on('don_vi')->onDelete('set null');
        // });

        Schema::table('majors', function (Blueprint $table) 
        {
            $table->foreign('unit_id')->references('id')->on('units');
        });


        // Schema::table('hoc_phan', function (Blueprint $table) 
        // {
        // $table->unsignedBigInteger('ma_nganh')->change();
        // $table->foreign('ma_nganh')->references('id')->on('hoc_phan_nganh');
        // });


        Schema::table('users', function (Blueprint $table) 
        {
            $table->foreign('major_id')->references('id')->on('majors');
            $table->foreign('role_id')->references('id')->on('roles');
        });

        Schema::table('comments', function (Blueprint $table) 
        {
            $table->foreign('postpone_application_id')->references('id')->on('postpone_applications');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('postpone_applications', function (Blueprint $table) 
        {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->foreign('year_id')->references('id')->on('years');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
