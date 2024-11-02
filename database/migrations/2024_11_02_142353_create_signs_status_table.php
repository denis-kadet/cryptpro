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
        Schema::create('signs_status', function (Blueprint $table) {
            $table->id();
            $table->string('status_name')->nullable(false)->comment('Название статуса');
            $table->string('status_code')->nullable(false)->comment('Код статуса');
            $table->string('status_desc')->nullable()->comment('Описиние статуса');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signs_status');
    }
};
