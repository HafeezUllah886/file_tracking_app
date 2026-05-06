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
        Schema::create('files', function (Illuminate\Database\Schema\Blueprint $table) {
            $table->id();
            $table->string('file_no')->unique();
            $table->string('reg_no');
            $table->string('patient_name');
            $table->string('unit');
            $table->string('wing');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
