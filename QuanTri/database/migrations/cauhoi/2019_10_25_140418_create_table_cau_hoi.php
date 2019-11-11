<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCauHoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_cau_hoi', function (Blueprint $table) {
            Schema::create('cau_hoi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('noi_dung');
            $table->integer('linh_vuc_id');
            $table->string('phuong_an_a');
            $table->string('phuong_an_b');
            $table->string('phuong_an_c');
            $table->string('phuong_an_d');
            $table->string('dap_an');
            $table->timestamps();
        });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_cau_hoi');
    }
}
