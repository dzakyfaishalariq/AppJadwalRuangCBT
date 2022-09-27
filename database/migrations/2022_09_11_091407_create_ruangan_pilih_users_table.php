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
        Schema::create('ruangan_pilih_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('jatwalruangantersedia_id')->unique();
            $table->integer('sesi');
            $table->time('jam_awal');
            $table->time('jam_akhir');
            $table->text('keterangan')->nullable();
            $table->boolean('status');
            $table->boolean('acc');
            $table->date('tanggal_pesan');
            $table->string('hari');
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
        Schema::dropIfExists('ruangan_pilih_users');
    }
};
