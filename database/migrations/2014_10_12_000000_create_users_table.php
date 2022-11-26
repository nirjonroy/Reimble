<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('fullName');
            $table->string('userName');
            $table->string('middleName')->nullable();
            $table->string('surName')->nullable();
            $table->string('companyName');
            $table->string('companyTradeLicenceNo')->nullable();
            $table->string('companyLogo')->nullable();
            $table->string('country')->nullable();
            $table->string('divition')->nullable();
            $table->string('distric')->nullable();
            $table->string('subDistric')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('type')->default('null');
            $table->integer('status')->default('0');
            $table->integer('is_verify')->default('0');
            $table->string('verification_code')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
