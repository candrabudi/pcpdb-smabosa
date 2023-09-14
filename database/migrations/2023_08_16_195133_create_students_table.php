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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('school_year_id');
            $table->string('registration_number', 15)->nullable();
            $table->string('registration_number_offline', 50)->nullable();
            $table->string('nisn', 191)->nullable();
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->enum('religion', ['Islam', 'Kristen', 'Katholik', 'Protestan', 'Hindu', 'Budha', 'Konghucu']);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('phone_number', 15);
            $table->string('whatsapp_phone', 15);
            $table->text('address');
            $table->enum('status', ['daftar', 'diterima', 'ditolak'])->default('daftar');
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
