<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstablishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('establishment_type_id');
            $table->foreign('establishment_type_id')->references('id')->on('establishment_types');
            $table->unsignedBigInteger('administrative_area_id');
            $table->foreign('administrative_area_id')->references('id')->on('administrative_areas');
            $table->boolean('approved')->default(false);

            $table->string('name');
            $table->string('representative_name');
            $table->string('mobile', 15);
            $table->string('phone', 15)->nullable();
            $table->string('address');
            $table->boolean('send_sms')->default(true);
            $table->string('logo')->nullable();
            $table->string('kalesha')->nullable();

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
        Schema::dropIfExists('establishments');
    }
}
