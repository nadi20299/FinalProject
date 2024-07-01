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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->enum('gender',[0,1])->default(0)->comment('0 is female , 1 is male');
            $table->json('skills')->nullable();
            $table->boolean('is_fullstack')->nullable()->default(0)->comment('0 is no , 1 is yes');
            $table->enum('role',[0,1,2])->default(0)->comment('0 is admin, 1 is teacher , 2 is student');
            $table->string('address')->nullable();
            $table->longText('profile')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->rememberToken();
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