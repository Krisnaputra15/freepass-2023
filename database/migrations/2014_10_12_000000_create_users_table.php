<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('identity_number', 15);
            $table->string('fullname', 400)->nullable();
            $table->string('major')->nullable();
            $table->string('faculty')->nullable();
            $table->string('education_level')->nullable();
            $table->string('username')->unique();
            $table->string('password', 2000);
            $table->boolean('is_verified')->default(false);
            $table->integer('role');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->primary('identity_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
