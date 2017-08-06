<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowerLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrower_loan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('borrower_id');
            $table->integer('loan_id');
            $table->float('amount',10,2);
            $table->date('start_pay_date');
            $table->boolean('status');
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
        Schema::dropIfExists('borrower_loan');
    }
}
