<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('signs', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->unsignedBigInteger('request_id')->index()->comment('Идентификатор запроса');
            $table->bigInteger('status_id')->nullable()->comment('Статус документа');
            $table->foreign('status_id')->references('id')->on('signs_status');
            $table->string('name_org')->nullable(false)->comment('Название организации');
            $table->string('city')->nullable(false)->comment('Город');
            $table->string('surname')->nullable(false)->comment('Фамилия');
            $table->string('name')->nullable(false)->comment('Имя');
            $table->string('middle_name')->nullable()->comment('Отчество');
            $table->timestamp('work_date')->nullable(false)->comment('Дата начала работы');
            $table->string('work_position')->nullable(false)->comment('Должность');
            $table->string('work_department')->nullable(false)->comment('Подразделение');
            $table->string('place_requirement')->nullable(false)->comment('Место требования');
            $table->string('full_name_hr')->nullable(false)->comment('Подписал документ');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signs');
    }
};
