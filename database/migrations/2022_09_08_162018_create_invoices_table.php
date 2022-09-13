<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('ClientName');
            $table->dateTime('InvoiceDate');
            $table->string('InvoiceName');
            $table->dateTime('PurchaseOrderDate');
            $table->dateTime('PaymentDueDate');
            $table->string('AccountNumber')->nullable();
            $table->string('PaymentMethod')->nullable();
            $table->decimal('SubTotal');
            $table->decimal('Discount');
            $table->decimal('Total');
            $table->decimal('Amount');
            $table->decimal('Due')->nullable();
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
};
