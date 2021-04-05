<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAccountingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userAccounting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('username', 255);
            $table->mediumtext('password');
            $table->char('nama_perusahaan',255);
            $table->char('jenis_usaha',255);
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
        Schema::dropIfExists('userAccounting');
    }
}
