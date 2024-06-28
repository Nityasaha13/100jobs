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
        Schema::create('jobs', function (Blueprint $table) {
            $table -> id();
            $table-> string('role');
            $table-> string('company')->nullable();
            $table-> integer('location');
            $table-> string('job_type');
            $table-> string('description');
            $table-> integer('salary')->nullable();
            $table-> string('skills')->nullable();
            $table->string('qualification')->nullable();
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
