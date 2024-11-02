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
        Schema::create('signs_path_file', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('signs_uuid')->references('uuid')->on('signs')->onDelete('cascade');
            $table->string('path_pdf_draft')->nullable()->comment('Путь до черновика');
            $table->string('path_pdf_sign')->nullable()->comment('Путь до подписанного документа');
            $table->string('path_sig_file')->nullable()->comment('Путь до sig файла');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signs_path_file');
    }
};
