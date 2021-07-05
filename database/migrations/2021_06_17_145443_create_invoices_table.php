<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('client_id');
            $table->integer('device_id');
            $table->date('purchase_date');

            $table->boolean('technical_support_chk')->default(false);
            $table->date('technical_support')->nullable();
            
            $table->boolean('repairing_service_chk')->default(false);;
            $table->date('repairing_service')->nullable();
            
            $table->boolean('premium_support_chk')->default(false);;
            $table->date('premium_support')->nullable();
            
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
        Schema::dropIfExists('invoices');
    }
}
