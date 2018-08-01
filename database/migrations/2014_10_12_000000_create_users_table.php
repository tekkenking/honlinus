<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')
                ->references('id')
                ->on('countries');
            $table->string('profile_type');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('pagename')->unique();
            $table->string('password');
            $table->boolean('is_confirmed')->default(0);
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
