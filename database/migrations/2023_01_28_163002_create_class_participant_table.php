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
        Schema::create('class_participant', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 15)->references('identity_number')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('class_id')->references('id')->on('class')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('class_participant');
    }
};
