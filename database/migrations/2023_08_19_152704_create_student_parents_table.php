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
        Schema::create('student_parents', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->enum('type_parent', ['Ayah', 'Ibu']);
            $table->string('parent_name');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->enum('education', ['SD', 'SMP', 'SMK', 'SMA', 'S1', 'S2', 'S3']);
            $table->enum('religion', ['Islam', 'Kristen', 'Katholik', 'Protestan', 'Hindu', 'Budha', 'Konghucu']);
            $table->string('profession');
            $table->integer('income');
            $table->string('whatsapp_phone', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_parents');
    }
};
