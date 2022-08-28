<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->bigIncrements('id_kegiatan');
            $table->unsignedBigInteger('id_user');
            $table->string('nama_kegiatan');
            $table->string('lokasi');
            $table->text('keterangan');
            $table->date('tanggal');
            $table->string('kuota_peserta');
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('id_kategori');
            $table->timestamps();

            $table->foreign("id_user")->references("id_user")->on("users")->onDelete('cascade')->onUpdate('cascade');
            $table->foreign("id_kategori")->references("id_kategori")->on("kategori");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}
