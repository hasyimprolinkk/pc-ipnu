<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->bigIncrements('id_komentar');
            $table->unsignedBigInteger('id_kegiatan');
            $table->unsignedBigInteger('id_user');
            $table->text('komentar');
            $table->timestamps();

            $table->foreign("id_kegiatan")->references("id_kegiatan")->on("kegiatan")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("id_user")->references("id_user")->on("users")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentar');
    }
}
