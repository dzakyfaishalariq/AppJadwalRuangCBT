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
        Schema::create('jatwal_ruangan_tersedias', function (Blueprint $table) {
            $table->id();
            $table->time('jam_awal');
            $table->time('jam_akhir');
            $table->integer('sesi');
            $table->string('hari');
            $table->double('status');
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
        Schema::dropIfExists('jatwal_ruangan_tersedias');
    }
};
