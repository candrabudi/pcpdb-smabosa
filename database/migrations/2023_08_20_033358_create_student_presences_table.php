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
        Schema::create('student_presences', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('sick_one');
            $table->integer('permission_one');
            $table->integer('alpa_one');
            $table->integer('sick_two');
            $table->integer('permission_two');
            $table->integer('alpa_two');
            $table->enum('type_class', ['seven', 'eight', 'nine']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_presences');
    }
};
