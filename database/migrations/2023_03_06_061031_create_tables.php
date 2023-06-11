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
       //bảng đơn vị: phòng đào tạo cấp 1, mấy cái kia cấp 2
       Schema::create('units', function (Blueprint $table) {
        $table->id();
        $table->string('name')->unique();
        $table->integer('level')->nullable();
        $table->unsignedBigInteger('head_of_unit_id')->nullable();
        $table->timestamps();
    });

        // bảng ngành
        Schema::create('majors', function (Blueprint $table) {
            $table->id();
            $table->string('major_code')->unique();
            $table->string('name')->unique();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->timestamps();
        });


        // bảng học phần
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_code')->unique();
            $table->string('name');
            $table->integer('credit');
            // $table->unsignedBigInteger('major_id');
            $table->timestamps();
        });

        //Bảng học phần_ngành
        Schema::create('major_subject', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('major_id');
            $table->unsignedBigInteger('subject_id');
            $table->timestamps();
        });

        // bảng học kỳ
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //bảng năm
        Schema::create('years', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // bảng vai trò
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // bảng đơn xin vắng
        Schema::create('postpone_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('major_id');
            $table->integer('group');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('year_id');
            $table->string('reason');
//            $table->unsignedBigInteger('confirmation_id')->nullable();
            $table->unsignedBigInteger('teach_id');
            $table->integer('teach_status')->nullable();
            $table->string('teach_description')->nullable();
//            $table->unsignedBigInteger('comment_id')->nullable();
            $table->string('proof')->nullable();
            $table->string('result')->nullable();
            $table->integer('dean_status')->nullable();
            $table->string('dean_description')->nullable();
            $table->integer('headmaster_status')->nullable();
            $table->string('headmaster_description')->nullable();
            $table->timestamp('i_result_date')->nullable();
            $table->string('mark')->nullable();
            $table->string('mark_reason')->nullable();
            $table->unsignedBigInteger('headmaster_id')->nullable();
            $table->unsignedBigInteger('marked_semester_id')->nullable();
            $table->unsignedBigInteger('marked_year_id')->nullable();
            $table->timestamps();
        });

            // Bảng bổ sung lý do
            // Schema::create('confirmations', function (Blueprint $table) {
            //     $table->id();
            //     $table->string('name');
            //     $table->unsignedBigInteger('postpone_application_id');
            //     $table->unsignedBigInteger('user_id');
            //     $table->integer('status');
            //     $table->string('description');
            //     $table->timestamps();
            // });

            // Bảng ý kiến của các đơn vị
//            Schema::create('comments', function (Blueprint $table) {
//                $table->id();
//                $table->unsignedBigInteger('user_id');
//                $table->string('name');
//                $table->unsignedBigInteger('postpone_application_id');
//                $table->integer('status');
//                $table->string('description');
//                $table->timestamps();
//            });

}

/**
* Reverse the migrations.
*
* @return void
*/
        public function down()
        {
            Schema::dropIfExists('all_tables');
        }
};
