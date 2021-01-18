<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->bigInteger('count');
            $table->string('bank');
            $table->bigInteger('salary');
            $table->bigInteger('phone');
            $table->bigInteger('user_id')->unsigned();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('user_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information');
    }
}
