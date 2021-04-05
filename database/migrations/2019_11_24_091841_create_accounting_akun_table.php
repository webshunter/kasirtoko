<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountingAkunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AccountingAkun', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('id_akun', 255);
            $table->char('nama_akun', 255);
            $table->char('golongan_akun', 255);
            $table->char('posisi_akun', 255);
            $table->char('keterangan_akun', 255);
            $table->char('perusahaan', 255);
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
        Schema::dropIfExists('AccountingAkun');
    }
}
