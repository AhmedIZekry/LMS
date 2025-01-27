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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instructor_id')->default(auth()->user())->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->nullable();
            $table->foreignId('course_language_id')->nullable();
            $table->foreignId('course_level_id')->nullable();
            $table->enum('course_type',['course','webinar'])->default('course');
            $table->string('title');
            $table->string('slug');
            $table->string('seo_description')->nullable();
            $table->integer('duration')->nullable();
            $table->string('timezone')->nullable();
            $table->string('thumbnail')->nullable();
            $table->enum('demo_video_storage',['upload','youtube','vimeo','external_link'])->default('upload');
            $table->text('demo_video_source')->nullable();
            $table->text('description')->nullable();
            $table->integer('capacity')->nullable();
            $table->double('price')->nullable();
            $table->double('discount')->nullable();
            $table->tinyInteger('certificate')->nullable();
            $table->tinyInteger('qan')->nullable();
            $table->text('message_for_reviewer')->nullable();
            $table->enum('is_approved',['pending','approved','rejected'])->default('pending');
            $table->enum('status',['active','inactive','draft'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
