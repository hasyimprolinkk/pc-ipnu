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
            $table->bigIncrements('id_user');
            $table->string('nama');
            $table->enum('jk', ['L', 'P']);
            $table->string('no_hp');
            $table->string('jabatan')->nullable();
            $table->string('avatar')->default('avatars/default.jpg');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('roles', ['user','admin','petugas'])->default('user');
            $table->enum('is_active',[0,1])->default(1);
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
