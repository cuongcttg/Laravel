<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietluotChoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tietluot_choi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('luot_choi_id');
            $table->integer('cau_hoi_id');
            $table->string('phuong_an');
            $table->integer('diem');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tietluot_choi');
    }
}
