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
            $table->string('thumbnail', 250);
            $table->string('namasiswa', 250);
            $table->string('tempatlahir', 250);
            $table->date('tanggallahir', 250);
            $table->string('jeniskelamin', 250);
            $table->string('alamat', 250);
            $table->string('asalsekolah', 250);
            $table->string('nmrtelepon',250);
            $table->string('email')->unique();
            $table->softDeletes('deleted_at');
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
