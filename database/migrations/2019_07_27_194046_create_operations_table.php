<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('establishment_id');
            $table->foreign('establishment_id')->references('id')->on('establishments');
            $table->index('establishment_id');
            $table->unsignedBigInteger('donor_id')->nullable();
            $table->foreign('donor_id')->references('id')->on('donors');
            $table->unsignedBigInteger('interval_id');
            $table->foreign('interval_id')->references('id')->on('intervals');
            $table->unsignedBigInteger('bank_account_id');
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts');
            $table->string("state")->nullable(); //حواله مستديمة او اخري
            $table->string("type"); //manual or auto only
            $table->decimal("amount", 10 , 2)->nullable();

            $table->unsignedBigInteger('excel_sheet_id')->nullable(); // excel sheet id( if you saved it)
            $table->foreign('excel_sheet_id')->references('id')->on('excel_sheets');


            $table->text('summary')->nullable();
            $table->boolean("success"); // if operation success only make it true
            $table->timestamp('operation_date')->nullable(); //date from excel sheet

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
        Schema::dropIfExists('operations');
    }
}
