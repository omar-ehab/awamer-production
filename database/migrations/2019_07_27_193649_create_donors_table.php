<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('establishment_id');
            $table->foreign('establishment_id')->references('id')->on('establishments');
            $table->index('establishment_id');
            $table->string('name');
            $table->unsignedBigInteger('donor_bank');
            $table->foreign('donor_bank')->references('id')->on('banks');
            $table->string('iban');
            $table->string('donor_account_number');
            $table->unsignedBigInteger('bank_account');
            $table->foreign('bank_account')->references('id')->on('bank_accounts');
            $table->decimal('amount_of_withdrawal',10 , 2);
            $table->unsignedInteger('day_of_withdraw')->default(1);
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->string('mobile', 15);
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('repeats_in_month');
            $table->boolean('withdraw')->default(false);
            $table->date('withdraw_start_date');
            $table->date('withdraw_end_date');
            $table->boolean('approved')->default(false);
            $table->text('withdraw_description')->nullable();
            $table->boolean('success_sms')->default(false);
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('donors');
    }
}
