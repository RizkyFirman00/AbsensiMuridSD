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
        // Users (Guru/Admin)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->enum('role', ['teacher', 'admin'])->default('teacher');
            $table->timestamps();
        });

        // Students
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nisn', 50)->unique();
            $table->string('name', 100);
            $table->string('class', 20);
            $table->enum('status', ['active', 'graduated', 'transfer'])->default('active');
            $table->timestamps();
        });

        // Academic Years
        Schema::create('academic_years', function (Blueprint $table) {
            $table->id();
            $table->year('year_start');
            $table->year('year_end');
            $table->timestamps();
        });

        // Semesters
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('academic_year_id')->constrained('academic_years')->onDelete('cascade');
            $table->enum('name', ['Semester 1', 'Semester 2']);
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });

        // Attendances
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('semester_id')->constrained('semesters')->onDelete('cascade');
            $table->date('date');
            $table->enum('status', ['hadir', 'izin', 'sakit', 'alpha'])->default('hadir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
        Schema::dropIfExists('semesters');
        Schema::dropIfExists('academic_years');
        Schema::dropIfExists('students');
        Schema::dropIfExists('users');
    }
};
