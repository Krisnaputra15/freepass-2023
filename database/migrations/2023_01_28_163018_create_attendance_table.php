<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('class_id')->references('id')->on('class')->onDelete('cascade')->onUpdate('cascade');
            $table->string('attendance_title');
            $table->integer('attendance_count')->default(0);
            $table->integer('alpha_count')->default(0);
            $table->integer('izin_count')->default(0);
            $table->integer('sakit_count')->default(0);
            $table->integer('masuk_count')->default(0);
            $table->dateTime('attendance_start')->nullable();
            $table->dateTime('attendance_end')->nullable();
            $table->boolean('is_end')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance');
    }
};
